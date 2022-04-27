<?php

function ajouter_vue():void{
    $fichier=dirname(__DIR__).DIRECTORY_SEPARATOR.'Dates'.DIRECTORY_SEPARATOR.'compteurs';//pour retourne vers le fichier compteur 
    $fichier_journalier=$fichier.'-'.date('Y-m-d');
    incremente_compteur( $fichier);
    incremente_compteur( $fichier_journalier);
  
}
// 
function incremente_compteur(string $fichier):void{
    $compteur=1;
    // verufuer si le fichier compteur existe
    if (file_exists($fichier)) {
        // si le fichier existe on incremente
        $compteur=(int)file_get_contents($fichier);
        $compteur++;
        file_put_contents($fichier,$compteur);
        
    }
    // sinon on cree le fichier avec la valeur 1
    file_put_contents($fichier,$compteur);

}

// 

function nombre_vues():string{
    $fichier=dirname(__DIR__).DIRECTORY_SEPARATOR.'Dates'.DIRECTORY_SEPARATOR.'compteurs';//pour retourne vers le fichier compteur 
    return file_get_contents($fichier);
}
// date
function date_now():void{
    $dateNow= date('l d F Y');
    echo $dateNow;
}