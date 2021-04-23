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
						<h1>WELCOME TO QUICK APP</h1>
						<p>Welcome to quick loan app <?php echo $name; ?>. Click my loans menu above to view the status of your loan</p>
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