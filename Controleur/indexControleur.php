<?php
// require dirname(__DIR__).DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'connection.php';
require dirname(__DIR__).DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'bdd'.DIRECTORY_SEPARATOR.'AffichagerAll.php';
// 
// declaration des variable
$students_nb=(int)htmlspecialchars(trim($_POST['students_nb']));

// declaration d'un class
class IndexControle{
    public function SearchSalles($nombreEleve){
        if (!empty($nombreEleve)) {
            if(isset($_POST['prise'])){
                $prise='prise';
                verificationSearchSalles($prise,$nombreEleve);
            }elseif(isset($_POST['ordinateur'])){
                $ordinateur="ordinateur";
                verificationSearchSalles($ordinateur,$nombreEleve);

            }elseif(isset($_POST['tableau'])){
                $tableau="tableau";
                verificationSearchSalles($tableau,$nombreEleve);

            }else{
                echo "you have to check one !";
            }     
        
        }else{
            echo 'All input are requered';
        }

    }
}
$IndexControle=new IndexControle();
$IndexControle->SearchSalles($students_nb);
