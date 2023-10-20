<!DOCTYPE html>
<html lang="en">
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/header.php')?>
    
    <div class="container-lg">
        <div class="text-center">
                <h2>New Customer</h2>
                <p class="lead">Insert all the data that we ask for, thank you</p>
            </div>
        <div class="row justify-content-center my-5">
            <form class="col-lg-6 mb-3" action="http://localhost/student045/dwes/db/db_customer_insert.php" method="POST">
                <div class="mb-3">
                    <label for="surname" class="form-label">Surname</label>
                    <input type="text" class="form-control" id="surname" name="surname">
                </div>
                <div class="mb-3">
                    <label for="lastname" class="form-label">Lastname</label>
                    <input type="text" class="form-control" id="lastname" name="lastname">
                </div> 
                <div class="mb-3">
                    <label for="customerDNI" class="form-label">Customer DNI</label>
                    <input type="text" class="form-control" id="customerDNI" name="customerDNI">
                </div> 
                <div class="mb-3">
                    <label for="customerEmail" class="form-label">Email</label>
                    <input type="text" class="form-control" id="customerEmail" name="customerEmail">
                </div> 
                <div class="mb-3">
                    <label for="customerNumberPhone" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" name="customerNumberPhone">
                </div>
                <div class="mb-3">
                    <label for="vip" class="form-label">VIP</label>
                    <select class="form-select" aria-label="Default select example" id="vip" name="vip">
                        <option selected value="">Select</option>
                        <option value="true">Yes</option>
                        <option value="false">No</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="problematic" class="form-label">Problematic</label>
                    <select class="form-select" aria-label="Default select example" id="problematic" name="problematic">
                        <option selected value="">Select</option>
                        <option value="true">Yes</option>
                        <option value="false">No</option>
                    </select>
                </div>
                <div class="d-grid gap-2 col-4 mx-auto m-2">
                    <button class="btn btn-secondary" type="submit" name="submit"> Insert </button>
                </div>
            </form>
        </div>
    </div>

    
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php')?>
</html>