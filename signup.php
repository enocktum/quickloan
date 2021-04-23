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
						<form action="signupconfirm.php" method="post">
						<h1 style="font-size:2em;">Sign Up Below</h1>
						<p>
						enter your first name:<br/>
						<input style="text-align:center;" type="text" name="firstname" placeholder="enter your first name" required="required"/>
						</p>
						<p>
						enter your last name:<br/>
						<input style="text-align:center;" type="text" name="lastname" placeholder="enter your last name" required="required"/>
						</p>
						<p>
						enter your id number:<br/>
						<input style="text-align:center;" type="text" name="idnumber" placeholder="enter your id number" required="required"/>
						</p>
						<p>
						enter your phone number:<br/>
						<input style="text-align:center;" type="text" name="phonenumber" placeholder="enter your phone number" required="required"/>
						</p>
						<p>
						enter your security item:<br/>
						<input style="text-align:center;" type="text" name="securityitem" placeholder="enter your security Item" required="required"/>
						</p>
						<p>
						enter amount you want to borrow:<br/>
						<input style="text-align:center;" type="text" name="borrowedamount" placeholder="enter amount you want to borrow" required="required"/>
						</p>
						<p>
						enter your desired password:<br/>
						<input style="text-align:center;" type="password" name="password" placeholder="enter your desired password" required="required"/>
						</p>
						<p>
						repeat your desired password:<br/>
						<input style="text-align:center;" type="password" name="repeatpassword" placeholder="repeat the password" required="required"/>
						</p>
						 <p>
						<input class="btn btn-success" type="submit" value="Sign Up"/>
						 </p>
						 </form>
						 <p>
						 or alternatively<br/><a href="portal.php">Login Here</a>
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