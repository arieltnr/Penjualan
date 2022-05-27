<?php
session_start();
if(empty($_SESSION['user'])){
header("location: ../index.php");
}
echo $_SESSION['user'];
include'../config.php';
?>
<br>
<a href="viewadmin.php">Admin</a> || <a href="./akses/viewmenu.php">Barang</a> || <a href="./penjualan/viewpemesanan.php">Penjualan</a> || <a href="logout.php">LOGOUT</a>

<form action="" method="post">
<table>
<tr><td>Nama</td>
	<td><input type="txt" name="nama"></td></tr>

<tr><td>Username</td>
	<td><input type="txt" name="username"></td></tr>

<tr><td>Password</td>
	<td><input type="password" name="password"></td></tr>

<tr><td></td>
	<td><input type="submit" name="simpan" value="simpan"></td></tr>
</table>
</form>

<?php
if(isset($_POST['simpan'])){
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	$conn -> query("INSERT INTO admin VALUES('','$nama','$username','$password')");
	header("location:viewadmin.php");
  }
?>