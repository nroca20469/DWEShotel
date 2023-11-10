b
<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/header.php')?>

    <?PHP 
     //NOM 
     //EMAIL
     //CONTRASEÑA(S)
     //
    ?>

<div class="container-lg">
    <div class="text-center">
        <h2>Register</h2>
        <p class="lead">Wecome to our hotel</p>
    </div>
        
    <div class="row justify-content-center my-5">
        <form class="col-lg-6 mb-3" action="http://localhost/student045/dwes/db/db_customer_insert_register.php" method="POST" name="formulario" id="formulario">

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" placeholder="name" >
            </div>

            <div class="mb-3">
                <label for="surname" class="form-label">Surname</label>
                <input type="text" class="form-control" name="surname" placeholder="surname">
            </div> 

            <div class="mb-3">
                <label for="phoneNumber" class="form-label">Phone Number</label>
                <input type="text" class="form-control" name="phoneNumber" placeholder="XXX XX XX XX" >
            </div> 

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" placeholder="example@email.com" >
            </div> 

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="text" class="form-control" name="password" placeholder="********" id="password">
            </div> 
            
            <div class="mb-3">
                <label for="repeatPassword" class="form-label">Repeat Password</label>
                <input type="text" class="form-control" name="repeatPassword" id="repeatPassword" placeholder="********" >
            </div>

            <div class="mb-3">
                <label for="dni" class="form-label">NIF/DNI</label>
                <input type="text" class="form-control" name="dni" placeholder="xxxxxxxA" >
            </div> 

            <div class="d-grid gap-2 col-4 mx-auto m-2">
                <button class="btn btn-secondary" type="submit" name="submit"> Submit </button>
            </div>
        </form>        
    </div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php')?>
