<?php
include'../koneksi.php';
session_start();
    $a = $_POST['user'];
    $b = $_POST['pass'];
    $_SESSION['user'] = $a;

$sql = $link -> query("SELECT * FROM admin WHERE username = '$a' AND password = '$b'");
$data = mysqli_num_rows($sql);
if ($data==1){
header('location: viewadmin.php');
}
else {
    echo "GAGAl";
    header('location: ../index.php');
}
?>