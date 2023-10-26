<!DOCTYPE html>
    <html lang="en">
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/header.php')?>

<?php 

//Create variables
$reservation_number = $_POST['reservationNumber'];
$customer_id;
$preselected_room;
$room_number;
$room_price;
$reservation_status;
$date_in;
$date_out;
$extras;

//Connectar a db
include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/db/connect_db.php');

//Query to select the reservation
$query_room = "SELECT *
FROM 045_reservations
WHERE reservation_number = $reservation_number";

$connect = mysqli_query($conn, $query_room);
$result = mysqli_fetch_all($connect, MYSQLI_ASSOC);

if($connect->num_rows == 0){
    echo '<div class="container-lg">
            <div div class="text-center">
                <h5>No such reservation is in the db</h5>
            </div>
        </div>';
} else {
    
    foreach ($result as $reservation) {
        $customer_id = $reservation['customer_id'];
        $preselected_room = $reservation['preselected_room'];
        $room_number = $reservation['room_number'];
        $room_price = $reservation['room_price'];
        $reservation_status = $reservation['reservation_status'];
        $date_in = $reservation['date_in'];
        $date_out = $reservation['date_out'];
        $extras = $reservation['extras'];
    }
    $reservation_extras = json_decode($extras);
    if(!empty($reservation_extras)){
        $internal_services = $reservation_extras -> {'Internal Services'};  // --> mirar si funciona
        if(!empty($internal_services)){
            foreach ($internal_services as $internal) {
            $nameInternal = $internal -> Name;
            $priceInternal = $internal -> Price;
            }
        }

        $external_services = $reservation_extras -> ExternalServices;
        if(!empty($external_services)){
            foreach ($external_services as $external) {
            $nameExternal = $external -> Name;
            $priceExternal = $external -> Price;
            }
        }
    }

    if(isset($nameInternal)){
        echo $nameInternal;
    }

//$bedType = "bed type";
//$bed_type = $room_desciption_array -> bedType; 

//$airConditioning = $room_desciption_array -> Air; //NO FUNCIONA MIRAR PQ

?>
    
    <div class="container-lg">
        <div class="text-center">
            <h2>Update Room</h2>
        </div>
        <div class="row justify-content-center my-5">
            <form class="col-lg-6 mb-3" action="http://localhost/student045/dwes/db/db_room_update.php" method="POST">

                <div class="mb-3">
                    <label for="roomNum" class="form-label">Room Number</label>
                    <input type="numeric" class="form-control" id="roomNum" name="roomNum" value="<?php echo $room_number; ?>">
                </div>

                <div class="mb-3">
                    <label for="roomPrice" class="form-label">Price per night</label>
                    <input type="numeric" class="form-control" id="roomPrice" name="roomPrice" value="<?php echo $room_price; ?>">
                </div> 

                <div class="mb-3">
                    <label for="roomType" class="form-label">Type</label>
                    <select class="form-select" aria-label="Room Type"  name="roomType" id="roomType" type="select">
                        <?php 
                            if($room_category == 'single'){
                                echo "<option value=\"single\" selected > Single </option>
                                <option value=\"double\"> Double </option>
                                <option value=\"suite\"> Suite </option>";
                            } else if($room_category == 'double') {
                                echo "<option value=\"single\"> Single </option>
                                <option value=\"double\" selected > Double </option>
                                <option value=\"suite\"> Suite </option>";
                            } else if($room_category == 'suite'){
                                echo "<option value=\"single\"> Single </option>
                                <option value=\"double\"> Double </option>
                                <option value=\"suite\" selected > Suite </option>";
                            } else {
                                echo "<option value=\"\" selected> Select an option </option>
                                <option value=\"single\"> Single </option>
                                <option value=\"double\"> Double </option>
                                <option value=\"suite\"> Suite </option>";
                            }
                        ?>
                    </select>
                </div> 

                <div class="mb-3">
                    <label for="roomStatus" class="form-label">Room Status</label>
                    <div>
                        <?php
                            if($room_status == 1){
                                echo "<div class=\"form-check form-check-inline\">
                                        <input class=\"form-check-input\" type=\"checkbox\" id=\"roomStatus\" value=\"1\" name=\"roomStatus\" checked>
                                        <label class=\"form-check-label\" for=\"roomStatus\">Open to clients</label>
                                    </div>
                                    <div class=\"form-check form-check-inline\">
                                        <input class=\"form-check-input\" type=\"checkbox\" id=\"roomStatus\" value=\"0\" name=\"roomStatus\">
                                        <label class=\"form-check-label\" for=\"roomStatus\">Closed to clients</label>
                                    </div>";
                            } else {
                                echo "<div class=\"form-check form-check-inline\">
                                <input class=\"form-check-input\" type=\"checkbox\" id=\"roomStatus\" value=\"1\" name=\"roomStatus\">
                                <label class=\"form-check-label\" for=\"roomStatus\">Open to clients</label>
                            </div>
                            <div class=\"form-check form-check-inline\">
                                <input class=\"form-check-input\" type=\"checkbox\" id=\"roomStatus\" value=\"0\" name=\"roomStatus\" checked>
                                <label class=\"form-check-label\" for=\"roomStatus\">Closed to clients</label>
                            </div>";
                            }
                        ?>                 
                    </div>
                </div> 

                <div class="mb-3">
                    <label for="roomState" class="form-label"> Room State </label>
                    <select class="form-select" aria-label="Default select example" id="roomState" name="roomState">
                    <?php 
                            if($room_state == 'dirty'){ 
                                echo "<option value=\"dirty\" selected> Dirty </option>
                                <option value=\"clean\"> Clean </option>
                                <option value=\"maintenance\"> Maintenance </option>";
                            } else if($room_state == 'clean') {
                                echo "<option value=\"dirty\" > Dirty </option>
                                <option value=\"clean\" selected> Clean </option>
                                <option value=\"maintenance\"> Maintenance </option>";
                            } else if($room_state == 'maintenance'){
                                echo "<option value=\"dirty\" > Dirty </option>
                                <option value=\"clean\"> Clean </option>
                                <option value=\"maintenance\" selected> Maintenance </option>";
                            } else {
                                echo "<option value=\"\" selected> Select an option </option>
                                <option value=\"dirty\" > Dirty </option>
                                <option value=\"clean\"> Clean </option>
                                <option value=\"maintenance\"> Maintenance </option>";;
                            }
                        ?>
                    </select>
                </div>  
                </div>

                <div class="d-grid gap-2 col-4 mx-auto m-2">
                    <button class="btn btn-secondary" type="submit" name="submit"> Submit </button>
                </div>
                
    </div>

    <?php } ?>

    <?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php');?>
            


</html>