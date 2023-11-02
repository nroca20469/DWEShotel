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
          //  echo $customer_id;
            $name = $customer['customer_forename'];
           // echo $name;
            $role = $customer['customer_role'];
        //    echo $role;
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
          //  echo $comparePasswords;
            if(!$comparePasswords) {
                ///echo 'It work';

                $_SESSION['name'] = $name;
                $_SESSION['customer_id'] = $customer_id;
                $_SESSION['role'] = $role;

                echo $_SESSION['name'];
                echo $_SESSION['customer_id'];
                echo $_SESSION['role'];
            } else {
                echo 'Su contraseña es incorrecta';
            }




            
                //echo 'hi';
                //header('Location: http://localhost/student045/dwes/');
                //header("Content-Type: text/html; charset=UTF-8");
                // exit(header("Location: http://localhost/student045/dwes/"));
                // header("Location: http://localhost/student045/dwes/");
                // echo 'hi';
                echo "<script>location.href = 'http://localhost/student045/dwes/index.php?msg=$msg';</script>";


            
        } 
        
    ?>


    <?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php')?>
