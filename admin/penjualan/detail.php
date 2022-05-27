<script>
	function printContent(el){
		var restorepage = document.body.innerHTML;
		var printcontent = document.getElementById(el).innerHTML;
		document.body.innerHTML = printcontent;
		window.print();
		document.body.innerHTML = restorepage;
	}
	</script>

<?php
session_start();
if(empty($_SESSION['user'])){
header("location: ../index.php");
}
include'../../config.php';
$no = 1;
$id = $_GET['id'];
$nama = $_GET['nama'];
echo $_SESSION['user'];
?>
<br>
<a href="../viewadmin.php">Admin</a> || <a href="../akses/viewmenu.php">Barang</a> || <a href="viewpemesanan.php">Penjualan</a> || <a href="../logout.php">LOGOUT</a>

<center>
<div id="div1">
<fieldset style="width: 430px;">
  <legend><?php echo "<center>.$nama.</center>";?></legend>  
<table align="center" width="100%">
  <tr>
    <th> No </th>
    <th> Nama Menu </th>
    <th> Harga </th>
    <th> Jumlah </th>
    <th> Total </th>
  </tr>

<?php    
$sql = $conn -> query("SELECT * FROM penjualan JOIN barang using(id_barang) JOIN pelanggan using(id_pelanggan) JOIN detail USING(id_penjualan) WHERE id_pelanggan = '$id'");
while ($data2 = $sql -> fetch_array()){
?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $data2['nama_barang']; ?></td>
        <td>Rp.<?php echo number_format ($data2['harga']); ?></td>
        <td align="center"><?php echo $data2['jumlah']; ?></td>
        <td>Rp.<?php echo number_format($total = $data2['total']);
                $nama +=$total;?></td>
    </tr>
    <?php } ?>
    <tr><td colspan="5" align="center"><b>Total Bayar : </b>Rp.<?php echo number_format($nama); ?></td></tr>
</table>
</fieldset>
</div>
<form action="" method="post">
    <input name="save" type="submit" value="Print" onclick="printContent('div1')">
</form>
        </center>

<?php
if (isset($_POST['save'])){
    $nama = $_GET['nama'];
    $link -> query("UPDATE pemesanan SET ket = 'Sudah Dikirim' WHERE nama_pembeli ='$nama'");
    header('location: viewpemesanan.php');
}