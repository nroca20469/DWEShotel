<!-- Button trigger modal -->
<button type="button" class="btn btn-secondary ms-4" data-bs-toggle="modal" data-bs-target="#deleteRoom">
    Delete
</button>

<!-- Modal -->
<div class="modal fade" id="deleteRoom" tabindex="-1" aria-labelledby="deleteRoomLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteRoomLabel">Delete Room</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="mb-3" action="http://localhost/student045/dwes/form/form_room_delete_sure.php" method="POST" id="deleteRoom">
                    <div class="mb-3">
                        <label for="roomNumber" class="form-label">Room Number</label>
                        <input type="number" class="form-control" id="roomNumber" name="roomNumber"> </input>
                    </div>
                    <div class="mb-3">
                        <label for="roomType" class="form-label">Room Type</label>
                        <select class="form-select" aria-label="Room Type"  name="roomType" id="roomType" type="select">
                            <option selected value=""> <- Choose a room type -> </option>
                            <option value="single"> Single </option>
                            <option value="double"> Double </option>
                            <option value="suite"> Suite </option>
                        </select>
                    </div> 
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/form/form_room_delete_sure.php')?> <!-- revisar -->
            </div>
        </div>
    </div>
</div>