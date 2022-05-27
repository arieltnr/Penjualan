<?php
session_start();
if(empty($_SESSION['user'])){
header("location: ../index.php");
}
echo "Selamat Datang Admin : ".$_SESSION['user'];
include'../config.php';
$no = 1;
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/grayscale.css">
    <script type="text/javascript" src="../bootstrap/jquery.min.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<div class=".navbar-custom"></div>
<a href="viewadmin.php">Admin</a> || <a href="./akses/viewmenu.php">Barang</a> || <a href="./penjualan/viewpemesanan.php">Penjualan</a> || <a href="logout.php">LOGOUT</a>
<center>
<table class="table">
  <tr>
    <th> No </th>
    <th> Nama </th>
    <th> Username </th>
    <th> Password </th>
    <th> Opsi </th>
  </tr>

<?php
$tampil = $conn -> query("SELECT * FROM admin");
while($data = $tampil -> fetch_array()){
?>

    <tr>
      <td> <?php echo $no++ ; ?> </td>
      <td> <?php echo $data['nama']; ?> </td>
      <td> <?php echo $data['username']; ?> </td>
      <td> <?php echo $data['password']; ?> </td>
      <td>
           <a href="editadmin.php?id=<?php echo $data['0']; ?>">Edit</a> ||
           <a href="hapusadmin.php?id=<?php echo $data['0']; ?>">Hapus</a>
       </td>
<?php } ?>
</table>
<a href="tambahadmin.php">::: + DATA ADMIN :::</a>
    
    </center>
</body>
</html>