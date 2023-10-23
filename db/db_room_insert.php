<!DOCTYPE html>
<html lang="en">
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/header.php')?>

    <?php 

        /*Se guardan correctamente:
            -Bed-Type(? ns pq este si pero los otros no) --> ya los demas funcionan correctamente
            -Room State
            -Room Type
            -Room price
            -Room Number
            -Room Status

        Sigue sin funcionar:
             -Room-Ammenities --> se guarda UN SOLO VALOR, ver como guardar mas de uno
        */ 

        $room_number;
        $room_type;
        $room_state;
        $room_price;
        $room_status;
        $bed_type;
        $room_ammenities;

        if(isset($_POST['submit'])){
            if(!empty($_POST['roomNum'])) {
                $room_number = $_POST['roomNum'];
                echo 'You have chosen: ' . $room_number;
            } else {
                echo 'Please select a value for the Room Number . <br>';
                echo("<br><button class=\"btn btn-secondary\" onclick=\"location.href='http://localhost/student045/dwes/form/form_room_insert.php'\">Go Back</button>");
                return;
            }
            echo '<br>';
            if(!empty($_POST['roomPrice'])) {
                $room_price = $_POST['roomPrice'];
                echo 'You have chosen for room price: ' . $room_price;
            } else {
                echo 'Please select a value for the Room Price . <br>';
                echo("<br><button class=\"btn btn-secondary\" onclick=\"location.href='http://localhost/student045/dwes/form/form_room_insert.php'\">Go Back</button>");
                return;
            }
            echo '<br>';
            if(!empty($_POST['roomType'])) {
                $room_type = $_POST['roomType'];
                echo 'You have chosen for room  type: ' . $room_type;
            } else {
                echo 'Please select a value for the Room Type. <br>';
                echo("<br><button class=\"btn btn-secondary\" onclick=\"location.href='http://localhost/student045/dwes/form/form_room_insert.php'\">Go Back</button>");
                return;
            }
            echo '<br>';
            if(!empty($_POST['roomStatus'])) {
                $room_status = $_POST['roomStatus'];
                echo 'You have chosen for room status: ' . $room_status;
            } else {
                echo 'Please select a value for the Room Status .';
                echo("<br><button class=\"btn btn-secondary\" onclick=\"location.href='http://localhost/student045/dwes/form/form_room_insert.php'\">Go Back</button>");
                return;
            }
        
            echo '<br>';
            if(!empty($_POST['roomState'])) {
                $room_state = $_POST['roomState'];
                echo 'You have chosen for room state: ' . $room_state;
            } else {
                echo 'Please select a value for the Room State. <br>';
                echo("<br><button class=\"btn btn-secondary\" onclick=\"location.href='http://localhost/student045/dwes/form/form_room_insert.php'\">Go Back</button>");
                return;
            }
        
            echo '<br>';
            if(!empty($_POST['bedType'])) {
                $bed_type = $_POST['bedType'];
                echo 'You have chosen for bed type: ' . $bed_type;
            } else {
                echo 'Please select a value for the Bed Type. <br>';
                echo("<br><button class=\"btn btn-secondary\" onclick=\"location.href='http://localhost/student045/dwes/form/form_room_insert.php'\">Go Back</button>");
                return;
            }
        

            //Connect to db
            include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/db/connect_db.php');
            
            //Comprovate that the room doesnt exist
            $sql_room = "SELECT room_number
            FROM `045_rooms`
            WHERE room_number = $room_number";
            $result_room_num = mysqli_query($conn, $sql_room);
            $room_number_exists = mysqli_fetch_all($result_room_num, MYSQLI_NUM);
            if($room_number_exists != null) {
                echo "<br>The room already exists";
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
            (room_number, room_category, room_state, room_status, room_price, room_description)
            VALUES 
            ($room_number, '$room_type', '$room_state', '$room_status', $room_price, '$room_ammenities')"; 
            
            //Show that it has been created
            if ($conn->query($sql_insert_room) === TRUE) {
                echo "Your room is now created";
              } else {
                echo "Your room is not created, see if there is any problem with your data";
              }
            }

        
        }
    ?>

    <?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php')?>
    
    </html>