<!-- REQUETE PHPH -->
<?php 
session_start();
// 
if (!empty( $_SESSION['unique_id'])) {
    require dirname(__DIR__).DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'pseudoConnection.php';
    $unique_id=$_SESSION['unique_id'];
    $req3=$bdd->query("SELECT prof_filiere,prof_name,subject_prof,plusieurs,unique_id FROM loginprofesseur WHERE unique_id='$unique_id'");
    while($donne=$req3->fetch()){
        $pseudoFilier=$donne['prof_filiere'];
        $pseudoName=$donne['prof_name'];
        $pseudoSubject=$donne['subject_prof'];
         $_SESSION['unique_id']=$donne['unique_id'];

    }
    $req3->closeCursor();
}else{
    header("location:index.php");
}
?>
<!-- FIN DE REQUETE PHP -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>uph_salles</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <style>
        *{
            margin:0;
            padding:0;
            text-decoration:none;
            box-sizing:border-box;
        }
        body{
            font-family:'Times New Roman';
            background:#f2f2f2;
        }
        header{
            background-color:#212529!important;
            color: #fff;
            height: 100px;
            text-align: center;
        }
        .header{
            font-family: 'Times New Roman', Times, serif;
            padding-top: 30px;
            text-align: center;

        }
       nav{
           background-color:white; 
          
       }
  
       .colNav{
        display:flex; 
        align-items:center;
        justify-content:space-between;
       }
      
       /* nav div{
           width:100px;
           
       } */
       nav div:hover{
           /* background:#f2f2f2!important; */
       }
       .choisBlock{
           margin-left:20px;
           background:#f2f2f2;
           padding:10px;
       }
       .navigation{
           /* margin-right:60px; */
        display:flex;
        align-items:center;
        /* justify-content:space-between; */

       }
       .logout{
        /* margin-right:10px; */

       }
       .filierContent{
           text-transform:uppercase;
       }
       .choisBlock{
        /* background:#f2f2f2; */

       }
       a{
           text-decoration:none;
       }
        .verification{
            background:white;
            border-radius:10px;
            padding:10px;
            margin-top:20px;
            height:425px;
        }
        .heurCoursContent{
            display:flex;
            justify-content:space-between;

        }
        .errorcontetn{
            width:100%;
            display:grid;
            justify-content:center;
            align-items:center;
        }
        .erreur{
            width:200px;
            text-align:center;
            padding:10px;
            border-radius:10px;
        }
        #Cherche{
            margin-right:20px;
            cursor:pointer;

        }
        #reserver{
            margin-left:10px;
            cursor:pointer;
        }
        .choisir,.profName,.unique_id{
            display:none;
        }
        .weeksA{
            display:flex;

        }
        .weeksA div{
            margin-right:5px;
        }
        .btngroupsSR{
            margin-top:20px;
            display:flex;
        }
        .resultate{
            background:white;
            border-radius:10px;
            padding:10px;
            margin-top:20px;
            height:420px;
        }
        .persone{
            text-align:center;
        }
        .persone p{
            margin-top:10px;
            font-size:30px;
        }
        .persone span{
            text-transform:uppercase;
        }
        .intoResultat{
            height:400px;
            overflow-y:auto;
            border-radius:5px;

        }
        .tableResultat{
            height:425px;
            border-radius:5px;


        }
        .theadA{
            position:sticky;
            top:0;
        }
        thead{
            position:sticky;
            top:0;

        }
        .blockEvent{
            font-size:14px;
        }
        /* footer */
        footer{
            margin-top:30px;
            color:white;
            padding:20px;
        }
        .footerContenair{
            display:flex;
            justify-content:space-between;
        }
        /* animation */
       .direBonjour{
           font-family:"NSimSun";
       }
       
}


    </style>
