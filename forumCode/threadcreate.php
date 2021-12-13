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

			$input_partyname = trim($_POST["partyname"]);
			if(empty($input_partyname)){
				$partyname_err = "  Please enter a thread title! <br> ";
			} else {
				$partyname = $input_partyname;
			}
			$input_pcode = trim($_POST["pcode"]);
			if(empty($input_pcode)){
				$pcode_err = "  Please atleast one tag for the thread!<br>  ";
			} else {
				$pcode = $input_pcode;
			}
			$input_uname = trim($_POST["username"]);
			if(empty($input_uname)){
				$uname_err = "  Please enter first post for thread!<br>  ";
			} else {
				$uname = $input_uname;
			}



			if(empty($partyname_err)&&empty($uname_err)&&empty($pcode_err)){
					$sql = "INSERT INTO thread (thread_ID, title, dat, owner_ID, tags) VALUES (NULL, ?, ?, ?, ?)";
					if($stmt = mysqli_prepare($link, $sql)){
						mysqli_stmt_bind_param($stmt, "ssss", $title, $dat, $owner, $tags);

						$title = $partyname;
						$tags = $pcode;
						$dat = date('Y-m-d H:i:s', time());
						$owner = $_SESSION['userID'];

						if(mysqli_stmt_execute($stmt)){

							$sqlgetid = "SELECT * FROM thread ORDER BY thread_ID DESC LIMIT 1";
							$rui = mysqli_query($link, $sqlgetid);
							$ru = mysqli_fetch_array($rui);
							$id = $ru['thread_ID'];
								$sqlco = "INSERT INTO threadchat (threadchat_ID, thread_ID, mtext, DAT, owner_ID) VALUES (NULL, ?, ?, ?, ?)";
								$stmt2 = mysqli_prepare($link, $sqlco);
									mysqli_stmt_bind_param($stmt2, "ssss", $id1, $message, $dat, $owner);
									$id1 = $id;
									$owner = $_SESSION['userID'];
									$message = $uname;
									$dat = date('Y-m-d H:i:s', time());
									mysqli_stmt_execute($stmt2);




							header("location: dashboard.php");
							exit();
						} else{
							echo "Something is not right :/";
						}

					}
					mysqli_stmt_close($stmt);
				}

		}

?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Create New Thread</title>
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
						<h2 style="margin-bottom: 6px !important;"><img src="images/report.png" height=60px>  Create New Thread</h2>
						<a href="Dashboard.php" class="button alt" style="float:right;">View Threads</a>
						<span class="warning" ><?php
						echo $partyname_err;
							echo $pcode_err;
								echo $pname_err;
									echo $uname_err;



						 ?></span>
						<p>Add New Thread</p>

						<hr style="margin-top: 6px; margin-bottom: 8px; height: 2px; width: 100%; background: linear-gradient(to right, #484848 , white); ">
						<!-- <div class="table-wrapper"><table style="margin-bottom: 4px !important;"><tbody></tr><td><p>Current Records</p></td><td><a href="" class="button special" style="float:right;">Add Sector</a></td></tr></tbody></table>
						</div>
						<div style="width:100%; height: 90px; display: inline-block;"><p width:400px>cURRENT RECORDS</p></div>-->
						<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  enctype="multipart/form-data">
					<h3>Enter the Fields</h3>
								<div class="row uniform 50%">


									<div class="6u 12u$(xsmall)">

										<input type="text" name="partyname" id="partyname" value="<?php echo $partyname; ?>" placeholder="Thread Title" autofocus/>

									</div>
									<div class="6u 12u$(xsmall)">

										<input type="text" name="pcode" id="pcode" value="<?php echo $pcode; ?>" placeholder="Tags" onkeypress="return AvoidSpace(event)" maxlength="20"/>

									</div>
									<div class="12u 12u$(xsmall)">
										<h6>posting message</h6>
										<input type="text" name="username" id="username" value="<?php echo $uname; ?>" placeholder="Posting Message"/>

									</div>





								</div>
										<hr style="margin-top: 6px; margin-bottom: 8px; height: 2px; width: 70%; background: linear-gradient(to right, #484848 , white); ">

									<div class="row uniform 50%">


									<div class="12u$">
										<ul class="actions">

											<li style="float:right;"><input type="submit" value="Create Thread" class="special" /></li>
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

						<li>Careers</li>
						<li>Privacy Policy</li>
						<li>Terms & Conditions</li>

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
