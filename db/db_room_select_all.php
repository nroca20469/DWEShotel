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
            if($room['room_image'] != null) {
                echo "<img src=\"{$room['room_image']}\" alt=\"room_image\" width=\"150px\" class=\"me-4 mt-2\">"; 
            } else {
                echo "<img src=\"/student045/dwes/img/rooms/suit3.jpg\" alt=\"room_image\" width=\"150px\" class=\"me-4 mt-2\">";
            }
            echo ($room['room_number'] . ' ' . $room['room_category'] . ' ' . $room['room_price']);
            if($role == 'admin'){
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

            } else if($role == 'worker'){
                echo "<span class=\"fw-thin secondary-color btn-group m-2\">
                        <form action=\"/student045/dwes/form/form_room_update.php\" method =\"POST\">
                            <input name=\"roomNumber\" value = \"" . $room['room_number'] . "\" hidden>
                            <button class=\"btn btn-secondary m-2 \"> Update </button>
                        </form>
                    </span>";
                echo '<br>';

            }else{
                echo '<br><br>';
            }
             
        }
        echo '</div>';
        
        mysqli_free_result($result);
        mysqli_close($conn);

    ?>

    <?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php')?>