<?php
session_start();
$_SESSION['pseudo']=$_POST['pseudo'];
// importation
require dirname(__DIR__).DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'bdd'.DIRECTORY_SEPARATOR.'AffichagerAll.php';
// enlevement de touts les charactere speciaux sur les donnees
$pseudo=htmlspecialchars(trim($_POST['pseudo']));
$passwordLogin=htmlspecialchars(trim($_POST['passwordLogin']));
$FilierChoiser=htmlspecialchars(trim($_POST['Filier_Prof']));



if (isset($pseudo) && isset($passwordLogin) && isset($FilierChoiser)) {
    if (!empty($pseudo) && !empty($passwordLogin) && !empty($FilierChoiser)) {
        VerificationPasswordLogin($pseudo,$passwordLogin,$FilierChoiser);
    }else{
        echo "All input are requered";
    }
}else{
    echo "All input are requered";
}
