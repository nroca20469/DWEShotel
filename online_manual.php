<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/header.php')?>

<div class="container-xl">
    <nav id="navbar-example2" class="navbar bg-body-tertiary px-3 mb-4 mt-4">
        <a class="navbar-brand" href="#"> Online Manual </a>
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link" href="#users"> Users/Customers </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#rooms"> Rooms </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#reservations"> Reservations </a>
            </li>
            <li class="nav-item">
                <a href="#navigation" class="nav-link"> Page Navigation </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"> View more... </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#login"> Log in </a></li>
                    <li><a class="dropdown-item" href="#logout"> Log out </a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#scrollspyHeading5"> Home </a></li>
                    <li><a class="dropdown-item" href="#scrollspyHeading5"> Header </a></li>
                    <li><a class="dropdown-item" href="#scrollspyHeading5"> Footer </a></li>
                    <li><a class="dropdown-item" href="#scrollspyHeading5"> Specifications of the software </a></li>
                    <li><a class="dropdown-item" href="#scrollspyHeading5"> How to use the page </a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-body-tertiary p-3 rounded-2 m-4" tabindex="0">
        <h4 id="users"> Users/Customers </h4>
            <h6> Type of users </h6>
            <p class="d-inline-flex gap-1">
                <button class="btn btn-primary" data-bs-toggle="collapse" href="#admin" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Admin
                </button>
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#customer" aria-expanded="false" aria-controls="collapseExample">
                    Customer
                </button>
                <button class="btn btn-primary" data-bs-toggle="collapse" href="#worker" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Worker
                </button>
                <button class="btn btn-primary" data-bs-toggle="collapse" href="#anonymous" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Anonymous
                </button>
            </p>
            <div class="collapse" id="admin">
                <div class="card card-body">
                    <p><b>Privilieges: </b> Absolute(or almost absolute), can see all the pages </p>
                    <p><b>Pages: </b> All</p>
                    <p><b>Power in the database: </b> Almost absolute, can do all(Select, Insert, Update, Delete) </p>
                </div>
            </div>
            <div class="collapse" id="customer">
                <div class="card card-body">
                    <p><b>Privileges: </b> Medium-low(almost medium), can see the reservation, profile, can insert reservations and cancel them. </p>
                    <p><b>Pages: </b> Rooms(select), Reservations(select his/hers, insert new, cancell), Customers(View profile) </p>
                    <p><b>Power in the database: </b> Almost none(Insert reservation, Select reservations and select cutomer) </p>
                </div>
            </div>
            <div class="collapse" id="worker">
                <div class="card card-body">
                    <p><b>Privilieges: </b> Medium-high, can see some of the critical the pages </p>
                    <p><b>Pages: </b> Almost all </p>
                    <p><b>Power in the database: </b> A lot, can do almost all(Select, Insert, Update, not Delete) </p>
                </div>
            </div>
            <div class="collapse" id="anonymous">
                <div class="card card-body">
                    <p><b>Privilieges: </b> Almost none can see the availability, but can not Insert, can see the rooms(Select) </p>
                    <p><b>Pages: </b> Almost none </p>
                    <p><b>Power in the database: </b> None, she/he has to log in to have some kind of power </p>
                </div>
            </div>

            <h6> Default at the register: </h6>
            <p> Customer </p>

        <h4 id="rooms"> Rooms </h4>
            <h6>Type of rooms: </h6>
            <p>Single, Double, Suite(the price depends on the type of room)</p>

            <h6>Actions for type of user for rooms</h6>
            <ul>
                <li><b>Admin: </b> SELECT, INSERT, UPDATE, DELETE </li>
                <li><b>Customer: </b> SELECT </li>
                <li><b>Worker: </b> SELECT, INSERT, UPDATE </li>
                <li><b>Anonymous: </b> SELECT </li>
            </ul>

        <h4 id="reservations"> Reservations </h4>
            <h6>Actions for type of user for rooms</h6>
            <ul>
                <li><b>Admin: </b> SELECT, INSERT, UPDATE, DELETE </li>
                <li><b>Customer: </b> SELECT, INSERT, UPDATE(only to cancel it) </li>  <!-- In the future the customer will be able to have his/her own update to change the dates -->
                <li><b>Worker: </b> SELECT, INSERT, UPDATE(check-in, check-out) </li>
            </ul>

        <h4 id="navigation"> Page Navigation </h4>

            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#anonymousPage" aria-expanded="false" aria-controls="collapseOne">
                            Anonymous Page
                        </button>
                    </h2>
                    <div id="anonymousPage" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong> Menu </strong> 
                            <p></p>
                            <ul>
                                <li> <b>Home:</b> Home page </li>
                                <li> <b>Rooms</b> </li>
                                <ul>
                                    <li> <b>Select:</b> Show all the rooms of the hotel </li>
                                </ul>
                                <li> <b>Reservations</b> </li>
                                <ul>
                                    <li> <b>Insert:</b> Show the room availability, will have to register/log in to reservate the room </li>
                                </ul>
                                <li> <b>Reserve now:</b> Show the room availability, will have to register/log in to reservate the room </li>
                                <li> <b>Log in:</b> Log in form(username + password) </li>
                                <li> <b>Register:</b> Register form(name, surname, phone number, userame, password and dni) </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#customerPage" aria-expanded="false" aria-controls="collapseTwo">
                            Customer Page
                        </button>
                    </h2>
                    <div id="customerPage" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong> Menu </strong>
                            <p></p>
                            <ul>
                                <li> <b>Home:</b> Home page </li>
                                <li> <b>Rooms</b> </li>
                                <ul>
                                    <li> <b>Select:</b> Show all the rooms of the hotel </li>
                                </ul>
                                <li> <b>Reservations</b> </li>
                                <ul>
                                    <li> <b>Select:</b> Show all the reservations of the user(check_outs and booked) </li>
                                    <li> <b>Insert:</b> Show the room availability between the two given dates in the form </li>
                                    <li> <b>Cancel:</b> Show the booked reservations, they can be cancelled </li>
                                </ul>
                                <li> <b>See profile:</b> View the profile(profile picture, name, surname, dni and email) </li>
                                <li> <b>Reserve now:</b> Show the availability of the rooms between two dates </li>
                                <li> <b>Log out:</b> Log out button, once clicked, will log out and then go directly to the home page </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#workerPage" aria-expanded="false" aria-controls="collapseThree">
                            Worker Page
                        </button>
                    </h2>
                    <div id="workerPage" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong> Menu </strong>
                            <p></p>
                            <ul>
                                <li> <b>Home:</b> Home page </li>
                                <li> <b>Rooms</b> </li>
                                <ul>
                                    <li> <b>Select:</b> Show all the rooms of the hotel, there you will be able to update </li>
                                    <li> <b>Insert:</b> Insert a room to the database </li>
                                    <li> <b>Update:</b> Update a room(you must know the room number for the update) </li>
                                </ul>
                                <li> <b>Today</b> </li>
                                <ul>
                                    <li> <b>Check in:</b> Show all the check in of the day, able to, check in, cancell or absent the reservation </li>
                                    <li> <b>Check out:</b> Sjow all the check outs of the day, once the check out is done, return and in the check out part of the day, you will be able to view the invoice(clicked in it will display the invoice and on another click will be able to see the extras ant the total of each one) </li>
                                </ul>
                                <li> <b>Customers</b> </li>
                                <ul>
                                    <li> <b>Select:</b> Show all the customers/users, there you will be able to update </li>
                                    <li> <b>Insert:</b> Insert a customer and all the information needed in the database </li>
                                    <li> <b>Update:</b> Update all the information of a customer(need to know the user_id to do it)</li>
                                </ul>
                                <li> <b>Reservations</b> </li>
                                <ul>
                                    <li> <b>Select:</b> Show all the reservation, there you will be able to update a reservation </li>
                                    <li> <b>Insert:</b> Show the room availability, will have to register/log in to reservate the room </li>
                                    <li> <b>Update:</b> Update a reservation, all the information will be shown, only change the data and "Submit" it </li>
                                </ul>
                                <li> <b>Tickets</b> </li>
                                <ul>
                                    <li> <b>Insert:</b> Insert tickets(all the extras go here), with the room number to insert them </li>
                                </ul>
                                <li> <b>Reserve now:</b> Show the room availability, will have to register/log in to reservate the room </li>
                                <li> <b>Log out:</b> Log out button, redirection to the home page </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#adminPage" aria-expanded="false" aria-controls="collapseTwo">
                            Admin Page
                        </button>
                    </h2>
                    <div id="adminPage" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong> Menu </strong>
                            <p></p>
                            <ul>
                                <li> <b>Home:</b> Home page </li>
                                <li> <b>Rooms</b> </li>
                                <ul>
                                    <li> <b>Select:</b> Show all the rooms of the hotel </li>
                                    <li> <b>Insert:</b> Insert a room </li>
                                    <li> <b>Update:</b> Update a room(need to know the room number) </li>
                                    <li> <b>Delete:</b> Delete a room from the database(need to know the room number and confirm the action) </li>
                                </ul>
                                <!-- <li> <b>Today</b> </li>
                                <ul>
                                    <li> <b>Check in:</b> </li>
                                    <li> <b>Check out:</b> </li>
                                </ul> -->
                                <li> <b>Customers</b> </li>
                                <ul>
                                    <li> <b>Select:</b> Select all customers(can update and delete) </li>
                                    <li> <b>Insert:</b> Insert a customer </li>
                                    <li> <b>Update:</b> Update and save a customer (need the customer id) </li>
                                    <li> <b>Delete:</b> Delete the customer from the database (need to know the customer id and confirm the action)</li>
                                </ul>
                                <li> <b>Reservations</b> </li>
                                <ul>
                                    <li> <b>Select:</b> Show all the reservations(can delete and update) </li>
                                    <li> <b>Insert:</b> Show the room availability, will have to register/log in to reservate the room </li>
                                    <li> <b>Update:</b> Update reservations(need the reservation number)</li>
                                    <li> <b>Delete:</b> Delete reservations(need the reservation number and the confirmation to delete it) </li>
                                </ul>
                                <li> <b>Tickets</b> </li>
                                <ul>
                                    <li> <b>Insert:</b> Insert tickets(buy services) by the room number </li>
                                </ul>
                                <li> <b>Reserve now:</b> Show the room availability, will have to register/log in to reservate the room </li>
                                <li> <b>Log out:</b> Log out button to log out, redirect to the home page </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


        <h4 id="login"> Log in </h4>
            <p> The user/customer will have the log in button always at the top right of the page, at the header, when it's clicked, the form will 
                be showed, it will ask for the username(almost always it's the email/gmail, if not specified previously) and the password.
                <!-- I would like in the future to da the 'Forgot password? ' question in case that the user forgets it -->
                <br>The log in button will only be displayed when the user is not logged in(is not an user nor worker nor admin)
            </p>
        
        
        <h4 id="logout"> Log out </h4>
        <p>...</p>
        <h4 id="home"> Home </h4>
        <p>...</p>
        <h4 id="header"> Header </h4>
        <p>...</p>
        <h4 id="footer"> Footer </h4>
        <p>...</p>
        </div>



    </div> 


<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php')?>