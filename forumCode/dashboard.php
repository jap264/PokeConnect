<?php
session_start();

if(!isset($_SESSION["userIn"])||$_SESSION["userIn"]!==true){
	header("location: signin.php");
	exit;
}

	require_once "dbconnect.php";


?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Threads</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/drop.css" />

	</head>
	<body>

		<!-- Header -->
			<header id="header">

				<?php	require_once "header.php";
				require_once "nav.php"; ?>

			</header>

			<a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>

		<!-- Main -->


			<section id="main" class="wrapper"  style="padding-top:20px; padding-bottom:0px;">
				<div class="container"  style="width: 95% !important;">
					<header class="major special">
						<h2 style="margin-bottom: 6px !important;"><img src="images/party.png" height=60px>  Forum Threads</h2>
						<?php

							echo '<a href="threadcreate.php" class="button alt" style="float:right;">Create New Thread</a>';


						?>




						<p>List of All thread</p>

						<hr style="margin-top: 6px; margin-bottom: 8px; height: 2px; width: 100%; background: linear-gradient(to right, #484848 , white); ">
						<!-- <div class="table-wrapper"><table style="margin-bottom: 4px !important;"><tbody></tr><td><p>Current Records</p></td><td><a href="" class="button special" style="float:right;">Add Sector</a></td></tr></tbody></table>
						</div>
						<div style="width:100%; height: 90px; display: inline-block;"><p width:400px>cURRENT RECORDS</p></div>-->
						<?php
							require_once "dbconnect.php";

							$sql = "SELECT thread.thread_ID, thread.title, thread.dat, users.username, threadchat.mtext
							FROM thread
							INNER JOIN users ON thread.owner_ID = users.id
							INNER JOIN threadchat ON thread.thread_ID = threadchat.thread_ID
							GROUP BY thread_ID
							";
							
							if($result = mysqli_query($link, $sql)){
								if(mysqli_num_rows($result) > 0){
									echo '<div class="table-wrapper"><font size=-2>
									<table class="alt">
										<thead>
											<tr>
												<th width=25px>Thread#</th>
												<th width=150px>Date & Time</th>
												<th width=150px>Title</th>
												<th width=150px>Thread Owner</th>
												<th>What its about?</th>
												<th width=100px>Actions</th>
											';


												echo '
												</tr>
												</thead><tbody>';
												while($row = mysqli_fetch_array($result)){
													echo '<tr height=50px>
														<td><strong>'.$row['thread_ID'].'</strong></td>
														<td><strong>'.$row['dat'].'</strong></td>
														<td><strong><a href=viewthread.php?id='.$row['thread_ID'].'>'.$row['title'].'</a></strong></td>
														<td>'.$row['username'].'</td><td>'.$row['mtext'].'</td>';





															 echo '<td><span><a href="threadedit.php?id='.$row['thread_ID'].'"here><img src="images/edit.png" height=35></a></span>
	 														<span><a href="threaddelete.php?id='.$row['thread_ID'].'"here><img src="images/del.png" height=35></a></span></td>';



														echo '</tr>';
												}
												echo '</td></tr></tbody></table></font></div>';
												mysqli_free_result($result);
								} else{
									echo '<p>No records here!</p>';
								}
							} else{
								echo 'ERROR: System Query cannot be executed! $sql.'.mysqli_error($link);
							}

						 ?>


					<!--	<h5><a class="button alt small" href=#>For Mofa Summary of Parties, click here...</h5></a> -->
					</header>
</div>

			</section>

		<!-- Footer -->
			<footer id="footer">
				<div class="container">

					<ul class="copyright">

						<li>Privacy Policy</li>
						<li>Terms & Conditions</li>
						<li>Contact Us</li>
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
