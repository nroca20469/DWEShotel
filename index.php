<!DOCTYPE html>
<html lang="en">
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/header.php')?>

    <!-- Information about the hotel -->      <!-- It needs to end and put images -->
    <div class="container-lg py-5">
        <div class="row justify-content-center align-items-center minh-100">
            <div class="col-md-6 order-1 align-self-center text-align-center">
                <!-- img src="img/hotelPrinc.jpg" class="img-fluid rounded mx-auto d-block" alt="" width="75%" height="75%" /> -->
                <!--<div class="span offset" style="float: left; text-align: center">
                     
                </div> -->

                <div id="carruselImagenesHotel" class="carousel slide" data-bs-ride="true">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carruselImagenesHotel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carruselImagenesHotel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carruselImagenesHotel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carruselImagenesHotel" data-bs-slide-to="3" aria-label="Slide 4"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="img/hotelPrinc.jpg" class="d-block w-100" width="75%" height="75%" >
                        </div>
                        <div class="carousel-item">
                            <img src="img/hotelPrinc2.jpg" class="d-block w-100" width="75%" height="75%">
                        </div>
                        <div class="carousel-item">
                            <img src="img/hotelPrinc3.jpg" class="d-block w-100" width="75%" height="75%">
                        </div>
                        <div class="carousel-item">
                            <img src="img/hotelPrinc4.jpg" class="d-block w-100" width="75%" height="75%">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carruselImagenesHotel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carruselImagenesHotel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Siguiente</span>
                    </button>
                </div>
            </div>
            <div class="col-md-6 order-2">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="p-5 bg-warning m-2 rounded border border-2">
                                <h1 class="display-6">Ubicacion</h1>
                                <p>El hotel mejor situado de Marbella, en pleno casco histórico, a solo 250 metros de la playa.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                        <div class="p-5 bg-warning m-2 rounded border border-2">
                            <h1 class="display-6">Servicio</h1>
                            <p>Dispone de 40 habitaciones perfectamente equipadas y renovadas recientemente. Ofrece vistas 
                                excelentes y conexión Wi-fi gratuita. El hotel cuenta también de servicio de parking muy 
                                cercano al hotel para facilitar su estancia
                            </p>
                        </div>
                        </div>
                        <div class="carousel-item">
                            <div class="p-5 bg-success m-2 rounded-pill border border-2 text-light">
                                <h1 class="display-6">Location</h1>
                                <p>The best located hotel in Marbella, in the historic center, just 250 meters from the beach.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="p-5 bg-success m-2 rounded-pill border border-2 text-light">
                                <h1 class="display-6 text-center">Service</h1>
                                <p class="text-center">It has 40 perfectly equipped and recently renovated rooms. It offers excellent views and 
                                    free Wi-Fi. The hotel also has a parking service very close to the hotel to facilitate your 
                                    stay.
                                </p>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
            


        </div>
    </div>

    <?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/form/form_reservations_select_index.php')?>

    <?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php')?>
    
</html>