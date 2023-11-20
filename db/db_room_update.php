<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/header.php')?>

<?php 
    if(isset($_POST['submit'])) {
        //Crear variables
        $room_number = $_POST['roomNum'];
        $room_type = $_POST['roomType'];
        $room_state = $_POST['roomState'];
        $room_status = $_POST['roomStatus'];
        $room_price = $_POST['roomPrice'];
        $boton_aviso;

        //Ammenities
        $tv = $_POST['tv'];
        $air_conditioning = $_POST['airConditioning'];
        $wifi = $_POST['wifi'];
        $extra_bed = $_POST['extraBed'];
        $bed_type = $_POST['bedType'];
        $price_per_nigth  = $_POST['priceNight'];

        echo " <div class=\"text-center\">
            <h5>Room Number: $room_number </h5>
        </div>";

        $room_description = '{
            "TV": ' . $tv .',
            "Air Conditioning": ' . $air_conditioning . ',
            "Wifi": ' . $wifi . ',
            "extra bed":' . $extra_bed . ',
            "bed type": "' . $bed_type . '",
            "bed price per night": ' . $price_per_nigth . '
        }';

        // echo ($room_description);

        //Coonectar bd
        include('connect_db.php');

        //Comprovar q los datos son correctos
        $sql_update_room = "UPDATE `045_rooms` 
        SET `room_category`='$room_type',`room_state`='$room_state',`room_status`='$room_status',`room_price`= $room_price, `room_description` = '$room_description'
        WHERE room_number = $room_number";
        // $result = mysqli_query($conn, $sql_update_room);

        //Show that it has been created
        if ($conn->query($sql_update_room) === TRUE) {
            $boton_aviso = "Your room is now updated";
        } else {
            $boton_aviso = "Your room is not updated, see if there is any problem with your data    <a href=\"/student045/dwes/form/from_room_update_call.php\"><button type=\"button\" class=\"btn btn-secondary ms-2\"> Return back </button></a>";
        }
        
        mysqli_free_result($result);
        mysqli_close($conn);


    } else {
        $boton_aviso = "You didn't come from the form"; 
    }

    echo "  <div class=\"text-center\">
                    <p> $boton_aviso </p>
                    <div class=\"btn-group\">
                        <a href=\"/student045/dwes/index.php\"><button type=\"button\" class=\"btn btn-secondary me-2\"> Return home </button></a>
                        <a href=\"/student045/dwes/form/form_room_update_call.php\"><button type=\"button\" class=\"btn btn-secondary\"> Return to edit another room </button></a>
                    </div>
                </div>";

   
   // echo '<br>' . $boton_aviso;
?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php')?>