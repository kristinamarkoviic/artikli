<?php
    
    header("Content-Type:applicaton/json");
    if(isset($_POST['id'])){
        try {
            $idArticle = $_POST['id'];
            include "../../config/connection.php";
            include "functions.php";
            $article = get_one($idArticle);
            echo json_encode($article);
            
            

        }
        catch(PDOException $ex){
            echo json_encode($ex->getMessage());
            http_response_code(500);
        }
    }
    else {
        http_response_code(400);
    }
    