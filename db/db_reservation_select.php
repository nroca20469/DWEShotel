<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/header.php'); ?>

<?php

    //Create variable
    if(isset($_SESSION['customer_id'])) {
        $customer_id = $_SESSION['customer_id'];
        echo $customer_id;

        

    }

?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php'); ?>