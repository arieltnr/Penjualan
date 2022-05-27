<?php
session_start();
if(empty($_SESSION['user'])){
header("location: ../index.php");
}
include'../../config.php';
echo $_SESSION['user'];
$no = 1;
?>
<br>
<a href="../viewadmin.php">Admin</a> || <a href="../akses/viewmenu.php">Barang</a> || <a href="../penjualan/viewpemesanan.php">Penjualan</a> || <a href="../logout.php">LOGOUT</a>

<center>
<table class="table table-hover table-condensed table-responsive">
    <tr>
        <th> NO </th>
        <th align="center"> ID Jenis </th>
        <th align="center"> Nama Jenis </th>
        <th align="center"> Opsi </th>
    </tr>
          
               <?php
                $sql = $conn -> query("SELECT * FROM jenis");
                while($row = $sql -> fetch_array()){ ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $row['id_jenis']; ?></td>
        <td><?php echo $row['nama_jenis']; ?></td>
        <td><a href="editjenis.php?id=<?php echo $row['id_jenis']; ?>">Edit</a>
            <a href="hapusjenis.php?id=<?php echo $row['id_jenis']; ?>">Hapus</a>
        </td>
               <?php } ?>
   </tr>
</table>
    <a href="tambahjenis.php">::: + DATA Jenis :::</a>
    
<table class="table table-hover table-condensed table-responsive">
    <tr>
        <th> NO </th>
        <th align="center"> Nama Barang </th>
        <th align="center"> ID Barang </th>
        <th align="center"> Jenis </th>
        <th align="center"> Harga </th>
        <th align="center"> Stok </th>
        <th align="center"> Opsi </th>
    </tr>
          
               <?php
                $tampil = $conn -> query("SELECT * FROM barang JOIN jenis USING(id_jenis)");
                while($data = $tampil -> fetch_array()){ ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $data['id_barang']; ?></td>
        <td><?php echo $data['nama_barang']; ?></td>
        <td><?php echo $data['nama_jenis']; ?></td>
        <td>Rp.<?php echo number_format ($data['harga']); ?></td>
        <td><?php echo $data['stok']; ?></td>
        <td><a href="editmenu.php?id=<?php echo $data['id_barang']; ?>">Edit</a>
            <a href="hapusmenu.php?id=<?php echo $data['id_barang']; ?>">Hapus</a>
        </td>
               <?php } ?>
   </tr>
</table>
<a href="tambahmenu.php">::: + DATA MENU :::</a>