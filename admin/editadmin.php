<html>
<head>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/grayscale.css">
    <script type="text/javascript" src="../bootstrap/jquery.min.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<?php
session_start();
if(empty($_SESSION['user'])){
header("location: ../index.php");
}
include'../config.php';
echo $_SESSION['user'];
$id = $_GET['id'];
$haha = $conn -> query("SELECT * FROM admin WHERE id='$id'");
$row = $haha -> fetch_array();
?>
<br>
<a href="viewadmin.php">Admin</a> || <a href="./akses/viewmenu.php">Barang</a> || <a href="./penjualan/viewpemesanan.php">Penjualan</a> || <a href="logout.php">LOGOUT</a>

<div class="container">
  <div id="myModal" role="dialog">
    <div class="modal-dialog" role="document">
<form action="" method="post" class="form-horizontal">
<div class="form-group">
    <label class="control-label col-sm-2" for="nama">Nama</label>
    <div class="col-sm-4">
<input type="hidden" name="id" value="<?php echo $row['0']; ?>" class="form-control">
    </div>
</div>

	<td><input type="txt" name="nama" value="<?php echo $row['1']; ?>"></td></tr>

<tr><td>Username</td>
	<td><input type="txt" name="username" value="<?php echo $row['2']; ?>"></td></tr>

<tr><td>Password</td>
	<td><input type="password" name="password" value="<?php echo $row['3']; ?>"></td></tr>

<tr><td></td>
	<td><input type="submit" name="simpan" value="simpan"></td></tr>
</table>
</form>
    </body>
</html>

<?php
if(isset($_POST['simpan'])){
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	$conn -> query("UPDATE admin SET nama='$nama', username='$username', password='$password' WHERE id='$id'");
	header("location:viewadmin.php");
  }