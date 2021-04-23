<?php 
session_start();
if(!isset($_SESSION['adminsession']))
{
	header("location:portal.php");
}
else
{
	$username=$_SESSION['adminsession'];
	include"conn.php";
	$query=mysqli_query($con,"select * from admin where (username='$username'|| phonenumber ='$username')");
	$num=mysqli_num_rows($query);
	if($num>0)
	{
		$data=mysqli_fetch_array($query);
		$phonenumber=$data['phonenumber'];
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
				<h1><strong><a href="adminhome.php">Quick Loan Application</a></strong></h1>
				<nav id="nav">
					<ul>
						<li><a href="userhome.php">Admin</a></li>
						<li><a href="pendingpayments.php">Approval</a></li>
						<li><a href="overduepayments.php">Overdue</a></li>
						<li><a href="auctioneditems.php">Auctioned</a></li>
						<li><a href="adminlogout.php">Logout</a></li>
					</ul>
				</nav>
			</header>

			<a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>

		<!-- Main -->
			<div style="width:100%;">
						<center>
						<h1>Pending Approval Status</h1>
						<p>
						<?php
						include"conn.php";
						$incre=$_POST['membersincre'];
						if(isset($incre))
						{
							$update=mysqli_query($con,"update memberloan set approvalstatus='1' where incre='$incre'");
							if($update)
							{
								echo'
								<img width="300" height="250" src="images/approved.jpg" alt="unapproved image"/>
								<br/>You have approved the customer successfully.';
							}
							else
							{
								echo"There is a temporary server error, please try again later.";
							}
						}
						else{
							header("location:overduepayments.php");
						}
						?>
						</p>
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