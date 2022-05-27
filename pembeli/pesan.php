<?php
include'../config.php';
session_start();
if(isset($_SESSION['nama'])) {
$nama = $_SESSION['nama'];
$id_barang = $_GET['id_barang'];
$id_penjualan = $_GET['id_penjualan'];
$harga = $_GET['harga'];
$input = $_GET['input'];
$jumlah = $_GET['jumlah'];

$sql = $conn -> query("SELECT * FROM penjualan JOIN barang using(id_barang) JOIN detail USING(id_penjualan) WHERE id_pelanggan = '$nama'");
    $aweu = mysqli_num_rows($sql);     
      if ($aweu < 1){
         header('location: menu.php');
      }
    
if ($input=='tambah'){
		$conn -> query("UPDATE detail SET jumlah = jumlah + 1, total = jumlah * '$harga' WHERE id_barang = '$id_barang' AND id_penjualan = '$id_penjualan'");
        $conn -> query("UPDATE barang SET stok = stok - 1 WHERE id_barang = '$id_barang'");
        
        $conn -> query("UPDATE penjualan SET total = (SELECT total FROM detail WHERE id_barang = '$id_barang') WHERE id_pelanggan = '$nama' AND id_barang='$id_barang'");
}
if ($input=='kurang'){
		$conn -> query("UPDATE detail SET jumlah = jumlah - 1, total = jumlah * '$harga' WHERE id_barang = '$id_barang' AND id_penjualan = '$id_penjualan'");
        $conn -> query("UPDATE barang SET stok = stok + 1 WHERE id_barang = '$id_barang'");
    
        $conn -> query("UPDATE penjualan SET total = (SELECT total FROM detail WHERE id_barang = '$id_barang') WHERE id_pelanggan = '$nama' AND id_barang='$id_barang'");
}
else if ($input=='clear'){
        $conn -> query("UPDATE barang SET stok = stok + '$jumlah' WHERE id_barang = '$id_barang'");
	    $conn -> query("DELETE FROM penjualan WHERE id_barang='$id_barang' AND id_pelanggan = '$nama'");
        $conn -> query("DELETE FROM detail WHERE id_barang='$id_barang' AND id_penjualan = '$id_penjualan'");
    
}
header("location: keranjang.php");
}

?>