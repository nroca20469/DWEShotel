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
    $surename = $_POST['surename'];
    $lastname = $_POST['lastname'];

    //Connect database 
    include('connect_db.php');



    //Fetch data
        if($lastname != null && $surename != null){
            $sql_customer_id = "SELECT customer_id
            FROM 045_customers
            WHERE room_number NOT IN (SELECT room_number
                                        FROM 045_reservations
                                        WHERE date_in < $date_out
                                        AND date_out > $date_in)
            GROUP BY room_category
            ORDER BY room_price ASC;";
            $result = mysqli_query($conn, $sql);
            $reservations = mysqli_fetch_all($result, MYSQLI_ASSOC);

            //Show data
            foreach ($reservations as $res){
                echo $res['room_number'] . ' ' . $res['room_category'] . ' ' .  $res['room_price'];
                echo '<br>'; 
            }
        }
?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php')?>