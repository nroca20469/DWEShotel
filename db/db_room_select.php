<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/header.php')?>

    <?php 
        //Create variable


        //Connect db
        include('connect_db.php');

        //Sql Query
        $sql = "SELECT *
            FROM 045_rooms";
        $result = mysqli_query($conn, $sql);
        $rooms = mysqli_fetch_all($result, MYSQLI_ASSOC);

        //Show results
        echo '<div class="ms-4">';
        foreach ($rooms as $room){
            echo ($room['room_number'] . ' ' . $room['room_category'] . ' ' . $room['room_price']);
            echo "<div><form action = \"http://localhost/student045/dwes/form/form_room_update.php\" method = \"POST\">
                <input name=\"roomNumber\" value = \"" . $room['room_number'] . "\" hidden>
            <button class=\"btn btn-secondary\" type = \"submit\">Update</button></form> 
            <form action = \"http://localhost/student045/dwes/db/db_room_delete.php\" method = \"POST\">
                <input name=\"roomNumber\" value = \"" . $room['room_number'] . "\" hidden>
            <button class=\"btn btn-secondary ms-4\" type = \"submit\">Delete</button></form></div>";
            echo '<br>';
        }
        echo '</div>';  
    ?>

    <?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php')?>