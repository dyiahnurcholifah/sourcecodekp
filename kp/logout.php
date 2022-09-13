<?php
session_start();
require_once"koneksi.php";

session_destroy();
header("location: login2.php");
 
// unset($_SESSION['username']);
// echo "<script>window.location='index.php'</script>";

