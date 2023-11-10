
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
        echo '<div class="container">
        <div class="ms-4">';
        foreach ($reservations as $reservation){
            echo ($reservation['reservation_number'] . ' ' . $reservation['date_in'] . ' ' . $reservation['date_out'] . ' Preselected room: ' . $reservation['preselected_room']);
           
            if($role != 'anonymous' && $role != 'customer'){
                echo "<span class=\"fw-thin secondary-color btn-group m-2\">
                        <form action=\"http://localhost/student045/dwes/form/form_reservations_update.php\" method =\"POST\">
                            <input name=\"reservationNumber\" value = \"" . $reservation['reservation_number'] . "\" hidden>
                            <button class=\"btn btn-secondary m-2 \"> Update </button>
                        </form>
                        <form action=\"http://localhost/student045/dwes/db/db_reservations_delete.php\" method =\"POST\">
                            <input name=\"reservationNumber\" value = \"" . $reservation['reservation_number'] . "\" hidden>
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