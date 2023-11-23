<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/header.php')?>
<?php 

    include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/db/connect_db.php');

    $sql = "SELECT * FROM 045_services;";
    $result = mysqli_query($conn, $sql);
    $services = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
<div class="container-lg">
    <div class="text-center">
        <h2>New Ticket</h2>
        <p class="lead">Select the service, please.</p>
    </div>
    <div class="row justify-content-center my-5">
        <form class="col-lg-6 mb-3" action="/student045/dwes/db/db_ticket_insert.php" method="POST">
            <div class="mb-3">
                <label for="service" class="form-label">Service</label>
                <select class="form-select" id="service" aria-label="Service" name="service">
                    <option value="">Seleccione una opcion</option>
                    <?php
                        foreach($services as $service) {
                            echo "<option value=\"{$service['service_name']},{$service['price_per_hour']} \" > {$service['service_name']} </option>";
                        }
                    ?>
                </select> 
            </div>

            <div class="mb-3" id="persons">
                <label for="uds" class="form-label">Number of persons</label>
                <input type="number" class="form-control" value="1" name="uds" id="uds">
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Day</label>     
                <input type="datetime-local" class="form-control" name="date" value ="<?php echo date('Y-m-d H:i:s'); ?>" readonly>
            </div>
             
            <!-- PROVAR I MIRAR SI ES FACTIBLE -->

            <?php 
                $servicess = null;
                foreach($services as $service) {
                    if($service['service_name'] == 'bar') {
                        $service_description = $service['service_description'];
                    //    echo $service_description;
                     $servicess = json_decode($service_description);
                    } 
                }
                
            ?>
            <div class="mb-3" id="bar" style="display: none;">
                <label for="bar">Name</label>
                <select class="form-select mb-3" id="service" aria-label="Service" name="service">
                    <option value="">Seleccione una opcion</option>
                    
                    <?php 
                        foreach ($servicess as $service) {
                            foreach($service as $uni){
                                foreach($uni as $key=>$value) {
                                echo $key . ' ';
                                    if($key == 'name') {
                                        echo "<option value=\"{$value}\" > {$value} </option>";
                                    }
                                }
                            }
                        }
                    ?>
                </select>

                <label for="unidadBar" class="form-label">Units</label>
                <input type="number" class="form-control mb-3" name="unidadBar" id="unidadBar" value ="1">

                <label for="priceBar" class="form-label3">Price</label>
                <span class="form-control mb-" name="priceBar" id="priceBar"> 0.00 </span>
            </div>

            <div class="mb-4" id="priceHour">
                <label for="price" class="form-label">Price per hour</label>
                <span class="form-control" id="priceJS" name="price"> 0.00 </span>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label fw-bold">Total price: </label>
                <span id="totalPrice"> 0.00 </span>
            </div>

            <div class="mb-3 text-center">
                <button class="btn btn-secondary px-4" type="submit" name="submit">Crear ticket</button>
            </div>
        </form>
    </div>
</div>

<script src="/student045/dwes/js/scriptTicketInsert.js"></script>


<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php')?>