<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/header.php')?>

<?php   
    if(isset($_SESSION['customer_id'])) {
        //Create variables
        $date = date("Y-n-d");  //Funcion igual que timestamp
       // echo $date;

        //Connect db
        include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/db/connect_db.php');

        //Query
        $sql_reservations = "SELECT * 
        FROM 045_reservations
        INNER JOIN 045_users ON 045_reservations.customer_id = 045_users.customer_id
        WHERE date_in = '$date' AND  reservation_status = 'booked';";
        $result = mysqli_query($conn, $sql_reservations);
        $reservations = mysqli_fetch_all($result, MYSQLI_ASSOC);

        if($result->num_rows > 0) {
            echo '<div class="container text-center">
            <div>';
            
            echo "  <div class=\"text-center pt-4\">
            <h5> Today's check ins </h5>
            </div>";

            echo '<table class="text-center mt-4">
                    <thead class="text-center ">
                        <th class="p-2 m-2"> Reservation Number </th>
                        <th class="p-2 m-2"> Customer DNI </th>
                        <th class="p-2 m-2"> Customer Name </th>
                        <th class="p-2 m-2"> Preselected Room </th>
                        <th class="p-2 m-2"> Room Number </th>
                    </thead>';
                    
            foreach($reservations as $reservation){
                echo '<tr class="text-center">';
                    echo '<td>' . $reservation['reservation_number'] . '</td> 
                        <td> ' . $reservation['customer_dni'] . '</td>
                        <td>' . $reservation['customer_forename'] . ' ' . $reservation['customer_lastname'] . '</td>                        
                        <td> ' . $reservation['preselected_room'] . '</td>
                        <td>';
                        if(!isset($reservation['room_number'])) {
                            //Get room available in types
                            $sql_room_type = "SELECT room_category FROM 045_rooms WHERE room_number = (SELECT preselected_room FROM 045_reservations WHERE reservation_number = {$reservation['reservation_number']})";
                            $result = mysqli_query($conn, $sql_room_type);
                            $room_type = mysqli_fetch_assoc($result);
                            
                            $sql = "SELECT room_number
                            FROM 045_rooms
                            WHERE room_number NOT IN (SELECT preselected_room
                                                        FROM 045_reservations
                                                        WHERE date_in < '{$reservation['date_out']}'
                                                        AND date_out > '{$reservation['date_in']}')
                            AND room_category = '{$room_type['room_category']}'
                            AND room_status = 1";
                            $result_sql = mysqli_query($conn, $sql);
                            $room_numbers = mysqli_fetch_all($result_sql, MYSQLI_ASSOC);
                            echo "<form action=\"/student045/dwes/db/db_reservation_update_room_number.php\" method =\"POST\">
                            <input name=\"reservationNumber\" value = \"" . $reservation['reservation_number'] . "\" hidden> ";
                            echo '<select class="form-select" aria-label="Room Number"  name="roomNumber" type="select">';
                            echo "<option value=\"\" selected > Eliga una opcion </option>";
                            foreach($room_numbers as $room_number) {
                                print_r($room_number['room_number']);
                                echo "<option value=\"{$room_number['room_number']}\"> {$room_number['room_number']} </option>";
                            }
                            
                            echo "</select> 
                            <button class=\"btn btn-secondary\" type=\"submit\" name=\"submit\"> Save changes </button></form></td> ";
                        } else {
                             echo $reservation['room_number'] . '</td>';
                        }

//                        include($_SERVER['DOCUMENT_ROOT'] . '/student045/db/db_reservation_select_room_number.php');

                    echo "<td>
                            <span class=\"fw-thin secondary-color btn-group m-2\">
                            <form action=\"/student045/dwes/form/form_reservations_update.php\" method =\"POST\">
                                    <input name=\"reservationNumber\" value = \"" . $reservation['reservation_number'] . "\" hidden>
                                    <button class=\"btn btn-secondary m-2 \"> Update </button>
                                </form>
                                <form action=\"/student045/dwes/db/db_reservation_update_check_in.php\" method =\"POST\">
                                    <input name=\"roomNumber\" value = \"" . $reservation['room_number'] . "\" hidden>
                                    <input name=\"preselectedRoom\" value = \"" . $reservation['preselected_room'] . "\" hidden>
                                    <input name=\"reservationNumber\" value = \"" . $reservation['reservation_number'] . "\" hidden>
                                    <button class=\"btn btn-secondary m-2 \" type=\"submit\" name=\"submit\"> Check in </button>
                                </form>
                                <form action=\"/student045/dwes/db/db_reservation_update_absent.php\" method =\"POST\">
                                    <input name=\"reservationNumber\" value = \"" . $reservation['reservation_number'] . "\" hidden>
                                    <button class=\"btn btn-secondary m-2 \" type=\"submit\" name=\"submit\"> Absent </button>
                                </form>
                                <form action=\"/student045/dwes/db/db_reservations_delete.php\" method =\"POST\">
                                    <input name=\"reservationNumber\" value = \"" . $reservation['reservation_number'] . "\" hidden>
                                    <button class=\"btn btn-secondary my-2\" type=\"submit\" name=\"submit\"> Delete </button>
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
                    <p> It looks like theres no check ins today </p>
                    <div class=\"btn-group\">
                        <a href=\"/student045/dwes/index.php\"><button type=\"button\" class=\"btn btn-secondary me-2\"> Return home </button></a>
                        <a href=\"/student045/dwes/db/db_reservations_select_check_out.php\"><button type=\"button\" class=\"btn btn-secondary\"> Look at the check outs </button></a>
                    </div>
                </div>"; 
        }
        mysqli_close($conn);
    }    
    echo '</div>
    </div>';
?>   

<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php')?>