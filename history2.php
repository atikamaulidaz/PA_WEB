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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/styleData.css">
    <link rel="stylesheet" href="css/stylesheet.css">

    <!-- buat ketengahin tabelnya, ngatur tabel intinya -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- buat logo sorting, tombol search, dan properti lainnya. Kalau ga ada dia bakal hilang -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
    <!-- tombolnya ilang tapi masih bisa di sorting -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <!-- tombol sort hilang, search, next page, prev page juga hilang -->
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <!-- buat ngerapihin tombol-tombol yg hilang diatas -->
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

    <!-- <script src="javascript/jquery.js"></script> -->
    <title>History</title>
</head>
<body>
    <div class="header">
        <div class="nama-header">Laundry Express</div>
        <div class="list-header">
            <ul>
                <li><button id="switch"><img src="images/night-mode.png" width="50px" height="50px"></button></li>
                <li><a href="http://localhost/PA_WEB/beranda-admin.php" style="text-decoration: none;">Home</a></li>
            </ul> 
        </div>
    </div>
    <br><br>
    <div class="tabel center container" style="overflow-x: auto";>
        <table class="table table-bordered table-dark" id="sortTable">
            <thead>
                <tr>
                    <th colspan="6" class="thead">
                        <h3 class="daftar">History Pesanan</h3>
                    </th>
                </tr>
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Alamat Lengkap</th>
                    <th>Jenis Laundry</th>
                    <th>Waktu</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query = mysqli_query($db, "SELECT * FROM history");
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
    <script>
        $('#sortTable').DataTable();
    </script>
</body>
</html>