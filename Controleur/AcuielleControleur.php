<?php
session_start();
$unique_id=htmlspecialchars(trim($_POST['unique_id']));
$_SESSION['unique_id']=$unique_id;
echo "yes";