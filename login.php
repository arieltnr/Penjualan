<html>
<head>
	<link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.css">
    <script type="text/javascript" src="./bootstrap/jquery.min.js"></script>
    <script type="text/javascript" src="./bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Login Admin
    <span class="glyphicon-cloud"></span>
  </button>

  <!-- Modal -->
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
<form action="" method="post" class="form-horizontal">
      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Login</h4>
        </div>
        <!-- body modal -->
        <div class="modal-body">
<div class="form-group">
    <label class="control-label col-sm-2" for="nama">Username:</label>
    <div class="col-sm-5">
        <input type="text" class="form-control" name="user">
    </div>
</div>
    
<div class="form-group">
    <label class="control-label col-sm-2" for="nama">Password:</label>
    <div class="col-sm-5">
        <input type="password" class="form-control" name="pass">
    </div>
</div>
        </div>
        <!-- footer modal -->
        <div class="modal-footer">
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
include'config.php';
session_start();
    $a = $_POST['user'];
    $b = $_POST['pass'];
    $_SESSION['user'] = $a;

$sql = $conn -> query("SELECT * FROM admin WHERE username = '$a' AND password = '$b'");
$data = mysqli_num_rows($sql);
if ($data==1){
header('location: ./admin/viewadmin.php');
}
else {
    echo "GAGAl";
    header('location: ../index.php');
}
}
?>