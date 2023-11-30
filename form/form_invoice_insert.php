<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/header.php')?>

<div class="container-lg">
    <div class="text-center">
        <h2>Create invoice</h2>
        <p class="lead">Please tell us the reservation number</p>
    </div>
    <div class="row justify-content-center my-5">
        <form class="col-lg-6 mb-3" action="/student045/dwes/db/db_invoice_insert.php" method="POST">
            <div class="mb-3">
                <label for="reservationNum" class="form-label">Reservation Number</label>
                <input type="number" class="form-control" id="reservationNum" name="reservationNum">
            </div>
            <div class="d-grid gap-2 col-4 mx-auto m-2">
                <button class="btn btn-secondary" type="submit" name="submit"> See invoice </button>
            </div>
        </form> 
    </div>
</div>
    

  

<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php')?>