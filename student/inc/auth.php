
<?php 
    require_once '../app/dbConnection.php';

    if(!$_SESSION['user']) {
        header('location:./../');	
    }  
?>

