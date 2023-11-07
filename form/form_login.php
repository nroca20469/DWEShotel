<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/header.php')?>

    <div class="container-lg mt-4 pt-2">
    <div class="text-center">
                <h2>Do you wanna come?</h2>
                <p class="lead">Tell us when are you willing to come</p>
            </div>
        <div class="row justify-content-center my-4">
            <form class="col-lg-6 mb-3" action="http://localhost/student045/dwes/db/db_login.php" method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="example@gmail.com" pattern="{@}" title="Please put an @">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" class="form-control" id="password" name="password" placeholder="********">
                </div> 
                <div class="d-grid gap-2 col-4 mx-auto m-2">
                    <button class="btn btn-secondary" type="submit" name="submit"> Submit </button>
                </div>
            </form>

        </div>

        <div class="row  justify-content-center">
            <div class="col-lg-6 mb-3 text-center">
                <p>Are you still not registered?</p>
                <a href="/student045/dwes/form/form_register.php"><button class="btn btn-secondary">Register</button></a>
            </div>
            
        </div>
            

        
    </div>
</div>
    
<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php')?>