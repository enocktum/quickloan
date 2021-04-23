<?php 
						//update members query
						include"conn.php";
						$memberquery=mysqli_query($con,"select * from members");
						$num=mysqli_num_rows($memberquery);
						if($num>0)
						{
							while($memberdata=mysqli_fetch_array($memberquery))
							{
								$membersid=$memberdata['incre'];
								$loanquery=mysqli_query($con,"select * from memberloan where membersid='$membersid' && approvalstatus='1' && paymentstatus='2' && fineafterdeadline='0'");
								$loandata=mysqli_fetch_array($loanquery);
								$ngapi=mysqli_num_rows($loanquery);
								if($ngapi>0)
								{
									$memberloanincre=$loandata['incre'];
									$nowdate=date("Y-m-d");
									$datetopay=$loandata['deadline'];
									$currentdate=strtotime($nowdate);
									$deadline=strtotime($datetopay);
									$diff=$deadline-$currentdate;
									if($diff<0)
									{
										$returnamount=$loandata['returnamount'];
										$interestquery=mysqli_query($con,"select * from loan");
										$interestdata=mysqli_fetch_array($interestquery);
										$defaultinterest=$interestdata['defaultinterest'];
										$graceperiod=$interestdata['graceperiod'];
										$saledate=date('Y-m-d', strtotime($datetopay) + strtotime("+".$graceperiod." day", 0));
										$fineafterdeadline=( ($defaultinterest+100) / 100) * $returnamount;
										//start update of defaulters
										$update=mysqli_query($con,"UPDATE memberloan SET saledate='$saledate',fineafterdeadline='$fineafterdeadline' WHERE membersid='$membersid' && incre='$memberloanincre'");
										if($update)
										{
											
										}
										else
										{
											echo"There is a server error<br/> Please try again later and sorry for any inconvenience caused.";
										}
										//end update of defaulters	
									}
								}
							}
						}							
						//end update members query
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Quick Loan Application</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="landing">

		<!-- Header -->
			<header id="header" class="alt">
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

		<!-- Banner -->
			<section id="banner">
				<h2>Welcome to Quick Loan</h2>
				<p>Where your dreams becomes a possibility <br /> All thanks to Quick Loan.</p>
				<ul class="actions">
					<li><a href="portal.php" class="button special big">Get Started</a></li>
				</ul>
			</section>

			<!-- Two -->
				<section id="two" class="wrapper style2 special">
					<div class="container">
							<h2>Your happiness our Motive</h2>
							<p>Our biggest motive is to make sure that you get the best of life with our improved services and small service fee offered to enable us to keep providing this wonderful service to you</p>
						<div class="row 150%">
							<div class="6u 12u$(xsmall)">
								<div class="image fit captioned">
									<img src="images/pic01.jfif" alt="" />
									<h3  style="text-transform:lowercase;">Our loans have low interest.</h3>
								</div>
							</div>
							<div class="6u$ 12u$(xsmall)">
								<div class="image fit captioned">
									<img src="images/pic02.jpg" alt="" />
									<h3 style="text-transform:lowercase;">Be part of our happy family</h3>
								</div>
							</div>
						</div>
						<ul class="actions">
							<li><a href="portal.php" class="button special big">Login</a></li>
							<li><a href="signup.php" class="button big">Sign Up</a></li>
						</ul>
					</div>
				</section>

			<!-- Four -->
				<section id="four" class="wrapper style3 special">
					<div class="container">
						<header class="major">
							<h2>Have Queries and Want to Get in touch</h2>
							<p style="text-transform:lowercase;">Please feel free to contact us by clicking the  button below.</p>
						</header>
						<ul class="actions">
							<li><a href="contactus.php" class="button special big">Get in touch</a></li>
						</ul>
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