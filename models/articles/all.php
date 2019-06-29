<?php
    session_start();
    header("Content-Type: applicaton/json");

    try {
        include "../../config/connection.php";
        include "functions.php";
        $idUser = $_SESSION['user_id'];
        $all = all_articles($idUser);
        echo json_encode($all);
    }
    catch(PDOException $ex){
        echo json_encode($ex->getMessage());
        http_response_code(500);
    }
?>
    
    