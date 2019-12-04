<?php
session_start();
$_SESSION = array();
session_destroy();
setcookie("rememberEmail", "", time() -1);
setcookie("rememberPass","", time() -1);
header("location: index.php");
