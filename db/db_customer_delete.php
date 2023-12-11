
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/header.php')?>

    <?php
        //Create variables and call
        if(isset($_POST['submit'])) {
            $customer_id = $_POST['customerID'];
            $deleted;
            $message;

            echo " <div class=\"text-center\">
                <h5>Customer ID : $customer_id </h5>
            </div>";

            // echo $customer_surename . ' ' . $customer_lastname . ' ' . $customer_DNI;
    
            //Check if its not null
            if($customer_id != null){
                
                //Connect to db
                include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/db/connect_db.php');

                //SQL to chech if the customer exists 
                $sqlCheckCustomer = "SELECT (customer_id) 
                FROM 045_users
                WHERE customer_id = $customer_id;";
                
                $exists = mysqli_query($conn, $sqlCheckCustomer);
                if( ($exists->num_rows) > 0){ 
                    $deleted = 1;
                } else {        
                    $message = 'The customer does not exists, please check the data';  
                    $deleted = 0;
                }
                
                mysqli_free_result($exists);
                //  echo $deleted;  
                if($deleted == 1){
                    $sqlDeleteCustomer = "DELETE FROM `045_users` 
                    WHERE customer_id = $customer_id;";

                    $isDeleted = mysqli_query($conn, $sqlDeleteCustomer);

                    $message = 'The customer has been deleted';
                    mysqli_free_result($isDeleted);
                }
            }
            mysqli_close($conn);
           
            
        } else {
            $message = "You didn't come from the form to delete a customer";
        }
       

        echo "<div class=\"text-center\">
                    <h6> $message  </h6>
                </div>";
   ?>   


    <?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php')?>