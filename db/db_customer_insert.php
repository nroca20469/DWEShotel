
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/header.php')?>
    
    <?php 
        //Create variables
        if(isset($_POST['submit'])){
            
            $surname  = $_POST['surname'];
            $lastanme  = $_POST['lastname'];
            $customer_dni  = $_POST['customerDNI'];
            $email  = $_POST['customerEmail'];
            $phone_number  = $_POST['customerNumberPhone'];
            $vip  = $_POST['vip'] ?? false;
            $problematic = $_POST['problematic'] ?? false;
            $online_user = $email ?? null;
            $boton_aviso = 0;

            //Imagen
            $customer_img = $_FILES['customerImg']['name'] ?? null;
            echo $customer_img;
            
            if($customer_img != null) {

                $customer_tmp = $_FILES['customerImg']['tmp_name'];
                $customer_img_name = explode('.', $customer_img);
                $customer_img_name[0] = $customer_dni;
                $img_name = $customer_img_name[0] . '.' . $customer_img_name[1];
                $img_destination = "/student045/dwes/img/customers/$img_name";

                move_uploaded_file($customer_tmp, $_SERVER['DOCUMENT_ROOT'] . $img_destination);
            }


        //Connect db
            include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/db/connect_db.php');

        //SQL Check the customer not exists
            $sqlCheckCustomer = "SELECT customer_id 
            FROM 045_users
            WHERE customer_dni = '$customer_dni'";
            
            $exists = mysqli_query($conn, $sqlCheckCustomer);

            $insert = (($exists->num_rows) == 0) ? 1 : 0;
            $boton_aviso = ($insert == 0) ? 'The customer already exists' : null;
        
        //SQL Insert
            if($insert == 1){
                if($customer_img != null) {
                    $sqlInserCustomer = "INSERT INTO `045_users`
                    (`customer_forename`, `customer_lastname`, `customer_dni`, `customer_email`, `customer_phone_number`, `customer_description`, `customer_status`, `online_user`, customer_image) 
                    VALUES 
                    ('$surname','$lastanme','$customer_dni','$email','$phone_number','{\n\"vip\": $vip,\n\"problematic\": $problematic \n}',1, \"$online_user\", '$img_destination');";
    
                } else if($customer_img == null) {
                    $sqlInserCustomer = "INSERT INTO `045_users`
                    (`customer_forename`, `customer_lastname`, `customer_dni`, `customer_email`, `customer_phone_number`, `customer_description`, `customer_status`, `online_user`) 
                    VALUES 
                    ('$surname','$lastanme','$customer_dni','$email','$phone_number','{\n\"vip\": $vip,\n\"problematic\": $problematic \n}',1, \"$online_user\");";

                }
               
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
                    <a href=\"/student045/dwes/form/form_customer_insert.php\"><button type=\"button\" class=\"btn btn-secondary\"> Insert another customer </button></a>
                </div>
            </div>"; 

            mysqli_close($conn);
        }
    ?>

    <?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php')?>
