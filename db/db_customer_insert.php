
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/header.php')?>
    
    <?php 
        //Create variables
            $surname  = $_POST['surname'];
            $lastanme  = $_POST['lastname'];
            $customer_dni  = $_POST['customerDNI'];
            $email  = $_POST['customerEmail'];
            $phone_number  = $_POST['customerNumberPhone'];
            $vip  = $_POST['vip'];
            $problematic = $_POST['problematic'];
            $online_user = $email;

            echo $surname . ' ' . $lastanme . ' ' . $customer_dni . '<br>' . $email . '<br>' . $phone_number  . '<br>VIP ' . $vip;

        //Connect db
            include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/db/connect_db.php');

        //SQL Check the customer not exists
            $sqlCheckCustomer = "SELECT customer_id 
            FROM 045_users
            WHERE customer_dni = '$customer_dni'";
            
            $exists = mysqli_query($conn, $sqlCheckCustomer);
        
            if( ($exists->num_rows) == 0){ 
                $insert = 1;
            } else {        
                $insert = 0;
            }
            echo $insert;
        
        //SQL Insert
            if($insert == 1){
                $sqlInserCustomer = "INSERT INTO `045_users`
                (`customer_forename`, `customer_lastname`, `customer_dni`, `customer_email`, `customer_phone_number`, `customer_description`, `customer_status`, `online_user`) 
                VALUES 
                ('$surname','$lastanme','$customer_dni','$email','$phone_number','{\n\"vip\": $vip,\n\"problematic\": $problematic \n}',1, \"$online_user\");";

                // $isDeleted = mysqli_query($conn, $sqlDeleteCustomer);
                echo 'funciona';
                if ($conn->query($sqlInserCustomer) === TRUE) {
                    echo "<br>Customer Inserted";
                } else {
                    echo "Error inserting customer, please try later";
                }
            }    
        
        //Created correctly
    ?>

    <?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php')?>
