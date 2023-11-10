<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/header.php')?>
<?php
    
    //Create variables
    $date_in = $_POST['dateIn'];
    //echo "<p>" . $date_in . "</p>";
    $date_out = $_POST['dateOut'];
    //echo $date_out;
    $room_num = $_POST['roomNum'];
    //echo "<p>" . $room_num . "</p>"; 
    $room_price = $_POST['roomPrice'];
    //echo $room_price;
    $customer_id = $_SESSION['customer_id'] ?? 0;
    $boton_aviso = 0;

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
                $boton_aviso = "Your room is now booked";
              } else {
                $boton_aviso =  "Your room is not booked, see if there is any problem with your data";
              }
        }
        echo "  <div class=\"text-center\">
                    <h5> Insert reservation </h5>
                </div>";


        echo "  <div class=\"text-center\">
                <p> $boton_aviso  </p>
                <div class=\"btn-group\">
                    <a href=\"/student045/dwes/index.php\"><button type=\"button\" class=\"btn btn-secondary me-2\"> Return home </button></a>
                    <a href=\"/student045/dwes/form/form_room_insert.php\"><button type=\"button\" class=\"btn btn-secondary\"> Insert another room </button></a>
                </div>
            </div>"; 

    } else {
        $boton_aviso = "You are not registerd/logged in, do you want to log in or register?";


        echo "  <div class=\"text-center pt-4\">
                    <h6> $boton_aviso  </h6>
                    <div class=\"btn-group pt-3\">
                    <a href=\"/student045/dwes/index.php\"><button type=\"button\" class=\"btn btn-secondary me-2\"> Home </button></a>
                        <a href=\"/student045/dwes/form/form_register.php\"><button type=\"button\" class=\"btn btn-secondary me-2\"> Register </button></a>
                        <a href=\"/student045/dwes/form/form_login.php\"><button type=\"button\" class=\"btn btn-secondary\"> Log in </button></a>
                    </div>
                </div>"; 
    }
    

?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php')?> 