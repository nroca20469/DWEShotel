<!-- Button trigger modal -->
<button type="button" class="btn btn-secondary ms-4" data-bs-toggle="modal" data-bs-target="#cancelReservation">
    Cancel
</button>

<!-- Modal -->
<div class="modal fade" id="cancelReservation" tabindex="-1" aria-labelledby="cancelReservationLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cancelReservationLabel">Are you sure? </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                Are you concient that by canceling tthis reservation, you will not longer own the days to come to our hotel?
            </div>

            <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                 <button type="submit" name="submit" class="btn btn-secondary" data-bs-dismiss="modal">I'm sure</button>  
            </div>
        </div>
    </div>
</div>
