<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/header.php'); ?> 

<?php 
    if(isset($_POST['submit'])) {
        //Capture variables
        $room_number = $_POST['roomNumber'];
        $service = $_POST['service'];
        $day = date('Y-m-d');
        $boton_aviso = '';
        $tiempo = date('Y-m-d G:i:s');

        //Separar service
        $arrayService = explode( ',',$service);

        //Connect db
        include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/db/connect_db.php');
        

        //Si la habitacion tiene una reserva en su numero con las fechas que concuerdan
        //Comprovar habitacion
        if($room_number != 0) {
            $sql_comprovar_room = "SELECT reservation_number, date_in, date_out
            FROM 045_reservations
            WHERE room_number = $room_number";

            $result = mysqli_query($conn, $sql_comprovar_room);
            $reservations = mysqli_fetch_all($result, MYSQLI_ASSOC);

            foreach($reservations as $reservation) {
                $fecha_inicio = strtotime($reservation['date_in']);  //strtotime convierte a string la fecha(al reves)
                $fecha_fin = strtotime($reservation['date_out']);
                $fecha = strtotime($day);
            
                if(($fecha >= $fecha_inicio) && ($fecha <= $fecha_fin)) {
                    $reservation_number = $reservation['reservation_number'];
                } else {
                    $boton_aviso = "No hay ninguna reserva actual con ese numero de habitacion";
                }
            }
            
            //Coger service id de 045_services
            $name = $arrayService[0];
            echo $name;
            $sql_service_id = "SELECT service_id
            FROM 045_services
            WHERE  `service_name` = '$name';";

            $result = mysqli_query($conn, $sql_service_id);
            $reservations = mysqli_fetch_all($result, MYSQLI_NUM);

            if(COUNT($reservations) > 0) {
                $service_id = $reservations[0][0];
            } 
            
            if(isset($reservation_number)) {
                if(COUNT($arrayService) > 1) {
                    if($arrayService[0] != 'bar') {
                        $nPersons = $_POST['uds'];
                        $name = $arrayService[0];
                        $price = $arrayService[1];
                        $total = $nPersons * $price;
                        $ticket_number = date('YmdGis') . $reservation_number . $total;
                        
                        $json_service = "{\"service\" : \"$name\",
                        \"uds\": $nPersons,
                        \"price\" : $price,
                        \"date\": \"$day\",
                        \"total\": $total} ";
                        
                        //INSERT
                        $insert_ticket = "INSERT INTO `045_tickets`
                        (`ticket_number`, `reservation_number`, `service_id`, `total_price`, `ticket_description`, `ticket_date`) 
                        VALUES 
                        ('$ticket_number','$reservation_number','$service_id', '$total','$json_service','$tiempo')";

                    } else {
                        
                        $service_bar = $_POST['serviceBar'];
                        $unidades = $_POST['unidadBar'];

                        $service_name_price = explode(",",$service_bar);

                        if(COUNT($service_name_price) > 1) {
                            $name = $service_name_price[0];
                            $precio = $service_name_price[1];

                            $total = $precio*$unidades;
                        } 
                    

                        if(isset($name)) {

                            $json_bar = "{\"service\" : \"bar\",
                            \"uds\": 0,
                            \"price\" : 0,
                            \"date\": \"$day\",
                            \"details\": [
                                {
                                    \"name\": \"$name\",
                                    \"price\": \"$precio\",
                                    \"uds\": \"$unidades\"
                                }],
                            \"total\": $total}";

                            $ticket_number = date('YmdGis') . $reservation_number . $total;

                            //INSERT
                            $insert_ticket = "INSERT INTO `045_tickets`
                                                (`ticket_number`, `reservation_number`, `service_id`, `total_price`, `ticket_description`, `ticket_date`) 
                                                VALUES 
                                                ('$ticket_number','$reservation_number','$service_id', '$total','$json_bar','$tiempo')";


                        } else {
                            $boton_aviso = "No ha elegido nada del bar";
                        }

                    }

                    if($conn -> query($insert_ticket) === true) {
                        $boton_aviso = 'Insertado correctamente';
                    } else {
                        $boton_aviso = 'Parece que ha habido un error en la insercion, compruebe sus datos';
                    }

                } else {
                    $boton_aviso = "No ha escogido ningun servicio";
                }

            } else {
                $boton_aviso = "You don't have a reservation";
            }
            
        }else {
            $boton_aviso = "No ha guardado ninguna habitacion";
        }
       

        echo "  <div class=\"text-center\">
                    <h5> Insert ticket </h5>
                </div>";


        echo "  <div class=\"text-center\">
                <p>  $boton_aviso  </p>
                <div class=\"btn-group\">
                    <a href=\"/student045/dwes/index.php\"><button type=\"button\" class=\"btn btn-secondary me-2\"> Return home </button></a>
                    <a href=\"/student045/dwes/form/form_ticket_insert.php\"><button type=\"button\" class=\"btn btn-secondary\"> Insert another ticket </button></a>
                </div>
            </div>"; 

    
        
       // print_r($_POST);
    }
?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php'); ?>