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
						$firstname=$_POST['firstname'];
						$lastname=$_POST['lastname'];
						$idnumber=$_POST['idnumber'];
						$phonenumber=$_POST['phonenumber'];
						$securityitem=$_POST['securityitem'];
						$borrowedamount=$_POST['borrowedamount'];
						$password=$_POST['password'];
						$repeatpassword=$_POST['repeatpassword'];
						if(isset($firstname) && isset($lastname) && isset($idnumber) && isset($phonenumber) && isset($securityitem) && isset($borrowedamount) && isset($password) && isset($repeatpassword))
						{
							if($password==$repeatpassword)
							{
								include"conn.php";
								$query=mysqli_query($con,"select * from members where phonenumber='$phonenumber' || idnumber='$idnumber'");
								$num=mysqli_num_rows($query);
								if($num==0)
								{
									$intquery=mysqli_query($con,"select * from loan");
									$intnumber=mysqli_num_rows($intquery);
									if($intnumber==1)
									{
										$data=mysqli_fetch_array($intquery);
										$paymentperiod=$data['paymentperiod'];
										$interest=$data['interest'];
										$currentdate=date('Y-m-d');
										$deadline=date('Y-m-d',strtotime('+'.$paymentperiod.' days'));
										$returnamount=( ($interest+100) / 100) * $borrowedamount;
										$insert=mysqli_query($con,"INSERT INTO members (firstname,lastname,idnumber,phonenumber,password) VALUES ('$firstname','$lastname','$idnumber','$phonenumber','$password') ");
										if($insert)
										{
											$insertquery=mysqli_query($con,"select * from members where phonenumber='$phonenumber'");
											$data=mysqli_fetch_array($insertquery);
											$membersid=$data['incre'];
											$loaninsert=mysqli_query($con,"INSERT INTO memberloan (membersid,borrowedamount,returnamount,paymentstatus,securityitem,deadline,approvalstatus,soldstatus) VALUES ('$membersid','$borrowedamount','$returnamount','2','$securityitem','$deadline','2','2') ");
											if($loaninsert)
											{
												echo"You have successfully registered for quick loans and applied for a loan of <b><u>$borrowedamount</u></b> on <b><u>$currentdate</u></b>. You have to pay <b><u>$returnamount</u></b> by <b><u>$deadline</u></b>.";
											}
											else
											{
												echo"There is a server error 101<br/>Please try again later.";
											}
										}
										else{
											echo"There is a server error 102<br/>Please try again later.";
										}
									}
									else
									{
										echo"There is a system error in the system<br/> Please contact the system developer<br/><a href='index.php'>Go to Home</a>";
									}
									
								}
								else
								{
									echo"There is a user with the credentials that you have provided.<br/>Please login here to apply for another loan <a href='portal.php'>LOGIN HERE</a><br/> or alternatively <a href='signup.php'>TRY SIGNING UP</a> with different credentials";
								}
							}
							else
							{
								echo"The password's do not match<br/><a href='signup.php'>Try Again</a>";
							}
						}
						else
						{
							header("location: signup.php");
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