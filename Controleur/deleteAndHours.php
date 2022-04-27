<?php
require dirname(__DIR__).DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'bdd'.DIRECTORY_SEPARATOR.'AffichagerAll.php';
// manipulation de date
$heurs=(int) date('H ');
$munits=(int) date('i');
$second=(int) date('s');

echo $heurs."h ";
echo $munits."m ";
echo $second."s ";

if($heurs==00){
    SupprestionAllOccupe();
    allFree();
}


