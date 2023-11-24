<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/header.php'); ?> 

<?php 
    if(isset($_POST['submit'])) {
        //Capture variables
        $room_number = $_POST['roomNumber'];
        $service = $_POST['service'];
        $day = date('Y-m-d');
        $precio_total = $_POST['totalPrice'];
        
        //Separar service
        $arrayService = explode( ',',$service);
        print_r($arrayService);

        echo 'Room Number:' . $room_number;
        echo '<br>Service: ' . $service;
        echo '<br>Day: ' . $day;

        //Connect db
        include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/db/connect_db.php');
        
        //Si la habitacion tiene una reserva en su numero con las fechas que concuerdan
        //Comprovar habitacion
        $sql_comprovar_room = "SELECT reservation_number, date_in, date_out
        FROM 045_reservations
        WHERE room_number = $room_number";

        $result = mysqli_query($conn, $sql_comprovar_room);
        $reservations = mysqli_fetch_all($result, MYSQLI_ASSOC);

        echo '<br>';
        print_r($reservations);

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
       
        if(isset($reservation_number)) {
            echo 'yes';

            if($arrayService[0] != 'bar') {
                $nPersons = $_POST['uds'];
                $precio_hora = $_POST['price'];
                
                

                echo '<br>Number of persons: ' . $nPersons;
                echo "<br>Price per Hour: " . $precio_hora;
                echo '<br>Precio total: ' . $precio_total;

            } else {
                
                $service_bar = $_POST['serviceBar'];
                $unidades = $_POST['unidadBar'];
              //  $precio_bar = $_POST['priceBar'];

                $service_name_price = explode(",",$service_bar);
                print_r($service_name_price);
                $name = $service_name_price[0];
                $precio = $service_name_price[1];
                echo '<br>precio: ' .   $precio;
                echo '<br>name: ' . $name;
                $total = $precio*$unidades;

                $json_bar = "\"bar\":[
                        {
                            \"name\": \"$name\",
                            \"price\": \"$precio\",
                            \"uds\": \"$unidades\",
                            \"total\": $total 
                        }]";

                print_r($json_bar);

                echo "<br>Servicio Bar: " . $service_bar;
                echo "<br>Unidades: " . $unidades;
                //echo "<br>Precio Bar: " . $precio_bar;
                echo '<br>Precio total: ' . $precio_total;


            }
            
        }



    
        
        print_r($_POST);
    }
?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php'); ?>