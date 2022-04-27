<?php
// 
class AllRequesBdd{
    public function __constructor(PDO $pdos){
        $this->pdos=$pdos;
    }
    public function PDOAllRequestes(){
        try{
            $this->pdos=new PDO("mysql:host=localhost;dbname=gestion_de_salles","root","");
        }catch(Exception $e){
            die("Erreur:".$e->getMessage());
        }
     
    }
    // etape1:here we add value into the table professeur
    public function AddProffesseur(string $values0,string $values1,string $values2,string $values3,string $values4,string $values5,string $values6,string $values7){
        $req=$this->pdos->prepare("INSERT INTO professeur(unique_id ,nom_prof,gestion,communication,informatique,genieCivile,plusieur,password) VALUES (:val0,:val1,:val2,:val3,:val4,:val5,:val6,:val7) ");
        $req->execute(array(
            'val0'=>$values0,
            'val1'=>$values1,
            'val2'=>$values2,
            'val3'=>$values3,
            'val4'=>$values4,
            'val5'=>$values5,
            'val6'=>$values6,
            'val7'=>$values7
        ));
    }
    // etape2:add into loginprofesseur
    public function AddLogin(int $Id_unique, string $prof_name,string $subject_prof,string $prof_filiere,string $passwordLogin,string $plusieur){
        $req=$this->pdos->prepare("INSERT INTO loginprofesseur(unique_id,prof_name,subject_prof,prof_filiere,login_password,plusieurs) VALUES (:val0,:val1,:val2,:val3,:val4,:val5) ");
        $req->execute(array(
            'val0'=>$Id_unique,
            'val1'=>$prof_name,
            'val2'=>$subject_prof,
            'val3'=>$prof_filiere,
            'val4'=>$passwordLogin,
            'val5'=>$plusieur

        ));
    }
    // etape2:here we check passwordof users
    public function LoginProfesseurs($pseudo,$loginPassword,$FilierChoiser){
        $req3=$this->pdos->query("SELECT * FROM loginprofesseur");
        while($donne=$req3->fetch()){
            // 
            if($pseudo==$donne["prof_name"]){
                if(password_verify($loginPassword,$donne['login_password'])==true){
                    if ($FilierChoiser==$donne["prof_filiere"]) {
                        $_SESSION['unique_id']=$donne['unique_id'];
                        echo "success";
                    }else{
                        echo "invalide Filier!";
                    }
                }else{
                    echo "Invalide password !";
                }
            }

            
        }
        $req3->closeCursor();

    }
    // etape3: here we show all salles free
    public function AffichierSalle($charSalles,$nb_eleves){
        // voici le out put 
        $output="";
        $req2=$this->pdos->query("SELECT * FROM salleschar WHERE salle_content LIKE '%$charSalles%' && nb_eleves>='$nb_eleves' && status='free' ");
        $i=1;
        while($donne=$req2->fetch()){
            $output.='
           <tr>
                <td>'.$i.'</td>
                <td>'.$donne['salles'].'</td>
                <td>'.$donne['nb_table'].'</td>
                <td>'.$donne['nb_eleves'].'</td>
                <td>'.$donne['salle_content'].'</td>
                <td>'.$donne['status'].'</td>
                <td>
                <input type="checkbox" name="'.$donne['salles'].'" data-lang="'.$donne['salles'].'"  class="form-check-input">
                </td>

                </tr>
        ';
        $i++;
        }
        echo $output;
        $req2->closeCursor();

        
    }
    // etape4: here we add value into table week(lundi--vendredi)
    public function AddWeeks($jourChoser,$values0,$values1,$values2,$values3,$values4,$values5,$values6,$values7,$values8,$values9,$values10,$values11,$values12,$salleName,$values14){
        // insertion into the  day
        $req4=$this->pdos->prepare("INSERT INTO {$jourChoser}(heur_lundi,s1,s2,s3,s4,s5,s6,s7,s8,s9,s10,vagues,filiere,salles,unique_id) VALUES(:val0,:val1,:val2,:val3,:val4,:val5,:val6,:val7,:val8,:val9,:val10,:val11,:val12,:val13,:val14)");
        $req4->execute(array(
            'val0'=>$values0,
            'val1'=>$values1,
            'val2'=>$values2,
            'val3'=>$values3,
            'val4'=>$values4,
            'val5'=>$values5,
            'val6'=>$values6,
            'val7'=>$values7,
            'val8'=>$values8,
            'val9'=>$values9,
            'val10'=>$values10,
            'val11'=>$values11,
            'val12'=>$values12,
            'val13'=>$salleName,
            'val14'=>$values14
        ));
        // changernla status de salles
        $status="busy";
        $req7=$this->pdos->query("UPDATE salleschar SET status='{$status}' WHERE salles='{$salleName}'&& status='free'");    
    }
    
