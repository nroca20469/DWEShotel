
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
                $customer = mysqli_fetch_assoc($connectar);
            
            //Fetch all the data
                echo '<div class="container">
                        <div class="ms-4">';
                echo "<div class=\"text-center p-3 m-4\">";
                echo '<div class="text-center pb-4 pt-4">';
                if($customer['customer_image'] != null) {
                    echo '<img src="'. $customer['customer_image'] .'" alt="profile_picture" srcset="" width="200px"> ';
                } else {
                    echo '<img src="/student045/dwes/img/customers/standards.jpg" alt="profile_picture" srcset="" width="200px"> ';
                }
                    
                echo '</div>';
                echo '<div>
                    <p>Customer id: ' . $customer['customer_id'] . '</p>
                    <p>Name: ' . $customer['customer_forename'] . ' ' . $customer['customer_lastname'] . '</p>
                    <p> DNI: ' . $customer['customer_dni'] .'
                </div>';
                // echo ($customer['customer_id'] . ' ' . $customer['customer_forename'] . ' ' . $customer['customer_lastname'] . ' ' . $customer['customer_dni'] );
                echo "<p> Ask the receptionist to update the profile </p>
                <a href=\"/student045/dwes/index.php\"><button type=\"button\" class=\"btn btn-secondary me-2\"> Return home </button></a>"; 
                echo "</div>";
                
                echo '</div>
                </div>';

                mysqli_close($conn);
                mysqli_free_result($connectar);
        }
   ?>   


    <?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php')?>
