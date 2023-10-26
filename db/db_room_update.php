<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/header.php')?>

<?php 
    //Crear variables
    $room_number = $_POST['roomNum'];
    $room_type = $_POST['roomType'];
    $room_state = $_POST['roomState'];
    $room_status = $_POST['roomStatus'];
    $room_price = $_POST['roomPrice'];
    

    //Coonectar bd
    include('connect_db.php');

    //Comprovar q los datos son correctos
    $sql_update_room = "UPDATE `045_rooms` 
    SET `room_category`='$room_type',`room_state`='$room_state',`room_status`='$room_status',`room_price`= $room_price
    WHERE room_number = $room_number";
   // $result = mysqli_query($conn, $sql_update_room);

    //Show that it has been created
    if ($conn->query($sql_update_room) === TRUE) {
        echo "Your room is now updated";
    } else {
        echo "Your room is not updated, see if there is any problem with your data";
    }

?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php')?>