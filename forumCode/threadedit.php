<?php
session_start();

if(!isset($_SESSION["userIn"])||$_SESSION["userIn"]!==true){
	header("location: signin.php");
	exit;
}

	require_once "dbconnect.php";

	$partyname = $partyname_err = "";



	if(isset($_POST["id"] )&& !empty($_POST["id"])){
		$p_id = $_POST["id"];


		$input_partyname = trim($_POST["partyname"]);
		if(empty($input_partyname)){
			$partyname_err = "  Please enter thread title! <br> ";
		} else {
			$partyname = $input_partyname;
		}


			if(empty($partyname_err)){
				$sql = "UPDATE thread SET title=? WHERE thread_ID=?";
				if($stmt = mysqli_prepare($link, $sql)){
					mysqli_stmt_bind_param($stmt, "si", $param_partyname, $param_p_id);

					$param_partyname = $partyname;
          $param_p_id = $p_id;



					if(mysqli_stmt_execute($stmt)){
						header("location: dashboard.php");
						exit();
					} else{
						echo "Something is not right :/";
					}
				}
				mysqli_stmt_close($stmt);
			}
			mysqli_close($link);
	} else{
		if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
			$p_id = trim($_GET["id"]);
			$sql = "SELECT * FROM thread WHERE thread_ID=?";
			if($stmt = mysqli_prepare($link, $sql)){
				mysqli_stmt_bind_param($stmt, "i", $param_p_id);
				$param_p_id = $p_id;
				if(mysqli_stmt_execute($stmt)){
					$result = mysqli_stmt_get_result($stmt);
					if(mysqli_num_rows($result)==1){
						$row = mysqli_fetch_array($result, MYSQLI_ASSOC);


							$partyname = $row["title"];

					}
					else {
						header("location: error.php");
						exit();
					}
				} else{
					echo "Something is not right! ;/";
				}
			}
			mysqli_stmt_close($stmt);

		} else{
			header("location: error.php");
			exit();
		}
	}









?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Thread edit</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/drop.css" />

<script type="text/javascript">

function AvoidSpace(event) {
	var k = event ? event.which : window.event.keyCode;
	if (k == 32) return false;
}

</script>
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
						<h2 style="margin-bottom: 6px !important;"><img src="images/party.png" height=60px>  Edit Thread</h2>
						<a href="dashboard.php" class="button alt" style="float:right;">View Threads</a>
						<span class="warning" ><?php

						echo $partyname_err;




						?></span>
						<p>Update the selected Record</p>

						<hr style="margin-top: 6px; margin-bottom: 8px; height: 2px; width: 100%; background: linear-gradient(to right, #484848 , white); ">
						<!-- <div class="table-wrapper"><table style="margin-bottom: 4px !important;"><tbody></tr><td><p>Current Records</p></td><td><a href="" class="button special" style="float:right;">Add Sector</a></td></tr></tbody></table>
						</div>
						<div style="width:100%; height: 90px; display: inline-block;"><p width:400px>cURRENT RECORDS</p></div>-->
						<form method="POST" action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>">
					<h3>Enter the Fields</h3>
								<div class="row uniform 50%">


									<div class="12u 12u$(xsmall)">
										<h6>Thread Title</h6>
										<input type="text" name="partyname" id="partyname" value="<?php echo $partyname; ?>" placeholder="Thread title"/>

									</div>

									<div class="row uniform 50%">
<input type="hidden" name="id" value="<?php echo $p_id; ?>"/>

									<div class="12u$">
										<ul class="actions">

											<li style="float:right;"><input type="submit" value="Update Thread" class="special" /></li>
										</ul>
									</div>
								</form>


					<!--	<h5><a class="button alt small" href=#>For Mofa Summary of Parties, click here...</h5></a> -->
					</header>
</div>

			</section>

		<!-- Footer -->
			<footer id="footer" style="margin-bottom: 0px !important;">
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
