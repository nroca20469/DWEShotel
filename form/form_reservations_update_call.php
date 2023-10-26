<!DOCTYPE html>
<html lang="en">
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/header.php')?>
    <div class="container-fluid pt-4">
        <div class="text-center">
                <h2>Update a Reservation</h2>
        </div>
        <div class="row justify-content-center my-5">
            <form class="col-lg-6 mb-3" action="http://localhost/student045/dwes/form/form_reservations_update.php" method="POST">
                <div class="mb-3">
                    <label for="reservationNumber" class="form-label">Reservation Number</label>
                    <input type="number" min="0" class="form-control" id="reservationNumber" name="reservationNumber">   
                </div>
                <div class="d-grid gap-2 col-4 mx-auto m-2">
                        <button class="btn btn-secondary" type="submit">
                            Update Reservation
                        </button>
                </div>
            </form>
        </div>
    </div>
    
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php')?>
    
</html>