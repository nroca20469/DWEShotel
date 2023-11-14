<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/header.php')?>

<?php

    //Capture variables
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $surname = $_POST['surname'] ?? null;
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_repeat = $_POST['repeatPassword'];
        $dni = $_POST['dni'];
        $phone_number = $_POST['phoneNumber'];
        $username = $_POST['username'] ?? "$email";

        $password_ident = strcmp($password, $password_repeat);
        //echo $password_ident;

        //Connect db
        include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/db/connect_db.php');

        if($password_ident == 0){
            //Check that the customer doesn't exist already
            $checkDNI = "SELECT * FROM 045_users WHERE customer_dni = '$dni'";
            $connectionCheck = mysqli_query($conn, $checkDNI);
            $fetchCheckDNI = mysqli_fetch_all($connectionCheck, MYSQLI_ASSOC);

            $checkNone = COUNT($fetchCheckDNI);

            if($checkNone == 0){

                //Insert customer
                $sqlInserCustomer = "INSERT INTO `045_users`
                (`customer_forename`, `customer_lastname`, `customer_dni`, `customer_email`, `customer_phone_number`, `customer_status`, `online_user`, `online_password`, `customer_role`, `customer_description`) 
                VALUES 
                ('$name', '$surname', '$dni', '$email', '$phone_number', 1, '$username', '$password', 'customer', '{\n\"vip\": false,\n\"problematic\": false \n}');";
            
                $boton_aviso = ($conn->query($sqlInserCustomer) === true) ? "Customer Inserted" : "Error inserting customer, please try later";

            } else {
                $boton_aviso = "There is another customer with your DNI, please go to the login button";
            }

        } else {
            $boton_aviso = "The passwords doesn't match";
        }

        //$boton_aviso = 0;

        //Show in screen
        echo "  <div class=\"text-center\">
            <h5>Customer name: $name $surname </h5>
        </div>";


        echo "  <div class=\"text-center\">
            <p> $boton_aviso  </p>
            <div class=\"btn-group\">
                <a href=\"/student045/dwes/index.php\"><button type=\"button\" class=\"btn btn-secondary me-2\"> Return home </button></a>
            </div>
        </div>"; 
    } else {
        echo "<div class=\"text-center pt-4\">
            <h5> You didn't enter through the register form </h5>
        </div>";
    }


    

?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php')?>
