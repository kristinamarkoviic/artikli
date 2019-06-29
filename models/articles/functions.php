<?php
function insert($title,$desc,$date,$original_cover,$new_cover,$idUser){
    global $conn;
    $upit="INSERT INTO articles VALUES (NULL,?,?,?,?,?,?)";
    $rezultat=$conn->prepare($upit);
    $uneto = $rezultat->execute([$title,$desc,$date,$original_cover,$new_cover,$idUser]);
    return $uneto;
}
function all_articles($idUser){
    $upit = "SELECT a.* FROM articles a INNER JOIN users u ON a.idUser = u.idUser WHERE a.idUser = $idUser ";
    return executeQuery($upit);
}
function all(){
    $upit = "SELECT * FROM articles";
    return executeQuery($upit);
}
function delete_article($idArticle){
    $upit="DELETE FROM articles WHERE idArticle = ? ";
    global $conn;
    $priprema = $conn->prepare($upit);
    return $priprema->execute([$idArticle]);
}
function get_one($idArticle){
    $upit="SELECT * FROM articles WHERE idArticle = $idArticle ";
    global $conn;
    return $conn->query($upit)->fetch();
}