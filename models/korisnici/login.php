<?php
  
    @session_start();
    
    if(isset($_POST['btnLog'])){
        header("Content-type: application/json");
        ob_start();
        require "../../config/connection.php";
        require "functions.php";
        
        $email = $_POST['emaillog'];
        $sifra = $_POST['passlog'];
    
        $rePassword="/(?=.*[a-z])(?=.*[0-9])(?=.{8,})/";
    
        $greske = [];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $greske[] = "Mail is not in good format!";
        }
        if(!$sifra){
            $greske[]="Password is a required field";
        }
        else if(!preg_match($rePassword,$sifra)){
            $greske[]="Password must contain only lowercase letters and numbers, atleast 8 characters long.";
        }
    
        if(count($greske) > 0){
            header("Location:../../indexxx.php");
        } else{
            $siframd5 = md5($sifra);
    
            try{
                $login = korisnikLogin($email, $siframd5);
    
                if($login->rowCount() == 1){
                    $user = $login->fetch();
                    $_SESSION['user_id'] = $user->idUser;
                    $_SESSION['user'] = $user;
                    header("Location:../../user.php");
                } 
    
                else{
                    echo json_encode(["Greska" => "Wrong Mail AND Password"]);
                    http_response_code(409);
                    header("Location:../../index.php");
                }
    
               
            } catch (PDOException $ex){
                http_response_code(500);
                echo json_encode(['Greska' => "Greska". $ex->getMessage()]);
                header("Location:../../index.php");
            }
        }
    } else{
        http_response_code(403);
        echo json_encode("Sta da radim sad!");
    }

?>