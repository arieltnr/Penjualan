<?php
session_start();
if(empty($_SESSION['user'])){
header("location: ../index.php");
}
include'../../config.php';
$sql = $conn -> query("SELECT id_jenis FROM jenis");
echo $_SESSION['user'];
?>
<br>
<a href="../viewadmin.php">Admin</a> || <a href="../akses/viewmenu.php">Barang</a> || <a href="../penjualan/viewpemesanan.php">Penjualan</a> || <a href="../logout.php">LOGOUT</a>

<form action="" method="post" enctype="multipart/form-data">
<table>
<tr><td>ID Barang</td>
	<td><input type="txt" name="idb"></td></tr>
    
<tr><td>ID Jenis</td>
	<td><select name="idj"> <?php while($row = $sql -> fetch_array()){ ?>
        <option value="<?php echo $row['id_jenis']; ?>"><?php echo $row['id_jenis']; ?></option><?php } ?>
        </select>
    </td></tr>
    
<tr><td>Nama Barang</td>
	<td><input type="txt" name="nb"></td></tr>
    
<tr><td>Harga</td>
	<td><input type="txt" name="h"></td></tr>

<tr><td>Stok</td>
	<td><input type="txt" name="s"></td></tr>

<tr>
	<td><input type="submit" name="simpan" value="simpan"></td></tr>
</table>
</form>

<?php
if(isset($_POST['simpan'])){
	$idb = $_POST['idb'];
    $idj = $_POST['idj'];
    $nama = $_POST['nb'];
	$harga = $_POST['h'];
	$stok = $_POST['s'];

	$conn -> query("INSERT INTO barang VALUES('$idb','$idj','$nama','$harga','$stok')");
	header("location: viewmenu.php");
  }
?>