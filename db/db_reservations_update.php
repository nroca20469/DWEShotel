
<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/header.php')?>

<?php
    if(isset($_POST['submit'])){
        //Create variables
        
            $reservation_num = $_POST['reservationNum'];
            $room_number = $_POST['roomNum'];
            $room_price = $_POST['roomPrice'];
            $reservation_status = $_POST['reservationStatus'];
            $date_in = $_POST['dateIn'];
            $date_out = $_POST['dateOut'];

            $laundry = $_POST['laundry'];
            $gym = $_POST['gym']; 
            $spa =  $_POST['spa'];
            $horse = $_POST['horse']; 
            $boat = $_POST['boat'];



            echo "  <div class=\"text-center\">
                        <h5>Reservation Number: $reservation_num </h5>
                    </div>";

        //Connect to db
        include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/db/connect_db.php');
        
        if(!($conn ->connect_error)){
            
            //Check data
            $check_reservation = " SELECT room_number FROM 045_rooms WHERE room_category = 
            (SELECT room_category FROM 045_rooms WHERE room_number =
            (SELECT preselected_room FROM 045_reservations WHERE reservation_number = $reservation_num));";
            
            //SELECT room_number FROM 045_rooms WHERE room_category = (SELECT room_category FROM 045_rooms WHERE room_number = (SELECT preselected_room FROM 045_reservations WHERE reservation_number = $reservation_num))";
            $connect_check = mysqli_query($conn, $check_reservation);
            $array_check = mysqli_fetch_all($connect_check, MYSQLI_ASSOC); 

            $room_num = false;  //Check if the number is posible with the type of room
            foreach($array_check as $check){
              //  echo $check['room_number'] . ' ';

                if($room_number == $check['room_number']){
                    $room_num = true;
                }
            }

            if($room_num == true){
                //Insert data
                $json ='{
                    "Internal services": [';

                    if($laundry == 'true') {
                        $json = $json . '{
                            "Name": "Laundry",
                            "Price": 10.0
                        }';
                    } 
                    if($gym == 'true'){
                        $json = $json . ',{
                            "Name": "Gym",
                            "Price": 10.0
                        }';
                    } 
                    if($spa == 'true') {
                        $json = $json . ',{
                            "Name": "Spa",
                            "Price": 10.0
                        }';
                    }
                    
                    $json = $json . '],
                        "External services": [';

                        if($horse == 'true'){
                            $json = $json . ' {
                                "Name": "Horse trail",
                                "Price": 55.0
                            }';
                        }
                         if($boat == 'true'){
                            $json = $json .' ,{
                                "Name": "Boat trail",
                                "Price": 55.0
                            }';
                        }
                        
                    $json = $json . ']}';
                 //   echo '<b>' . $json;

                $update_reservation = "UPDATE 045_reservations 
                                    SET room_number = $room_num, reservation_status = '$reservation_status', extras = '$json' 
                                    WHERE reservation_number = $reservation_num";

                //$update = mysqli_query($conn, $update_reservation);
                //Show that is been inserted, or show error that it was not possible
                if($conn->query($update_reservation) === TRUE){
                    $boton_aviso = 'It was correctly updated';
                } else {
                    $boton_aviso = ' it was not updated correctly';
                }
            } else {
                $boton_aviso = 'Room number not available';
            }
            
            if($reservation_status == 'check_out') {
                $boton_aviso = "check out";

                $sql_insert_invoice = "INSERT INTO `045_invoice`
                (`invoice_number`, `reservation_number`) VALUES 
                (DEFAULT,$reservation_num)";
               /* $insert_invoice = mysqli_query($conn, $sql_insert_invoice);
*/
                if ($conn->query($sql_insert_invoice) === TRUE) {
                    $boton_aviso = "Your invoice is now created";
                  } else {
                    $boton_aviso = "Your invoice is not created, see if there is any problem with your data";
                  }
            }

        } else {
            echo 'The server looks like its not working correctly, check the connection pleasse';
        }

        echo "  <div class=\"text-center\">
            <p> $boton_aviso  </p>
            <div class=\"btn-group\">
                <a href=\"/student045/dwes/index.php\"><button type=\"button\" class=\"btn btn-secondary me-2\"> Return home </button></a>
                <a href=\"/student045/dwes/form/form_reservations_update_call.php\"><button type=\"button\" class=\"btn btn-secondary\"> Return to edit another reservation </button></a>
            </div>
</div>";
       
    }
   
?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php')?>