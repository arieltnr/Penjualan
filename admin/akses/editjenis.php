<?php
session_start();
if(empty($_SESSION['user'])){
header("location: ../index.php");
}
include'../../config.php';
$id = $_GET['id'];
$sql = $conn -> query("SELECT * FROM jenis WHERE id_jenis='$id'");
$row = $sql -> fetch_array();
echo $_SESSION['user'];
?>
<br>
<a href="../viewadmin.php">Admin</a> || <a href="../akses/viewmenu.php">Barang</a> || <a href="../penjualan/viewpemesanan.php">Penjualan</a> || <a href="../logout.php">LOGOUT</a>

<form action="" method="post" enctype="multipart/form-data">
<table>
    
<tr><td>ID Jenis</td>
	<td><input type="txt" name="id" value="<?php echo $row['id_jenis']; ?>" readonly></td></tr>

<tr><td>Nama Jenis</td>
	<td><input type="txt" name="namamenu" value="<?php echo $row['nama_jenis']; ?>"></td></tr>

<tr>	<td><input type="submit" name="edit" value="edit"></td></tr>
</table>
</form>

<?php
if(isset($_POST['edit'])){
	$namamenu = $_POST['namamenu'];

	$conn -> query("UPDATE jenis SET nama_jenis='$namamenu' WHERE id_jenis='$id'");
	header("location: viewmenu.php");
  }