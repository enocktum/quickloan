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
						<h1><img width="300" height="80" src="images/overdue.png" alt="overdue payments"/></h1>
						<?php
						include"conn.php";
						$query=mysqli_query($con,"select * from members");
						$num=mysqli_num_rows($query);
						if($num)
						{
							while($memberdata=mysqli_fetch_array($query))
							{
								$membersincre=$memberdata['incre'];
								$loanquery=mysqli_query($con,"select * from memberloan where membersid='$membersincre' && soldstatus='2' && approvalstatus='1' && paymentstatus='2' && fineafterdeadline!='0'");
								$loannumrows=mysqli_num_rows($loanquery);
								if($loannumrows>0)
								{
									echo"<table border='1' style='width:100%;'>
										<tr>
											<th>FullName</th>
											<th>IdNumber</th>
											<th>ReturnAmount</th>
											<th>FinedAmount</th>
											<th>SecurityItem</th>
											<th>DueDate</th>
											<th>SellDate</th>
											<th></th>
										</tr>
									";
									while($loandata=mysqli_fetch_array($loanquery))
									{
										$nowdate=date("Y-m-d");
										$currentdate=strtotime($nowdate);
										$deadline=strtotime($loandata['saledate']);
										$diff=$deadline-$currentdate;
										echo"<tr>
											<td>".$memberdata['firstname']." ".$memberdata['lastname']."</td>
											<td>".$memberdata['idnumber']."</td>
											<td>Ksh.".$loandata['returnamount']."</td>
											<td>Ksh.".$loandata['fineafterdeadline']."</td>
											<td>".$loandata['securityitem']."</td>
											<td>".$loandata['deadline']."</td>
											<td>".$loandata['saledate']."</td>";
											if($diff<0)
											{
												echo"
												<td><form action='auctionconfirm.php' method='post'>
												<input type='hidden' name='membersincre' value='".$loandata['incre']."'/>
												<input class='btn btn-primary' style='background-color:blue;' type='submit' value='Sell Item(Ksh.".$loandata['fineafterdeadline'].")'/>
												</form>'</td>
												";
											}
											else
											{
												echo"
												<td><form action='auctionpayidconfirm.php' method='post'>
												<input type='hidden' name='membersincre' value='".$loandata['incre']."'/>
												<input class='btn btn-primary' style='background-color:blue;' type='submit' value='Clear(Ksh.".$loandata['fineafterdeadline'].")'/>
												</form>'</td>
												";
											}
										echo"</tr>";
									}
									echo"</table>";
								}
								else
								{
									echo"There are no members that have an overdue loan at the moment.";
								}
							}
						}
						else{
							echo"There are no members in the system so far, register members to be able to  view them";
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