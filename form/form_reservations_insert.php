
<!-- Button trigger modal -->
<div class="pull-right">
    <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#bookRoom">
        Book
    </button>
</div>
<!-- Modal -->
<div class="modal fade" id="bookRoom" tabindex="-1" aria-labelledby="bookRoomLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookRoomLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="mb-3" action="http://localhost/student045/dwes/db/db_reservations_insert.php" method="POST" id="bookRomms">
                    <div class="mb-3 d-none">
                        <label for="dateIn" class="form-label">Date in</label>
                        <input type="date" class="form-control" id="dateIn" name="dateIn" value="<?php echo $date_in; ?>"> 
                            <?php echo $date_in; ?> 
                        </input>
                    </div>
                    <div class="mb-3 d-none">
                        <label for="dateOut" class="form-label">Date out</label>
                        <input type="date" class="form-control" id="dateOut" name="dateOut" value="<?php echo $date_out; ?>"> 
                            <?php echo $date_out; ?> 
                        </input>
                    </div> 
                    <div class="mb-3 d-none">
                        <label for="roomNum" class="form-label">Room number</label>
                        <input type="number" class="form-control" id="roomNum" name="roomNum" value="<?php echo $room_num; ?>"> 
                            <?php echo $room_num; ?> 
                        </input>
                    </div> 
                    <div class="mb-3 d-none">
                        <label for="roomPrice" class="form-label">Date in</label>
                        <input type="number" class="form-control" step="0.01" id="roomPrice" name="roomPrice" value="<?php echo $room_price; ?>"> 
                            <?php echo $room_price; ?> 
                        </input>
                    </div>
                    <div class="mb-3">
                        <label for="customerName" class="form-label">Surename</label>
                        <input type="text" class="form-control" id="surename" name="surename"> 
                    </div>
                    <div class="mb-3">
                        <label for="lastName" class="form-label">Lastname</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" >
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="http://localhost/student045/dwes/db/db_reservations_insert.php" class="pull-right" >
                    <button class="btn btn-primary" type="submit" name="submit" form="bookRomms">Book</button>
                </a>
                
            </div>
        </div>
    </div>
</div>

<!--
<form class="mb-3" action="http://localhost/student045/dwes/db/db_reservations_insert.php" method="POST">
    <div class="mb-3 d-none">
        <label for="dateIn" class="form-label">Date in</label>
        <input type="date" class="form-control" id="dateIn" name="dateIn" value="<?php echo $date_in; ?>"> 
            <?php echo $date_in; ?> 
        </input>
    </div>
    <div class="mb-3 d-none">
        <label for="dateOut" class="form-label">Date in</label>
        <input type="date" class="form-control" id="dateOut" name="dateOut" value="<?php echo $date_out; ?>"> 
            <?php echo $date_out; ?> 
        </input>
    </div> 
    <div class="mb-3 d-none">
        <label for="roomNum" class="form-label">Date in</label>
        <input type="number" class="form-control" id="roomNum" name="roomNum" value="<?php echo $room_num; ?>"> 
            <?php echo $room_num; ?> 
        </input>
    </div> 
    <div class="mb-3 d-none">
        <label for="roomPrice" class="form-label">Date in</label>
        <input type="number" class="form-control" step="0.01" id="roomPrice" name="roomPrice" value="<?php echo $room_price; ?>"> 
            <?php echo $room_price; ?> 
        </input>
    </div>
    <div class="pull-right">
        <a href=\"http://localhost/student045/dwes/form/form_reservations_insert.php\" class=\"pull-right\">
        <button class="btn btn-primary btn-lg" type="submit" name="submit">Book</button>
</a>
    </div>
</form>

-->