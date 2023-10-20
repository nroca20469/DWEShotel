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

echo $customer_forename . ' ' . $customer_lastname . ' ' . $customer_email . ' ' . $customer_phone_number . ' ' .  $customer_dni . ' ' . $customer_problematic . ' ' . $customer_vip;


//Connectar a db
include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/db/connect_db.php');

//Query to select the customer
$query_customer_update = "UPDATE `045_customers` 
SET `customer_forename`= '$customer_forename',`customer_lastname`='$customer_lastname',`$customer_dni`='customer_dni',`customer_email`='$customer_email',
`customer_phone_number`='$customer_phone_number',`customer_description`= '{\n\"vip\": $customer_vip, \n\"problematic\": $customer_problematic \n}',`customer_status`='$customer_status' 
WHERE customer_id = $customer_id";

//  $connect = mysqli_query($conn, $query_customer);

if ($conn->query($query_customer_update) === TRUE) {
    $boton_aviso = "Customer Inserted";
} else {
    $boton_aviso = "Error inserting customer, please try later";
}

echo $boton_aviso;


?>