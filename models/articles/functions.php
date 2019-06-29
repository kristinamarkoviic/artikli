<?php
function insert($title,$desc,$date,$original_cover,$new_cover,$idUser){
    global $conn;
    $upit="INSERT INTO articles VALUES (NULL,?,?,?,?,?,?)";
    $rezultat=$conn->prepare($upit);
    $uneto = $rezultat->execute([$title,$desc,$date,$original_cover,$new_cover,$idUser]);
    return $uneto;
}