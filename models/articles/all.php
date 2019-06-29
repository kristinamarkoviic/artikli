<?php
    header("Content-Type: applicaton/json");

    try {
        include "../../config/connection.php";
        include "functions.php";
        $all = all();
        echo json_encode($all);
    }
    catch(PDOException $ex){
        echo json_encode($ex->getMessage());
        http_response_code(500);
    }
?>
    
    