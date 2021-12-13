<?php

session_start();

if(isset($_SESSION["userIn"]) && $_SESSION["userIn"] === true && $_SESSION["admin"] === true){
  header("location: dashboard.php");
  exit;
}

  require_once "dbconnect.php";

  $username = $username_err = '';
  $password = $password_err = '';

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
      if(empty(trim($_POST["username"]))){
        $username_err = "Please enter the username!";
      } else{
        $username = trim($_POST["username"]);
      }
      if(empty(trim($_POST["password"]))){
        $password_err = "Please enter the password!";
      } else{
        $password = trim($_POST["password"]);
      }

      if(empty($password_err) && empty($username_err)){
        $sql = "SELECT id, h_password FROM users WHERE username = ?";
        if($stmt = mysqli_prepare($link, $sql))
        {
          mysqli_stmt_bind_param($stmt, "s", $param_username);
          $param_username = $username;
          if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_store_result($stmt);
          }
          if(mysqli_stmt_num_rows($stmt)==1){
            mysqli_stmt_bind_result($stmt, $admin_id, $admin_pass);
            if(mysqli_stmt_fetch($stmt))
            {
              //First if password in form field and second is hashed field data in mysql DB table
              if($password == $admin_pass){
                session_start();

                $_SESSION["userIn"] = true;
                $_SESSION["id"] = $admin_id;
                $_SESSION["username"] = $admin_name;

                $sqlpermissions = "SELECT * FROM users WHERE id = ?";
                if($stmtp = mysqli_prepare($link, $sqlpermissions)){
          				mysqli_stmt_bind_param($stmtp, "i", $param_id);
          				$param_id = $admin_id;
          				if(mysqli_stmt_execute($stmtp)){
          					$resultp = mysqli_stmt_get_result($stmtp);
          					if(mysqli_num_rows($resultp)==1){
          						$rowp = mysqli_fetch_array($resultp, MYSQLI_ASSOC);

          							$_SESSION['vouchercreate'] = $rowp["vouchercreate"];
                        $_SESSION['voucheredit'] = $rowp["voucheredit"];
                        $_SESSION['log'] = $rowp["log"];
                        $_SESSION['vau'] = $rowp["vau"];
                        $_SESSION['reservation'] = $rowp["reservation"];
                        $_SESSION['vcancel'] = $rowp["vcancel"];
                        $_SESSION['userID'] = $rowp['id'];

          					}
          					else {
          						header("location: error.php");
          						exit();
          					}
          				} else{
          					echo "Something is not right! ;/";
          				}
          			}

                header("Location: dashboard.php");
              } else{
                $password_err = "Password incorrect/invalid!";
              }
            }
          } else{
            $username_err = "Account doesn't exist!";
          }
        } else {
          echo "System encountered some problem. Please try later!";
        }
        mysqli_stmt_close($stmt);
      }

      mysqli_close($link);
      }


?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Sign in - RabitMQ Forum</title>
		<meta charset="utf-8" />

		<link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/drop.css" />
		<style>


/* Style the tab */
.tab {
    overflow: hidden;
    text-align: left;
		font-family: inherit;
		padding-left: 20px;
	}

/* Style the buttons inside the tab */
.tab button {
    background-color: #ddd;
    color: white;
    align-items: center;
    border: none;
    outline: none;
    cursor: pointer;
    transition: 0.3s;
    font-size: 18px;
		font-family: inherit;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #ccc;
}

/* Create an active/current tablink class */
.tab button.active {
    background-color: #484848;
}

/* Style the tab content */

.tabcontent {
		padding-top: 35px;
    -webkit-animation: fadeEffect 0.5s;
    animation: fadeEffect 0.5s;
}

/* Fade in tabs */
@-webkit-keyframes fadeEffect {
    from {opacity: 0;}
    to {opacity: 1;}
}

@keyframes fadeEffect {
    from {opacity: 0;}
    to {opacity: 1;}
}

</style>

	</head>
	<body style="min-width: 1080px !important;">

		<!-- Header -->
			<header id="header">
				<?php require_once "header.php"; ?>

			</header>




		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">
					<header class="major special">
						<h2>Sign in</h2>
						<p>Login to RabitMQ Forum</p>
					</header>
					<section>

<!-- Tab content -->
						<div id="admin" class="tabcontent">
							<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
								<div class="row uniform 50%" align="right">
									<div class="6u$ 12u$(xsmall)"<?php echo (!empty($username_err)) ? 'has-error' : ''; ?>>
										<input type="text" name="username" id="username" value="<?php echo $username; ?>" placeholder="Username" />
                    <span><?php echo $username_err; ?></span>
                  </div>
									<div class="6u$ 12u$(xsmall)"<?php echo (!empty($password_err)) ? 'has-error' : ''; ?>>
										<input type="password" name="password" id="password" value="<?php echo $password; ?>" placeholder="Password" />
                    <span><?php echo $password_err; ?></span>
                  </div>

									<div class="6u$ 12u$">
										<ul class="actions">
											<li><input type="submit" name="submitok" value="Sign In" class="special" /></li>
										</ul>
									</div>
								</div>
							</form>
						</div>
					</section>
				</div>
			</section>

		<!-- Footer -->
			<div><footer id="footer" >
				<div  class="container">

					<ul class="copyright">

						<li>Privacy Policy</li>
						<li>Terms & Conditions</li>
						<li>Contact Us</li>
					</ul>
				</div>
			</footer></div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
