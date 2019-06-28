<?php
session_start();
@ob_start();
if(isset($_SESSION['user'])){
    
    unset($_SESSION['user']);
    session_destroy();

    header("Location:../../index.php");
}
else {
    header("Location:../../index.php");
}
?>