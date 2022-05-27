<html>
<head>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
	<script type="text/javascript" src="../bootstrap/js/jquery.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
</head>
<body>
<?php
include'../config.php';
session_start();
if(isset($_SESSION['nama'])) {
//else {
  //if(isset($_SESSION['nama'])) {
    //header('location: viewmenu.php');
$nama = $_SESSION['nama'];
$no = 1;
date_default_timezone_set("Asia/Jakarta");
$today = date("l, d-M-Y / h:i:s a");
?>
<a class="btn btn-default" href="menu.php">&lArr;</a>
<div id="tampil">
  <center>
          <?php $no = 1;
                 echo $today."<br>";
                 echo "<b>".$nama."</b>"; ?>
     <fieldset>
        <legend>KeranjangKu</legend>
<table class="table table-hover">
  <tr>
      <th> NO </th>
      <th> Nama Menu </th>
      <th> Harga </th>
      <th> Jumlah </th>
      <th> Total </th>
      <th> Aksi </th>
  </tr>
    
<?php        
$sql = $conn -> query("SELECT * FROM penjualan JOIN barang using(id_barang) JOIN detail USING(id_penjualan) WHERE id_pelanggan = '$nama'");
while ($data2 = $sql -> fetch_array()){
?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $data2['nama_barang']; ?></td>
        <td>Rp.<?php echo number_format ($data2['harga']); ?></td>
        <td><?php echo $data2['jumlah']; ?>&rarr;
            <a href="pesan.php?input=tambah&id_barang=<?php echo $data2['id_barang']; ?>&harga=<?php echo $data2['harga']; ?>&nama=<?php echo $_SESSION['nama']; ?>&id_penjualan=<?php echo $data2['id_penjualan']; ?>">&oplus;</a>|
            
            <a href="pesan.php?input=kurang&id_barang=<?php echo $data2['id_barang']; ?>&harga=<?php echo $data2['harga']; ?>&nama=<?php echo $_SESSION['nama']; ?>&id_penjualan=<?php echo $data2['id_penjualan']; ?>">-</a>
        </td>
        <?php $total = $data2['harga'] * $data2['jumlah'];
                       $nama += $total; ?>
        <td>Rp.<?php echo number_format($total);?></td>
        <td><a href="pesan.php?input=clear&id_barang=<?php echo $data2['id_barang']; ?>&jumlah=<?php echo $data2['jumlah']; ?>&id_penjualan=<?php echo $data2['id_penjualan']; ?>">&otimes;</a></td>
<?php }  ?>
</table>
         <br><b><i>Total Bayar :</i><h1> Rp.<?php echo number_format($nama); ?></h1></b><br>
        <button class="btn btn-info btn-lg" onclick="alert('Terima Kasih Sudah Berbelanja'); window.location=('logout.php')">Beli</button>
<?php }
         $aweu = mysqli_num_rows($sql);     
      if ($aweu < 1){ 
          header('location: menu.php');
      } ?>
<form action="" method="post">
    <input style="float: right;" type="submit" class="btn btn-danger btn-lg" name="batal" value="Batal">
</form>
<?php
if (isset($_POST['batal'])){
    session_unset();
    $link -> query("DELETE FROM pelanggan WHERE id_pelanggan = '$nama'");
    $link -> query("DELETE FROM penjualan WHERE id_pelanggan = '$nama'");
    $link -> query("DELETE FROM detail WHERE id_penjualan = '$nama'");
    ?>
     <script>document.location.href='../index.php';</script>
<?php
}
?>