<?php
session_start();

if(!isset($_SESSION["userIn"])||$_SESSION["userIn"]!==true){
	header("location: signin.php");
	exit;
}

	require_once "dbconnect.php";

	$partyname = $partyname_err = "";
	$pcode = $pcode_err = "";
	$uname = $uname_err = "";
	$pname = $pname_err = "";


	if($_SERVER["REQUEST_METHOD"]=="POST")
	{


			$input_uname = trim($_POST["username"]);
			if(empty($input_uname)){
				$uname_err = "  Please enter the reply before posting!<br>  ";
			} else {
				$uname = $input_uname;
			}



			if(empty($pcode_err)){

											$id = $_POST['id'];
												$sqlco = "INSERT INTO threadchat (threadchat_ID, thread_ID, mtext, DAT, owner_ID) VALUES (NULL, ?, ?, ?, ?)";
												$stmt2 = mysqli_prepare($link, $sqlco);
													mysqli_stmt_bind_param($stmt2, "ssss", $id1, $message, $dat, $owner);
													$id1 = $id;
													$owner = $_SESSION['userID'];
													$message = $uname;
													$dat = date('Y-m-d H:i:s', time());


						if(mysqli_stmt_execute($stmt2)){

							header("location: viewthread.php?id=$id");
							exit();
						} else{
							echo "Something is not right :/";
						}


					mysqli_stmt_close($stmt);
				}

		}

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
						<h2 style="margin-bottom: 6px !important;"><img src="images/party.png" height=60px>  Viewing thread</h2>
						<?php

							echo '<a href="dashboard.php" class="button alt" style="float:right;">Create New Thread</a>';


						?>




						<p>List of All replies</p>

						<hr style="margin-top: 6px; margin-bottom: 8px; height: 2px; width: 100%; background: linear-gradient(to right, #484848 , white); ">
						<!-- <div class="table-wrapper"><table style="margin-bottom: 4px !important;"><tbody></tr><td><p>Current Records</p></td><td><a href="" class="button special" style="float:right;">Add Sector</a></td></tr></tbody></table>
						</div>
						<div style="width:100%; height: 90px; display: inline-block;"><p width:400px>cURRENT RECORDS</p></div>-->
						<?php
							require_once "dbconnect.php";
							$id = trim($_GET['id']);
							$sql = "SELECT *
							FROM threadchat
							INNER JOIN users ON threadchat.owner_ID = users.id
							WHERE thread_ID = $id
							";

							if($result = mysqli_query($link, $sql)){
								if(mysqli_num_rows($result) > 0){
									echo '<div class="table-wrapper"><font size=-2>
									<table class="alt">
										<thead>
											<tr>
												<th width=25px>Reply#</th>
												<th width=150px>Date & Time</th>
												<th width=150px>Replier</th>
												<th>Reply</th>
												<th width=100px>Actions</th>
											';


												echo '
												</tr>
												</thead><tbody>';
												while($row = mysqli_fetch_array($result)){
													echo '<tr height=50px>
														<td><strong>'.$row['threadchat_ID'].'</strong></td>

														<td>'.$row['DAT'].'</td>
														<td>'.$row['username'].'</td><td>'.$row['mtext'].'</td>';





															 echo '<td><span><a href="replyedit.php?id='.$row['threadchat_ID'].'&tid='.$row['thread_ID'].'"><img src="images/edit.png" height=35></a></span>
	 														<span><a href="replydelete.php?id='.$row['threadchat_ID'].'&tid='.$row['thread_ID'].'"><img src="images/del.png" height=35></a></span></td>';



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

						 <p>Add your Reply</p>

 						<hr style="margin-top: 6px; margin-bottom: 8px; height: 2px; width: 100%; background: linear-gradient(to right, #484848 , white); ">
						<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  enctype="multipart/form-data">

								<div class="row uniform 50%">



									<div class="12u 12u$(xsmall)">
										<h6>posting message</h6>
										<input style="height: 70px;" type="text" name="username" id="username" value="<?php echo $uname; ?>" placeholder="Posting Message"/>
										<input type="hidden" name="id" value="<?php echo trim($_GET['id']);?>">
									</div>





								</div>
										<hr style="margin-top: 6px; margin-bottom: 8px; height: 2px; width: 70%; background: linear-gradient(to right, #484848 , white); ">

									<div class="row uniform 50%">


									<div class="12u$">
										<ul class="actions">

											<li style="float:right;"><input type="submit" value="POST REPLY" class="special" /></li>
										</ul>
									</div>
								</form>
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
