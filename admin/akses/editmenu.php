<?php
session_start();
if(empty($_SESSION['user'])){
header("location: ../index.php");
}
include'../../config.php';
$id = $_GET['id'];
$sql = $conn -> query("SELECT id_jenis FROM jenis");
$haha = $conn -> query("SELECT * FROM barang WHERE id_barang='$id'");
$row = $haha -> fetch_array();
echo $_SESSION['user'];
?>
<br>
<a href="../viewadmin.php">Admin</a> || <a href="../akses/viewmenu.php">Barang</a> || <a href="../penjualan/viewpemesanan.php">Penjualan</a> || <a href="../logout.php">LOGOUT</a>

<form action="" method="post" enctype="multipart/form-data">
<table>
    
<tr><td>ID Barang</td>
	<td><input type="txt" name="id" value="<?php echo $row['id_barang']; ?>" readonly></td></tr>
    
<tr><td>ID Jenis</td>
	<td><select name="idj"> <?php while($row1 = $sql -> fetch_array()){ ?>
        <option value="<?php echo $row['id_jenis']; ?>"><?php echo $row['id_jenis']; ?></option><?php } ?>
        </select>
    </td></tr>

<tr><td>Nama Barang</td>
	<td><input type="txt" name="namamenu" value="<?php echo $row['nama_barang']; ?>"></td></tr>

<tr><td>Stok</td>
	<td><input type="txt" name="stok" value="<?php echo $row['stok']; ?>"></td></tr>

<tr><td>Harga</td>
	<td><input type="txt" name="harga" value="<?php echo $row['harga']; ?>"></td></tr>

<tr><td></td>
	<td><input type="submit" name="edit" value="edit"></td></tr>
</table>
</form>

<?php
if(isset($_POST['edit'])){
	$namamenu = $_POST['namamenu'];
    $idj = $_POST['idj'];
	$ket = $_POST['stok'];
	$harga = $_POST['harga'];

	$conn -> query("UPDATE barang SET nama_barang='$namamenu', id_jenis='$idj', stok='$ket', harga='$harga' WHERE id_barang='$id'");
	header("location: viewmenu.php");
  }