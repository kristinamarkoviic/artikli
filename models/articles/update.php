<?php
    if(isset($_POST['btnUpdateArticle'])){
        
        $title=$_POST['titleA'];
        $desc=$_POST['descA'];
        $date=$_POST['dateA'];
        $idArticle=$_POST['hidnUpdate'];
        // now pictures
        
            $extension=array("jpeg","jpg","png","gif");
            foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name)
                {
                $file_name = $_FILES["files"]["name"][$key];
                $file_tmp = $_FILES["files"]["tmp_name"][$key];
                $ext = pathinfo($file_name,PATHINFO_EXTENSION);
                if(in_array($ext,$extension))
                {
                    if(!file_exists("photo_gallery/".$txtGalleryName."/".$file_name))
                    {
                        move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"photo_gallery/".$txtGalleryName."/".$file_name);
                    }
                    else
                    {
                        $filename=basename($file_name,$ext);
                        $newFileName=$filename.time().".".$ext;
                        move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"photo_gallery/".$txtGalleryName."/".$newFileName);
                    }
                }
                else
                {
                    array_push($errors,"$file_name, ");
                }
            }


        $errors=[];
        if(empty($title)){
            $errors[]="Title is required";
        }
        if(empty($desc)){
            $errors[]="Description is required";
        }
        if(empty($date)){
            $errors[]="Date is required";
        }

    }
    else {
        header("Location: ../../index.php");
    }


?>