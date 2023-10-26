<!DOCTYPE html>
<html lang="en">
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/header.php')?>

    <?php 
        //Create variable


        //Connect db
        include('connect_db.php');

        //Sql Query
        $sql = "SELECT *
            FROM 045_reservations";
        $result = mysqli_query($conn, $sql);
        $reservations = mysqli_fetch_all($result, MYSQLI_ASSOC);

        //Show results
        echo '<div class="ms-4">';
        foreach ($reservations as $reservation){
            echo ($reservation['reservation_number'] . ' ' . $reservation['customer_id'] . ' ' . $reservation['preselected_room'] . ' ' . $reservation['room_number'] . ' ' . $reservation['room_price'] . ' ' . $reservation['reservation_status'] . ' ' . $reservation['date_in'] . ' ' . $reservation['date_out'] . ' ' . $reservation['extras'] . '<br>');
        }
        echo '</div>';  
    ?>

    <?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php')?>
    
    </html>