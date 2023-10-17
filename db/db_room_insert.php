<!DOCTYPE html>
<html lang="en">
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/header.php')?>

    <?php 

        /*Se guardan correctamente:
            -Bed-Type(? ns pq este si pero los otros no) --> ya los demas funcionan correctamente
            -Room State
            -Room Type
            -Room price
            -Room Number
            -Room Status

        Sigue sin funcionar:
             -Room-Ammenities --> se guarda UN SOLO VALOR, ver como guardar mas de uno
        */ 

        $room_number = null;
        $room_type = null;
        $room_state;
        $room_price;
        $room_status;
        $bed_type;
        $room_ammenities;

        if(isset($_POST['submit'])){
            if(!empty($_POST['roomNum'])) {
                $room_number = $_POST['roomNum'];
                echo 'You have chosen: ' . $room_number;
            } else {
                echo 'Please select a value for the Room Number . <br>';
                echo("<br><button class=\"btn btn-secondary\" onclick=\"location.href='http://localhost/student045/dwes/form/form_room_insert.php'\">Go Back</button>");
                return;
            }
            echo '<br>';
            if(!empty($_POST['roomPrice'])) {
                $room_price = $_POST['roomPrice'];
                echo 'You have chosen: ' . $room_price;
            } else {
                echo 'Please select a value for the Room Price . <br>';
                echo("<br><button class=\"btn btn-secondary\" onclick=\"location.href='http://localhost/student045/dwes/form/form_room_insert.php'\">Go Back</button>");
                return;
            }
            echo '<br>';
            if(!empty($_POST['roomType'])) {
                $room_type = $_POST['roomType'];
                echo 'You have chosen: ' . $room_type;
            } else {
                echo 'Please select a value for the Room Type. <br>';
                echo("<br><button class=\"btn btn-secondary\" onclick=\"location.href='http://localhost/student045/dwes/form/form_room_insert.php'\">Go Back</button>");
                return;
            }
            echo '<br>';
            if(!empty($_POST['roomStatus'])) {
                $room_status = $_POST['roomStatus'];
                echo 'You have chosen: ' . $room_status;
            } else {
                echo 'Please select a value for the Room Status .';
                echo("<br><button class=\"btn btn-secondary\" onclick=\"location.href='http://localhost/student045/dwes/form/form_room_insert.php'\">Go Back</button>");
                return;
            }
        
            echo '<br>';
            if(!empty($_POST['roomState'])) {
                $room_state = $_POST['roomState'];
                echo 'You have chosen: ' . $room_state;
            } else {
                echo 'Please select a value for the Room State. <br>';
                echo("<br><button class=\"btn btn-secondary\" onclick=\"location.href='http://localhost/student045/dwes/form/form_room_insert.php'\">Go Back</button>");
                return;
            }
        
            echo '<br>';
            if(!empty($_POST['roomAmmen'])) {
                $room_ammenities = $_POST['roomAmmen'];
                echo 'You have chosen: ' . $room_ammenities;
            } else {
                echo 'Please select a value for the Room Ammenities. <br>';
                echo("<br><button class=\"btn btn-secondary\" onclick=\"location.href='http://localhost/student045/dwes/form/form_room_insert.php'\">Go Back</button>");
                return;
            }
        
            echo '<br>';
            if(!empty($_POST['bedType'])) {
                $bed_type = $_POST['bedType'];
                echo 'You have chosen: ' . $bed_type;
            } else {
                echo 'Please select a value for the Bed Type. <br>';
                echo("<br><button class=\"btn btn-secondary\" onclick=\"location.href='http://localhost/student045/dwes/form/form_room_insert.php'\">Go Back</button>");
                return;
            }
        }

        //Connect to db
        include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/db/connect_db.php')
        
        //Comprovate that the room doesnt exist
        //Create room

        //Show that it has been created
        
    ?>

    <?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php')?>
    
    </html>