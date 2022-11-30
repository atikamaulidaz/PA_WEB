<?php
session_start();
if (!isset($_SESSION['login']) && ($_SESSION['username'])) {
    header("Location: login.php");
}
require "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleData.css">
    <link rel="stylesheet" href="css/stylesheet.css">
    <title>History</title>
</head>
<body>
    <div class="header">
        <div class="nama-header">Laundry Express</div>
        <div class="list-header">
            <ul>
                <li><button id="switch"><img src="images/night-mode.png" width="50px" height="50px"></button></li>
                <li><a href="http://localhost/Proyek-Akhir-WEB/beranda-admin.php" style="text-decoration: none;">Home</a></li>
            </ul> 
        </div>
    </div>
    <br><br>
    <div class="tabel center" style="overflow-x: auto;">
        <table>
            <thead>
                <tr>
                    <th colspan="6" class="thead">
                        <h3 class="daftar">History Pesanan</h3>
                    </th>
                </tr>
                <tr>
                    <th>No</th>
                    <th nowrap>Nama Lengkap</th>
                    <th>Alamat Lengkap</th>
                    <th>Jenis Laundry</th>
                    <th>Waktu</th>
                </tr>
            </thead>
            <tbody>
                <?php    
                $query = mysqli_query($db, "SELECT * FROM history" );
                $i = 1;
                while ($row = mysqli_fetch_assoc($query)) {
                ?>
                <tr>
                    <td><?= $i ?></td>
                    <td nowrap><?=$row['nama']?></td>
                    <td><?=$row['alamat']?></td>
                    <td><?=$row['jenis']?></td>
                    <td><?=$row['waktu']?></td>
                </tr>
                <?php
                $i++;
                }?>
            </tbody>
        </table>
    </div>
    <script src="javascript/jquery.js"></script>
</body>

</html>