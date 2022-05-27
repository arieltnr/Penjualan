<?php
session_start();
if(empty($_SESSION['user'])){
header("location: ../index.php");
}
include'../../config.php';
echo $_SESSION['user'];
?>
<br>
<a href="../viewadmin.php">Admin</a> || <a href="../akses/viewmenu.php">Barang</a> || <a href="../penjualan/viewpemesanan.php">Penjualan</a> || <a href="../logout.php">LOGOUT</a>

<form action="" method="post" enctype="multipart/form-data">
<table>
    
<tr><td>ID Jenis</td>
	<td><input type="txt" name="ij">
    </td></tr>
    
<tr><td>Nama Jenis</td>
	<td><input type="txt" name="nj"></td></tr>

<tr>
	<td><input type="submit" name="simpan" value="simpan"></td></tr>
</table>
</form>

<?php
if(isset($_POST['simpan'])){
    $idj = $_POST['ij'];
    $nama = $_POST['nj'];
    
	$conn -> query("INSERT INTO jenis VALUES('$idj','$nama')");
	header("location: viewmenu.php");
  }
?>