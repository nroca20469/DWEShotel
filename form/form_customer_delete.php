<!DOCTYPE html>
<html lang="en">
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/header.php')?>

    <div class="container-fluid pt-4">
        <div class="text-center">
                <h2>Delete a Customer</h2>
                <p class="lead">or do you wanna change the status?</p>
        </div>
        <div class="row justify-content-center my-5">
            <form class="col-lg-6 mb-3" action="http://localhost/student045/dwes/db/db_customer_delete.php" method="POST">
                <div class="mb-3">
                    <label for="customerID" class="form-label">Customer ID</label>
                    <input type="text" class="form-control" id="customerID" name="customerID">
                </div>
                <div class="d-grid gap-2 col-4 mx-auto m-2">
                    <div class="btn-group">
                        <a href="http://localhost/student045/dwes/db/db_customer_delete.php">
                            <button class="btn btn-secondary m-2" type="submit"> Submit </button>
                        </a>    
                    </div>   
                </div>
            </form>
        </div>
    </div>
<!--
</div>
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
                 Falta el boton de revisar si esta seguro 
            </div>
        </div>
    </div>
</div>-->


<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php')?>
    
</html>