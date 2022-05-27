<?php
session_start();
if(isset($_SESSION['nama'])){
session_unset(); ?>
     <script>document.location.href='../index.php';</script>
<?php
}
else{
    echo"Gagal";
}
?>