<?php
session_start();
require_once "dbconnect.php";
if(!isset($_SESSION["userIn"])||$_SESSION["userIn"]!==true){
	header("location: signin.php");
	exit;
}


if(isset($_POST["id"]) && !empty($_POST["id"])){
	require_once "dbconnect.php";
	$id= trim($_POST["id"]);
	$sql = "DELETE FROM thread WHERE thread_ID=?";
	$sqlinner = "DELETE FROM threadchat WHERE thread_ID=$id";
	mysqli_query($link, $sqlinner);

	if($stmt = mysqli_prepare($link, $sql)){
		mysqli_stmt_bind_param($stmt, "i", $param_c_id);
		$param_c_id = trim($_POST["id"]);
		if(mysqli_stmt_execute($stmt)){
			header("location: dashboard.php");
			exit();
		} else{
			echo "Something is not right :/";
		}
	}
	mysqli_stmt_close($stmt);
	mysqli_close($link);
} else{
	if(empty(trim($_GET["id"]))){
		header("location: error.php");
		exit();
	}
}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Delete Thread</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<style>
.dropbtn {
    background-color: white;
		font-family: inherit;
    font-size: 12px;
}
.dropdown {
    position: relative;
    display: block;
		color: black;
		font-size: 10px;
		font-weight: 600;
		line-height: 35px;
		min-width: 100%;
}
.dropdown-content {
		text-align: center;
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 70%;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
		font-family: inherit;
}
.dropdown-content a {
    color: #484848;
    text-decoration: none;
    display: block;
}
.dropdown-content a:hover {background-color: #ddd;width: 100%; }
.dropdown:hover .dropdown-content {display: block; padding: 2px; }
.dropdown:hover .dropbtn {background-color: #484848; color: #ffffff;}
	img {
  	border-radius: 50%;
	}
</style>
	</head>
	<body>

		<!-- Header -->
		<header id="header">

			<?php	require_once "header.php";
			require_once "nav.php"; ?>

		</header>

			<a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>

		<!-- Main -->


			<section id="main" class="wrapper">
				<div class="container">
					<header class="major special">
						<h2 style="margin-bottom: 6px !important;">Delete Thread</h2>

						<p>Delete the selected Record</p>

						<hr style="margin-top: 6px; margin-bottom: 8px; height: 2px; width: 100%; background: linear-gradient(to right, #484848 , white); ">
						<!-- <div class="table-wrapper"><table style="margin-bottom: 4px !important;"><tbody></tr><td><p>Current Records</p></td><td><a href="" class="button special" style="float:right;">Add Sector</a></td></tr></tbody></table>
						</div>
						<div style="width:100%; height: 90px; display: inline-block;"><p width:400px>cURRENT RECORDS</p></div>-->
						<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
					<h3>Are you sure you want to delete this thread?</h3>
								<div class="row uniform 50%">

									<input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
									<div class="12u$">
										<ul class="actions">
<li style="float:right;"><input type="submit" value="Yes," class="special" /></li>&nbsp;&nbsp;
											<li style="float:right;"><a href="dashboard.php" class="button alt" />No, Go Back</a></li>&nbsp;&nbsp;

										</ul>
									</div>
								</form>


					<!--	<h5><a class="button alt small" href=#>For Mofa Summary of Parties, click here...</h5></a> -->
					</header>
</div>

			</section>

		<!-- Footer -->
			<footer id="sifooter" style="margin-bottom: 0px !important;">
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
