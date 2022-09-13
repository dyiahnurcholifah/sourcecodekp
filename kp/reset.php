<?php session_start();
error_reporting(0);
include("koneksi.php");
if(isset($_POST['submit'])) {
  $_SESSION['submit']='';
}

if(isset($_POST['change']))
{
 $username=$_POST['username'];
 $password=md5($_POST['password']);
 $query=mysqli_query($conn,"SELECT * FROM user WHERE username='$username'");
 $num=mysqli_fetch_array($query);
 if($num>0)
 {
  mysqli_query($conn,"update user set password='$password' WHERE username='$username'");
  $msg="Password Changed Successfully";
}
else
{
  $errmsg="Invalid username";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />>
        <meta name="description" content="" />
        <meta name="author" content="" />
<title>Register</title>
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
<!-- costum css -->
<link rel="stylesheet" href="style.css">
</head>
<body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-3">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Tambah Akun</h3></div>
                                    <div class="card-body">
									<section class="container-fluid mb-4">
										<!-- justify-content-center untuk mengatur posisi form agar berada di tengah-tengah -->
										<section class="row justify-content-center">
										<section class="col-5 col-sm-6 col-md-9">
											<form class="form-container" action="register.php" method="POST">
												<?php if($error != ''){ ?>
													<div class="alert alert-danger" role="alert"><?= $error; ?></div>
												<?php } ?>
												
												<div class="form-group">
													<label for="username">Username</label>
													<input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username">
												</div>
												<div class="form-group">
													<label for="InputPassword">Password Baru</label>
													<input type="password" class="form-control" id="InputPassword" name="password" placeholder="Password Baru">
													<?php if($validate != '') {?>
														<p class="text-danger"><?= $validate; ?></p>
													<?php }?>
												</div>
												<div class="form-group">
													<label for="confirmpassword">Confirm Password</label>
													<input type="text" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password">
												</div>
												<button type="submit" name="submit" class="btn btn-success mt-3 btn-block">Reset Password</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</main>
					</div>
					<div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Dinas Kesehatan Provinsi Jawa Tengah</div>
                        </div>
                    </div>
                </footer>
            </div>
				</div>
                </form>
            </section>
            </section>
        </section>
 
    <!-- Bootstrap requirement jQuery pada posisi pertama, kemudian Popper.js, dan  yang terakhit Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>