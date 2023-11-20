<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/header.php')?>

<?php 

//Create variables
$room_number = $_POST['roomNumber'];
$room_category;
$room_state;
$room_status;
$room_price;
$room_description;

//Connectar a db
include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/db/connect_db.php');

//Query to select the customer
$query_room = "SELECT *
FROM 045_rooms
WHERE room_number = $room_number";

$connect = mysqli_query($conn, $query_room);
$result = mysqli_fetch_all($connect, MYSQLI_ASSOC);

if($connect->num_rows == 0){
    echo '<div class="container-lg">
            <div div class="text-center">
                <h5>No such room is in the db</h5>
            </div>
        </div>';
} else {
    
    foreach ($result as $room) {
        $room_category = $room['room_category'];
        $room_state = $room['room_state'];
        $room_status = $room['room_status'];
        $room_price = $room['room_price'];
        $room_description = $room['room_description'];
}
$room_desciption_array = json_decode($room_description);
$tv = $room_desciption_array -> TV;

?>
    
    <div class="container-lg">
        <div class="text-center">
            <h2>Update Room</h2>
        </div>
        <div class="row justify-content-center my-5">
            <form class="col-lg-6 mb-3" action="/student045/dwes/db/db_room_update.php" method="POST">
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

                <div class="pt-1 text-center">
                    <label for="internal" class="form-label"><h5>Ammenities per room</h5></label>
                </div>

                <?php
                    $json = json_decode($room_description,true);
                    //$hi = var_dump($json);
                    //print_r ($json);
                    $air_conditioning = false;
                    if($json != null) {
        
                        //Passar a variables
                        if( $json['TV'] == 1 ){
                            $tv = 'true';
                        } else {
                            $tv = 'false';
                        }

                        if( $json['Air Conditioning'] == 1 ){
                            $air_conditioning = 'true';
                        } else {
                            $air_conditioning = 'false';
                        }

                        if( $json['Wifi'] == 1 ){
                            $wifi = 'true';
                        } else {
                            $wifi = 'false';
                        }

                        if( $json['extra bed'] == 1 ){
                            $extra_bed = 'true';
                        } else {
                            $extra_bed = 'false';
                        }

                        if( $json['bed type'] == "single" ){
                            $bed_type = 'single';
                        } else if($json['bed type'] == "double"){
                            $bed_type = 'double';
                        }

                        $price_per_nigth = $json['bed price per night'];      
                ?>

                <div class="mb-3">
                    <label for="tv" class="form-label"> TV </label>
                    <select class="form-select" aria-label="Default select example" id="tv" name="tv">
                        <?php 
                            if($tv == 'true'){ 
                                echo "<option value=\"true\" selected> True </option>
                                <option value=\"false\"> False </option>";
                            } else {
                                echo "<option value=\"false\" selected> False </option>
                                <option value=\"true\"> True </option>";
                            }
                        ?>
                    </select>
                </div>  

                <div class="mb-3">
                    <label for="airConditioning" class="form-label"> Air Conditioning </label>
                    <select class="form-select" aria-label="Default select example" id="airConditioning" name="airConditioning">
                        <?php 
                            if($air_conditioning == 'true'){ 
                                echo "<option value=\"true\" selected> True </option>
                                <option value=\"false\"> False </option>";
                            } else {
                                echo "<option value=\"false\" selected> False </option>
                                <option value=\"true\"> True </option>";
                            }
                        ?>
                    </select>
                </div>  
                
                <div class="mb-3">
                    <label for="wifi" class="form-label">  Wifi </label>
                    <select class="form-select" aria-label="Default select example" id="wifi" name="wifi">
                        <?php 
                            if($wifi == 'true'){ 
                                echo "<option value=\"true\" selected> True </option>
                                <option value=\"false\"> False </option>";
                            } else {
                                echo "<option value=\"false\" selected> False </option>
                                <option value=\"true\"> True </option>";
                            }
                        ?>
                    </select>
                </div>  

                <div class="mb-3">
                    <label for="extraBed" class="form-label"> Extra Bed </label>
                    <select class="form-select" aria-label="Default select example" id="extraBed" name="extraBed">
                        <?php 
                            if($extra_bed == 'true'){ 
                                echo "<option value=\"true\" selected> True </option>
                                <option value=\"false\"> False </option>";
                            } else {
                                echo "<option value=\"false\" selected> False </option>
                                <option value=\"true\"> True </option>";
                            }
                        ?>
                    </select>
                </div>  

                <div class="mb-3">
                    <label for="bedType" class="form-label"> Bed Type </label>
                    <select class="form-select" aria-label="Default select example" id="bedType" name="bedType">
                        <?php 
                            if($bed_type == 'single'){ 
                                echo "<option value=\"single\" selected> Single </option>
                                <option value=\"double\"> Double </option>";
                            } else {
                                echo "<option value=\"single\" selected> Double </option>
                                <option value=\"true\"> Single </option>";
                            }
                        ?>
                    </select>
                </div>  

                <div class="mb-3">
                    <label for="priceNight" class="form-label"> Price per night </label>
                    <input class="form-control" name="priceNight" type="number" value ="<?php echo $price_per_nigth; ?>" readonly>
                </div>  

            </div>
                
            <?php } ?>
            <div class="d-grid gap-2 col-4 mx-auto m-2">
                <button class="btn btn-secondary" type="submit" name="submit"> Submit </button>
            </div>

        </div>
                
               
               
                
    </div>

    <?php } ?>

    <?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php')?>
