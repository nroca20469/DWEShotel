
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
            $boton_Aviso = 0;

         //   echo $surname . ' ' . $lastanme . ' ' . $customer_dni . '<br>' . $email . '<br>' . $phone_number  . '<br>VIP ' . $vip;

        //Connect db
            include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/db/connect_db.php');

        //SQL Check the customer not exists
            $sqlCheckCustomer = "SELECT customer_id 
            FROM 045_users
            WHERE customer_dni = '$customer_dni'";
            
            $exists = mysqli_query($conn, $sqlCheckCustomer);

            $insert = (($exists->num_rows) == 0) ? 1 : 0;
            $boton_aviso = ($insert == 0) ? 'The customer already exists' : null;

            /*if( ($exists->num_rows) == 0){ 
                $insert = 1;
            } else {        
                $boton_aviso = "The customer already exists";
                $insert = 0;
            }*/
          //  echo $insert;
        
        //SQL Insert
            if($insert == 1){
                $sqlInserCustomer = "INSERT INTO `045_users`
                (`customer_forename`, `customer_lastname`, `customer_dni`, `customer_email`, `customer_phone_number`, `customer_description`, `customer_status`, `online_user`) 
                VALUES 
                ('$surname','$lastanme','$customer_dni','$email','$phone_number','{\n\"vip\": $vip,\n\"problematic\": $problematic \n}',1, \"$online_user\");";

                $boton_aviso = ($conn->query($sqlInserCustomer) === true) ? "Customer Inserted" : "Error inserting customer, please try later";
            }

        //Show in screen
        echo "  <div class=\"text-center\">
                    <h5>Customer name: $surname $lastanme </h5>
                </div>";


        echo "  <div class=\"text-center\">
                <p> $boton_aviso  </p>
                <div class=\"btn-group\">
                    <a href=\"/student045/dwes/index.php\"><button type=\"button\" class=\"btn btn-secondary me-2\"> Return home </button></a>
                    <a href=\"/student045/dwes/form/form_room_insert.php\"><button type=\"button\" class=\"btn btn-secondary\"> Insert another room </button></a>
                </div>
            </div>"; 
    ?>

    <?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php')?>
