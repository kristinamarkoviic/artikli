
<?php

function korisnikLogin($email,$pass){
    $upit="SELECT * FROM users WHERE email=? AND password=?";
    global $conn;
    $priprema=$conn->prepare($upit);
    $priprema->execute([$email,$pass]);
    return $priprema;

}

