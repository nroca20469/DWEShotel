
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/header.php')?>

    <?php 

        /*Se guardan correctamente:
            -Bed-Type(? ns pq este si pero los otros no) --> ya los demas funcionan correctamente
            -Room State
            -Room Type
            -Room price
            -Room Number
            -Room Status
            -Room-Ammenities --> listo  
        */ 

        $room_number;
        $room_type;
        $room_state;
        $room_price;
        $room_status;
        $bed_type;
        $room_ammenities;
        $boton_aviso;
        $room_img;        
        
        if(isset($_POST['submit'])){
            $room_number = $_POST['roomNum'] ?? null;
            $room_price = $_POST['roomPrice'] ?? null;
            $room_type = $_POST['roomType'] ?? null;
            $room_status = $_POST['roomStatus'] ?? null;
            $room_state = $_POST['roomState'] ?? null;
            $bed_type = $_POST['bedType'] ?? null;
            
            //Imagen
            $room_img = $_FILES['roomImg']['name'] ?? null;
            $room_tmp = $_FILES['roomImg']['tmp_name'];
            $room_img_name = explode('.', $room_img);
            $room_img_name[0] = $room_number;
            $img_name = $room_img_name[0] . '.' . $room_img_name[1];
            $img_destination = "/student045/dwes/img/rooms/$img_name";

            if(!$room_number || !$room_price || !$room_type || !$room_status || !$room_state || !$bed_type || !$room_img)  {
                $boton_aviso = 'There was a problem with your data';
            } else {

                //Img
                move_uploaded_file($room_tmp, $_SERVER['DOCUMENT_ROOT'] . $img_destination);

                //Connect to db
                include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/db/connect_db.php');
                
                //Comprovate that the room doesnt exist
                $sql_room = "SELECT room_number
                            FROM `045_rooms`
                            WHERE room_number = $room_number";
                $result_room_num = mysqli_query($conn, $sql_room);
                $room_number_exists = mysqli_fetch_all($result_room_num, MYSQLI_NUM);
               
                if($room_number_exists != null) {
                    $boton_aviso = "<br>The room already exists";

                } else {
                    switch($room_type){
                        case 'single':
                            $room_ammenities = '{
                                "TV": true,
                                "Air Conditioning": true,
                                "Wifi": true,
                                "extra bed":true,
                                "bed type": "'. $bed_type . '",
                                "bed price per night": 100
                            }';
                            break;
                        
                        case 'double':
                            $room_ammenities = '{
                                "TV": true,
                                "Air Conditioning": true,
                                "Wifi": true,
                                "Terrace": true,
                                "extra bed":true,
                                "bed type":"'. $bed_type . '",
                                "bed price per night": 200
                            }';
                            break;

                        case 'suite':
                            $room_ammenities = '{
                                "TV": true,
                                "Air Conditioning": true,
                                "Wifi": true,
                                "Terrace": true,
                                "extra bed":true,
                                "bed type":"'. $bed_type . '",
                                "bed price per night": 150
                            }';
                            break;
                }

                //Create room2
                $sql_insert_room = "INSERT INTO `045_rooms` 
                                    (room_number, room_category, room_state, room_status, room_price, room_description, room_image)
                                    VALUES 
                                    ($room_number, '$room_type', '$room_state', '$room_status', $room_price, '$room_ammenities', '$img_destination')"; 
                
                //Show that it has been created
                if ($conn->query($sql_insert_room) === TRUE) {
                    $boton_aviso = "Your room is now created";
                  } else {
                    $boton_aviso = "Your room is not created, see if there is any problem with your data";
                  }
                }

                mysqli_free_result($result_room_num);
                mysqli_close($conn);   
            }
            
            echo "  <div class=\"text-center\">
                        <h5>Room Number: $room_number </h5>
                    </div>";
            

            echo "  <div class=\"text-center\">
                        <p> $boton_aviso  </p>
                        <div class=\"btn-group\">
                            <a href=\"/student045/dwes/index.php\"><button type=\"button\" class=\"btn btn-secondary me-2\"> Return home </button></a>
                            <a href=\"/student045/dwes/form/form_room_insert.php\"><button type=\"button\" class=\"btn btn-secondary\"> Insert another room </button></a>
                        </div>
                    </div>"; 



        }
        
                
    ?>

    <?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php')?>
