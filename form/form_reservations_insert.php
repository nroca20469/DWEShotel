<form class="mb-3 text-end" action="/student045/dwes/db/db_reservations_insert.php" method="POST" id="bookRomms">
    <div class="mb-3 d-none">
        <label for="dateIn" class="form-label">Date in</label>
        <input type="date" class="form-control" id="dateIn" name="dateIn" value="<?php echo $date_in; ?>"> 
            <?php echo $date_in; ?> 
        </input>
    </div>
    <div class="mb-3 d-none">
        <label for="dateOut" class="form-label">Date out</label>
        <input type="date" class="form-control" id="dateOut" name="dateOut" value="<?php echo $date_out; ?>">
    </div> 
    <div class="mb-3 d-none">
        <label for="roomNum" class="form-label">Room number</label>
        <input type="number" class="form-control" id="roomNum" name="roomNum" value="<?php echo $room_num; ?>">
    </div> 
    <div class="mb-3 d-none">
        <label for="roomPrice" class="form-label">Date in</label>
        <input type="number" class="form-control" step="0.01" id="roomPrice" name="roomPrice" value="<?php echo $room_price; ?>"> 
    </div>
    <button class="btn btn-secondary" type="submit" name="submit">Book</button>
</form>
<!--
<form class="mb-3" action="/student045/dwes/db/db_reservations_insert.php" method="POST">
    <div class="mb-3 d-none">
        <label for="dateIn" class="form-label">Date in</label>
        <input type="date" class="form-control" id="dateIn" name="dateIn" value="<?php // echo $date_in; ?>"> 
            <?php // echo $date_in; ?> 
        </input>
    </div>
    <div class="mb-3 d-none">
        <label for="dateOut" class="form-label">Date in</label>
        <input type="date" class="form-control" id="dateOut" name="dateOut" value="<?php // echo $date_out; ?>"> 
            <?php // echo $date_out; ?> 
        </input>
    </div> 
    <div class="mb-3 d-none">
        <label for="roomNum" class="form-label">Date in</label>
        <input type="number" class="form-control" id="roomNum" name="roomNum" value="<?php // echo $room_num; ?>"> 
            <?php // echo $room_num; ?> 
        </input>
    </div> 
    <div class="mb-3 d-none">
        <label for="roomPrice" class="form-label">Date in</label>
        <input type="number" class="form-control" step="0.01" id="roomPrice" name="roomPrice" value="<?php // echo $room_price; ?>"> 
            <?php // echo $room_price; ?> 
        </input>
    </div>
    <div class="pull-right">
        <a href=\"/student045/dwes/form/form_reservations_insert.php\" class=\"pull-right\">
        <button class="btn btn-primary btn-lg" type="submit" name="submit">Book</button>
</a>
    </div>
</form>

-->