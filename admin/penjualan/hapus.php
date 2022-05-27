<?php
session_start();
if(isset($_SESSION['user'])) {

include'../../koneksi.php';
$nama = $_GET['nama'];
$id = $_GET['id'];

$link -> query("DELETE FROM pelanggan WHERE id_pembeli = '$id'");
$link -> query("DELETE FROM penjualan WHERE nama_pembeli = '$nama'");

header('location: viewpemesanan.php');
}
?>