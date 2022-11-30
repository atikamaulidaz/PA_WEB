<?php
require "koneksi.php";
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
}
if(isset($_GET['id'])){
  $query_lihat = mysqli_query($db, "SELECT * FROM gambar WHERE id = $_GET[id]");
  $result = mysqli_fetch_assoc($query_lihat);
  $gambar_lama = $result['file'];
  $query = mysqli_query($db,"DELETE FROM laundry WHERE id= $_GET[id]");
  if($query){
    unlink('gambar/'.$gambar_lama);
    $query_gambar = mysqli_query($db, "DELETE FROM gambar WHERE id = $_GET[id]");
    if ($_SESSION['role'] == 'admin') {
      header("Location:beranda-admin.php");
    } else {
      header("Location:tabel-pesanan.php");
    }
  } 
  else {
    echo "Hapus Pesanan Gagal";
  }
}