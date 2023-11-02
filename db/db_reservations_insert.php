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
    $customer_id = $_SESSION['customer_id'] ?? 0;

    //Connect database 
    include('connect_db.php');

    //Insert data
    if($customer_id != 0){
        //Insert data
        if(isset($customer_id)){
            $sql_insert_reservation = "INSERT INTO `045_reservations`
            (customer_id, preselected_room, room_price, reservation_status, date_in, date_out) 
            VALUES (" . $customer_id . ", " . $room_num . " , " . $room_price . ", 'booked',  '" . $date_in . "' , '" . $date_out . "' );
            ";
            if ($conn->query($sql_insert_reservation) === TRUE) {
                echo "<div class=\"container\">   
                    <p>Your room is now booked</p>
                </div>";
              } else {
                echo "Your room is not booked, see if there is any problem with your data";
              }
        }
    } else {
        $link = $_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/db/db_reservations_insert.php';
        echo  "<a class=\"btn btn-secondary\" role=\"button\" href=\"$link\" \>Register by DNI/NIF, email and phone number</a>";
    }
    
?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php')?> 