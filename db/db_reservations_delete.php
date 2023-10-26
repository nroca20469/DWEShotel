<!DOCTYPE html>
<html lang="en">
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/header.php')?>

    <?php

        //Create variables 
        $reservation_number = $_POST['reservationNumber'];
        $message;


        echo " <div class=\"text-center p-4\">
            <h5>Reservation Number: $reservation_number </h5>
        </div>";


        //Check that the reservation exists
        if($reservation_number != null){
            
            //Connect to db
            include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/db/connect_db.php');

            //SQL to chech if the reservation exists 
            $sqlCheckReseration = "SELECT reservation_number   
            FROM 045_reservations
            WHERE reservation_number = $reservation_number;";
             

            //If exist delete reservation
            $exists = mysqli_query($conn, $sqlCheckReseration);
            if( ($exists->num_rows) > 0 && ($exists->num_rows) < 2){ 
                $deleted = 1;
            } else {        
                $message = 'The reservation does not exists, please check the data';  
                $deleted = 0;
            }
           
            //echo $deleted;  
            if($deleted == 1){
                $sqlDeleteReservation = "DELETE FROM `045_reservations` 
                WHERE reservation_number = $reservation_number;";

                $isDeleted = mysqli_query($conn, $sqlDeleteReservation);

                //Show that the reservation is been deleted
                $message = 'The reservation has been deleted';
            }

            echo "<div class=\"text-center p-3\">
                <h6> $message  </h6>
            </div>";

            if($deleted == 0) {
                echo  "<div class=\"text-center p-2\">
                    <a class=\"btn btn-outlined-dark\" role=\"button\" href=\"http://localhost/student045/dwes/form/form_reservations_delete_Call.php\" \>Return</a>
                </div>";
            }

        }

        

        

        

    ?>

    

    <?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php')?>
</html>