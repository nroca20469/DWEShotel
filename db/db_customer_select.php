
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/header.php')?>

    <?php   
        //Connect to db
            include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/db/connect_db.php');

        //SQL to chech if the customer exists 
            $sqlCustomers = "SELECT *
            FROM 045_users";
        
            $connectar = mysqli_query($conn, $sqlCustomers);
            $customers = mysqli_fetch_all($connectar, MYSQLI_ASSOC);
        
        //Fetch all the data
            echo '<div class="container">
            <div class="ms-4">';
            foreach ($customers as $customer){
                echo ($customer['customer_id'] . ' ' . $customer['customer_forename'] . ' ' . $customer['customer_lastname'] . ' ' . $customer['customer_dni'] );
                echo "<span class=\"fw-thin secondary-color btn-group m-2\">
                        <form action=\"http://localhost/student045/dwes/form/form_customer_update.php\" method =\"POST\">
                            <input name=\"customerID\" value = \"" .  $customer['customer_id'] . "\" hidden>
                            <button class=\"btn btn-secondary m-2 \"> Update </button>
                        </form>
                        <form action=\"http://localhost/student045/dwes/db/db_customer_delete.php\" method =\"POST\">
                            <input name=\"customerID\" value = \"" . $customer['customer_id'] . "\" hidden>
                            <button class=\"btn btn-secondary my-2\"> Delete </button>
                        </form>
                    </span> ";
                echo '<br>';
            }
            echo '</div>';  


        /*foreach ($customers as $customer){
            echo $customer['customer_forename'] . ' ' . $customer['customer_lastname'] . ' ' . $customer['customer_dni'] . ' ' . $customer['customer_email'] . '     ' . $customer['customer_phone_number'] . ' ' . $customer['customer_description'] . ' ' . $customer['customer_status'];
            echo '<br>'; 
        }*/

   ?>   


    <?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php')?>
