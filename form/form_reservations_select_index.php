<div class="container-lg">
    <div class="text-center">
                <h2>Do you wanna come?</h2>
                <p class="lead">Tell us when are you willing to come</p>
            </div>
        <div class="row justify-content-center my-5">
            <form class="col-lg-6 mb-3" action="http://localhost/student045/dwes/db/db_reservation_select_availables.php" method="POST">
                <div class="mb-3">
                    <label for="dateIn" class="form-label">Date in</label>
                    <input type="date" class="form-control" id="dateIn" name="dateIn">
                </div>
                <div class="mb-3">
                    <label for="dateOut" class="form-label">Date out</label>
                    <input type="date" class="form-control" id="dateOut" name="dateOut">
                </div> 
                <div class="d-grid gap-2 col-4 mx-auto m-2">
                    <button class="btn btn-secondary" type="submit" name="submit"> Submit </button>
                </div>
            </form> 
        </div>
    </div>
</div>
    

  