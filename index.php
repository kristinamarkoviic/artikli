<?php

    @ob_start();
    @session_start();

    include "config/connection.php";
    include "views/fixed/head.php";
    include "views/fixed/nav.php";

    if(isset($_GET['page'])){
        switch($_GET['page']){
            case 'home':
                include "views/pages/home.php";
            break;
            case 'createArticle':
                include "views/pages/createArticle.php";
            break;
        }
    }
    else {
        include "views/pages/home.php";
    }

    include "views/fixed/footer.php"
?>