<?php
session_start();
// importation de models
require dirname(__DIR__).DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'connection.php';
// enlevement de touts les charactere speciaux sur les donnees
$nomPseudo=htmlspecialchars(trim($_POST['pseudoName']));
$passwordPseudo=htmlspecialchars(trim($_POST['password']));
// 
$gestion=htmlspecialchars(trim($_POST['gestion']));
$Communication=htmlspecialchars(trim($_POST['Communication']));
$informatique=htmlspecialchars(trim($_POST['informatique']));
$GenieCivile=htmlspecialchars(trim($_POST['GenieCivile']));

// here we crypte password of pseudo
$passwordPseudo=password_hash($passwordPseudo,PASSWORD_DEFAULT,['cout'=>14]);
// end of cryptage
$gestionSubject=htmlspecialchars(trim($_POST['gestionSubject']));   //
$subjectCommunication=htmlspecialchars(trim($_POST['subjectCommunication']));   //
$subjectInfo=htmlspecialchars(trim($_POST['subjectInfo']));   //
$subjectGenieLogiciel=htmlspecialchars(trim($_POST['subjectGenieLogiciel']));   //

// class
class ControlSignin{
    // verification si les donne sont bien remplie
    public function VerificationDonne(string $nomPseudo,string $passwordPseudo,string $gestionSubject,string $subjectCommunication,string $subjectInfo,string $subjectGenieLogiciel,string $gestion,string $Communication,string $informatique,string $GenieCivile){
          // rapelle de l'objet
          $AllRequesBdd=new AllRequesBdd();
          $AllRequesBdd->PDOAllRequestes(); 
        //creating random id for user
        $random_id=rand(time(),1000000); 
        $_SESSION['unique_id']=$random_id;

                // we verify if they are empty
        if ((!empty($nomPseudo)  && !empty($passwordPseudo) && !empty($gestionSubject) && empty($subjectCommunication) && empty($subjectInfo) && empty($subjectGenieLogiciel)) || 
        (!empty($nomPseudo) && !empty($passwordPseudo) && empty($gestionSubject) && !empty($subjectCommunication) && empty($subjectInfo) &&  empty($subjectGenieLogiciel)) ||
        (!empty($nomPseudo) && !empty($passwordPseudo) && empty($gestionSubject) && empty($subjectCommunication) && !empty($subjectInfo) &&  empty($subjectGenieLogiciel)) ||
        (!empty($nomPseudo) && !empty($passwordPseudo) && empty($gestionSubject) && empty($subjectCommunication) && empty($subjectInfo) &&  !empty($subjectGenieLogiciel)) ||
        (!empty($nomPseudo) && !empty($passwordPseudo) && !empty($gestionSubject) && !empty($subjectCommunication) && empty($subjectInfo) && empty($subjectGenieLogiciel)) ||
        (!empty($nomPseudo) && !empty($passwordPseudo) && !empty($gestionSubject) && empty($subjectCommunication) && !empty($subjectInfo) && empty($subjectGenieLogiciel)) ||
        (!empty($nomPseudo) && !empty($passwordPseudo) && !empty($gestionSubject) && empty($subjectCommunication) && empty($subjectInfo) && !empty($subjectGenieLogiciel)) ||
        (!empty($nomPseudo) && !empty($passwordPseudo) && empty($gestionSubject) && !empty($subjectCommunication) && !empty($subjectInfo) && empty($subjectGenieLogiciel)) ||
        (!empty($nomPseudo) && !empty($passwordPseudo) && empty($gestionSubject) && !empty($subjectCommunication) && empty($subjectInfo) && !empty($subjectGenieLogiciel)) ||
        (!empty($nomPseudo) && !empty($passwordPseudo) && empty($gestionSubject) && empty($subjectCommunication) && !empty($subjectInfo) && !empty($subjectGenieLogiciel)) ||
        (!empty($nomPseudo) && !empty($gestionSubject) && !empty($passwordPseudo) && !empty($subjectCommunication) && !empty($subjectInfo) && !empty($subjectGenieLogiciel))){
            
           if (isset($_POST['checkgestion']) && $_POST['checkgestion']=="on") {
            $SeveralSubject=$_POST['checkgestion'];
            //    here we add the data into the data base
               $AllRequesBdd->AddProffesseur($random_id, $nomPseudo, $gestionSubject, $subjectCommunication,$subjectInfo, $subjectGenieLogiciel, $SeveralSubject,$passwordPseudo);
               if (!empty($gestionSubject)) {
                   $AllRequesBdd->AddLogin($random_id,$nomPseudo,$gestionSubject,$gestion,$passwordPseudo,$SeveralSubject);
               }
               echo "success";
           }elseif(isset($_POST['checkCommunication']) && $_POST['checkCommunication']=="on"){
            $SeveralSubject=$_POST['checkCommunication'];
                //    here we add the data into the data base
                $AllRequesBdd->AddProffesseur($random_id, $nomPseudo, $gestionSubject, $subjectCommunication,$subjectInfo, $subjectGenieLogiciel, $SeveralSubject,$passwordPseudo);
                if (!empty($subjectCommunication)) {
                    $AllRequesBdd->AddLogin($random_id,$nomPseudo,$subjectCommunication,$Communication,$passwordPseudo,$SeveralSubject);
                }
                echo "success";
           }elseif(isset($_POST['checkInfo']) && $_POST['checkInfo']=="on"){
            $SeveralSubject=$_POST['checkInfo'];
                //    here we add the data into the data base
                $AllRequesBdd->AddProffesseur($random_id, $nomPseudo, $gestionSubject, $subjectCommunication,$subjectInfo, $subjectGenieLogiciel, $SeveralSubject,$passwordPseudo);
                if (!empty($subjectInfo)) {
                    $AllRequesBdd->AddLogin($random_id,$nomPseudo,$subjectInfo,$informatique,$passwordPseudo,$SeveralSubject);
                }
                echo "success";
           }elseif(isset($_POST['checkGenieLogiciel']) && $_POST['checkGenieLogiciel']=="on"){
            $SeveralSubject=$_POST['checkGenieLogiciel'];
                //    here we add the data into the data base
                $AllRequesBdd->AddProffesseur($random_id, $nomPseudo, $gestionSubject, $subjectCommunication,$subjectInfo, $subjectGenieLogiciel, $SeveralSubject,$passwordPseudo);
                if (!empty($subjectGenieLogiciel)) {
                    $AllRequesBdd->AddLogin($random_id,$nomPseudo,$subjectGenieLogiciel,$GenieCivile,$passwordPseudo,$SeveralSubject);
                }
                echo "success";
           }else{
               //we declare false several subject
                $SeveralSubjectNone="off"; 
                //    here we add the data into the data base
                if (!empty($gestionSubject)) {
                    $AllRequesBdd->AddProffesseur($random_id, $nomPseudo, $gestionSubject, $subjectCommunication,$subjectInfo, $subjectGenieLogiciel, $SeveralSubjectNone,$passwordPseudo);
                    $AllRequesBdd->AddLogin($random_id,$nomPseudo,$gestionSubject,$gestion,$passwordPseudo,$SeveralSubjectNone);
                }elseif(!empty($subjectCommunication)){
                    $AllRequesBdd->AddLogin($random_id,$nomPseudo,$subjectCommunication,$Communication,$passwordPseudo,$SeveralSubjectNone);
                    $AllRequesBdd->AddProffesseur($random_id, $nomPseudo, $gestionSubject, $subjectCommunication,$subjectInfo, $subjectGenieLogiciel, $SeveralSubjectNone,$passwordPseudo);

                }elseif(!empty($subjectInfo)){
                    $AllRequesBdd->AddLogin($random_id,$nomPseudo,$subjectInfo,$informatique,$passwordPseudo,$SeveralSubjectNone);
                    $AllRequesBdd->AddProffesseur($random_id, $nomPseudo, $gestionSubject, $subjectCommunication,$subjectInfo, $subjectGenieLogiciel, $SeveralSubjectNone,$passwordPseudo);


                }elseif(!empty($subjectGenieLogiciel)){
                    $AllRequesBdd->AddLogin($random_id,$nomPseudo,$subjectGenieLogiciel,$GenieCivile,$passwordPseudo,$SeveralSubjectNone);
                    $AllRequesBdd->AddProffesseur($random_id, $nomPseudo, $gestionSubject, $subjectCommunication,$subjectInfo, $subjectGenieLogiciel, $SeveralSubjectNone,$passwordPseudo);
                }
                echo "success";
           }      
        }else{
            echo "All input are requered";
        }
    }
}
// object
$ControlSignin=new ControlSignin();

$ControlSignin->VerificationDonne($nomPseudo,$passwordPseudo,$gestionSubject,$subjectCommunication,$subjectInfo,$subjectGenieLogiciel,$gestion,$Communication,$informatique,$GenieCivile);
