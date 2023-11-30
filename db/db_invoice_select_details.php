<!--  [{"202311241335176340" : { "service name": "gym", "date": "2023-11-24", "total price": 40.00, "details": 
            {"service" : "gym", "uds": 2, "price" : 20.00 , "date": "2023-11-24", "total": 40} }},
        {"202311241335386340" : { "service name": "gym", "date": "2023-11-24", "total price": 40.00, "details": 
            {"service" : "gym", "uds": 2, "price" : 20.00 , "date": "2023-11-24", "total": 40} }},
        {"202311241538466320" : { "service name": "laundry", "date": "2023-11-24", "total price": 20.00, "details": 
            {"service" : "laundry", "uds": 2, "price" : 10.00 , "date": "2023-11-24", "total": 20} }},
        {"202311241540056330" : { "service name": "bar", "date": "2023-11-24", "total price": 30.00, "details": 
            {"service" : "bar", "uds": 0, "price" : 0, "date": "2023-11-24", 
                "details": [ { "name": "wine", "price": "10.0", "uds": "3" }], "total": 30} }},
        {"202311241857556340" : { "service name": "bar", "date": "2023-11-24", "total price": 40.00, "details": 
            {"service" : "bar", "uds": 0, "price" : 0, "date": "2023-11-24", "details": 
                [ { "name": "wine", "price": "10.00", "uds": "4" }], "total": 40} }},
        {"202311246320" : { "service name": "bar", "date": "2023-11-24", "total price": 20.00, "details": 
            {"service" : "bar", "uds": 0, "price" : 0, "date": "2023-11-24", "details": 
                [ { "name": "wine", "price": "10.0", "uds": "2" }], "total": 20} }},
        {"202311246340" : { "service name": "gym", "date": "2023-11-24", "total price": 40.00, "details": 
            {"service" : "gym", "uds": 2, "price" : 20.00 , "date": "2023-11-24", "total": 40} }}] -->
<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/header.php'); ?>


<?php
    $invoice_number = $_POST['invoiceNumber'];
    // print_r($invoice_number);
    // echo "<br>";

    //Connect db
    include ($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/db/connect_db.php');

    //Seach invoice by number
    $sql_search_invoice = "SELECT * FROM 045_invoice WHERE invoice_number = $invoice_number";
    $result = mysqli_query($conn, $sql_search_invoice);
    $invoice = mysqli_fetch_assoc($result);

    $invoice_description = json_decode($invoice['invoice_description'],1);
    // print_r($invoice_description);
    $tickets = array_keys($invoice_description);
    // echo '<br>';
    // print_r($tickets);
    
    $total = 0;
    foreach($tickets as $ticket) {
        // print_r($invoice_description[$ticket]);
        $total += $invoice_description[$ticket]['total price'];
        // echo '<br>';
        // print_r($invoice_description[$ticket]['details']);
    }

    // echo $total;

    echo '<div class="container text-center mb-4">
    <div class="text-center">';
    
echo "  <div class=\"text-center pt-4 mb-4\">
            <h3> Invoice number: {$invoice['invoice_number']} </h3>
        </div>";

        

        echo '<table class="text-center mx-auto p-2">
        <thead class="text-center">
            <th class="p-3 m-2"><h5> Ticket number </h5></th>
            <th class="p-3 m-2"><h5> Service </h5></th>
            <th class="p-3 m-2"><h5> Date </h5></th>
            <th class="p-32 m-2"><h5> Total Price </h5></th>
        </thead>';

        foreach($tickets as $ticket) {
             echo '<tr class="text-center">';
                echo '<td class="p-2 m-3">' . $ticket . '</td>
                      <td class="p-2 m-3">' . $invoice_description[$ticket]['service name'] . '</td>
                      <td class="p-2 m-3">' . $invoice_description[$ticket]['date'] . '</td>
                      <td class="p-2 m-3">' . $invoice_description[$ticket]['total price'] . '</td>';

                    if($invoice_description[$ticket]['service name'] == 'bar') {
                       
                        $details_bar = $invoice_description[$ticket]['details']['details'];
                        foreach($details_bar as $detail_bar) {
                            echo '<td class="p-2 m-3 text-start">';
                                echo '<td class="p-2 m-3 text-start">' . 'Name: ' . $detail_bar['name'] . '</td>'; 
                                echo '<td class="p-2 m-3 text-start">' . 'Price: ' . $detail_bar['price'] . '</td>';
                                echo '<td class="p-2 m-3 text-start">' . 'Uds: ' . $detail_bar['uds'] . '</td>';
                        }
                            
                       
                    }
                echo '</tr>';
        }
        echo '</table>';

        echo "<div class=\"mt-4 pt-4\"> <h5>Total: {$invoice['subtotal_extras']}</h5></div> ";
        echo "<form action=\"/student045/dwes/db/db_invoice_select.php\" method =\"POST\">
                <input name=\"reservationNumber\" value = \"" . $invoice['reservation_number'] . "\" hidden>
                <button class=\"btn btn-secondary m-2\" type=\"submit\" name=\"submit\"> View invoice </button>
            </form>";
        //Boton de vuelta

       echo "</div>
        </div>";

    
?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php'); ?>
