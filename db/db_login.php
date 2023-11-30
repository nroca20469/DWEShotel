<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/header.php')?>

    <?php

        //Create variables
        $username = $_POST['username'];
        $passwordy = $_POST['password'];
        $passwordCustomer;
        $name;
        $role;

        //Connect db
        include('connect_db.php');

        //sql query to search for the customer
        $sql_customer = "SELECT customer_id, customer_forename, customer_role
                        FROM 045_users
                        WHERE online_user = '$username';";

        $result = mysqli_query($conn, $sql_customer);
        $customers = mysqli_fetch_all($result, MYSQLI_ASSOC);   
        
        foreach($customers as $customer){
            $customer_id = $customer['customer_id'];
            $name = $customer['customer_forename'];
            $role = $customer['customer_role'];
        }


        if(isset($customer_id)) {
            $sql_password = "SELECT online_password 
            FROM 045_users
            WHERE customer_id = $customer_id";

            $result = mysqli_query($conn, $sql_password);
            $passwords = mysqli_fetch_all($result, MYSQLI_ASSOC);

            
            foreach($passwords as $password){
                $passwordCustomer = $password['online_password'];
            }

            $comparePasswords = strcmp($passwordCustomer, $passwordy);  //0 es que son todo igual, X es que hay algo desigual, solo es 0 si son iguales, sino da el numero de desiguales

            if(!$comparePasswords) {

                $_SESSION['name'] = $name;
                $_SESSION['customer_id'] = $customer_id;
                $_SESSION['role'] = $role;

                echo $_SESSION['name'];
                echo $_SESSION['customer_id'];
                echo $_SESSION['role'];
                echo "<script>location.href = '/student045/dwes/index.php';</script>";
                mysqli_free_result($result, $comparePasswords, $boton_aviso);
                mysqli_close($conn);

            } else {
                $boton_aviso = 'Su contraseña es incorrecta';
            }
                

        } else {
            $boton_aviso = 'Please register';
        }


        echo '<div class="container text-center">
                <div>';
        
            echo "  <div class=\"text-center pt-4\">
            <h5> Login </h5>
            </div>";

        echo "  <div class=\"text-center pt-4\">
                    <h6> $boton_aviso  </h6>
                    <div class=\"btn-group pt-3\">
                    <a href=\"/student045/dwes/index.php\"><button type=\"button\" class=\"btn btn-secondary me-2\"> Home </button></a>
                        <a href=\"/student045/dwes/form/form_register.php\"><button type=\"button\" class=\"btn btn-secondary me-2\"> Register </button></a>
                        <a href=\"/student045/dwes/form/form_login.php\"><button type=\"button\" class=\"btn btn-secondary\"> Back </button></a>
                    </div>
                </div>"; 

       
        
    ?>


    <?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php')?>
