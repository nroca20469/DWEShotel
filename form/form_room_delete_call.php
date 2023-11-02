
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/header.php')?>

    <div class="container-lg">
            <div class="text-center">
                  <h2>Insert a room</h2>
            </div>
            <div class="row justify-content-center my-5">
                <form class="col-lg-6 mb-3" action="http://localhost/student045/dwes/db/db_room_delete.php" method="POST">
                    <div class="mb-3">
                        <h5>Delete Room</h5>
                        <div class="mb-3">
                            <label for="roomNumber" class="form-label">Room Number</label>
                            <input type="number" class="form-control" id="roomNumber" name="roomNumber"> </input>
                        </div>
                    </div>
                    <?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/form/form_room_delete.php')?> 
                </form>
            </div>
    </div>



    <?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php')?>

