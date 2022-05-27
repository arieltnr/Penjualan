<html>
<head>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
    <script type="text/javascript" src="../bootstrap/jquery.min.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
    
<?php
include'../config.php';
session_start();
$carikode = $conn -> query("SELECT max(id_pelanggan) from pelanggan");
  $datakode = mysqli_fetch_array($carikode);
  if ($datakode) {
   $nilaikode = substr($datakode[0], 1);

   $kode = (int) $nilaikode;

   $kode = $kode + 1;
   $kode_otomatis = "P".str_pad($kode, 4, "0", STR_PAD_LEFT);
  } else {
   $kode_otomatis = "P0001";
  }
?>

<div class="container">
  <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Daftar<span class="glyphicon-cloud"></span></button>

  <!-- Modal -->
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
<form action="" method="post" class="form-horizontal">
      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Pelanggan</h4>
        </div>
        <!-- body modal -->
        <div class="modal-body">
          <div class="form-group">
    <label class="control-label col-sm-2" for="nama">ID Pelanggan:</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="a" value="<?php echo $kode_otomatis; ?>">
    </div>
</div>

<div class="form-group">
    <label class="control-label col-sm-2" for="nama">Nama:</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" name="b">
    </div>
</div>
    
<div class="form-group">
    <label class="control-label col-sm-2" for="nama">Email:</label>
    <div class="col-sm-7">
        <input type="text" class="form-control" name="c">
    </div>
</div>
    
<div class="form-group">
    <label class="control-label col-sm-2" for="nama">Alamat:</label>
    <div class="col-sm-9">
        <textarea class="form-control" name="d"></textarea>
    </div>
</div>
    
<div class="form-group">
    <label class="control-label col-sm-2" for="nama">Jenis Kelamin:</label>
    <div class="col-sm-10">
        <input type="radio" name="e">Pria
        <input type="radio" name="e">Wanita
    </div>
</div>

<div class="form-group">
    <label class="control-label col-sm-2" for="nama">NO HP:</label>
    <div class="col-sm-8">
         <input type="text" class="form-control" name="f">
    </div>
</div>
    
<div class="form-group">
    <label class="control-label col-sm-2" for="nama">NO KTP:</label>
    <div class="col-sm-8">
         <input type="text" class="form-control" name="g">
    </div>
</div>
        </div>
        <!-- footer modal -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <center><input type="submit" name="kirim" value="Daftar" class="btn btn-info btn-md"></center>
        </div>
      </div>
</form>
    </div>
  </div>
</div>
</body>
</html>

<?php
if(isset($_POST['kirim'])){
    $id = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['c'];
    $d = $_POST['d'];
    $e = $_POST['e'];
    $f = $_POST['f'];
    $g = $_POST['g'];
    $_SESSION['nama'] = $id;

$conn -> query("INSERT INTO pelanggan VALUES('$id', '$b', '$c', '$d', '$e' ,'$f' ,'$g')");
    
header('location: menu.php');
}
?>
