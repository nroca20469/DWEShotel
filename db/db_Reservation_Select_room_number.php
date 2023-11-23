<?php 

   // include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/db/connect_db.php');

    $sql = "SELECT room_number, room_category
        FROM 045_rooms
        WHERE room_number NOT IN (SELECT preselected_room
                                    FROM 045_reservations
                                    WHERE date_in < '{$date_out}'
                                    AND date_out > '{$date_in}')
            AND room_status = 1";
    $result = mysqli_query($conn, $sql);
    $rooms_available = mysqli_fetch_all($result, MYSQLI_ASSOC);

    print_r($rooms_available);
    
?>