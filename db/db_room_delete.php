<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/header.php')?>

<?php 
    //Crear variables
    $room_number = $_POST['roomNumber'];
    echo $room_number;

    //Coonectar bd
    include('connect_db.php');

    //Comprovar q los datos son correctos
    $sql_comprovar = "SELECT room_number 
    FROM 045_rooms
    WHERE room_number = $room_number";
    
    $result = mysqli_query($conn, $sql_comprovar);
    if( ($result->num_rows) == 1){ 
        echo 'Can be deleted';
        $deleted = true;
    } else {
        echo 'null  ';
        $deleted = false;
    }

    if($deleted == true){       
        $sql_delete_room = "DELETE FROM `045_rooms` 
        WHERE room_number = $room_number";
        $borrar = mysqli_query($conn, $sql_delete_room);
    } else {
        echo 'Can not be deleted';
    }
  

?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php')?>
