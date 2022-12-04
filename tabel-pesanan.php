<?php 
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
}
require "koneksi.php";
$id_user = $_SESSION['id_user'];
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
    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.1.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
<link href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css"/>
<script src = https://code.jquery.com/jquery-3.5.1.js></script>
<script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
    <title>DAFTAR PESANAN</title>
</head>

<body>
    <div class="header">
        <div class="nama-header">Laundry Express</div>
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
    <br><br>
    <div class="tabel center" style="overflow-x: auto;">
        <table id="laundry" class="display" width="100%" cellspacing="0">
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
                $batas = 2;
                $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
    
                $previous = $halaman - 1;
                $next = $halaman + 1;
                
                $data = mysqli_query($db, "SELECT * FROM laundry INNER JOIN gambar ON laundry.id=gambar.id WHERE id_user=$id_user" );
                $jumlah_data = mysqli_num_rows($data);
                $total_halaman = ceil($jumlah_data / $batas);
    
                $data_laundry = mysqli_query($db,"SELECT * FROM laundry INNER JOIN gambar ON laundry.id=gambar.id WHERE id_user=$id_user limit $halaman_awal, $batas");
                $nomor = $halaman_awal+1;

                while ($row = mysqli_fetch_assoc($data_laundry)) {
                ?>
                <tr>
                    
                    <td><?= $nomor++ ?></td>
                    <td nowrap><?=$row['nama'];?></td>
                    <td><?=$row['alamat'];?></td>
                    <td><?=$row['telpon'];?></td>
                    <td><?=$row['email'];?></td>
                    <td><?=$row['jenis'];?></td>
                    <td><img src="gambar/<?=$row['file'];?>" width="60px" ></td>
                    <td><?=$row['waktu'];?></td>

                    

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
                // $i++;
                }?>
            </tbody>
        </table>
		<nav>
			<ul class="pagination justify-content-center">
				<li class="page-item">
					<a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
				</li>
				<?php 
				for($x=1;$x<=$total_halaman;$x++){
					?> 
					<li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
					<?php
				}
				?>				
				<li class="page-item">
					<a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
				</li>
			</ul>
		</nav>
    </div>
    <script src="javascript/jquery.js"></script>

</script>
</body>

</html>