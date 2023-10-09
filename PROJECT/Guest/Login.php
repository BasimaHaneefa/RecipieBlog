<!doctype html>
<html lang="en">
  <head>
  	<title>Login </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="../Assets/Template/Login/css/style.css">

	</head>
	<body>
	<?php
session_start();
include("../Assets/Connection/Connection.php");

if(isset($_POST["btnlogin"]))
{
	
	$email=$_POST["txtemail"];
	$password=$_POST["txtpassword"];
	
	$selAdmin="select * from tbl_admin where admin_email='$email' and admin_password='$password'";
	$rowAdmin=$Conn->query($selAdmin);
	
	$selUser="select * from tbl_user where user_email='$email' and user_password='$password'";
	$rowUser=$Conn->query($selUser);
	
	if($Admin=$rowAdmin->fetch_assoc())
	{
		$_SESSION["aid"]=$Admin["admin_id"];
		$_SESSION["aname"]=$Admin["admin_name"];
		header("location:../Admin/HomePage.php");
		
	}
	else if($User=$rowUser->fetch_assoc())
	{
		$_SESSION["uid"]=$User["user_id"];
		$_SESSION["uname"]=$User["user_name"];
		header("location:../User/HomePage.php");
		
	}
	else{
	?>	
		<script>
		alert("Invalid Login!!");
		window.location="Login.php";
		
		</script>
		<?php
	}
	
	
	
}


?>

	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login </h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap py-5">
		      	<div class="img d-flex align-items-center justify-content-center" style="background-image: url(../Assets/Template/Login/images/bg.jpg);"></div>
		      	<h3 class="text-center mb-0">Welcome</h3>
		      
						<form action="#" class="login-form" method="post">
		      		<div class="form-group">
		      			<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-envelope"></span></div>
		      			<input type="email" name="txtemail" class="form-control" placeholder="Email" required>
		      		</div>
	            <div class="form-group">
	            	<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lock"></span></div>
	              <input type="password" name="txtpassword" class="form-control" placeholder="Password" required>
	            </div>
	            
	            <div class="form-group">
	            	<button type="submit" class="btn form-control btn-primary rounded submit px-3" name="btnlogin">Get Started</button>
	            </div>
	          </form>
	         
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="../Assets/Template/Login/js/jquery.min.js"></script>
  <script src="../Assets/Template/Login/js/popper.js"></script>
  <script src="../Assets/Template/Login/js/bootstrap.min.js"></script>
  <script src="../Assets/Template/Login/js/main.js"></script>

	</body>
</html>

