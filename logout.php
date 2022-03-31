<?php
session_start();
$_SESSION = [];
setcookie("nama", $nama, time()-3600);
session_unset();
session_destroy();
header("Location: login.php");
exit;
?>
