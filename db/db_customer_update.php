<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/header.php')?>

<?php 
//Create variables
$customer_id = $_POST['customerID'];
$customer_forename = $_POST['customerForename'];
$customer_lastname = $_POST['lastname'];
$customer_email = $_POST['customerEmail'];
$customer_phone_number = $_POST['customerNumberPhone'];
$customer_dni = $_POST['customerDNI'];
$customer_vip = $_POST['vip'];
$customer_problematic = $_POST['problematic'];
$customer_status = $_POST['customerStatus'];
$boton_aviso;

echo " <div class=\"text-center\">
<h5>Customer ID : $customer_id </h5>
</div>";

//Connectar a db
include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/db/connect_db.php');

//Query to select the customer
$query_customer_update = "UPDATE `045_users` 
SET `customer_forename`= '$customer_forename',`customer_lastname`='$customer_lastname',`customer_dni`='$customer_dni',`customer_email`='$customer_email',
`customer_phone_number`='$customer_phone_number',`customer_description`= '{\n\"vip\": $customer_vip, \n\"problematic\": $customer_problematic \n}',`customer_status`='$customer_status' 
WHERE `customer_id` = $customer_id";

//  $connect = mysqli_query($conn, $query_customer);

if ($conn->query($query_customer_update) === TRUE) {
    $boton_aviso = "Customer Updated";
} else {
    $boton_aviso = "Error inserting customer, please try later";
}

//echo '<br>' . $boton_aviso;
echo "  <div class=\"text-center\">
            <p> $boton_aviso  </p>
            <div class=\"btn-group\">
                <a href=\"/student045/dwes/index.php\"><button type=\"button\" class=\"btn btn-secondary me-2\"> Return home </button></a>
                <a href=\"/student045/dwes/form/form_customer_update_call.php\"><button type=\"button\" class=\"btn btn-secondary\"> Return to edit another customer </button></a>
            </div>
</div>";

?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php')?>
