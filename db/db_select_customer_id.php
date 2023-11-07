<?php   
    if($customer_id != null){
        //Connect to db
        include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/db/connect_db.php');

    //SQL to chech if the customer exists 
        $sqlCustomers = "SELECT *
        FROM 045_users
        WHERE customer_id = $customer_id";
    
        $connectar = mysqli_query($conn, $sqlCustomers);
        $customers = mysqli_fetch_all($connectar, MYSQLI_ASSOC);
    }
    
?>