<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/header.php')?>

<?php 
    //Crear variables
    $room_number = 105; // $_POST['roomNumber'];
    $room_type = 'double';//$_POST['roomType'];


    //Coonectar bd
    include('connect_db.php');

    //Comprovar q los datos son correctos
    $sql_comprovar = "SELECT room_number 
    FROM 045_rooms
    WHERE room_number = $room_number AND room_category = '$room_type'";
    
    $result = mysqli_query($conn, $sql_comprovar);
    if($result[0] != null && $result != 'undefined' && isSet($result) && $result != '0'){ //NO FUNCIONA REVSAR!!
        echo 'Can be deleted';
    } else {
        echo 'null  ';
    }
  

?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php')?>
