<?php
    header("Content-Type: applicaton/json");
    if(isset($_POST['idArticle'])){
        try{
            $idArticle = $_POST['idArticle'];
            include "../../config/connection.php";
            include "functions.php";
            $delete = delete_article($idArticle);
            http_response_code(204);

        }
        catch(PDOException $ex){
            http_response_code(500);
            echo json_encode($ex->getMessage());
        }
    }
    else {
        http_response_code(400);
    }
    