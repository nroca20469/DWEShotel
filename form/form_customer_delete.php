<!-- Button trigger modal -->
<button type="button" class="btn btn-secondary ms-4" data-bs-toggle="modal" data-bs-target="#deleteCustomer">
    Delete
</button>

<!-- Modal -->
<div class="modal fade" id="deleteCustomer" tabindex="-1" aria-labelledby="deletCustomerLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deletCustomerLabel">Delete Room</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="mb-3" action="http://localhost/student045/dwes/form/form_customer_delete_sure.php" method="POST" id="deleteCustomer">
                    <div class="mb-3">
                        <label for="customerSurename" class="form-label">Customer Surename</label>
                        <input type="text" class="form-control" id="customerSurename" name="customerSurename">
                    </div>
                    <div class="mb-3">
                        <label for="customerLastname" class="form-label">Cusotmer Lastname</label>
                        <input type="text" class="form-control" id="customerLastname" name="customerLastname">
                    </div> 
                    <div class="mb-3">
                        <label for="customerDNI" class="form-label">Cusotmer DNI</label>
                        <input type="text" class="form-control" id="customerDNI" name="customerDNI">
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