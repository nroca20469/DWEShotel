
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/header.php')?>

<!-- room_number, room_category(despolegable), room_status, room_State, room_price, description -->
        <div class="container-lg">
            <div class="text-center">
                  <h2>Insert a room</h2>
            </div>
            <div class="row justify-content-center my-5">
            <form class="col-lg-6 mb-3" action="http://localhost/student045/dwes/db/db_room_insert.php" method="POST">
                <div class="mb-3">
                    <label for="roomNum" class="form-label">Room Number</label>
                    <input type="numeric" class="form-control" id="roomNum" name="roomNum" placeholder="xyy (where x is the floor and yy from 1-10)">
                </div>
                <div class="mb-3">
                    <label for="roomPrice" class="form-label">Price per night</label>
                    <input type="numeric" class="form-control" id="roomPrice" name="roomPrice" placeholder="xxx.xx">
                </div> 
                <div class="mb-3">
                    <label for="roomType" class="form-label">Type</label>
                    <select class="form-select" aria-label="Room Type"  name="roomType" id="roomType" type="select">
                        <option selected value=""> <- Choose a room type -> </option>
                        <option value="single"> Single </option>
                        <option value="double"> Double </option>
                        <option value="suite"> Suite </option>
                    </select>
                </div> 
                <div class="mb-3">
                    <label for="roomStatus" class="form-label">Room Status</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="roomStatus" value="1" name="roomStatus">
                            <label class="form-check-label" for="roomStatus">Open to clients</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="roomStatus" value="0" name="roomStatus">
                            <label class="form-check-label" for="roomStatus">Closed to clients</label>
                        </div>
                    </div>
                </div> 
                <div class="mb-3">
                    <label for="roomState" class="form-label"> Room State </label>
                    <select class="form-select" aria-label="Default select example" id="roomState" name="roomState">
                        <option selected value=""> Open select menu </option>
                        <option value="dirty"> Dirty </option>
                        <option value="clean"> Clean </option>
                        <option value="maintenance"> Maintenance </option>
                    </select>
                </div>  
                <div class="mb-3">  
                    <label for="bedType" class="form-label">Bed Type</label>
                    <select class="form-select" aria-label="Default select example" id="bedType" name="bedType">
                        <option selected value="">Select</option>
                        <option value="1">Single</option>
                        <option value="2">Double</option>
                    </select>
                </div>

                <div class="d-grid gap-2 col-4 mx-auto m-2">
                    <button class="btn btn-secondary" type="submit" name="submit"> Submit </button>
                </div>
                
        </div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php')?>
    