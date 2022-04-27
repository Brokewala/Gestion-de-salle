<?php
// appell de requiete
require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'connection.php');
// verification of mot de pass
function VerificationPasswordLogin($pseudo,$passwordLogin,$FilierChoiser){
    $AllRequesBdd=new AllRequesBdd();
    $AllRequesBdd->PDOAllRequestes();
    $AllRequesBdd->LoginProfesseurs($pseudo,$passwordLogin,$FilierChoiser);
 }
 // look for salles
 function verificationSearchSalles($charSalles,$nb_eleves){
     $AllRequesBdd=new AllRequesBdd();
     $AllRequesBdd->PDOAllRequestes();
     $AllRequesBdd->AffichierSalle($charSalles,$nb_eleves);
  }
 
//  verification ajoute salles
 function verificationAddSalle( $heurCours, $subject, $salle_name, $jours, $semestres, $vaques,$nb_eleves, $filiere,$unique_id){
    $AllRequesBdd=new AllRequesBdd();
    $AllRequesBdd->PDOAllRequestes();
    $AllRequesBdd->AddSAlles($heurCours,$subject,$salle_name,$jours,$semestres,$vaques,$nb_eleves,$filiere,$unique_id);
}
// 
function verificationWeeks($jourChoser,$values0,$values1,$values2,$values3,$values4,$values5,$values6,$values7,$values8,$values9,$values10,$values11,$values12,$values13,$values14){
    $AllRequesBdd=new AllRequesBdd();
    $AllRequesBdd->PDOAllRequestes();
    $AllRequesBdd->AddWeeks($jourChoser,$values0,$values1,$values2,$values3,$values4,$values5,$values6,$values7,$values8,$values9,$values10,$values11,$values12,$values13,$values14);
 
 }

// 
function VerificationLibre(){
    $AllRequesBdd=new AllRequesBdd();
    $AllRequesBdd->PDOAllRequestes();
    $AllRequesBdd->AffichagerLibre();
 
 }
//  changement en free
function allFree(){
    $AllRequesBdd=new AllRequesBdd();
    $AllRequesBdd->PDOAllRequestes();
    $AllRequesBdd->ChangerStatusFree();
 
 }
//  add ocupe
function verificationOccupe($values0,$values1,$values2,$values3,$values4,$values5,$values6,$values7){
    $AllRequesBdd=new AllRequesBdd();
    $AllRequesBdd->PDOAllRequestes();
    $AllRequesBdd->AddSallesOccupe($values0,$values1,$values2,$values3,$values4,$values5,$values6,$values7);

 }
// affichGER
function VerificationAfficherOccuper(){
    $AllRequesBdd=new AllRequesBdd();
    $AllRequesBdd->PDOAllRequestes();
    $AllRequesBdd->AffichagerOccupe();
 
 }

// 
function VerificationAddSallesUph($values1,$values2,$values3,$values4,$values5,$values6,$values7,$values8,$values9,$values10,$values11,$values12,$values13,$values14,$values15,$values16,$values17,$values18){
    $AllRequesBdd=new AllRequesBdd();
    $AllRequesBdd->PDOAllRequestes();
    $AllRequesBdd->AddSallesUph($values1,$values2,$values3,$values4,$values5,$values6,$values7,$values8,$values9,$values10,$values11,$values12,$values13,$values14,$values15,$values16,$values17,$values18);
}
// 
function VerificationAffichierSallesUph(){
    $AllRequesBdd=new AllRequesBdd();
    $AllRequesBdd->PDOAllRequestes();
    $AllRequesBdd->AffichagerSallesUph();
}
// 
function verificationAddJours($values0,$values1,$values2,$values3,$values4,$values5,$values6){
    $AllRequesBdd=new AllRequesBdd();
    $AllRequesBdd->PDOAllRequestes();
    $AllRequesBdd->AddJours($values0,$values1,$values2,$values3,$values4,$values5,$values6);
}
// 
function affichierJouer(){
    $AllRequesBdd=new AllRequesBdd();
    $AllRequesBdd->PDOAllRequestes();
    $AllRequesBdd->AffichierJour();
}
// 
function SupprestionAllOccupe(){

    $AllRequesBdd=new AllRequesBdd();
    $AllRequesBdd->PDOAllRequestes();
    $AllRequesBdd->SuppresionTableOccupe();
 }