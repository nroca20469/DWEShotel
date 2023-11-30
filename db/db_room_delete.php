<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/header.php')?>

<?php 
    //Crear variables
    $boton_aviso;
    if(isset( $_POST['roomNumber'])){
        $room_number = $_POST['roomNumber'];

        //Coonectar bd
        include('connect_db.php');

        //Comprovar q los datos son correctos
        $sql_comprovar = "SELECT room_number 
        FROM 045_rooms
        WHERE room_number = $room_number";
        
        $result = mysqli_query($conn, $sql_comprovar);
        if( ($result->num_rows) == 1){ 
            $deleted = true;
        } else {
            $deleted = false;
        }

        if($deleted == true){       
            $sql_delete_room = "DELETE FROM `045_rooms` 
            WHERE room_number = $room_number";
            $borrar = mysqli_query($conn, $sql_delete_room);
        } else {
            $boton_aviso = "The room wasn't found in the database";
        }
        
           mysqli_free_result($result);
    mysqli_close($conn);    

    } else {
        $boton_aviso = 'Room number not set';
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

 
?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php')?>
