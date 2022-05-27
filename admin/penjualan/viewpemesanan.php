<?php
session_start();
if(isset($_SESSION['user'])) {
include'../../config.php';
$no = 1;
echo $_SESSION['user'];
?>
<br>
<a href="../viewadmin.php">Admin</a> || <a href="../akses/viewmenu.php">Barang</a> || <a href="viewpemesanan.php">Penjualan</a> || <a href="../logout.php">LOGOUT</a>

<table border="5" align="center">
  <tr>
    <th> No </th>
    <th> Nama </th>
    <th> Alamat </th>
    <th> Nohp </th>
    <th> Tgl Beli </th>
    <th> Keterangan </th>
    <th colspan="7"> Opsi </th>
  </tr>

<?php
$tampil = $conn -> query("SELECT * FROM penjualan JOIN pelanggan using(id_pelanggan) JOIN detail USING(id_penjualan) GROUP BY nama_pelanggan");
while($data = $tampil -> fetch_array()){
?>

    <tr>
      <td> <?php echo $no++ ; ?> </td>
      <td> <?php echo $data['nama_pelanggan']; ?> </td>
      <td> <?php echo $data['alamat']; ?> </td>
      <td> <?php echo $data['hp']; ?> </td>
      <td> <?php echo $data['tgl']; ?> </td>
      <td>
           <a href="detail.php?nama=<?php echo $data['nama_pelanggan'];?>&id=<?php echo $data['id_pelanggan']; ?>">Detail</a>
       </td>
        <td>
           <a href="hapus.php?nama=<?php echo $data['nama_pelanggan'];?>&id=<?php echo $data['id_pelanggan']; ?>">Hapus</a>
       </td>
<?php } ?>
</table>
<?php } ?>