</head>
<body>     
    <header class="bg-dark">
        <div class="header">

            <h1>GESTION DE SALLES</h1>
        </div>
        
    </header>
  <nav >
    <div class="row" id="navContent">
        <div class="colNav">
            <div class="choisBlock">
                <span class="filierContent">
                <?php echo $pseudoFilier;  ?>
                </span>
            </div>
            <div class="navigation">
                <div class="Accuielle">
                    <form action="#" method="POST">
                        <input type="text" name="unique_id" value="<?php echo $unique_id; ?> " hidden>
                        <button class="btn btnAcuielle" ><a href="#" >Accueil</a></button>
                    </form>

                </div>
                <div class="BlockupdateTimetable">
                    <form action="#" method="POST">
                    <input type="text" value="<?php echo $unique_id; ?> " hidden>
                    <button class="btn updateTimetable" ><a href="#" >Ajoute</a></button>
                    </form>

                </div>
                <div class="sigin">
                    <button class="btn"><a href="blog/signin.php">S'inscrire</a></button>
                </div>
                <div class="logout">
                    <button class="btn " id="logout"><a href="index.php">Logout</a></button>
            </div>
        </div>
        </div>
    </div>
  </nav>
    <div class="container-fluid">
        <div class="containerA" >
            <div class="row" id="rowBlocks" >
                <div class="col-sm-3" >
                    <div class="verification">
                        <div class="formVerification chercheForm">
                            <div class="errorcontetn">
                                <span id="error"></span>
                            </div>
                                <form  method="post">
                                    <div class="groupVerifie">
                                        <input type="text" clAss="profName" name="profName" value="<?php echo $pseudoName; ?>">
                                        <input type="text" clAss="unique_id" name="unique_id" value="<?php echo $unique_id; ?>">

                                    </div>

                                    <div class="groupVerifie">
                                        <label for="matier">Matiere</label><br>
                                        <input type="text"name="matier" value="<?php echo $pseudoSubject;  ?>" class="form-control" placeholder="Matier">
                                    </div>
                                    <div class="groupVerifie inputDelete">
                                        <label for="students_nb">Nombre d'eleve</label><br>
                                        <input type="number"name="students_nb"class="form-control" placeholder="Nombre d'eleve">

                                    </div>
                                    <div class="weeksA">
                                        <div class="jours">
                                        <label for="jourSelecte">Jour</label><br>
                                            <select name="jourSelecte" id="jourSelecte" class="form-select">
                                                <option value="lundi">Lundi</option>
                                                <option value="mardi">Mardi</option>
                                                <option value="mercredi">Mercredi</option>
                                                <option value="jeudi">Jeudi</option>
                                                <option value="vendredi">Vendredi</option>

                                            </select>
                                        </div>
                                        <div class="semestre">
                                            <label for="Semestre">SEMESTRE</label><br>
                                            <select name="Semestre" id="Semestre" class="form-select">
                                                <option value="s1">S1</option>
                                                <option value="s2">S2</option>
                                                <option value="s3">S3</option>
                                                <option value="s4">S4</option>
                                                <option value="s5">S5</option>
                                                <option value="s6">S6</option>
                                                <option value="s7">S7</option>
                                                <option value="s8">S8</option>
                                                <option value="s9">S9</option>
                                                <option value="s10">S10</option>


                                            </select>
                                        </div>
                                        <div class="vagues">
                                        <label for="vageus">Vagues</label><br>
                                            <select name="vageus" id="vageus" class="form-select">
                                                <option value="v1">V1</option>
                                                <option value="v2">V2</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="groupVerifie charDelete">
                                        <h5>Caractere de Salles</h5>
                                        <div class="">
                                            <label for="prise">Prise</label>
                                            <input type="checkbox"name="prise"class="form-check-input">
                                            <label for="ordinateur">Ordinateur</label>
                                            <input type="checkbox" name="ordinateur" class="form-check-input">
                                            <label for="tableau" >Tableau</label>
                                            <input type="checkbox" name="tableau" class="form-check-input">
                                        </div>
                                    </div>
                                    <div class="heurCoursContent">
                                        <div class="groupVerifie">
                                            <label for="debutCours">Debut de cours</label><br>
                                            <input type="number" name="debutCours" class="form-control" placeholder="Debut . . .">
                                        </div>
                                        <div class="groupVerifie ">
                                            <label for="FinCours">Fin de cours</label><br>
                                            <input type="number"name="FinCours" class="form-control" placeholder="Fin . . .">
                                        </div>
                                    </div>
                                    <div class="groupchois inputDelete" style="display:flex;">
                                            <input type="text"name="choiser" value="" class="form-control choisir">
                                            <input type="text"name="filierProf" value="<?php echo $pseudoFilier;?>" class="form-control choisir">

                                        </div>
                                    <div class="btngroupsSR">
                                        <button type="button" class="btn btn-dark Cherche " id="Cherche">Cherche</button>
                                        <button type="button" class="btn btn-secondary reserver" id="reserver">reserve</button>
                                    </div>
                                    
                                </form>
                            </div>
                     </div>
                
                </div>
                <div class="col-sm-9">
                    <div class="resultatBlock">
                        <div class="resultate">
                            
                            <div class="redultatHeader" >
                                <h1 style="font-family:'Gabriola';">Resultat:</h1>
                            </div>
                            <div class="ActionButton">
                                <form method="POST" class="formBtnGroupe" id="formBtnGroupe">
                                    <div class="formulaire">

                                    </div>
                                    <div class="buttons">
                                        <button class="btn btn-primary libre" id="libre">FREE</button>
                                        <button class="btn btn-danger occupe" id="occupe">BUSY</button> 
                                        <button class="btn btn-dark timetable" id="timetable">TIMETABLE</button> 

                                    </div>
                                </form>
                            </div>
                            <hr>
                            <div class="tableResultat " id="ResultatTable">
                            <div class="blockEvent" id="blockEvent">
                                <div class="persone">
                                        <p class="direBonjour">
                                            <span class="salut"></span>
                                             <span class="namepseud0"><?php   echo $pseudoName;  ?></span>
                                        </p>
                                        <p class="namepseud0">
                                             Vous etez enseignent <?php echo $pseudoSubject;  ?>
                                        </p>
                                        <p class="namepseud0">
                                             Dans le domaine <?php echo $pseudoFilier;  ?> en uph.
                                        </p>
                                                                    
                                </div>

                            </div>
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
                    
    </div>
    <footer class="bg-dark">
        <div class="footerContenair">
            <div class="nbVisiteur" style="color:white;">
                <h4>A PROPOS DES VISITEURS</h4>
                <div class="dateNow">
                    <h5>date du jour</h5>
                    <?php
                    require dirname(__DIR__).DIRECTORY_SEPARATOR.'Controleur'.DIRECTORY_SEPARATOR.'compteur.php';
                    // date d'aujourd'huit
                    $dateNow=date_now();
                    
                    ?>
                    <h5>Heur</h5>
                    <div class="heur">
                        <span class="heur"></span>
                    </div>
                </div>
                <h6>Total des visiteurs</h6>
                <div>

                    <?php
                    if (!empty($pseudoName)){
                        ajouter_vue();
                        $vues=nombre_vues();
                    }
                    ?>
                    <span>
                
                    il y a <?= $vues ?> visiteur<?= $vues>1?'s':'' ?> sur  le site

                    </span>
                </div>
            </div>
            <div class="uphFooter">
                <h4>UPH PROPOS</h4>
                <div>
                    <h5>Filiere:</h5>
                    <ul>
                        <li>GESTION</li>
                        <li>COMUNICATION </li>
                        <li>INFORMATIQUE</li>
                        <li>GENIE CIVILE</li>
                    </ul>
                    <p>Semestre 1 jusqu'a semestre 10</p>                    
                </div>
            </div>
            
        </div>
        <div class="copy">
            <?php 
            require_once(__DIR__.DIRECTORY_SEPARATOR.'elements'.DIRECTORY_SEPARATOR.'footer.php');
            ?>
        </div>
    </footer>
    <!-- javascript -->
    <script src="javascript/index.js"></script>
    <script src="javascript/update.js"></script>

<?php session_destroy();?>
</body>
</html>