<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/header.php'); ?>

<?php

    //Create variable
    if(isset($_SESSION['customer_id']) && $role != 'anonymous') {
        $customer_id = $_SESSION['customer_id'];
    //    echo $customer_id;

        //connect db
        include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/db/connect_db.php');
        

        //Select reservations per customer, show the dates and the reservation number
        $sql_select_reservations = "SELECT * 
        FROM 045_reservations
        WHERE customer_id = $customer_id";

        $connect_reservations = mysqli_query($conn, $sql_select_reservations);
        $reservations = mysqli_fetch_all($connect_reservations, MYSQLI_ASSOC);
        echo count($reservations);
        if(COUNT($reservations) > 0) {

            //Show results by order and a button to see detailed
            echo '<div class="container">
            <div class="ms-4"';
          

            foreach ($reservations as $reservation){
             // echo  $reservation['reservation_status'];
                if($reservation['reservation_status'] == 'booked') {
                    echo '<div class="row">';
                        echo '<div class="col-5">';
                        echo ('Reservation Number: ' . $reservation['reservation_number'] . 
                        '<br>Date in: ' . $reservation['date_in'] . 
                        '<br>Date out: ' . $reservation['date_out'] . 
                        '<br>Reservation Status: ' . $reservation['reservation_status']);
                        echo '</div>';
                        echo '<div class="col-2"> <br>';
                        echo "<form action=\"http://localhost/student045/dwes/db/db_reservation_update_cancel.php\" method =\"POST\">
                            <input name=\"reservationNum\" value = \"" . $reservation['reservation_number'] . "\" hidden>";
                            include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/form/form_reservation_update_cancel.php');
                        echo "</form>";
                        echo '</div>';
                    echo '</div>';
                   
                }
                
             /*   echo "<span class=\"fw-thin secondary-color btn-group m-2\">
                        <form action=\"http://localhost/student045/dwes/form/form_customer_update.php\" method =\"POST\">
                            <input name=\"customerID\" value = \"" .  $customer['customer_id'] . "\" hidden>
                            <button class=\"btn btn-secondary m-2 \"> Update </button>
                        </form>
                        <form action=\"http://localhost/student045/dwes/db/db_customer_delete.php\" method =\"POST\">
                            <input name=\"customerID\" value = \"" . $customer['customer_id'] . "\" hidden>
                            <button class=\"btn btn-secondary my-2\"> Delete </button>
                        </form>
                    </span> "; */
                echo '<br>';
            }
             echo '</div>';
            echo '</div>';  


        } else {
            // echo '<div class="container">
            // <div class="ms-4">';
            //     echo "<p> $name, you have no reservations.<p>";
            // echo '</div>'; 
            
            echo "<div class=\"text-center pt-4\">
                     <h5> $name, you have no reservations. </h5>
                     <button class=\"btn btn-secondary\">Insert reservation</button> 
                     <button class=\"btn btn-secondary\">Home</button>
                </div>";
        }


       // print_r ($connect_reservations);

    }

?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php'); ?>