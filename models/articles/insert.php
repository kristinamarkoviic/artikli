<?php
        
        session_start();
        header("Content-Type:applicaton/json");
        
        $idUser= $_POST['hidnUser'];
        $title = $_POST['title'];
        $desc = $_POST['desc'];
        $date = $_POST['date'];

        $fajl=$_FILES['cover'];
        
        $size=$fajl['size'];
        $tip=$fajl['type'];
        $size=$fajl['size'];
        $tmp=$fajl['tmp_name'];
        $name=$fajl['name'];

        $greske=[];
        

        $maxVelicina=3;

        if($size > $maxVelicina *1024*1024){
            $greske[]="Prekoracili ste maksimalnu velicinu fajla, ne preko 3MB";
        }

        $dozvoljeniTipovi=["image/jpeg","image/jpg","image/png"];
        if(!in_array($tip,$dozvoljeniTipovi)){
            $greske[]="Pogresan tip fajla";
        }
        if(empty($title)){
            $greske[]="Title je obavezan";
        }
        if(empty($desc)){
            $greske[]="Description je obavezan";
        }
        if(empty($date)){
            $greske[]="Date je obavezan";
        }

        if(count($greske) == 0){

            //prvo dimenzije za novu sliku da definisemo

            $dimenzije=getimagesize($tmp);
            $sirina=$dimenzije[0];
            $visina=$dimenzije[1];

            //proporcionalno sad

            $novaSirina=200;
            $novaVisina=200;

            //nova slika

            $novaSlika=imagecreatetruecolor($novaSirina,$novaVisina);

            // postojeca slika

            $postojecaSlika=null;
            switch($tip){
                case "image/jpeg":
                case "image/jpg":
                $postojecaSlika=imagecreatefromjpeg($tmp);
                break;
                case "image/png":
                $postojecaSlika=imagecreatefrompng($tmp);
                break;
            }

            //RESIZE 
            imagecopyresampled($novaSlika,$postojecaSlika,0,0,0,0,$novaSirina,$novaVisina,$sirina,$visina);

            

            //upload nove slike

            // pravimo nov naziv

            $naziv=time().$name;
            $new_cover='assets/images/articles/nova_'.$naziv;

            switch($tip){
                case "image/jpeg":
                case "image/jpg":
                imagejpeg($novaSlika,'../../'.$new_cover,75);
                break;
                case "image/png":
                imagepng($novaSlika,'../../'.$new_cover);
                break;
            }

            $original_cover='assets/images/articles'.$naziv;

            //glavna funkcija move_uploaded_file ($tmp, 2arg je GDE '../../$putanjaOriginalnaSlika');

            //premestanje za tmp file na nas server  one originalne slike

            if(move_uploaded_file($tmp,'../../'.$original_cover)){
                echo json_encode("Uspeh");
                

                try {
                    include "../../config/connection.php";
                    include "functions.php";
                    $unos = insert($title,$desc,$date,$original_cover,$new_cover,$idUser);
                    
                    http_response_code(201);
                    

                }
                catch(PDOException $ex ){
                    echo json_encode($ex->getMessage());
                    http_response_code(500);
                }
            }

            imagedestroy($postojecaSlika);
            imagedestroy($novaSlika);


        }
        else {
            http_response_code(400);
        }

        
         

