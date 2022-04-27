<?php
require dirname(__DIR__).DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'pseudoConnection.php';
require dirname(__DIR__).DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'bdd'.DIRECTORY_SEPARATOR.'AffichagerAll.php';
// declaration des variable
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
 
// declaration d'un class
class IndexControle{
    public function verificationReservationIndex($jourSelecte,$Sallechoiser,$timesReglages,$matier,$Semestre,$vageus, $filierProf,$unique_id){
        if (!empty($jourSelecte) && !empty($Sallechoiser) && !empty($timesReglages) && !empty($Semestre) && !empty($vageus) && !empty($filierProf) && !empty($unique_id)){
                // premier requete               
                $SemestreNone="";
                if ($Semestre=="s1") {
                    verificationWeeks($jourSelecte,$timesReglages,$matier,$SemestreNone,$SemestreNone,$SemestreNone,$SemestreNone,$SemestreNone,$SemestreNone,$SemestreNone,$SemestreNone,$SemestreNone,$vageus,$filierProf,$Sallechoiser,$unique_id);
                    echo "success";
                }
                elseif($Semestre=="s2"){
                    verificationWeeks($jourSelecte,$timesReglages,$SemestreNone,$matier,$SemestreNone,$SemestreNone,$SemestreNone,$SemestreNone,$SemestreNone,$SemestreNone,$SemestreNone,$SemestreNone,$vageus,$filierProf,$Sallechoiser,$unique_id);
                    echo "success";

                }
                elseif($Semestre=="s3"){
                    verificationWeeks($jourSelecte,$timesReglages,$SemestreNone,$SemestreNone,$matier,$SemestreNone,$SemestreNone,$SemestreNone,$SemestreNone,$SemestreNone,$SemestreNone,$SemestreNone,$vageus,$filierProf,$Sallechoiser,$unique_id);
                    echo "success";

                }
                elseif($Semestre=="s4"){
                    verificationWeeks($jourSelecte,$timesReglages,$SemestreNone,$SemestreNone,$SemestreNone,$matier,$SemestreNone,$SemestreNone,$SemestreNone,$SemestreNone,$SemestreNone,$SemestreNone,$vageus,$filierProf,$Sallechoiser,$unique_id);
                    echo "success";

                }
                elseif($Semestre=="s5"){
                    verificationWeeks($jourSelecte,$timesReglages,$SemestreNone,$SemestreNone,$SemestreNone,$SemestreNone,$matier,$SemestreNone,$SemestreNone,$SemestreNone,$SemestreNone,$SemestreNone,$vageus,$filierProf,$Sallechoiser,$unique_id);
                    echo "success";

                }
                elseif($Semestre=="s6"){
                    verificationWeeks($jourSelecte,$timesReglages,$SemestreNone,$SemestreNone,$SemestreNone,$SemestreNone,$SemestreNone,$matier,$SemestreNone,$SemestreNone,$SemestreNone,$SemestreNone,$vageus,$filierProf,$Sallechoiser,$unique_id);
                    echo "success";

                }
                elseif($Semestre=="s7"){
                    verificationWeeks($jourSelecte,$timesReglages,$SemestreNone,$SemestreNone,$SemestreNone,$SemestreNone,$SemestreNone,$SemestreNone,$matier,$SemestreNone,$SemestreNone,$SemestreNone,$vageus,$filierProf,$Sallechoiser,$unique_id);
                    echo "success";

                }
                elseif($Semestre=="s8"){
                    verificationWeeks($jourSelecte,$timesReglages,$SemestreNone,$SemestreNone,$SemestreNone,$SemestreNone,$SemestreNone,$SemestreNone,$SemestreNone,$matier,$SemestreNone,$SemestreNone,$vageus,$filierProf,$Sallechoiser,$unique_id);
                    echo "success";

                }
                elseif($Semestre=="s9"){
                    verificationWeeks($jourSelecte,$timesReglages,$SemestreNone,$SemestreNone,$SemestreNone,$SemestreNone,$SemestreNone,$SemestreNone,$SemestreNone,$SemestreNone,$matier,$SemestreNone,$vageus,$filierProf,$Sallechoiser,$unique_id);
                    echo "success";

                }
                elseif($Semestre=="s10"){
                    verificationWeeks($jourSelecte,$timesReglages,$SemestreNone,$SemestreNone,$SemestreNone,$SemestreNone,$SemestreNone,$SemestreNone,$SemestreNone,$SemestreNone,$SemestreNone,$matier,$vageus,$filierProf,$Sallechoiser,$unique_id);
                    echo "success";

                }else{
                    echo "you have to chose one"; 
                    
                }

        }else{
            echo "All input are requered!";
        }

    }
    public function controlSalles($matier,$students_nb,$jourSelecte, $Semestre,$vageus,$timesReglages,$Sallechoiser,$filierProf,$unique_id){
        if(!empty($matier) && !empty($students_nb) && !empty($jourSelecte) && !empty($Semestre) && !empty($vageus) && !empty($timesReglages) && !empty($Sallechoiser) && !empty($filierProf) && !empty($unique_id)){
           
            verificationAddSAlle($timesReglages,$matier,$Sallechoiser, $jourSelecte,$Semestre,$vageus,$students_nb,$filierProf,$unique_id);
        }else{
            echo "All input are requered";
        }
    }
   public function AddOccupe($prof_name,$name_salle,$matier,$nombre_aleve,$heur,$semestre,$vageus,$jours){
        verificationOccupe($prof_name,$name_salle,$matier,$nombre_aleve,$heur,$semestre,$vageus,$jours);
   }

}
$IndexControle=new IndexControle();


