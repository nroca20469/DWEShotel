<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/header.php')?>

<?php 
    if(isset($_POST['submit'])){
            
        //Create variables
        $customer_id = $_POST['customerID'];
        $customer_forename = $_POST['customerForename'];
        $customer_lastname = $_POST['lastname'] ;
        $customer_email = $_POST['customerEmail'];
        $customer_phone_number = $_POST['customerNumberPhone'] ?? null;
        $customer_dni = $_POST['customerDNI'];
        $customer_vip = $_POST['vip'];
        $customer_problematic = $_POST['problematic'];
        $customer_status = $_POST['customerStatus'];
        $boton_aviso;
        $customer_image = $_FILES['customerImg']['name'] ?? null;

        if($customer_image != null){
            $customer_tmp = $_FILES['customerImg']['tmp_name'];
            $customer_img_name = explode('.', $customer_image);
            $customer_img_name[0] = $customer_dni;
            $img_name = $customer_img_name[0] . '.' . $customer_img_name[1];
            $img_destination = "/student045/dwes/img/customers/$img_name";

            move_uploaded_file($customer_tmp, $_SERVER['DOCUMENT_ROOT'] . $img_destination);
        }

        echo " <div class=\"text-center\">
                <h5>Customer ID : $customer_id </h5>
            </div>";

        //Connectar a db
        include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/db/connect_db.php');

        //Query to select the customer
        if($role = 'admin'){
            $customer_role = $_POST['customerRole'];
            if($customer_image != null) {
                $query_customer_update = "UPDATE `045_users` 
                SET `customer_forename`= '$customer_forename',`customer_lastname`='$customer_lastname',`customer_dni`='$customer_dni',`customer_email`='$customer_email',
                `customer_phone_number`='$customer_phone_number',`customer_role` = '$customer_role', customer_image = '$img_destination',
                `customer_description`= '{\n\"vip\": $customer_vip, \n\"problematic\": $customer_problematic \n}',`customer_status`='$customer_status' 
                WHERE `customer_id` = $customer_id";
            } else if($customer_image == null){
                $query_customer_update = "UPDATE `045_users` 
                    SET `customer_forename`= '$customer_forename',`customer_lastname`='$customer_lastname',`customer_dni`='$customer_dni',`customer_email`='$customer_email',
                    `customer_phone_number`='$customer_phone_number',`customer_role` = '$customer_role',
                    `customer_description`= '{\n\"vip\": $customer_vip, \n\"problematic\": $customer_problematic \n}',`customer_status`='$customer_status' 
                    WHERE `customer_id` = $customer_id";
            }
        } else {
            if($customer_image != null) {
                $query_customer_update = "UPDATE `045_users` 
                SET `customer_forename`= '$customer_forename',`customer_lastname`='$customer_lastname',`customer_dni`='$customer_dni',`customer_email`='$customer_email',
                `customer_phone_number`='$customer_phone_number',customer_image = '$img_destination',
                `customer_description`= '{\n\"vip\": $customer_vip, \n\"problematic\": $customer_problematic \n}',`customer_status`='$customer_status' 
                WHERE `customer_id` = $customer_id";
            } else if($customer_image == null){
                $query_customer_update = "UPDATE `045_users` 
                SET `customer_forename`= '$customer_forename',`customer_lastname`='$customer_lastname',`customer_dni`='$customer_dni',`customer_email`='$customer_email',
                `customer_phone_number`='$customer_phone_number',
                `customer_description`= '{\n\"vip\": $customer_vip, \n\"problematic\": $customer_problematic \n}',`customer_status`='$customer_status' 
                WHERE `customer_id` = $customer_id";
            }
        }
        

        //  $connect = mysqli_query($conn, $query_customer);

        if ($conn->query($query_customer_update) === TRUE) {
            $boton_aviso = "Customer Updated";
        } else {
            $boton_aviso = "Error updating customer, please try later";
        }

        //echo '<br>' . $boton_aviso;
        echo "  <div class=\"text-center\">
                    <p> $boton_aviso  </p>
                    <div class=\"btn-group\">
                        <a href=\"/student045/dwes/index.php\"><button type=\"button\" class=\"btn btn-secondary me-2\"> Return home </button></a>
                        <a href=\"/student045/dwes/form/form_customer_update_call.php\"><button type=\"button\" class=\"btn btn-secondary\"> Return to edit another customer </button></a>
                    </div>
                </div>";

       // mysqli_free_result($connectionCheck);
        mysqli_close($conn);
    }

?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php')?>
