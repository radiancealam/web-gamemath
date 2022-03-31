<?php
session_start();
require "koneksi.php";
$_SESSION["nama"] = $_COOKIE["nama"];
$_SESSION["skor"] = 0;
$_SESSION["lives"] = 5;
$_SESSION["login"] = true;
header("Location: login.php");
exit;