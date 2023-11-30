<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/header.php')?>

<?php   
    if(isset($_SESSION['customer_id'])) {
        //Create variables
        $date = date("Y-n-d");  //Funcion igual que timestamp
       //echo $date;

        //Connect db
        include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/db/connect_db.php');

        //Query
        $sql_reservations = "SELECT * 
        FROM 045_reservations
        INNER JOIN 045_users ON 045_reservations.customer_id = 045_users.customer_id
        WHERE date_out = '$date'";



        $result = mysqli_query($conn, $sql_reservations);
        $reservations = mysqli_fetch_all($result, MYSQLI_ASSOC);
        // print_r($reservations);
        if($result->num_rows > 0) {
            echo '<div class="container text-center">
            <div>';
            
            echo "  <div class=\"text-center pt-4\">
            <h5> Today's check outs </h5>
            </div>";

            echo '<table class="text-center mt-4">
                    <thead class="text-center ">
                        <th class="p-2 m-2"> Reservation Number </th>
                        <th class="p-2 m-2"> Customer DNI </th>
                        <th class="p-2 m-2"> Customer Name </th>
                        <th class="p-2 m-2"> Room Number </th>
                    </thead>';
                    
            foreach($reservations as $reservation){
                echo '<tr class="text-center">';
                    echo '<td>' . $reservation['reservation_number'] . '</td> 
                        <td> ' . $reservation['customer_dni'] . '</td>
                        <td>' . $reservation['customer_forename'] . ' ' . $reservation['customer_lastname'] . '</td>
                        <td>' . $reservation['room_number'] . '</td>';
                    echo "<td>
                            <span class=\"fw-thin secondary-color btn-group m-2\">
                                <form action=\"/student045/dwes/form/form_reservations_update.php\" method =\"POST\">
                                    <input name=\"reservationNumber\" value = \"" . $reservation['reservation_number'] . "\" hidden>
                                    <button class=\"btn btn-secondary m-2 \"> Update </button>
                                </form>";
                if($reservation['reservation_status'] == 'check_in') {
                    echo "<form action=\"/student045/dwes/db/db_reservation_update_check_out.php\" method =\"POST\">
                                    <input name=\"reservationNumber\" value = \"" . $reservation['reservation_number'] . "\" hidden>
                                    <button class=\"btn btn-secondary m-2 \" type=\"submit\" name=\"submit\"> Check out </button>
                                </form>";
                }
                                
                            echo "<form action=\"/student045/dwes/db/db_invoice_select.php\" method =\"POST\">
                                    <input name=\"reservationNumber\" value = \"" . $reservation['reservation_number'] . "\" hidden>
                                    <button class=\"btn btn-secondary m-2\" type=\"submit\" name=\"submit\"> View invoice </button>
                                </form>
                            </span> 
                        </td>";
                    echo '</tr>';        
            }
            echo '</table>';
            mysqli_free_result($result);

        } else {

            echo "  <div class=\"text-center\">
                    <p> $date </p>
                    <p> It looks like theres no check outs today </p>
                    <div class=\"btn-group\">
                        <a href=\"/student045/dwes/index.php\"><button type=\"button\" class=\"btn btn-secondary me-2\"> Return home </button></a>
                        <a href=\"/student045/dwes/db/db_reservations_select_check_out.php\"><button type=\"button\" class=\"btn btn-secondary\"> Look at the check outs </button></a>
                    </div>
                </div>"; 
        }

    }    
        echo '</div>
        </div>';
        mysqli_close($conn);
?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php')?>