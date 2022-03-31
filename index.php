<?php
// author: Radiance Alam Pratama K3518049
session_start();
require "koneksi.php";
// cek login atau tidak
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- myCSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-md-6">
                <form action="result.php" method="post">
                    <?php
                    $firstnumber = rand(0, 20);
                    $secondnumber = rand(0, 20);
                    $_SESSION["hasil"] = $firstnumber + $secondnumber;
                    echo "<h1>Halo, " . $_SESSION["nama"] . "</h1>
                    <p>Lives " . $_SESSION["lives"] . "</p>
                    <p>Skor " . $_SESSION["skor"] . "</p>";
                    echo "<label for=jawab>" . $firstnumber . "+" . $secondnumber . "= </label>";
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="text" name="jawab" placeholder="Masukkan jawaban Anda" require>
                    </div>
                    <button class="btn btn-primary mb-3" type="submit" name="submit">Submit</button>
                    <br>
                </form>
                <a href="logout.php" class="text-white">Bukan Anda?</a>
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