<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/header.php')?>
<?php
    
    //Create variables
    $date_in = $_POST['dateIn'];
    echo "<p>" . $date_in . "</p>";
    $date_out = $_POST['dateOut'];
    echo $date_out;
    $room_num = $_POST['roomNum'];
    echo "<p>" . $room_num . "</p>"; 
    $room_price = $_POST['roomPrice'];
    echo $room_price; 
    $surname = $_POST['surname'];
    echo $surname;
    $lastname = $_POST['lastname'];
    echo $lastname;
    $customer_id = 0;

    //Connect database 
    include('connect_db.php');



    //Fetch data
        if($lastname != null && $surname != null){
            $sql_customer_id = "SELECT *
            FROM `045_customers`
            WHERE customer_forename = \"$surname\"
            AND customer_lastname = \"$lastname\";"   ;
            $result_cust_id = mysqli_query($conn, $sql_customer_id);
            $reservations = mysqli_fetch_all($result_cust_id, MYSQLI_ASSOC);
            echo "<br> hi <br>";
        }

        foreach ($reservations as $res){
            $customer_id = $res['customer_id'];
            echo $res['customer_id'];
            echo '<br>';        
            echo $customer_id;
        }

    if($customer_id != 0){
        //Insert data
        if(isset($customer_id)){
            $sql_insert_reservation = "INSERT INTO `045_reservations`
            (customer_id, preselected_room, room_price, reservation_status, date_in, date_out) 
            VALUES (" . $customer_id . ", " . $room_num . " , " . $room_price . ", 'booked',  '" . $date_in . "' , '" . $date_out . "' );
            ";
            if ($conn->query($sql_insert_reservation) === TRUE) {
                echo "Your room is now booked";
              } else {
                echo "Your room is not booked, see if there is any problem with your data";
              }
        }
    } else {
        echo  "<a class=\"btn btn-secondary\" role=\"button\" href=\"http://localhost/student045/dwes/db/db_reservations_insert.php\" \>Register by DNI/NIF, email and phone number</a>";
    }
    
?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php')?> 