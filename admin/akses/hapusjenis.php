<?php
session_start();
if(empty($_SESSION['user'])){
header("location: ../index.php");
}
include'../../config.php';
	$id = $_GET['id'];

	$conn -> query("DELETE FROM jenis WHERE id_jenis='$id'");
	header("location: viewmenu.php");
?>