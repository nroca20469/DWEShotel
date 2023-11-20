
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/header.php')?>

    <?php   
        //Get variables
        if(isset($_SESSION['customer_id'])) {
            $customer_id = $_SESSION['customer_id'];

            //Connect to db
                include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/db/connect_db.php');

            //SQL to chech if the customer exists 
                $sqlCustomers = "SELECT *
                FROM 045_users
                WHERE customer_id = $customer_id";
            
                $connectar = mysqli_query($conn, $sqlCustomers);
                $customers = mysqli_fetch_all($connectar, MYSQLI_ASSOC);
            
            //Fetch all the data
                echo '<div class="container">
                        <div class="ms-4">';
                foreach ($customers as $customer){
                    echo "<div class=\"text-center p-3 m-4\">";
                    echo ($customer['customer_id'] . ' ' . $customer['customer_forename'] . ' ' . $customer['customer_lastname'] . ' ' . $customer['customer_dni'] );
                    echo "<p> Ask the receptionist to update the profile </p>
                    <a href=\"/student045/dwes/index.php\"><button type=\"button\" class=\"btn btn-secondary me-2\"> Return home </button></a>"; 
                    echo "</div>";
                }
                echo '</div>
                </div>';

                mysqli_close($conn);
                mysqli_free_result($connectar);
        }
   ?>   


    <?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php')?>
