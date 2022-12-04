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
    <link rel="stylesheet" href="css/pagination.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script> -->
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
    <div class="tabel center container" style="overflow-x: auto;">
        <table class="table table-bordered table-paginate" id="sortTable" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th colspan="6" class="thead">
                        <h3 class="daftar">History Pesanan</h3>
                    </th>
                </tr>
                <tr>
                    <th>No </th>
                    <th nowrap>Nama Lengkap</th>
                    <th>Alamat Lengkap</th>
                    <th>Jenis Laundry</th>
                    <th>Waktu</th>
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

                $query = mysqli_query($db, "SELECT * FROM history");
                $jumlah_data = mysqli_num_rows($query);
                $total_halaman = ceil($jumlah_data / $batas);
                
                $query = mysqli_query($db, "SELECT * FROM history limit $halaman_awal, $batas");
                $i = $halaman_awal + 1;
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
        <nav>
            <ul class="pagination justify-content-end">
                <li class="page-item">
                <a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
                </li>
                <?php
                    for($x=1; $x <= $total_halaman; $x++){
                        ?>
                        <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                        <?php
                    }
                    ?>
                    <li class="page-item">
                        <a class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
                    </li>
            </ul>
        </nav>
    </div>
    <script src="javascript/jquery.js"></script>
    <script>
        $('#sortTable').query();
    </script>
</body>

</html>