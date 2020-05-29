<?php
session_start();
// cek kebenaran jawaban user
if (isset($_POST["submit"])) {
    if ($_POST["jawab"] == $_SESSION["hasil"]) {
        $_SESSION["skor"] += 10;
        echo "Jawaban Anda benar";
    } else {
        $_SESSION["skor"] -= 2;
        $_SESSION["lives"] -= 1;
        echo "Jawaban Anda salah";
    }
}
if ($_SESSION["lives"] > 0) {
    header("Location: index.php");
    exit;
} elseif ($_SESSION["lives"] == 0) {
    $nama = $_SESSION["nama"];
    $skor = $_SESSION["skor"];
    header("Location: gameover.php");
    exit;
}
?>