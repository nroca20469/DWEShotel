<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/header.php')?>

<?php   
    //Connect to db
        include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/db/connect_db.php');

    //SQL to chech if the customer exists 
        $sqlCustomers = "SELECT *
        FROM 045_users";
    
        $connectar = mysqli_query($conn, $sqlCustomers);
        $customers = mysqli_fetch_all($connectar, MYSQLI_ASSOC);
        //print_r($customers);
    
    //Fetch all the data
        echo '<div class="container">
        <div class="ms-4">';
        foreach ($customers as $customer){
            if($customer['customer_image']) {
                echo "<img src=\"{$customer['customer_image']}\" alt=\"customer_image\" width=\"100px\" class=\"me-4 mt-2\">"; 
            } else {
                echo "<img src=\"/student045/dwes/img/customers/standards.jpg\" alt=\"customer_image\" width=\"100px\" class=\"mb-4 mt-2 me-4\">";
            }
            echo ($customer['customer_id'] . ' ' . $customer['customer_forename'] . ' ' . $customer['customer_lastname'] . ' ' . $customer['customer_dni'] );
            echo "<span class=\"fw-thin secondary-color btn-group m-2\">
                    <form action=\"/student045/dwes/form/form_customer_update.php\" method =\"POST\">";
                    echo "<input name=\"customerID\" value = \"" .  $customer['customer_id'] . "\" hidden>
                        <button class=\"btn btn-secondary m-2 \"> Update </button>
                    </form>
                    <form action=\"/student045/dwes/db/db_customer_delete.php\" method =\"POST\">";
                               echo "
                        <input name=\"customerID\" value = \"" . $customer['customer_id'] . "\" hidden>
                        <button class=\"btn btn-secondary my-2\"> Delete </button>
                    </form>
                </span> ";
            echo '<br>';
        }
        echo '</div>';

        mysqli_close($conn);
        mysqli_free_result($connectar);
?>   


<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php')?>
