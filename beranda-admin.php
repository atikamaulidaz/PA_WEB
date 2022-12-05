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
    <link rel="stylesheet" href="css/pagination.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>DAFTAR PESANAN</title>
</head>

<body>
    <div class="header">
        <div class="nama-header"><a href="beranda-admin.php" style="text-decoration: none;" data-toggle="tooltip" title="Kembali Ke Halaman Sebelumnya">Laundry Express</a></div>
        <div class="list-header">
            <ul>
                <li><button id="switch"><img src="images/night-mode.png" width="50px" height="50px"></button></li>
                <li><a href="history2.php" style="text-decoration: none;">History</a></li>
                <li><a href="logout.php" style="text-decoration: none;">Logout</a></li>
            </ul> 
        </div>
    </div>
    <br><br>
    <div class="cari">
        <form action="" method="get">
            <input type="search" name="search" id="search" placeholder="Cari Username" class="search">
            <input type="submit" name="submit" value="CARI" class="button-search"> 
        </form>
        &nbsp;
        <div class="dropdown">
            <button class="button-search" type="button" data-toggle="dropdown">SORT BY
            <span class="caret"></span></button>
            <ul class="dropdown-menu">
                <form action="" method="get">
                    <li><input type="submit" name="alamat" value="ALAMAT" class="button-sort"></li> <br>
                    <li><input type="submit" name="laundry" value="LAUNDRY" class="button-sort"></li> <br>
                    <li><input type="submit" name="username" value="USERNAME" class="button-sort"></li> <br>
                    <li><input type="submit" name="waktu" value="WAKTU" class="button-sort"></li>
                </form>
            </ul>
        </div>
    </div>
    <br><br>
    <div class="tabel center" style="overflow-x: auto;">
        <table class="table table-bordered table-paginate" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th colspan="11" class="thead">
                        <h3 class="daftar">Daftar Pesanan</h3>
                    </th>
                </tr>
                <tr>
                    <th>No</th>
                    <th nowrap>Nama Lengkap</th>
                    <th>Username</th>
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
                $batas = 5;
                $halaman = isset($_GET['halaman']) ?(int)$_GET['halaman'] : 1;
                $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                $previous = $halaman - 1;
                $next = $halaman + 1;
                $query = mysqli_query($db, "SELECT * FROM laundry INNER JOIN gambar ON laundry.id=gambar.id INNER JOIN user ON laundry.id_user=user.id_user");
                $jumlah_data = mysqli_num_rows($query);
                $total_halaman = ceil($jumlah_data / $batas);

                if (isset($_GET['submit'])) {
                    $search = $_GET['search'];
                    $query = mysqli_query($db, "SELECT * FROM laundry INNER JOIN gambar ON laundry.id=gambar.id INNER JOIN user ON laundry.id_user=user.id_user WHERE username LIKE '%$search%'");;
                } elseif (isset($_GET['alamat'])) {
                    $query = mysqli_query($db, "SELECT * FROM laundry INNER JOIN gambar ON laundry.id=gambar.id INNER JOIN user ON laundry.id_user=user.id_user ORDER BY alamat ASC limit $halaman_awal, $batas");
                } elseif (isset($_GET['laundry'])) {
                    $query = mysqli_query($db, "SELECT * FROM laundry INNER JOIN gambar ON laundry.id=gambar.id INNER JOIN user ON laundry.id_user=user.id_user ORDER BY jenis ASC limit $halaman_awal, $batas");
                } elseif (isset($_GET['username'])) {
                    $query = mysqli_query($db, "SELECT * FROM laundry INNER JOIN gambar ON laundry.id=gambar.id INNER JOIN user ON laundry.id_user=user.id_user ORDER BY username ASC limit $halaman_awal, $batas");
                } elseif (isset($_GET['waktu'])) {
                    $query = mysqli_query($db, "SELECT * FROM laundry INNER JOIN gambar ON laundry.id=gambar.id INNER JOIN user ON laundry.id_user=user.id_user ORDER BY waktu ASC limit $halaman_awal, $batas");
                } else {
                    $query = mysqli_query($db, "SELECT * FROM laundry INNER JOIN gambar ON laundry.id=gambar.id INNER JOIN user ON laundry.id_user=user.id_user limit $halaman_awal, $batas");
                }

                $i = $halaman_awal + 1;
                while ($row = mysqli_fetch_assoc($query)) {
                ?>
                <tr>
                    <td><?= $i ?></td>
                    <td nowrap><?=$row['nama']?></td>
                    <td><?=$row['username']?></td>
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
        <nav>
            <ul class="pagination justify-content-center pagination-lg">
                <li class="page-item">
                    <a class="page-link" tabindex="-1" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>&laquo;</a>
                </li>
                <?php
                    for($x=1; $x <= $total_halaman; $x++){
                        ?>
                        <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?><span class="sr-only">(current)</span></a></li>
                        <?php
                    }
                    ?>
                    <li class="page-item">
                        <a class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>&raquo;</a>
                    </li>
            </ul>
        </nav>
    </div>
    <script src="javascript/jquery.js"></script>
</body>

</html>