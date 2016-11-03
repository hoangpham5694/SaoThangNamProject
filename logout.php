<?php
session_start();
$_SESSION['user']=null;
setcookie("username", "", time() - 3600);
setcookie("password", "", time() - 3600);
header('Location: /index.php');
?>