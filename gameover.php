<?php
session_start();
include "koneksi.php";
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
$nama = $_SESSION["nama"];
$query = "UPDATE peserta SET skor=$_SESSION[skor] WHERE nama='$nama'";
mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GAME OVER</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- myCSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>GAME OVER</h1>
    <?php
    echo "<div class=result><p>Sayang sekali permainan telah berakhir</p>
        <p>Skor Anda: " . $_SESSION["skor"] . "</p></div>";
    ?>
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-md-6">
                <a href="reset.php" class="text-white btn btn-success">Main Lagi</a>
                <a href="logout.php" class="text-white btn btn-danger">Logout</a>
                <table class="table mt-3">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Skor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM peserta ORDER BY skor DESC LIMIT 10");
                        $no = 1;
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>
                            <td>" . $no . "</td>
                            <td>" . $row['nama'] . "</td>
                            <td>" . $row['skor'] . "</td>
                            </tr>";
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>