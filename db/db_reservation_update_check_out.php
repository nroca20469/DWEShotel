<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/header.php')?>

<?php
    if(isset($_POST['submit'])){
        //Create variables
        
            $reservation_number = $_POST['reservationNumber'];
          
            echo "  <div class=\"text-center\">
                        <h5>Reservation Number: $reservation_number  && Insert invoice</h5>
                    </div>";

        //Connect to db
        include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/db/connect_db.php');
        
        if(!($conn ->connect_error)){
            
            //Update cancel reservation
                $update_reservation = "UPDATE 045_reservations 
                                    SET reservation_status = 'check_out' 
                                    WHERE reservation_number = $reservation_number";

                //$update = mysqli_query($conn, $update_reservation);
                //Show that is been inserted, or show error that it was not possible
                if($conn->query($update_reservation) === TRUE){
                    $boton_aviso = 'Check out';
                } else {
                    $boton_aviso = 'Not checked out';
                }


        } else {
            $boton_aviso = 'The server looks like its not working correctly, check the connection please';
        }
            
        include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/db/db_invoice_insert.php');

    } else {
        $boton_aviso = "You didn't come from a form";
    }

    echo "  <div class=\"text-center\">
        <p> $boton_aviso  </p>
        <div class=\"btn-group\">
            <a href=\"/student045/dwes/index.php\"><button type=\"button\" class=\"btn btn-secondary me-2\"> Return home </button></a>
            <a href=\"/student045/dwes/db/db_reservations_select_check_out.php\"><button type=\"button\" class=\"btn btn-secondary\"> Return back </button></a>
        </div>
</div>";

mysqli_close(($conn));
   
?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php')?>