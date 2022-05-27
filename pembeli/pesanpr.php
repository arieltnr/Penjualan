<html>
<head>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
    <script type="text/javascript" src="../bootstrap/jquery.min.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $('#jml').keypress(function (data)
        {
           if(data.which!=8 && data.which!=0 &&
             (data.which<48 || data.which>57))
        {
        $('#pesan').html("Harus Berisi Angka").show().fadeOut(3000);
            return false;
        }
        });
    });
    </script>
</head>
<body>
    
<?php
include'../config.php';
session_start();
if(isset($_SESSION['nama'])) {
$nama = $_SESSION['nama'];
$id_barang = $_GET['id_barang'];
$carikode = $conn -> query("SELECT id_penjualan from penjualan");
  $datakode = mysqli_fetch_array($carikode);
  $jumlah_data = mysqli_num_rows($carikode);
  if ($datakode) {
   $nilaikode = substr($jumlah_data[0], 1);

   $kode = (int) $nilaikode;

   $kode = $jumlah_data + 1;

   $kode_otomatis = "J".str_pad($kode, 4, "0", STR_PAD_LEFT);
  } else {
   $kode_otomatis = "J0001";
  }

$harga = $_GET['harga'];
$now = date('y-m-d');
$tampil = $conn -> query("SELECT * FROM barang JOIN jenis USING(id_jenis) WHERE id_barang = '$id_barang'");
$row = $tampil -> fetch_array();
?>
<br>

<form action="" method="post" class="form-horizontal">
    <legend><b>Beli</b></legend>
    
<input type="hidden" name="idp" value="<?php echo $kode_otomatis; ?>">
    
<div class="form-group">
    <label class="control-label col-sm-2" for="nama">ID Barang:</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="id" value="<?php echo $row['id_barang']; ?>" readonly>
    </div>
</div>
    
<div class="form-group">
    <label class="control-label col-sm-2" for="nama">Nama Barang:</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="nama" value="<?php echo $row['nama_barang']; ?>" readonly>
    </div>
</div>
    
<div class="form-group">
    <label class="control-label col-sm-2" for="nama">Jenis:</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="jenis" value="<?php echo $row['nama_jenis']; ?>" readonly>
    </div>
</div>
    
<div class="form-group">
    <label class="control-label col-sm-2" for="nama">Harga:</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="harga" value="<?php echo $row['harga']; ?>" readonly>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-sm-2" for="nama">Stok:</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="stok" value="<?php echo $row['stok']; ?>" readonly>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-sm-2" for="nama">Jumlah Beli:</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="jumlah" id="jml">
        <span id="pesan"></span>
    </div>
</div>    
	<input type="submit" name="simpan" value="simpan" class="btn btn-danger btn-md">
</form>

<?php
if(isset($_POST['simpan'])){
	$nama = $_SESSION['nama'];
    $idp = $_POST['idp'];
	$jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $total = $jumlah * $harga;
    $id_barang = $_GET['id_barang'];
    $now = date('y-m-d');
    
    $sql = $conn -> query("SELECT * FROM penjualan WHERE id_barang='$id_barang' AND id_pelanggan='$nama'");
    $aweu = mysqli_num_rows($sql);
    if ($aweu == 0){
          $conn -> query("INSERT INTO penjualan VALUES('$idp', '$nama', '$id_barang', '$now', '$total')");
          $conn -> query("INSERT INTO detail VALUES('', '$idp', '$id_barang', '$jumlah', '$total')");
          $conn -> query("UPDATE barang SET stok = stok - '$jumlah' WHERE id_barang ='$id_barang' ");
    }
    else {
        //$conn -> query("UPDATE detail JOIN penjualan ON detail.id_penjualan=penjualan.id_penjualan SET detail.jumlah = jumlah + '$jumlah' WHERE id_barang ='$id_barang' AND id_pelanggan = '$nama'");
        //$conn -> query("UPDATE barang SET stok = stok - '$jumlah' WHERE id_barang ='$id_barang'");
    }
	header("location: menu.php");
  }
}