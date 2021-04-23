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
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major special">
						<center><h2>About Us</h2></center>
						<?php 
						include"conn.php";
						$query=mysqli_query($con,"select * from loan");
						$data=mysqli_fetch_array($query);
						$interest=$data['interest'];
						$defaultinterest=$data['defaultinterest'];
						$paymentperiod=$data['paymentperiod'];
						$graceperiod=$data['graceperiod'];
						$aquery=mysqli_query($con,"select * from admin");
						$adata=mysqli_fetch_array($aquery);
						$aphonenumber=$adata['phonenumber'];
						?>
					</header>

					<a href="#" class="image right"><img src="images/pic01.jpg" alt="" /></a>
					<h1><u>Terms and Conditions(Read them carefully)</u></h1>
					<p>By continuing to sign up to our site, you agree to abide by our terms and conditions, as stated below</p>
					<p>We are a quick loan lending company that uses assets such as phones,television sets, laptops, tablets and Log Books in order to give you the loan. The loan is then charged at an interest of  <b><u><?php echo $interest; ?>%</u></b>. In case you default, the amount increases at a rate of an additional <b><u><?php echo $defaultinterest; ?>%</u></b>. You are advised to be sure to take a loan that you are able to clear within the given time frame of <b><u><?php echo $paymentperiod; ?></u></b> days. Total failure to pay within the given grace period of an additional <b><u><?php echo $graceperiod; ?></u></b> days  will result in the sale of your security gadget. In case of any queries call the admin on mobile phone number <b><u><?php echo $aphonenumber; ?></u></b></p>

				</div>
			</section>

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