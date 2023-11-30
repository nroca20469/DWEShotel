<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/header.php'); ?>

<?php
    //Capture variable
     $reservation_number = $_POST['reservationNumber'];
    // $reservation_number = 63;
    // echo $reservation_number;

    //Connect db
    include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/db/connect_db.php');

    //Check that the reservation is already in the invoice table
    $sql_check_invoice_reservation = "SELECT *
                                        FROM 045_invoice AS i
                                        INNER JOIN 045_reservations AS r ON r.reservation_number = i.reservation_number
                                        WHERE i.reservation_number = $reservation_number";
    $result = mysqli_query($conn, $sql_check_invoice_reservation);
    $reservation = mysqli_fetch_assoc($result);
    // print_r($reservation['invoice_description']);

    if($reservation != null) {
        
        echo '<div class="container text-center">
            <div>';
            
        echo "  <div class=\"text-center pt-4\">
                    <h5> Reservation number: $reservation_number </h5>
                </div>";
        echo "<div class=\"text-center pt-4\">
            <p> Date in: {$reservation['date_in']} </p>
            <p> Date out: {$reservation['date_out']} </p>
            <p> Room Number & Room Price: {$reservation['room_number']}, {$reservation['room_price']}</p>
            <p> Subtotal habitacion: {$reservation['subtotal_room']} </p>
            <span class=\"fw-thin secondary-color btn-group p-2\">
                <p class=\"p-3\">Subtotal extras: {$reservation['subtotal_extras']}</p>";
            
            if($reservation['subtotal_extras'] != 0.00) {
                $invoice_description = $reservation['invoice_description'];
                $invoice_detail = json_decode($invoice_description);
                echo "<form action=\"/student045/dwes/db/db_invoice_select_details.php\" method =\"POST\">
                        <input type=\"text\" name=\"invoiceNumber\" value = \" {$reservation['invoice_number']} \" hidden>
                        <button class=\"btn btn-secondary m-2 \" type=\"submit\" name=\"submit\"> View Details </button>
                    </form>";
            }
             
        echo "</span> 
            <h6> Total: {$reservation['total']} </h6>
            </div>
        </div>
        <div class=\"btn-group\">
            <a href=\"/student045/dwes/index.php\"><button type=\"button\" class=\"btn btn-secondary me-2\"> Return home </button></a>
            <a href=\"/student045/dwes/db/db_reservations_select_check_out.php\"><button type=\"button\" class=\"btn btn-secondary\"> Return to check outs </button></a>
        </div>

        </div>";

    } else {
        echo 'bye';
    }

?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php'); ?>