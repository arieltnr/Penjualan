<?php
session_start();
if(empty($_SESSION['user'])){
header("location: ../index.php");
}
include'../config.php';
	$id = $_GET['id'];

	$conn -> query("DELETE FROM admin WHERE id='$id'");
	header("location:viewadmin.php");
?>