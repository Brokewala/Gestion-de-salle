<?php
try{
    $bdd=new PDO("mysql:host=localhost;dbname=gestion_de_salles","root","");
}catch(Exception $e){
    die("Erreur:".$e->getMessage());
}

