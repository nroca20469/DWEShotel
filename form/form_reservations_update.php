
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
    // $reservation_extras = json_decode($extras);
    // if(!empty($reservation_extras)){
    //     $internal_services = $reservation_extras -> {'Internal Services'};  // --> mirar si funciona
    //     if(!empty($internal_services)){
    //         foreach ($internal_services as $internal) {
    //         $nameInternal = $internal -> Name;
    //         $priceInternal = $internal -> Price;
    //         }
    //     }

    //     $external_services = $reservation_extras -> ExternalServices;
    //     if(!empty($external_services)){
    //         foreach ($external_services as $external) {
    //         $nameExternal = $external -> Name;
    //         $priceExternal = $external -> Price;
    //         }
    //     }
    // }

    // if(isset($nameInternal)){
    //     echo $nameInternal;
    // }

//$bedType = "bed type";
//$bed_type = $room_desciption_array -> bedType; 

//$airConditioning = $room_desciption_array -> Air; //NO FUNCIONA MIRAR PQ

?>
    
    <div class="container-lg">
        <div class="text-center">
            <h2>Update Reservation</h2>
        </div>
        <div class="row justify-content-center my-5">
            <form class="col-lg-6 mb-3" action="http://localhost/student045/dwes/db/db_reservations_update.php" method="POST">
                <div class="mb-3">
                    <label for="reservationNum" class="form-label" >Reservation Number</label>
                    <input type="numeric" class="form-control" name="reservationNum" value="<?php echo $reservation_number; ?>" readonly>
                </div>

                <div class="mb-3">
                    <label for="preselectedRoom" class="form-label" >Preselected Room</label>
                    <input type="numeric" class="form-control" name="preselectedRoom" value="<?php echo $preselected_room; ?>" readonly>
                </div>

                <div class="mb-3">
                    <label for="roomNum" class="form-label">Room Number</label>
                    <input type="numeric" class="form-control" id="roomNum" name="roomNum" value="<?php echo $room_number; ?>">
                </div>

                <div class="mb-3">
                    <label for="roomPrice" class="form-label">Price</label>
                    <input type="numeric" class="form-control" id="roomPrice" name="roomPrice" value="<?php echo $room_price; ?>">
                </div> 

                

                <div class="mb-3">
                    <label for="reservationStatus" class="form-label">Reservation Status</label>
                    <select class="form-select" aria-label="Reservation Status"  name="reservationStatus" type="select">
                        <?php 
                            if($reservation_status == 'booked'){
                                echo "<option value=\"booked\" selected > Booked </option>
                                <option value=\"check_in\"> Check in </option>
                                <option value=\"check_out\"> Check out </option>
                                <option value=\"absent\"> Absent </option>
                                <option value=\"cancelled\"> Cancelled </option>";
                            } else if($reservation_status == 'check_in') {
                                echo "<option value=\"booked\"> Booked </option>
                                <option value=\"check_in\" selected> Check in </option>
                                <option value=\"check_out\"> Check out </option>
                                <option value=\"absent\"> Absent </option>
                                <option value=\"cancelled\"> Cancelled </option>";
                            } else if($reservation_status == 'check_out'){
                                echo "<option value=\"booked\"> Booked </option>
                                <option value=\"check_in\"> Check in </option>
                                <option value=\"check_out\" selected> Check out </option>
                                <option value=\"absent\"> Absent </option>
                                <option value=\"cancelled\"> absent </option>";
                            }else if($reservation_status == 'check_out'){
                                    echo "<option value=\"booked\"> Booked </option>
                                    <option value=\"check_in\"> Check in </option>
                                    <option value=\"check_out\" > Check out </option>
                                    <option value=\"absent\" selected> Absent </option>
                                    <option value=\"cancelled\"> Cancelled </option>";
                            }else if($reservation_status == 'cancelled'){
                                echo "<option value=\"booked\"> Booked </option>
                                <option value=\"check_in\"> Check in </option>
                                <option value=\"check_out\"> Check out </option>
                                <option value=\"absent\"> Absent </option>
                                <option value=\"cancelled\" selected> Cancelled </option>";
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
                    <label for="dateIn" class="form-label">Date in</label>
                    <input type="date" class="form-control" id="dateIn" name="dateIn" value="<?php echo $date_in; ?>" readonly> 
                </div>
                <div class="mb-3">
                    <label for="dateOut" class="form-label">Date out</label>
                    <input type="date" class="form-control" id="dateOut" name="dateOut" value="<?php echo $date_out; ?>" readonly>
                </div> 

                <?php

                    $json = json_decode($extras,true);
                    //var_dump($json);
                   // echo "<br>"; 
                    $laundry = false; $gym = false; $spa = false; $horseTrail = false; $boat = false;
                if($json != null) {
                   
                    foreach ($json['Internal services'] as $key => $value){
                        //echo "$key: " . $value['Name'] . " \n";
                        $internalName = $value['Name'];
                       
                      //  echo "$key: " . $value['Price'] . " \n";
                        $internalPrice = $value['Price'];

                        if($internalName == "Laundry"){
                            $laundry = true;
                            $laundryPrice = $internalPrice;
                        } else if($internalName == "Gym") {
                            $gym = true;
                            $gymPrice = $internalPrice;
                        } else if($internalName == "Spa"){
                            $spa = true;
                            $spaPrice = $internalPrice;
                        }
                    };
                    

                    foreach ($json['External services'] as $key => $value){
                      //  echo "$key: " . $value['Name'] . " \n";
                        $externalName = $value['Name'];

                    //    echo "$key: " . $value['Price'] . " \n";
                        $externalPrice = $value['Price'];

                        if($externalName == "Horse trail"){
                            $horseTrail = true;
                            $horsePrice = $externalPrice;
                        } else if ($externalName == "Boat trail"){
                            $boat = true;
                            $boatPrice = $externalPrice;
                        }
                    };
                }
                ?>
                    <div class="mx-2 pt-1 text-center">
                        <label for="internal" class="form-label"><h5>External Services</h5></label>
                    </div>

                <?php 
                    
                    echo "<div class=\"mb-3\">
                    <label for=\"horse\" class=\"form-label\">Horse trail</label>
                    <select class=\"form-select\" aria-label=\"Horse\"  name=\"horse\" type=\"select\">";
                    if($horseTrail){
                        echo "<option value=\"true\" selected> Si </option>
                                <option value=\"false\"> No </option>
                            </select>
                        </div>";
                    } else {
                        echo "<option value=\"true\"> Si </option>
                                <option value=\"false\" selected> No </option>
                            </select>
                        </div>"; 
                    } 
                    echo "<div class=\"mb-3\">
                    <label for=\"boat\" class=\"form-label\">Boat trail</label>
                    <select class=\"form-select\" aria-label=\"Boat\"  name=\"boat\" type=\"select\">";
                    if($boat){
                        echo "<option value=\"true\" selected> Si </option>
                                <option value=\"false\"> No </option>
                            </select>
                        </div>";
                    } else {
                        echo "<option value=\"true\"> Si </option>
                                <option value=\"false\" selected> No </option>
                            </select>
                        </div>"; 
                    } 
                ?>

                <div class="mx-2 pt-1 text-center">
                    <label for="external" class="form-label"><h5>Internal Services</h5></label>
                </div>

                <?php 
                    echo "<div class=\"mb-3\">
                    <label for=\"laundry\" class=\"form-label\">Laundry</label>
                    <select class=\"form-select\" aria-label=\"Laundry\"  name=\"laundry\" type=\"select\">";
                    if($laundry){
                        echo "<option value=\"true\" selected> Si </option>
                                <option value=\"false\"> No </option>
                            </select>
                        </div>";
                    } else {
                        echo "<option value=\"true\"> Si </option>
                                <option value=\"false\" selected> No </option>
                            </select>
                        </div>"; 
                    } 

                    echo "<div class=\"mb-3\">
                    <label for=\"gym\" class=\"form-label\">Gym</label>
                    <select class=\"form-select\" aria-label=\"Gym\"  name=\"gym\" type=\"select\">";
                    if($gym){
                        echo "<option value=\"true\" selected> Si </option>
                                <option value=\"false\"> No </option>
                            </select>
                        </div>";
                    } else {
                        echo "<option value=\"true\"> Si </option>
                                <option value=\"false\" selected> No </option>
                            </select>
                        </div>"; 
                    } 

                    echo "<div class=\"mb-3\">
                    <label for=\"spa\" class=\"form-label\">Spa</label>
                    <select class=\"form-select\" aria-label=\"Spa\"  name=\"spa\" type=\"select\">";
                    if($gym){
                        echo "<option value=\"true\" selected> Si </option>
                                <option value=\"false\"> No </option>
                            </select>
                        </div>";
                    } else {
                        echo "<option value=\"true\"> Si </option>
                                <option value=\"false\" selected> No </option>
                            </select>
                        </div>"; 
                    } 

                ?>

                <div class="d-grid gap-2 col-4 mx-auto m-2">
                    <button class="btn btn-secondary" type="submit" name="submit"> Submit </button>
                </div>
            </form>
        </div>        
    </div>

    <?php } ?>

    <?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php');?>
