<?php
session_start();
require "koneksi.php";

if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}
if (isset($_POST["login"])) {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $_SESSION["nama"] = $nama;
    setcookie("nama", $nama, time()+3600);
    $_SESSION["skor"] = 0;
    $_SESSION["lives"] = 5;
    $_SESSION["login"] = true;
    $query = "INSERT INTO peserta SET nama='$nama', email='$email', skor=$_SESSION[skor]";
    mysqli_query($conn, $query);
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- myCSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>GAME MATH</h1>
            </div>
            <div class="col-md-4">
                <form action="" method="post">
                    <div class="form group">
                        <label for="nama">Nama :</label>
                        <input class="form-control" type="text" name="nama" id="nama" placeholder="Masukkan nama Anda" autofocus required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email :</label>
                        <input class="form-control" type="text" name="email" id="email" placeholder="Masukkan email Anda" required>
                    </div>
                    <button class="btn btn-primary float-right" type="submit" name="login">Login</button>
                </form>
            </div>
        </div>
    </div>
    <div class="footer">
        <p>Copyright &copy; <?= date('Y') ?> Radiance Alam Pratama</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>