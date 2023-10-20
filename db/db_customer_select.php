<!DOCTYPE html>
<html lang="en">
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/header.php')?>

    <?php   
        //Connect to db
            include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/db/connect_db.php');

        //SQL to chech if the customer exists 
        $sqlCustomers = "SELECT *
        FROM 045_customers";
        
        $connectar = mysqli_query($conn, $sqlCustomers);
        $customers = mysqli_fetch_all($connectar, MYSQLI_ASSOC);
        
        foreach ($customers as $customer){
            echo $customer['customer_forename'] . ' ' . $customer['customer_lastname'] . ' ' . $customer['customer_dni'] . ' ' . $customer['customer_email'] . '     ' . $customer['customer_phone_number'] . ' ' . $customer['customer_description'] . ' ' . $customer['customer_status'];
            echo '<br>'; 
        }

   ?>   


    <?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php')?>
</html>