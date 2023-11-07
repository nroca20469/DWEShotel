<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/header.php') ?>

<?php

    session_destroy();

    if(empty(session_id())){
        echo "<script>location.href = 'http://localhost/student045/dwes/index.php?msg=$msg';</script>";
    } else {
        echo 'There was a problem, try again later';
    }
  
?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/student045/dwes/footer.php') ?>
