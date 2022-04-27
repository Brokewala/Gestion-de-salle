<?php
// 
require dirname(__DIR__).DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'bdd'.DIRECTORY_SEPARATOR.'AffichagerAll.php';
$profName=htmlspecialchars(trim($_POST['profName']));
$matier=htmlspecialchars(trim($_POST['matier']));
$students_nb=htmlspecialchars(trim($_POST['students_nb']));
$jourSelecte=htmlspecialchars(trim($_POST['jourSelecte']));
$Semestre=htmlspecialchars(trim($_POST['Semestre']));
$vageus=htmlspecialchars(trim($_POST['vageus']));
$debutCours=htmlspecialchars(trim($_POST['debutCours']));
$FinCours=htmlspecialchars(trim($_POST['FinCours']));
$Sallechoiser=htmlspecialchars(trim($_POST['choiser']));
$filierProf=htmlspecialchars(trim($_POST['filierProf']));
$unique_id=htmlspecialchars(trim($_POST['unique_id']));
 
$jourVide="";
if($jourSelecte=="lundi"){
    $blocks=$matier."(".$Semestre."-".$vageus.")";
    verificationAddJours($values0,$jourVide,$jourVide,$jourVide,$jourVide,$jourVide,$unique_id)
}elseif($jourSelecte=="lundi"){
    $blocks=$matier."(".$Semestre."-".$vageus.")";
    verificationAddJours($values0,$jourVide,$jourVide,$jourVide,$jourVide,$jourVide,$unique_id)
}
elseif($jourSelecte=="lundi"){
    $blocks=$matier."(".$Semestre."-".$vageus.")";
    verificationAddJours($values0,$jourVide,$jourVide,$jourVide,$jourVide,$jourVide,$unique_id)
}
elseif($jourSelecte=="lundi"){
    $blocks=$matier."(".$Semestre."-".$vageus.")";
    verificationAddJours($values0,$jourVide,$jourVide,$jourVide,$jourVide,$jourVide,$unique_id)
}
elseif($jourSelecte=="lundi"){
    $blocks=$matier."(".$Semestre."-".$vageus.")";
    verificationAddJours($values0,$jourVide,$jourVide,$jourVide,$jourVide,$jourVide,$unique_id)
}



