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
    <title>FORM PESANAN</title>
    <link rel="stylesheet" href="css/styleData.css">
    <link rel="stylesheet" href="css/stylesheet.css">
</head>

<body>
    <div class="header">
        <div class="nama-header">Order Pesanan</div>
        <div class="list-header">
            <ul>
                <li><button id="switch"><img src="images/night-mode.png" width="50px" height="50px"></button></li>
            </ul> 
        </div>
    </div>
    <div class="pesananBox">
        <div class="pesanan">
            <center>
                <div class="coba-pesan"><center><img src="images/order-now.png" width="200px" height="150px"></center></div>
                <form action="tambah.php" method="post" enctype="multipart/form-data">
                <label for=""><b>Nama Lengkap</b></label><br>
                <input type="text" name="nama" class="pesan-item"><br>
                <label for=""><b>Alamat Lengkap</b></label><br>
                <input type="text" name="alamat" class="pesan-item"><br>
                <label for=""><b>No. HP</b></label><br>
                <input type="text" name="telpon" class="pesan-item"><br>
                <label for=""><b>Email </b></label><br>
                <input type="email" name="email" class="pesan-item"><br>
                <p><b>Jenis Laundry :</b></p><br>
                <p><input type="radio" name="jenis" value="Regular Ekonomis">Regular Ekonomis</p>
                <p><input type="radio" name="jenis" value="Laundry Exclusive">Laundry Exclusive</p>
                <p><input type="radio" name="jenis" value="Laundry Sepatu">Laundry Sepatu</p>
                <p><input type="radio" name="jenis" value="Laundry Bed Cover">Laundry Bed Cover</p><br>
                <label for="nama_gambar"><b>Nama File</b></label>
                <input type="text" name="nama_gambar" class="pesan-item">
                <label for="gambar"><b>Gambar</b></label>
                <input type="file" name="gambar" class="pesan-item">
                <table>    
                    <td><a href="beranda.php" class="button-batal">Batal</a></td>
                    <td><input type="submit" name="submit" value="Order" class="button-order"></td>
                </table>
            </center>
        </div>
    </div>
    <script src="javascript/jquery.js"></script>
</body>
</html>