if (!empty($debutCours) && $debutCours>=8){
    if (!empty($FinCours) && $FinCours>7) {
        if ($debutCours<$FinCours) {
            $timesReglages=$debutCours."h-".$FinCours."h";
            // verification
            $req2=$bdd->query("SELECT heur,salles,jours FROM salles");
            while($donne=$req2->fetch()){
                $heur=$donne['heur'];
                $salles=$donne['salles'];
                $jours=$donne['jours'];
                
            };
            $req2->closeCursor();
            // convertire heur en entie
            $watch=(int)$heur+1;
            // 
            if (!isset($salles)) {
                $IndexControle->verificationReservationIndex($jourSelecte,$Sallechoiser,$timesReglages,$matier,$Semestre,$vageus, $filierProf,$unique_id);
                $IndexControle->controlSalles($matier,$students_nb,$jourSelecte, $Semestre,$vageus,$timesReglages,$Sallechoiser,$filierProf,$unique_id);
                $IndexControle->AddOccupe($profName,$Sallechoiser,$matier,$students_nb,$timesReglages,$Semestre,$vageus,$jourSelecte);
                echo "success";
            }else{
                if (($debutCours>=$watch) && ($Sallechoiser==$salles)) {
                    if((isset($salles)==$Sallechoiser) && ($heur!=$timesReglages)) {
                        $IndexControle->verificationReservationIndex($jourSelecte,$Sallechoiser,$timesReglages,$matier,$Semestre,$vageus, $filierProf,$unique_id);
                        $IndexControle->controlSalles($matier,$students_nb,$jourSelecte, $Semestre,$vageus,$timesReglages,$Sallechoiser,$filierProf,$unique_id);
                        $IndexControle->AddOccupe($profName,$Sallechoiser,$matier,$students_nb,$timesReglages,$Semestre,$vageus,$jourSelecte);
                        echo "success";
                    }elseif((isset($salles)!=$Sallechoiser) && ($heur==$timesReglages) ){
                        $IndexControle->verificationReservationIndex($jourSelecte,$Sallechoiser,$timesReglages,$matier,$Semestre,$vageus, $filierProf,$unique_id);
                        $IndexControle->controlSalles($matier,$students_nb,$jourSelecte, $Semestre,$vageus,$timesReglages,$Sallechoiser,$filierProf,$unique_id);
                        $IndexControle->AddOccupe($profName,$Sallechoiser,$matier,$students_nb,$timesReglages,$Semestre,$vageus,$jourSelecte);
                        echo "success";

                    }else{
                        echo "sallesoccupe";
                    }
                }elseif(($Sallechoiser!=$salles) && ($debutCours!=$watch)){
                    if((isset($salles)==$Sallechoiser) && ($heur!=$timesReglages)) {
                        $IndexControle->verificationReservationIndex($jourSelecte,$Sallechoiser,$timesReglages,$matier,$Semestre,$vageus, $filierProf,$unique_id);
                        $IndexControle->controlSalles($matier,$students_nb,$jourSelecte, $Semestre,$vageus,$timesReglages,$Sallechoiser,$filierProf,$unique_id);
                        $IndexControle->AddOccupe($profName,$Sallechoiser,$matier,$students_nb,$timesReglages,$Semestre,$vageus,$jourSelecte);
                        echo "success";
                    }elseif((isset($salles)!=$Sallechoiser) && ($heur==$timesReglages) ){
                        $IndexControle->verificationReservationIndex($jourSelecte,$Sallechoiser,$timesReglages,$matier,$Semestre,$vageus, $filierProf,$unique_id);
                        $IndexControle->controlSalles($matier,$students_nb,$jourSelecte, $Semestre,$vageus,$timesReglages,$Sallechoiser,$filierProf,$unique_id);
                        $IndexControle->AddOccupe($profName,$Sallechoiser,$matier,$students_nb,$timesReglages,$Semestre,$vageus,$jourSelecte);
                        echo "success";

                    }else{
                        echo "sallesoccupe";
                    }
                }else{
                    echo "heurIcorecte";
                }
            }
        
        }else{
            echo "heurIcorecte";
        }
    }else{
        echo "heurPlusGrand0 ";
    }
}else{
    echo "heurPlusGrand ";
}