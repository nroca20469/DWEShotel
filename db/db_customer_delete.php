<!DOCTYPE html>
<html lang="en">
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/header.php')?>

    <?php
        //Create variables and call
        $customer_ID = $_POST['customerID'];
       // $exists = false;
        $deleted;


       // echo $customer_surename . ' ' . $customer_lastname . ' ' . $customer_DNI;
   
        //Check if its not null
        if($customer_ID != null){
            
            //Connect to db
            include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/db/connect_db.php');

            //SQL to chech if the customer exists 
            $sqlCheckCustomer = "SELECT COUNT(customer_id) 
            FROM 045_customers
            WHERE customer_id    = '$customer_ID'";
             
            
            $exists = mysqli_query($conn, $sqlCheckCustomer);
            if( ($exists->num_rows) > 0){ 
                $deleted = 1;
            } else {        
                echo 'We have entered  here';  
                $deleted = 0;
            }
           
            echo $deleted;  
            /*if($deleted == 1){
                $sqlDeleteCustomer = "DELETE FROM `045_customers` 
                WHERE customer_surname = '$customer_surename'
                AND customer_lastname = '$customer_lastname'
                AND customer_DNI = '$customer_DNI'";

               // $isDeleted = mysqli_query($conn, $sqlDeleteCustomer);
                echo 'funciona';
            }*/
        }
        
   ?>   


    <?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php')?>
</html>