    <footer class="mt-3 px-5 fixed-bottom bg-white">
       <!-- <a href="#" class="navbar-brand">
            <div>
                <span class="fw-bold secondary-color">
                Contact
            </span>
            <?php //if($role == "anonymous"){ ?>


                <div class="containter d-block d-lg-none">
                    <div class="row">
                        <div class="col text-end">
                            <a href="/student045/dwes/form/form_login.php"><button class="btn btn-secondary pe-2">Log In</button></a>
                            <a href="/student045/dwes/form/form_register.php"><button class="btn btn-secondary">Register</button></a>                
                        </div>
                    </div>  
                </div>

            <?php //}else { ?>
                <span class="text-end d-block d-lg-none">
                    <a href="/student045/dwes/db/db_logout  .php"><button class="btn btn-secondary pe-2">Log Out</button></a>              
                </span>
            <?php //} ?> -->

            </div>
            <nav class="navbar">
                 <div class="container-xxl"> 
                    <span class="fw-bold">
                        <a href="/student045/dwes/contact.php" class="text-dark link-underline link-underline-opacity-0">
                            Contact
                        </a>
                    </span>
                    <div class="justify-content-end align-center" id="nav">
                        <?php if($role == "anonymous") { ?>
                            <span class="fw-thin secondary-color d-lg-none">
                                <a href="/student045/dwes/form/form_login.php"><button class="btn btn-secondary pe-2">Log In</button></a>
                                <a href="/student045/dwes/form/form_register.php"><button class="btn btn-secondary">Register</button></a>                
                            </span>
                        <?php } else { ?>
                            <span class="fw-thin secondary-color d-lg-none">
                                <a href="/student045/dwes/db/db_logout.php" class="text-secondary link-underline link-underline-opacity-0">Log Out</a> 
                            </span>
                        <?php } ?>
                    </div>
                 </div>
            </nav>
        
        

    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>