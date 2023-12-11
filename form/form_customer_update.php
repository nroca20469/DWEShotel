
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/header.php')?>

<?php 

//Create variables
$customer_id = $_POST['customerID'];
$customer_forename;
$customer_lastname;
$customer_email;
$customer_phone_number;
$customer_dni;
$customer_description;
$customer_status;
$boton_aviso;
$customer_img;

//Connectar a db
include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/db/connect_db.php');

//Query to select the customer
$query_customer = "SELECT *
FROM 045_users
WHERE customer_id = $customer_id";

$connect = mysqli_query($conn, $query_customer);
$result = mysqli_fetch_all($connect, MYSQLI_ASSOC);

if($connect->num_rows == 0){
    echo '<div class="container-lg">
            <div div class="text-center">
                <h5>No such customer is in the db</h5>
            </div>
        </div>';
} else {
    
    foreach ($result as $customer) {
    $customer_forename = $customer['customer_forename'];
    $customer_role = $customer['customer_role'];
    $customer_lastname = $customer['customer_lastname'];
    $customer_email = $customer['customer_email'];
    $customer_phone_number = $customer['customer_phone_number'];
    $customer_dni = $customer['customer_dni'];
    $customer_description = $customer['customer_description'];
    $customer_status = $customer['customer_status'];
    $customer_img = $customer['customer_image'];
    }
$customer_desciption_array = json_decode($customer_description);
$vip = $customer_desciption_array -> vip;
$problematic = $customer_desciption_array -> problematic;
//echo $customer_forename . ' ' . $customer_lastname . ' ' . $customer_email . ' ' . $customer_phone_number . ' ' .  $customer_dni . ' ' . $customer_description . ' ' . $vip . ' ' . $problematic;

?>
    
    <div class="container-lg">
        <div class="text-center">
            <h2>Update Customer</h2>
        </div>
        <div class="row justify-content-center my-5">
            <form class="col-lg-6 mb-3" action="/student045/dwes/db/db_customer_update.php" method="POST" id="bookRomms" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="customerID" class="form-label">Customer ID</label>
                    <input type="text" class="form-control" id="customerID" name="customerID" readonly value = <?php echo $customer_id; ?> >
                </div>
                <div class="mb-3">
                    <label for="customerForename" class="form-label">Forename</label>
                    <input type="text" class="form-control" id="customerForename" name="customerForename" value = <?php echo $customer_forename ?> >
                </div>
                <div class="mb-3">
                    <label for="lastname" class="form-label">Lastname</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" value = <?php echo $customer_lastname ?>>
                </div> 
                <div class="mb-3">
                    <label for="customerDNI" class="form-label">Customer DNI</label>
                    <input type="text" class="form-control" id="customerDNI" name="customerDNI" value = <?php echo $customer_dni ?>>
                </div> 
                <div class="mb-3">
                    <label for="customerEmail" class="form-label">Email</label>
                    <input type="text" class="form-control" id="customerEmail" name="customerEmail" value = <?php echo $customer_email ?>>
                </div> 
                <?php if($role == 'admin') { ?>
                <div class="mb-3">
                    <label for="customerRole" class="form-label">Customer Role</label>
                    <select class="form-select" aria-label="Default select example" name="customerRole">  
                    <?php if($customer_role == 'admin'){
                            echo "<option selected value=\"admin\">Admin</option>
                            <option value=\"worker\">Worker</option>
                            <option value=\"customer\">Customer</option>";
                        } else if($customer_role == 'worker'){
                            echo "<option value=\"customer\">Customer</option>
                            <option value=\"admin\">Admin</option>
                            <option value=\"worker\" selected>Worker</option>";
                        } else {
                            echo "<option value=\"customer\" selected>Customer</option>
                            <option value=\"admin\">Admin</option>
                            <option value=\"worker\">Worker</option>";
                        }
                    ?>
                    </select>   
                </div>
                <?php  } ?>
                <div class="mb-3">
                    <label for="customerNumberPhone" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" name="customerNumberPhone" value = <?php echo $customer_phone_number ?>>
                </div>
                
                <!-- Image -->
                <div class="mb-3">
                    <label for="customerImg" class="form-label">Image</label><br>
                    <?php if(!$customer_img) {
                        echo "<input type=\"file\" class=\"form-control\" name=\"customerImg\">";
                    } else {
                        echo '<div class="d-flex justify-content-center">';
                        echo '<img src="' . $customer_img . '" alt="customer_img"  name="img" width="150px">';
                        echo "<input type=\"file\" class=\"mt-4 ms-2 form-control\" name=\"customerImg\" style=\"height: 38px !important; width: 100% !important;\">";
                        echo '</div>';
                       
                    } 
                    ?>
                </div>

                <div class="mb-3">
                    <label for="customerStatus" class="form-label">Status</label>
                    <select class="form-select" aria-label="Default select example" name="customerStatus">
                        <?php 
                            if($customer_status == 1) {
                                echo "<option selected value=\"1\">Yes</option>
                                <option value=\"0\">No</option>"; 
                            }else if($customer_status == 0){
                                echo "<option selected value=\"0\">No</option>
                                <option value=\"1\">Yes</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="vip" class="form-label">VIP</label>
                    <select class="form-select" aria-label="Default select example" id="vip" name="vip">
                    <?php if($vip == 1){
                            echo "<option selected value=\"true\">Yes</option>
                            <option value=\"false\">No</option>";
                        } else if($vip == 0){
                            echo "<option selected value=\"false\">No</option>
                            <option value=\"true\">Yes</option>";
                        } else {
                            echo "<option selected value=\"\">Select an option</option>
                            <option value=\"false\">No</option>
                            <option value=\"true\">Yes</option>";
                        }
                    ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="problematic" class="form-label">Problematic</label>
                    <select class="form-select" aria-label="Default select example" id="problematic" name="problematic">
                        <?php if($problematic == 1){
                            echo "<option selected value=\"true\">Yes</option>
                            <option value=\"false\">No</option>";
                        } else if($problematic == 0){
                            echo "<option selected value=\"false\">No</option>
                            <option value=\"true\">Yes</option>";
                        } else {
                            echo "<option selected value=\"\">Select an option</option>
                            <option value=\"false\">No</option>
                            <option value=\"true\">Yes</option>";
                        }
                        ?>                    
                    </select>
                </div>
                <div class="d-grid gap-2 col-4 mx-auto m-2">
                    <button class="btn btn-secondary" type="submit" name="submit"> Update </button>
                </div>
            </form>
        </div>
    </div>

    <?php } ?>

    <?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php')?>
