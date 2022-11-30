<?php 
session_start();
if (!isset($_SESSION['login']) && ($_SESSION['username'] == "admin") && ($_SESSION['password'] == "admin123")){
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
    <link rel="stylesheet" href="css/styleSearch.css">
    <title>DAFTAR PESANAN</title>
</head>

<body>
    <div class="header">
        <div class="nama-header">Laundry Express</div>
        <div class="list-header">
            <ul>
                <li><button id="switch"><img src="images/night-mode.png" width="50px" height="50px"></button></li>
                <li><a href="history.php" style="text-decoration: none;">History</a></li>
                <li><a href="logout.php" style="text-decoration: none;">Logout</a></li>
            </ul> 
        </div>
    </div>
    <br><br>
    <div class="cari">
        <form action="" method="get">
            <input type="search" name="search" id="search" placeholder="Cari Nama" class="search">
            <input type="submit" name="submit" value="CARI" class="button-search">
        </form>
    </div>
    <br><br>
    <div class="tabel center" style="overflow-x: auto;">
        <table>
            <thead>
                <tr>
                    <th colspan="10" class="thead">
                        <h3 class="daftar">Daftar Pesanan</h3>
                    </th>
                </tr>
                <tr>
                    <th>No</th>
                    <th nowrap>Nama Lengkap</th>
                    <th>Alamat Lengkap</th>
                    <th>No. HP</th>
                    <th>Email</th>
                    <th>Jenis Laundry</th>
                    <th>Gambar</th>
                    <th>Waktu</th>
                    <th colspan="2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if (isset($_GET['submit'])) {
                    $search = $_GET['search'];
                    $query = mysqli_query($db, "SELECT * FROM laundry INNER JOIN gambar ON laundry.id=gambar.id WHERE nama LIKE '%$search%'");;
                } else {
                    $query = mysqli_query($db, "SELECT * FROM laundry INNER JOIN gambar ON laundry.id=gambar.id");
                }
                $i = 1;
                while ($row = mysqli_fetch_assoc($query)) {
                ?>
                <tr>
                    <td><?= $i ?></td>
                    <td nowrap><?=$row['nama']?></td>
                    <td><?=$row['alamat']?></td>
                    <td><?=$row['telpon']?></td>
                    <td><?=$row['email']?></td>
                    <td><?=$row['jenis']?></td>
                    <td><img src="gambar/<?=$row['file']?>" width="50px" height="50px" ></td>
                    <td><?=$row['waktu']?></td>

                    <td class="edit">
                        <a href="edit.php?id=<?=$row['id']?>">
                            <img src="images/edit.png" width="25px" height="25px">
                        </a>
                    </td>
                    <td class="hapus">
                        <a href="hapus.php?id=<?=$row['id']?>" onclick="return confirm('Apakah Data akan dihapus')" >
                            <img src="images/trash-can.png" width="25px" height="25px">
                        </a>
                    </td>
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