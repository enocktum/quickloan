<?php 
session_start();
if(!isset($_SESSION['usersession']))
{
	header("location:portal.php");
}
else
{
	$username=$_SESSION['usersession'];
	include"conn.php";
	$query=mysqli_query($con,"select * from members where phonenumber='$username'||idnumber='$username'");
	$num=mysqli_num_rows($query);
	if($num>0)
	{
		$data=mysqli_fetch_array($query);
		$name=$data['firstname']." ".$data['lastname'];
	}
	else
	{
		header("location:portal.php");
	}
}
?>
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
						<li><a href="userhome.php"><?php echo $name; ?></a></li>
						<li><a href="myloans.php">My Loans</a></li>
						<li><a href="userlogout.php">Logout</a></li>
					</ul>
				</nav>
			</header>

			<a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>

		<!-- Main -->
			<div style="width:100%;">
						<center>
						<?php 
						session_start();
						unset($_SESSION['usersession']);
						header("location:index.php");
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