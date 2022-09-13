<?php
	include 'koneksi.php';
	
	$id = $_GET['id'];
	$sqlDelete = "DELETE FROM kematianibu WHERE id='$id'";
	$query = mysqli_query($conn, $sqlDelete);
	
	header("location: read.php");
?>