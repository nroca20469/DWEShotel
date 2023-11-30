<?php
if(isset($_POST['submit'])){
    //Create variables
        $reservation_num = $_POST['reservationNumber'];
        $room_number = $_POST['roomNumber'];

    //Connect to db
        include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/db/connect_db.php');
    
    if(!($conn ->connect_error)){
        
        //Update room_number reservation
            $update_reservation = "UPDATE 045_reservations 
                                SET room_number = '$room_number' 
                                WHERE reservation_number = $reservation_num";

            //$update = mysqli_query($conn, $update_reservation);
            //Show that is been inserted, or show error that it was not possible
            if($conn->query($update_reservation) === TRUE){
                echo "<script>location.href = '/student045/dwes/db/db_reservations_select_check_in.php';</script>";
            } else {
                $boton_aviso = 'Not correctly';
            }
    } else {
       
    }

}

?>