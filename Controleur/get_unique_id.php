<?php
    session_start();
    $idPseudo=htmlspecialchars(trim($_POST['unique_id']));
    if (isset( $idPseudo) && !empty($idPseudo)) {
        $_SESSION['unique_id']=$idPseudo;
        header("location:../Vuies/blog/updateTimetable.php");
    }else{

    }
