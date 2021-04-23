<!DOCTYPE HTML>
<html>
	<head>
		<title>Quick Loan Application</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<h1><strong><a href="index.php">Quick Loan Application</a></strong></h1>
				<nav id="nav">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="about.php">About</a></li>
						<li><a href="services.php">Services</a></li>
						<li><a href="overdue.php">Overdue</a></li>
						<li><a href="portal.php">Login/Sign Up</a></li>
					</ul>
				</nav>
			</header>

			<a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>

		<!-- Main -->
			<div style="width:100%;">
						<center>
						<?php 
						$username=$_POST['username'];
						$password=$_POST['password'];
						if(isset($username) && isset($password))
						{
							include"conn.php";
							$check=mysqli_query($con,"select * from members where (phonenumber='$username' || idnumber='$username') && password='$password'");
							$num=mysqli_num_rows($check);
							if($num==1)
							{
								//login user
								session_start();
								$_SESSION['usersession']=$username;
								header("location:userhome.php");
							}
							else
							{
								//login admin
								$checkadmin=mysqli_query($con,"select * from admin where (username='$username'||phonenumber='$username') && password='$password'");
								$ngapi=mysqli_num_rows($checkadmin);
								if($ngapi)
								{
									//login admin
									session_start();
									$_SESSION['adminsession']=$username;
									header("location:adminhome.php");
								}
								else
								{
									echo"Wrong username or password<br/><a href='portal.php'>Try Again</a>";
								}
							}
						}
						else
						{
							header("location:portal.php");
						}
						?>
						</center>
			</div>

		<!-- Footer -->
			<footer id="footer">
				<div class="container">
					<ul class="icons">
						<li><a href="#" class="icon fa-facebook"></a></li>
						<li><a href="#" class="icon fa-twitter"></a></li>
						<li><a href="#" class="icon fa-instagram"></a></li>
						<li><a href="#" class="icon fa-phone"></a></li>
					</ul>
					<ul class="copyright">
						<li>&copy; Quick Loan Limited <?php echo date("Y");?></li>
						<li>Design: <a href="http://www.futuregs.ga">Future Global Softwares</a></li>
						<li>Images: <a href="http://www.futuregs.ga">Future Global Softwares</a></li>
					</ul>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>