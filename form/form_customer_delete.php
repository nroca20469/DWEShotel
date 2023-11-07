<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/db/db_select_customer_id.php')?>

<!-- Button trigger modal -->
<button type="button" class="btn btn-secondary ms-4" data-bs-toggle="modal" data-bs-target="#deleteRoom">
    Delete
</button>

<!-- Modal -->
<div class="modal fade" id="deleteRoom" tabindex="-1" aria-labelledby="deleteRoomLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteRoomLabel">Are you sure? </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                Are you conscient that by deleting this customer it will be deleted from the database, this action will be impossible to undo
                Customer:  
                <?php echo "<p>$customers[0]['customer_id']    $customers[0]['forename']    $customers[0]['lastname']     $customers[0]['nif']</p>";  ?>
            </div>

            <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">I'm sure</button>  
            </div>
        </div>
    </div>
</div>
