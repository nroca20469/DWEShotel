<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Marbella</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <style>
        .minh-100 {
            height: 100%;
        }
    </style>
</head>
<!-- Hi -->
<body>
    <!-- Left part of the navbar -->
    <nav class="navbar navbar-expand-md navbar-light">
        <div class="container-xxl">
            <a href="http://localhost/student045/dwes/index.php" class="navbar-brand">
                <span class="fw-bold secondary-color">
                        Hotel Marbella la Bella
                </span>
            </a>
            
            <!--Toggle button for mobile nav-->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav" aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                
            <!-- navbar links -->
            <div class="collapse navbar-collapse justify-content-end align-center" id="main-nav">
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/student045/dwes/">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Rooms
                    </a>
                    <ul class="dropdown-menu">
                        <li><?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/form/form_room_select.php')?></li>
                        <li><a class="dropdown-item" href="http://localhost/student045/dwes/form/form_room_insert.php">Insert</a></li>
                        <li><a class="dropdown-item" href="http://localhost/student045/dwes/form/form_room_update_call.php">Update</a></li>
                        <li><a class="dropdown-item" href="http://localhost/student045/dwes/form/form_room_delete_call.php">Delete</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Customers
                    </a>
                    <ul class="dropdown-menu">
                        <li><?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/form/form_customer_select.php')?></li>
                        <li><a class="dropdown-item" href="http://localhost/student045/dwes/form/form_customer_insert.php">Insert</a></li>
                        <li><a class="dropdown-item" href="http://localhost/student045/dwes/form/form_customer_update_call.php">Update</a></li>
                        <li><a class="dropdown-item" href="http://localhost/student045/dwes/form/form_customer_delete.php">Delete</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Reservations
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="http://localhost/student045/dwes/db/db_reservations_select.php">Select</a></li>
                        <li><a class="dropdown-item" href="http://localhost/student045/dwes/form/form_reservations_insert.php">Insert</a></li>
                        <li><a class="dropdown-item" href="http://localhost/student045/dwes/form/form_reservations_update_call.php">Update</a></li>
                        <li><a class="dropdown-item" href="http://localhost/student045/dwes/form/form_reservations_delete_call.php">Delete</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/student045/dwes/form/form_reservation_select.php">Reserve now</a>
                </li>
                <li class="nav-item ms-2 d-none d-md-inline">
                    <a class="btn btn-secondary" href="http://localhost/student045/dwes/form/form_login.php">Log in</a>
                </li> 
                
                </ul>
            </div>
        </div>

    </nav>