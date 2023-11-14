
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/header.php')?>
    <?php
        //Create variable
            $date_in = null;
            $date_out = null;
            $reservations = null; 
            if (isset($_POST['submit']) && isset($_POST['dateIn']) && isset($_POST['dateOut'])){
                $date_in = $_POST['dateIn'];
                $date_out = $_POST['dateOut'];
            } else {
                echo 'Nothing happens';
            }
                
                
        //Connect database 
            include('connect_db.php');

        //Fetch data
        if($date_in != null && $date_out != null) {
            if($date_in <  $date_out) {
                $sql = "SELECT room_number, room_category, room_price
                        FROM 045_rooms
                        WHERE room_number NOT IN (SELECT preselected_room
                                                    FROM 045_reservations
                                                    WHERE date_in < '{$date_out}'
                                                    AND date_out > '{$date_in}')
                        AND room_status = 1
                        GROUP BY room_category
                        ORDER BY RAND(room_category);";
                $result = mysqli_query($conn, $sql);
                $reservations = mysqli_fetch_all($result, MYSQLI_ASSOC);

                //Show data
                foreach ($reservations as $res){
                    echo $res['room_number'] . ' ' . $res['room_category'] . ' ' .  $res['room_price'];
                    echo '<br>'; 
                }

                echo "
                <div class=\"container\">

                <!-- Single -->
                <div class=\"row pt-4\">
                    <div id=\"single\" class=\"col carousel slide\" data-bs-ride=\"carousel\">
                        <div class=\"carousel-indicators\">
                            <button type=\"button\" data-bs-target=\"#single\" data-bs-slide-to=\"0\" class=\"active\" aria-current=\"true\" aria-label=\"Slide 1\"></button>
                            <button type=\"button\" data-bs-target=\"#single\" data-bs-slide-to=\"1\" aria-label=\"Slide 2\"></button>
                            <button type=\"button\" data-bs-target=\"#single\" data-bs-slide-to=\"2\" aria-label=\"Slide 3\"></button>
                            <button type=\"button\" data-bs-target=\"#single\" data-bs-slide-to=\"3\" aria-label=\"Slide 4\"></button>
                            <button type=\"button\" data-bs-target=\"#single\" data-bs-slide-to=\"4\" aria-label=\"Slide 5\"></button>
                            <button type=\"button\" data-bs-target=\"#single\" data-bs-slide-to=\"5\" aria-label=\"Slide 6\"></button>
                            <button type=\"button\" data-bs-target=\"#single\" data-bs-slide-to=\"6\" aria-label=\"Slide 7\"></button>
                        </div>
                        <div class=\"carousel-inner\">
                            <div class=\"carousel-item active\">
                                <img src=\"http://localhost/student045/dwes/img/single1.jpg\" class=\"d-block w-100\" width=\"75%\" height=\"75%\">
                            </div>
                            <div class=\"carousel-item\">
                                <img src=\"http://localhost/student045/dwes/img/single2.jpg\" class=\"d-block w-100\" width=\"75%\" height=\"75%\">
                            </div>
                            <div class=\"carousel-item\">
                                <img src=\"http://localhost/student045/dwes/img/single3.jpg\" class=\"d-block w-100\" width=\"75%\" height=\"75%\">
                            </div>
                            <div class=\"carousel-item\">
                                <img src=\"http://localhost/student045/dwes/img/single4.jpg\" class=\"d-block w-100\" width=\"75%\" height=\"75%\">
                            </div>
                            <div class=\"carousel-item\">
                                <img src=\"http://localhost/student045/dwes/img/single5.jpg\" class=\"d-block w-100\" width=\"75%\" height=\"75%\" >
                            </div>
                            <div class=\"carousel-item\">
                                <img src=\"http://localhost/student045/dwes/img/single6.jpg\" class=\"d-block w-100\" width=\"75%\" height=\"75%\">
                            </div>
                            <div class=\"carousel-item\">
                                <img src=\"http://localhost/student045/dwes/img/single7.jpg\" class=\"d-block w-100\" width=\"75%\" height=\"75%\">
                            </div>
                        </div>
                        <button class=\"carousel-control-prev\" type=\"button\" data-bs-target=\"#single\" data-bs-slide=\"prev\">
                            <span class=\"carousel-control-prev-icon\" aria-hidden=\"true\"></span>
                            <span class=\"visually-hidden\">Anterior</span>
                        </button>
                        <button class=\"carousel-control-next\" type=\"button\" data-bs-target=\"#single\" data-bs-slide=\"next\">
                            <span class=\"carousel-control-next-icon\" aria-hidden=\"true\"></span>
                            <span class=\"visually-hidden\">Siguiente</span>
                        </button>
                    </div>
                    <div class=\"col\">
                        <h3>Single rooms</h3>
                        <p>Guests who prefer to stay in their own room will enjoy the Single Rooms at Hotel Maribel Menorca which come highly recommended. Experience unbeatable privacy during your holiday in Arenal, Menorca in these rooms which provide a single bed, 50” TV with international channels, free Wi-Fi, private bathroom with a hairdryer and toiletries, desk, telephone, wake-up service, mirror with a magnifying area and a full body mirror, and a balcony with exterior views.</p>
                        
                        <!-- Button trigger modal -->
                            <a href=\"\" data-bs-toggle=\"modal\" data-bs-target=\"#SingleAmenities\">Look amenities</a><br>
                        <!-- Modal -->
                        <div class=\"modal fade\" id=\"SingleAmenities\" tabindex=\"-1\" aria-labelledby=\"SingleAmenitiesLabel\" aria-hidden=\"true\">
                        <div class=\"modal-dialog\">
                            <div class=\"modal-content\">
                            <div class=\"modal-header\">
                                <h1 class=\"modal-title fs-5\" id=\"SingleAmenitiesLabel\">Single Room Amenities</h1>
                                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
                            </div>
                            <div class=\"modal-body\">
                                <ul class=\"list-group list-group-flush\"> 
                                    <li class=\"list-group-item input-group\">
                                        <p class=\"pt-3\"><i class=\"bi bi-tv\"></i> TV </p>
                                    </li> 
                                    <li class=\"list-group-item input-group\">
                                        <p class=\"pt-3\"><i class=\"bi bi-fan\"></i> Air Conditioning </p>
                                    </li>
                                    <li class=\"list-group-item input-group\" >
                                        <p class=\"pt-3\"><i class=\"bi bi-wifi\"></i> Wifi </p>
                                    </li>
                                    <li class=\"list-group-item input-group\" >
                                        <p class=\"pt-3\"><i class=\"fa fa-bed\"></i> 2xSingle bed </p>
                                    </li>
                                    <li class=\"list-group-item input-group\" >
                                        <p class=\"pt-3\"><i class=\"bi bi-tv\"></i> Extra bed possible </p>
                                    </li>
                                </ul>   
                            </div>
                            <div class=\"modal-footer\">
                                <a class=\"btn btn-primary\" role=\"button\" href=\"http://localhost/student045/dwes/db/db_reservations_insert.php\">Book</a>
                                <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Close</button>
                            </div>
                            </div>
                        </div>
                        </div>
                        <br><h5>Price per night</h5> 
                        <p> " . $reservations[0]['room_price'] . "</p>";
                        $room_num = $reservations[0]['room_number'];
                        $room_price = $reservations[0]['room_price'];
                            include $_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/form/form_reservations_insert.php'; 
                    echo " </a> 
                    </div>
                </div> ";

                echo "
                <!-- Double -->
                <div class=\"row pt-4\">
                    <div id=\"double\" class=\"col carousel slide order-2\" data-bs-ride=\"carousel\">
                        <div class=\"carousel-indicators\">
                            <button type=\"button\" data-bs-target=\"#double\" data-bs-slide-to=\"0\" class=\"active\" aria-current=\"true\" aria-label=\"Slide 1\"></button>
                            <button type=\"button\" data-bs-target=\"#double\" data-bs-slide-to=\"1\" aria-label=\"Slide 2\"></button>
                            <button type=\"button\" data-bs-target=\"#double\" data-bs-slide-to=\"2\" aria-label=\"Slide 3\"></button>
                            <button type=\"button\" data-bs-target=\"#double\" data-bs-slide-to=\"3\" aria-label=\"Slide 4\"></button>
                            <button type=\"button\" data-bs-target=\"#double\" data-bs-slide-to=\"4\" aria-label=\"Slide 5\"></button>
                            <button type=\"button\" data-bs-target=\"#double\" data-bs-slide-to=\"5\" aria-label=\"Slide 6\"></button>
                            <button type=\"button\" data-bs-target=\"#double\" data-bs-slide-to=\"6\" aria-label=\"Slide 7\"></button>
                        </div>
                        <div class=\"carousel-inner\">
                            <div class=\"carousel-item active\">
                                <img src=\"http://localhost/student045/dwes/img/double1.jpg\" class=\"d-block w-100\" width=\"75%\" height=\"75%\">
                            </div>
                            <div class=\"carousel-item\">
                                <img src=\"http://localhost/student045/dwes/img/double2.jpg\" class=\"d-block w-100\" width=\"75%\" height=\"75%\">
                            </div>
                            <div class=\"carousel-item\">
                                <img src=\"http://localhost/student045/dwes/img/double3.jpg\" class=\"d-block w-100\" width=\"75%\" height=\"75%\">
                            </div>
                            <div class=\"carousel-item\">
                                <img src=\"http://localhost/student045/dwes/img/double4.jpg\" class=\"d-block w-100\" width=\"75%\" height=\"75%\">
                            </div>
                            <div class=\"carousel-item\">
                                <img src=\"http://localhost/student045/dwes/img/double5.jpg\" class=\"d-block w-100\" width=\"75%\" height=\"75%\" >
                            </div>
                            <div class=\"carousel-item\">
                                <img src=\"http://localhost/student045/dwes/img/double6.jpg\" class=\"d-block w-100\" width=\"75%\" height=\"75%\">
                            </div>
                            <div class=\"carousel-item\">
                                <img src=\"http://localhost/student045/dwes/img/double7.jpg\" class=\"d-block w-100\" width=\"75%\" height=\"75%\">
                            </div>
                        </div>
                        <button class=\"carousel-control-prev\" type=\"button\" data-bs-target=\"#double\" data-bs-slide=\"prev\">
                            <span class=\"carousel-control-prev-icon\" aria-hidden=\"true\"></span>
                            <span class=\"visually-hidden\">Anterior</span>
                        </button>
                        <button class=\"carousel-control-next\" type=\"button\" data-bs-target=\"#double\" data-bs-slide=\"next\">
                            <span class=\"carousel-control-next-icon\" aria-hidden=\"true\"></span>
                            <span class=\"visually-hidden\">Siguiente</span>
                        </button>
                    </div>
                    <div class=\"col order-1\">
                        <h3>Double rooms</h3>
                        <p>The double rooms at the Hotel Maribel Menorca are cozy rooms where you can enjoy a few pleasant days 
                        on the Arenal beach. In our rooms for two people you will find all kinds of services at your disposal 
                        such as a bedroom equipped with two single beds, 50-inch TV with international channels, Wi-Fi internet 
                        at no additional cost, bathroom with hairdryer and toiletries. staff, desk and trunk, telephone, wake-up 
                        service, mirrors with magnifying area and body mirror, double bed option (on request), balcony with 
                        exterior views</p>
                        
                        <!-- Button trigger modal -->
                            <a href=\"\" data-bs-toggle=\"modal\" data-bs-target=\"#DoubleAmenities\">Look amenities</a><br>
                        <!-- Modal -->
                        <div class=\"modal fade\" id=\"DoubleAmenities\" tabindex=\"-1\" aria-labelledby=\"DoubleAmenitiesLabel\" aria-hidden=\"true\">
                        <div class=\"modal-dialog\">
                            <div class=\"modal-content\">
                            <div class=\"modal-header\">
                                <h1 class=\"modal-title fs-5\" id=\"DoubleAmenitiesLabel\">Double Room Amenities</h1>
                                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
                            </div>
                            <div class=\"modal-body\">
                                <ul class=\"list-group list-group-flush\"> 
                                    <li class=\"list-group-item input-group\">
                                        <p class=\"pt-3\"><i class=\"bi bi-tv\"></i> TV </p>
                                    </li> 
                                    <li class=\"list-group-item input-group\" >
                                        <p class=\"pt-3\"><i class=\"bi bi-fan\"></i> Air Conditioning </p>
                                    </li>
                                    <li class=\"list-group-item input-group\" >
                                        <p class=\"pt-3\"><i class=\"bi bi-wifi\"></i> Wifi </p>
                                    </li>
                                    <li class=\"list-group-item input-group\" >
                                        <p class=\"pt-3\"><img src= \"http://localhost/student045/dwes/icons/terrace/chair-solid.svg\"  height=\"20px\"  width=\"20px\"/> Terrace </p>
                                    </li>
                                    <li class=\"list-group-item input-group\" >
                                        <p class=\"pt-3\"><i class=\"bi bi-tv\"></i> Extra bed possible </p>
                                    </li>
                                </ul>   
                            </div>
                            <div class=\"modal-footer\">
                                <a class=\"btn btn-primary\" role=\"button\" href=\"http://localhost/student045/dwes/db/db_reservations_insert.php\" \>Book</a>
                                <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Close</button>
                            </div>
                            </div>
                        </div>
                        </div>
        
                        <br><h5>Price per night</h5> 
                        <p> " . $reservations[1]['room_price'] . "</p>
                            
                        <br>
                        ";
                        $room_num = $reservations[1]['room_number'];
                        $room_price = $reservations[1]['room_price'];
                            include $_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/form/form_reservations_insert.php'; 
                            
                    echo " </a> 
                    </div>

                    </div> ";
                
                echo "
                <!-- Suite -->
                <div class=\"row pt-4\">
                    <div id=\"suite\" class=\"col carousel slide\" data-bs-ride=\"carousel\">
                        <div class=\"carousel-indicators\">
                            <button type=\"button\" data-bs-target=\"#suite\" data-bs-slide-to=\"0\" class=\"active\" aria-current=\"true\" aria-label=\"Slide 1\"></button>
                            <button type=\"button\" data-bs-target=\"#suite\" data-bs-slide-to=\"1\" aria-label=\"Slide 2\"></button>
                            <button type=\"button\" data-bs-target=\"#suite\" data-bs-slide-to=\"2\" aria-label=\"Slide 3\"></button>
                            <button type=\"button\" data-bs-target=\"#suite\" data-bs-slide-to=\"3\" aria-label=\"Slide 4\"></button>
                            <button type=\"button\" data-bs-target=\"#suite\" data-bs-slide-to=\"4\" aria-label=\"Slide 5\"></button>
                            <button type=\"button\" data-bs-target=\"#suite\" data-bs-slide-to=\"5\" aria-label=\"Slide 6\"></button>
                            <button type=\"button\" data-bs-target=\"#suite\" data-bs-slide-to=\"6\" aria-label=\"Slide 7\"></button>
                        </div>
                        <div class=\"carousel-inner\">
                            <div class=\"carousel-item active\">
                                <img src=\"http://localhost/student045/dwes/img/suit1.jpg\" class=\"d-block w-100\" width=\"75%\" height=\"75%\">
                            </div>
                            <div class=\"carousel-item\">
                                <img src=\"http://localhost/student045/dwes/img/suit2.jpg\" class=\"d-block w-100\" width=\"75%\" height=\"75%\">
                            </div>
                            <div class=\"carousel-item\">
                                <img src=\"http://localhost/student045/dwes/img/suit3.jpg\" class=\"d-block w-100\" width=\"75%\" height=\"75%\">
                            </div>
                            <div class=\"carousel-item\">
                                <img src=\"http://localhost/student045/dwes/img/suit4.jpg\" class=\"d-block w-100\" width=\"75%\" height=\"75%\">
                            </div>
                            <div class=\"carousel-item\">
                                <img src=\"http://localhost/student045/dwes/img/suit5.jpg\" class=\"d-block w-100\" width=\"75%\" height=\"75%\" >
                            </div>
                            <div class=\"carousel-item\">
                                <img src=\"http://localhost/student045/dwes/img/suit6.jpg\" class=\"d-block w-100\" width=\"75%\" height=\"75%\">
                            </div>
                            <div class=\"carousel-item\">
                                <img src=\"http://localhost/student045/dwes/img/suit7.jpg\" class=\"d-block w-100\" width=\"75%\" height=\"75%\">
                            </div>
                        </div>
                        <button class=\"carousel-control-prev\" type=\"button\" data-bs-target=\"#suite\" data-bs-slide=\"prev\">
                            <span class=\"carousel-control-prev-icon\" aria-hidden=\"true\"></span>
                            <span class=\"visually-hidden\">Anterior</span>
                        </button>
                        <button class=\"carousel-control-next\" type=\"button\" data-bs-target=\"#suite\" data-bs-slide=\"next\">
                            <span class=\"carousel-control-next-icon\" aria-hidden=\"true\"></span>
                            <span class=\"visually-hidden\">Siguiente</span>
                        </button>
                    </div>
                    <div class=\"col\">
                        <h3>Suites</h3>
                        <p>Whether you are traveling alone or accompanied, our suite for 2 adults is the ideal stay to enjoy a 
                        pleasant and comfortable stay in the center of Menoraca. The apartment with kitchen has 40m², with 
                        natural light, 1 television and a minimalist design decorated in light tones and functional details.</p>
                        
                        <!-- Button trigger modal -->
                            <a href=\"\" data-bs-toggle=\"modal\" data-bs-target=\"#SuiteAmenities\">Look amenities</a><br>
                        <!-- Modal -->
                        <div class=\"modal fade\" id=\"SuiteAmenities\" tabindex=\"-1\" aria-labelledby=\"SuiteAmenitiesLabel\" aria-hidden=\"true\">
                        <div class=\"modal-dialog\">
                            <div class=\"modal-content\">
                            <div class=\"modal-header\">
                                <h1 class=\"modal-title fs-5\" id=\"SuiteAmenitiesLabel\">Suite Amenities</h1>
                                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
                            </div>
                            <div class=\"modal-body\">
                                <ul class=\"list-group list-group-flush\"> 
                                    <li class=\"list-group-item input-group\">
                                        <p class=\"pt-3\"><i class=\"bi bi-tv\"></i> TV </p>
                                    </li> 
                                    <li class=\"list-group-item input-group\">
                                        <p class=\"pt-3\"><i class=\"bi bi-fan\"></i> Air Conditioning </p>
                                    </li>
                                    <li class=\"list-group-item input-group\" >
                                        <p class=\"pt-3\"><i class=\"bi bi-wifi\"></i> Wifi </p>
                                    </li>
                                    <li class=\"list-group-item input-group\" >
                                        <p class=\"pt-3\"><img src=\"http://localhost/student045/dwes/icons/terrace/chair-solid.svg\"  height= \"20px\"  width= \"20px\" /> Terrace </p>
                                    </li>
                                    <li class=\"list-group-item input-group\" >
                                        <p class=\"pt-3\"><i class=\"bi bi-tv\"></i> Extra bed possible </p>
                                    </li>
                                </ul>   
                            </div>
                            <div class=\"modal-footer\">
                                <a class=\"btn btn-primary\" role=\"button\" href=\"http://localhost/student045/dwes/db/db_reservations_insert.php\">Book</a>
                                <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Close</button>
                            </div>
                            </div>
                        </div>
                        </div>
                        
                        <br><h5>Price per night</h5> 
                        <p> " . $reservations[2]['room_price'] . "</p>
                            
                        <br>
                        ";
                        $room_num = $reservations[2]['room_number'];
                        $room_price = $reservations[2]['room_price'];
                            include $_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/form/form_reservations_insert.php'; 
                            
                    echo " </a> 
                    </div>
                </div> ";
            
            } else {
                echo "
                <div class=\"container\">
                    <div class=\"row  border border-2 py-4\">
                        <div class=\"col\">
                            <div class=\"text-center\">
                                <h5>You have no date in or date out, please check again</h5> 
                                <br>
                                    <div class=\"d-grid gap-2 col-4 mx-auto m-2\">
                                        <button class=\"btn btn-secondary\" onclick=\"location.href='http://localhost/student045/dwes/index.php'\">Home</button>
                                    </div>
                            </div>
                        </div>
                        <div class=\"col\">
                            <div class=\"text-center\">
                                <h5>Or log in to wath all your reservations</h5> 
                                <br>
                                    <div class=\"d-grid gap-2 col-4 mx-auto m-2\">
                                        <button class=\"btn btn-secondary\" onclick=\"location.href='http://localhost/student045/dwes/form/form_customer_select.php'\">Log in</button>
                                    </div>
                            </div>
                        </div>
                    </div>    
                </div>";
            }    
        }
            
    
    ?>
   

   

    <?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php')?>
