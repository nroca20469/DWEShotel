<?php 
        //It's already conected in the db_reservation_update_checkput
        //Check if the reservation number exists
        $sql_check_reservation_number = "SELECT * 
                                        FROM 045_reservations 
                                        WHERE reservation_number = $reservation_number";
        $result = mysqli_query($conn, $sql_check_reservation_number);
        $reservations = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
        $exists = 'false';

        //Chect that the reservation is not into the invoice table 
        $sql_check_invoice_reservation_number = "SELECT COUNT(reservation_number) AS reservation_num
                                        FROM 045_reservations 
                                        WHERE reservation_number = $reservation_number";
        $result_invoice = mysqli_query($conn, $sql_check_invoice_reservation_number);
        $invoice_reservation_number = mysqli_fetch_all($result_invoice, MYSQLI_ASSOC);

        //Comprovar reserva no en invoice

        if($invoice_reservation_number[0]['reservation_num'] != 1) {
             foreach($reservations as $reservation) {
                $exists = 'true';
                $date_in = $reservation['date_in'];
                $date_out = $reservation['date_out'];
                $room_price = $reservation['room_price'];
            }
            
            if($exists == 'true' ) {

                //Calcular nº de dias que se ha quedado en el hotel, para calcular el total
                $sql_datediff = "SELECT DATEDIFF(`date_out`,`date_in`) AS days FROM `045_reservations` WHERE reservation_number = $reservation_number";
                $resultdo_datediff = mysqli_query($conn, $sql_datediff);
                $days = mysqli_fetch_all($resultdo_datediff, MYSQLI_ASSOC);
                $numDays = $days[0]['days'];
                $subtotal_room = $numDays * $room_price;
                
                //Check if the ticket table has that reservation ticket
                $sql_check_ticket_number = "SELECT * 
                                            FROM 045_tickets 
                                            WHERE reservation_number = $reservation_number";
                $result = mysqli_query($conn, $sql_check_ticket_number);
                $tickets = mysqli_fetch_all($result, MYSQLI_ASSOC);
                
                $subtotal_extras = 0;
                $invoice_number = $reservation_number . date('YmdGis');
                $numeroTickets = 1;
                $invoice_details = "{ ";

                foreach($tickets as $ticket) {
                    // $reservation_number = $ticket['reservation_number'] ;
                    $ticket_number = $ticket['ticket_number'];
                    $total_price = $ticket['total_price'];
                    $date = $ticket['ticket_date'];
                    $ticket_detail = $ticket['ticket_description'];
                    
                    $total1 = $ticket['total_price'];
                    $subtotal_extras += $total1;
                    
                    //Get service name
                    $service_id = $ticket['service_id'];
                    
                    $sql_select_service = "SELECT service_name FROM 045_services WHERE service_id = $service_id;";
                    $result = mysqli_query($conn, $sql_select_service);
                    $service = mysqli_fetch_all($result);
                    $service_name = $service[0][0];

                    if($numeroTickets < count($tickets)) {
                        $invoice_details = $invoice_details . "{\"$ticket_number\" : {
                            \"service name\": \"$service_name\",
                            \"date\": \"$date\",
                            \"total price\": $total_price,
                            \"details\": $ticket_detail
                        }},";
                        
                        $numeroTickets++;
                    } else {
                        $invoice_details = $invoice_details . "{\"$ticket_number\" : {
                            \"service name\": \"$service_name\",
                            \"date\": \"$date\",
                            \"total price\": $total_price,
                            \"details\": $ticket_detail
                    }";
                    }
                    
                }
                $invoice_details = $invoice_details . "}";
                $total_reservation = $subtotal_room + $subtotal_extras;

                //Insert Invoice 
                $sql_insert_invoice = "INSERT INTO `045_invoice`
                (`invoice_number`, `reservation_number`, `subtotal_room`, `subtotal_extras`, `total`, `invoice_description`) 
                VALUES 
                ('$invoice_number','$reservation_number','$subtotal_room','$subtotal_extras','$total_reservation','$invoice_details')";

                if($conn -> query($sql_insert_invoice) === true) {
                    $boton_aviso = "Insertado correctamente";
                } else {
                    $boton_aviso = "No se ha podido insertar";
                }

            } else {
                $boton_aviso = "Your reservation number does not exists";
            }
        }

        // } else {
        //     $boton_aviso = "Reservation already into invoice table";
        // }
?>