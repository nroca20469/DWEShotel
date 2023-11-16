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
        echo '<div class="container">
        <div class="ms-4">';

        foreach ($rooms as $room){
            echo ($room['room_number'] . ' ' . $room['room_category'] . ' ' . $room['room_price']);
            if($role != 'anonymous' && $role != 'customer'){
                echo "<span class=\"fw-thin secondary-color btn-group m-2\">
                        <form action=\"/student045/dwes/form/form_room_update.php\" method =\"POST\">
                            <input name=\"roomNumber\" value = \"" . $room['room_number'] . "\" hidden>
                            <button class=\"btn btn-secondary m-2 \"> Update </button>
                        </form>
                        <form action=\"/student045/dwes/db/db_room_delete.php\" method =\"POST\">
                            <input name=\"roomNumber\" value = \"" . $room['room_number'] . "\" hidden>
                            <button class=\"btn btn-secondary my-2\"> Delete </button>
                        </form>
                    </span> ";
                echo '<br>';
            } else {
                echo '<br><br>';
            }
             
        }
        echo '</div>';  
    ?>

    <?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php')?>