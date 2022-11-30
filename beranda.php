<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylesheet.css">
    <title>Beranda</title>
</head>
<body>
    <div class="header">
        <div class="nama-header" >Laundry Express</div>
        <div class="list-header">
            <ul>
                <li><button id="switch"><img src="images/night-mode.png" width="50px" height="50px"></button></li>
                <li><a href="http://localhost/Proyek-Akhir-WEB/beranda.php" style="text-decoration: none;">Home</a></li>
                <li><a href="profile.php" style="text-decoration: none;">Profile</a></li>
                <li><a href="pesan.php" style="text-decoration: none;">Buat Pesanan</a></li>
                <li><a href="tabel-pesanan.php" style="text-decoration: none;">Lihat Pesanan</a></li>
                <li><a href="logout.php" style="text-decoration: none;">Logout</a></li>
            </ul> 
        </div>
    </div>
    <div class="main">
        </div>
        <div class="logo">
            <center><img src="images/laundry.png"></center>
        </div>
        <center>
        <h3 class="nama-penawaran">Jasa Layanan Kami</h3>
        <div class="penawaran">
            <div class="penawaran-item">
                <img src="images/cash.png" width="270px" height="270px">
                <center>
                    <p>Regular Ekonomis</p>
                </center>
            </div>
            <div class="penawaran-item">
                <img src="images/diamond.png" width="270px" height="270px">
                <center>
                    <p>Laundry Exclusive</p>
                </center>
            </div>
            <div class="penawaran-item">
                <img src="images/shoes.png" width="270px" height="270px">
                <center>
                    <p>Laundry Sepatu</p>
                </center>
            </div>
            <div class="penawaran-item">
                <img src="images/bed-sheets.png" width="270px" height="270px">
                <center>
                    <p>Laundry Bed Cover</p>
                </center>
            </div>
        </div>
        </center>
    </div>
    <br>
    <div class="footer">
        <div class="nama-footer"><center>@Copyright 2022 - by Kelompok 4 B1 2020</center></div>
    </div>
    <script src="javascript/jquery.js"></script>
</body>
</html>