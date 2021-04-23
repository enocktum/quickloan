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
				<center>
					<h1>Overdue/Defaulted Customers</h1>
					<p>
						<?php
						include"conn.php";
						$query=mysqli_query($con,"select * from members");
						$num=mysqli_num_rows($query);
						if($num>0)
						{
							while($data=mysqli_fetch_array($query))
							{
								$membersid=$data['incre'];
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
								else
								{
									//display defaulters
									$yellow=mysqli_query($con,"select * from memberloan where soldstatus='2' && approvalstatus='1' && fineafterdeadline!='0' && paymentstatus='2'");
									$yellownum=mysqli_num_rows($yellow);
									if($yellownum>0)
									{
										$memberdata=mysqli_fetch_array($yellow);
										echo"<p>
										<table border='1'>
											<tr>
											<th>firstname</th>
											<th>lastname</th>
											<th>IdNumber</th>
											<th>PhoneNumber</th>
											<th>SecurityItem</th>
											<th>BorrowedAmount</th>
											<th>ReturnAmount</th>
											<th>SaleAmount</th>
											<th>PayDate</th>
											<th>AuctionDate</th>
										</tr>
										";
										echo"<tr>";
											echo"<td>".$data['firstname']."</td>";
											echo"<td>".$data['lastname']."</td>";
											echo"<td>".$data['idnumber']."</td>";
											echo"<td>".$data['phonenumber']."</td>";
											echo"<td>".$memberdata['securityitem']."</td>";
											echo"<td>".$memberdata['borrowedamount']."</td>";
											echo"<td>".$memberdata['returnamount']."</td>";
											echo"<td>".$memberdata['fineafterdeadline']."</td>";
											echo"<td>".$memberdata['deadline']."</td>";
											echo"<td>".$memberdata['saledate']."</td>";
											
										echo"<tr>";
										echo"</table>";
									}
									else
									{
										echo"<center>There are no defaulters in the system.</center>";
									}
								}
							}
							
							
						}
						else
						{
							echo"<center>There are no members in the system.</center>";
						}
						?>
						</p>
				</center>
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