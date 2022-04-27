<?php
session_start();
require dirname(__DIR__).DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'bdd'.DIRECTORY_SEPARATOR.'AffichagerAll.php';
require dirname(__DIR__).DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'pseudoConnection.php';
$unique_id=htmlspecialchars(trim($_POST['unique_id']));
// insertion ver timetable
// 
$matier=htmlspecialchars(trim($_POST['matier']));
$jourSelecte=htmlspecialchars(trim($_POST['jourSelecte']));
$Semestre=htmlspecialchars(trim($_POST['Semestre']));
$vageus=htmlspecialchars(trim($_POST['vageus']));
$debutCours=htmlspecialchars(trim($_POST['debutCours']));
$FinCours=htmlspecialchars(trim($_POST['FinCours']));
$unique_id=htmlspecialchars(trim($_POST['unique_id']));
// appell des donne depuis la base de donne
$req0=$bdd->query("SELECT * FROM jours WHERE unique_id='$unique_id' ORDER BY jours.heur_jour ASC");
while($donne0=$req0->fetch()){
    $heur_jour=$donne0['heur_jour'];
    $JourIntoBddlundi=$donne0['lundi'];
    $JourIntoBddmardi=$donne0['mardi'];
    $JourIntoBddmercredi =$donne0['mercredi'];
    $JourIntoBddjeud =$donne0['jeudi'];
    $JourIntoBddvendredi=$donne0['vendredi'];
    
}
$req0->closeCursor();
//  verification si l'heur est deja occupe
if (!empty($debutCours) && !empty($FinCours)) {
    $timesReglages=$debutCours."h-".$FinCours."h";
    if (($timesReglages!=$heur_jour) && (!empty($JourIntoBddlundi) || !empty($JourIntoBddmardi) || !empty($JourIntoBddmercredi) || !empty($JourIntoBddjeud) || !empty($JourIntoBddvendredi))  ) {
       
        if (!empty($matier) && !empty($jourSelecte) && !empty($Semestre) && !empty($vageus) && !empty($unique_id)){
            $jourVide="";
            if($jourSelecte=="lundi"){
                $blocks=$matier."(".$Semestre."-".$vageus.")";
                verificationAddJours($timesReglages,$blocks,$jourVide,$jourVide,$jourVide,$jourVide,$unique_id);
            }elseif($jourSelecte=="mardi"){
                $blocks=$matier."(".$Semestre."-".$vageus.")";
                verificationAddJours($timesReglages,$jourVide,$blocks,$jourVide,$jourVide,$jourVide,$unique_id);
            }
            elseif($jourSelecte=="mercredi"){
                $blocks=$matier."(".$Semestre."-".$vageus.")";
                verificationAddJours($timesReglages,$jourVide,$jourVide,$blocks,$jourVide,$jourVide,$unique_id);
            }
            elseif($jourSelecte=="jeudi"){
                $blocks=$matier."(".$Semestre."-".$vageus.")";
                verificationAddJours($timesReglages,$jourVide,$jourVide,$jourVide,$blocks,$jourVide,$unique_id);
            }
            elseif($jourSelecte=="vendredi"){
                $blocks=$matier."(".$Semestre."-".$vageus.")";
                verificationAddJours($timesReglages,$jourVide,$jourVide,$jourVide,$jourVide,$blocks,$unique_id);
            }else{
                echo "tu doit choisir jours";
            }
           
        }
    }else{
        echo "changer l'heur svp";
    }

}
// fin de verification

// fin de l'insertion
$output="";                            
$req11=$bdd->query("SELECT * FROM jours WHERE unique_id='$unique_id' ORDER BY jours.heur_jour ASC");
$i=1;
while ($donne=$req11->fetch()){
    $watch=(int)$donne['heur_jour'];
    
    $output.='
        <tr>
            <td>'.$i.'</td>
            <td>'.$donne['heur_jour'].'</td>
            <td>'.$donne['lundi'].'</td>
            <td>'.$donne['mardi'].'</td>
            <td>'.$donne['mercredi'].'</td>
            <td>'.$donne['jeudi'].'</td>
            <td>'.$donne['vendredi'].'</td>
        
        </tr>               
    ';
    $i++;  
}
echo $output;
$req11->closeCursor();
?>

