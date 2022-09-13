<?php
	$conn = mysqli_connect('localhost','root','');
	mysqli_select_db($conn, 'kp');
	
	//login
	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		
	$cekuser = mysqli_query($conn, "select * from user where username='$username' and password='$password'");
	$hitung = mysqli_num_rows($cekuser);
	
	if($hitung>0){
		$ambildatarole = mysqli_fetch_array($cekuser);
		$role = $ambildatarole['role'];
		
		if($ambildatarole ['level'] == 'superadmin'){
			//kalau admi
			$_SESSION['login'] = 'Logged';
			$_SESSION['role'] = 'Dinkesprovjateng';
			header('location:index2.php');
		}else if($ambildatarole['level']=="admin"){
			//kalau bukan superadmin
			$_SESSION['login'] = 'Logged';
			$_SESSION['role'] = 'Pukesmaskarangawen2';
			header('location:index.php');
		}
	} else {
		echo 'Data Tidak Ditemukan';
	}
	};
?>