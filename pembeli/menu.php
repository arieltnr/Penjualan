<html>
<head>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
    <script type="text/javascript" src="../bootstrap/jquery.min.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        
    <?php date_default_timezone_set("Asia/Jakarta"); ?>;
    var detik = <?php echo date('s'); ?>;
    var menit = <?php echo date('i'); ?>;
    var jam   = <?php echo date('H'); ?>;
    
     
    function clock()
    {
        if (detik!=0 && detik%60==0) {
            menit++;
            detik=0;
        }
        second = detik;
         
        if (menit!=0 && menit%60==0) {
            jam++;
            menit=0;
        }
        minute = menit;
         
        if (jam!=0 && jam%24==0) {
            jam=0;
        }
        hour = jam;
         
        if (detik<10){
            second='0'+detik;
        }
        if (menit<10){
            minute='0'+menit;
        }
         
        if (jam<10){
            hour='0'+jam;
        }
        waktu = hour+':'+minute+':'+second;
         
        document.getElementById("clock").innerHTML = waktu;
        detik++;
    }
 
    setInterval(clock,1000);
</script>
    <style type="text/css">
		* {
			margin: 0;
			padding: 0;
		}
 
		#gallery {
			width: 903px;
			height: 370px;
			padding: 20px;
            text-align: center;
		}
    table td {
        text-align: center;
    }
        a {
            text-decoration: none;
        }
        
        a:hover{
            background-color: moccasin;
        }
		</style>
</head>
<body>

<?php
include'../config.php';
session_start();
if(isset($_SESSION['nama'])) {
//else {
  //if(isset($_SESSION['nama'])) {
    //header('location: viewmenu.php');
$nama = $_SESSION['nama'];
$no = 1;

$today = date("l, d-M-Y");
?>
<div id="gallery">
<table class="table table-hover table-condensed table-responsive">
    <tr class="warning">
        <th> NO </th>
        <th align="center"> Nama Barang </th>
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
        <td><?php echo $data['nama_barang']; ?></td>
        <td><?php echo $data['nama_jenis']; ?></td>
        <td>Rp.<?php echo number_format ($data['harga']); ?></td>
        <td><?php echo $data['stok']; ?></td>
        <td>
           <a class="btn btn-warning btn-md" href="pesanpr.php?input=add&id_barang=<?php echo $data['id_barang']; ?>&harga=<?php echo $data['harga']; ?>&nama=<?php echo $_SESSION['nama']; ?>">Beli</a>
        </td>
               <?php } ?>
   </tr>
</table>
</div>

<div id="tampil">
    
  <center>
          <?php $no = 1;
                 echo "<b>".$today."</b><br>"; ?>
<div style="text-align:center;">
    <h5 id="clock"></h5>
</div>
                <?php echo "<b>".$nama."</b>"; ?>
     <fieldset>
        <legend>Daftar Beli</legend>

<table class="table table-striped">
  <tr>
      <th><center> NO </center></th>
      <th><center> Nama Menu </center></th>
      <th><center> Harga </center></th>
      <th><center> Jumlah </center></th>
      <th><center> Total </center></th>
  </tr>
    
<?php        
$sql = $conn -> query("SELECT * FROM penjualan JOIN barang using(id_barang) JOIN detail USING(id_penjualan) WHERE id_pelanggan = '$nama'");
while ($data2 = $sql -> fetch_array()){
?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $data2['nama_barang']; ?></td>
        <td>Rp.<?php echo number_format ($data2['harga']); ?></td>
        <td align="center"><?php echo $data2['jumlah']; ?></td>
        <td>Rp.<?php echo number_format($total = $data2['total']);?></td>
<?php } ?>
    </tr>
</table>
    <?php $aweu = mysqli_num_rows($sql);     
      if ($aweu < 1){ ?>
    <div><h3><center> Kosong </center></h3></div>
    </fieldset>
    <?php }
        else { ?>
      <a href="keranjang.php">Detail</a>
        <?php }?>
    </center>
</div>

<?php }
    if(empty($_SESSION['nama'])) { 
    header('location: daftar.php');
    } ?>
<div id="crud"></div>

<script type="text/javascript" src="../jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $(".button").click(function() {
    $("#crud").load("daftar.php").slideToggle(1000);
});
  });
</script>
    </body>
</html>