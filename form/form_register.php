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
                    <label for="email" class="form-label">Email</label>
                    <input type="text" cass="form-control" name="email" placeholder="example@email.com" >
                </div> 
                <form action="#" method="POST" name="form">
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" cass="form-control" name="password" placeholder="********" id="password" value="********x">
                    </div> 
                    <div class="mb-3">
                        <label for="repeatPassword" class="form-label">Repeat Password</label>
                        <input type="text" cass="form-control" name="repeatPassword" id="repeatPassword" placeholder="********" >
                    </div>
                    <button href="#" type="button" onclick="comprovarClave(form);"> Comprovar </button>
                </form>
                <script type="text/JavaScript"> 
                    function comprovarClave(form){
                        let password1 = form.password.value;
                        console.log(password1);
                        let password2 = form.repeatPassword.value;
                        console.log(password2);
                        var comprovar;
                        var comentario;
                        if(password1 != "********" && password1 === password2) {
                            comentario = ("Las dos contraseñas son iguales");
                            window.location.href = window.location.href + "comprovar" + 1 + "comentario" + comentario;  //Funciona con el get, mirar como arreglarlo, pq me dirige a una pagina q no existe, aunque sea la misma 
                        } else {
                            comentario = ("Comprueba nuevamente las contraseñas"); 
                            window.location.href = window.location.href + "comprovar" + 0 + "comentario" + comentario;
                        }
                        
                    }
                </script>
                <?php
                if(isset($_GET['comprovar'])){
                     $comprovar = $_GET['comprovar'];

                } else {
                    $comprovar = 0;
                }

                if(isset($_GET['comentario'])){
                    $comentario = $_GET['comentario'];
                    echo "<label class=\"form-label\">$comentario</label>";
                } 
                echo $comprovar;
                

                ?>
                
    
                    <!-- <button type="button" href="#" onclick="<?php // $comprobacio = "<script> comprovarClave(); </script>" ?> "> Comprovar </button> 
            --></div> 
                <div class="mb-3">
                    <label for="roomStatus" class="form-label">Room Status</label>
                </div> 
                <div class="d-grid gap-2 col-4 mx-auto m-2">
                    <?php 
                    echo $comprovar;
                    if($comprovar == 1) {
                        echo "<button class=\"btn btn-secondary\" type=\"submit\" name=\"submit\"> Submit </button>";
                    } else {
                        echo "<button class=\"btn btn-secondary\" type=\"submit\" name=\"submit\" disabled> Submit </button>";
                    } ?>
                    
                </div>
                
    </div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php')?>