    // etape6:here we add value into the table salles
    public function AddSAlles($values0,$values1,$values2,$values3,$values4,$values5,$values6,$values7,$values8){        
          // insertion into the  day
          $req4=$this->pdos->prepare("INSERT INTO salles(heur,subject,salles,jours,semestres,vagues,nb_eleves,filiere,id_unique) VALUES(:val0,:val1,:val2,:val3,:val4,:val5,:val6,:val7,:val8)");
          $req4->execute(array(
              'val0'=>$values0,
              'val1'=>$values1,
              'val2'=>$values2,
              'val3'=>$values3,
              'val4'=>$values4,
              'val5'=>$values5,
              'val6'=>$values6,
              'val7'=>$values7,
              'val8'=>$values8

          ));
    }
    // etape7::here we add value into the table sallesUph
    public function AddSallesUph($values1,$values2,$values3,$values4,$values5,$values6,$values7,$values8,$values9,$values10,$values11,$values12,$values13,$values14,$values15,$values16,$values17,$values18){
        $req4=$this->pdos->prepare("INSERT INTO salles_uph(heur,sal1,sal2,sal3,sal4,sal5,sal6,sal7,sal8,sal9,sal10,sal11,sal12,semestre,vagues,filiere,jours,prof_name) VALUES(:val1,:val2,:val3,:val4,:val5,:val6,:val7,:val8,:val9,:val10,:val11,:val12,:val13,:val14,:val15,:val16,:val17,:val18)");
        $req4->execute(array(
            'val1'=>$values1,
            'val2'=>$values2,
            'val3'=>$values3,
            'val4'=>$values4,
            'val5'=>$values5,
            'val6'=>$values6,
            'val7'=>$values7,
            'val8'=>$values8,
            'val9'=>$values9,
            'val10'=>$values10,
            'val11'=>$values11,
            'val12'=>$values12,
            'val13'=>$values13,
            'val14'=>$values14,
            'val15'=>$values15,
            'val16'=>$values16,
            'val17'=>$values17,
            'val18'=>$values18

        ));
  
    }
    // 
    public function AffichagerSallesUph(){
        $output="";
        $req2=$this->pdos->query("SELECT * FROM salles_uph ");
        $i=1;
        while($donne=$req2->fetch()){
            $output.='
            <tr>
                <td>'.$i.'</td>
                <td>'.$donne['heur'].'</td>
                <td>'.$donne['sal1'].'</td>
                <td>'.$donne['sal2'].'</td>
                <td>'.$donne['sal3'].'</td>
                <td>'.$donne['sal4'].'</td>
                <td>'.$donne['sal5'].'</td>
                <td>'.$donne['sal6'].'</td>
                <td>'.$donne['sal7'].'</td>
                <td>'.$donne['sal8'].'</td>
                <td>'.$donne['sal9'].'</td>
                <td>'.$donne['sal10'].'</td>
                <td>'.$donne['sal11'].'</td>
                <td>'.$donne['sal12'].'</td>
                <td>'.$donne['semestre'].'</td>
                <td>'.$donne['vagues'].'</td>
                <td>'.$donne['filiere'].'</td>
                <td>'.$donne['jours'].'</td>
                <td>'.$donne['prof_name'].'</td>

                </tr>
        ';
        $i++;
        }
        echo $output;
        $req2->closeCursor();
    }
    // etape8::here we add value into the table sallesoccupe
    public function AddSallesOccupe($values0,$values1,$values2,$values3,$values4,$values5,$values6,$values7){
        $req4=$this->pdos->prepare("INSERT INTO salles_occupe(prof_name,name_salle,matier,nombre_aleve,heur,semestre,vageus,jours) VALUES(:val0,:val1,:val2,:val3,:val4,:val5,:val6,:val7)");
        $req4->execute(array(
            'val0'=>$values0,
            'val1'=>$values1,
            'val2'=>$values2,
            'val3'=>$values3,
            'val4'=>$values4,
            'val5'=>$values5,
            'val6'=>$values6,
            'val7'=>$values7
        ));
  
    }
    // affichier ocupwer
    public function AffichagerOccupe(){
        $output="";
        $req2=$this->pdos->query("SELECT * FROM salles_occupe ");
        $i=1;
        while($donne=$req2->fetch()){
            $output.='
            <tr>
                <td>'.$i.'</td>
                <td>'.$donne['heur'].'</td>
                <td>'.$donne['name_salle'].'</td>
                <td>'.$donne['matier'].'</td>
                <td>'.$donne['nombre_aleve'].'</td>
                <td>'.$donne['semestre'].'</td>
                <td>'.$donne['vageus'].'</td>
                <td>'.$donne['prof_name'].'</td>
                <td>'.$donne['jours'].'</td>
                </tr>
        ';
        $i++;
        }
        echo $output;
        $req2->closeCursor();
    }
    // 
    public function AffichagerLibre(){
        $output="";
        $req2=$this->pdos->query("SELECT * FROM salleschar WHERE status='free'");
        $i=1;
        while($donne=$req2->fetch()){
            $output.='
            <tr>
                <td>'.$i.'</td>
                <td>'.$donne['salles'].'</td>
                <td>'.$donne['nb_table'].'</td>
                <td>'.$donne['nb_eleves'].'</td>
                <td>'.$donne['salle_content'].'</td>
                <td>'.$donne['status'].'</td>
                <td>Non Reserve
                </tr>
        ';
        $i++;
        }
        echo $output;
        $req2->closeCursor();
    }
    // 
    public function SuppresionTableOccupe(){
        $req6=$this->pdos->query("DELETE FROM salles_occupe WHERE salle_id>0");

    }
    // 
    public function ChangerStatusFree(){
         // changernla status de salles
         $status="free";
         $req7=$this->pdos->query("UPDATE salleschar SET status='{$status}' WHERE status='busy'");
    }
    // add jours
    public function AddJours($values0,$values1,$values2,$values3,$values4,$values5,$values6){
        $req9=$this->pdos->prepare("INSERT INTO jours(heur_jour,lundi,mardi,mercredi,jeudi,vendredi,unique_id) VALUES(:val0,:val1,:val2,:val3,:val4,:val5,:val6)");
        $req9->execute(array(
            'val0'=>$values0,
            'val1'=>$values1,
            'val2'=>$values2,
            'val3'=>$values3,
            'val4'=>$values4,
            'val5'=>$values5,
            'val6'=>$values6,
        ));
    }
   
}

// 