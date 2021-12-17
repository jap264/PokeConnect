<?php
session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST') {

require_once('../rabbitmqphp_example/path.inc');
require_once('../rabbitmqphp_example/get_host_info.inc');
require_once('../rabbitmqphp_example/rabbitMQLib.inc');
require_once('rabbitMQClient.php');
require_once('../event_logging/event_logger.php');

$client = new rabbitMQClient("../rabbitmqphp_example/rabbitMQ_rmq.ini","testServer");

$request = array();
$request['type'] = "register";
$request['username'] = $_POST["username"];
$request['email'] = $_POST["email"];
$request['password'] = $_POST["password"];
$request['password2'] = $_POST["password2"];
$response = $client->send_request($request);

if($response == 1){
	$event = date("Y-m-d") . "  " . date("h:i:sa") . " [ FE ] " . "SUCCESS: registration successful using Username = " . $_POST["username"] . " and Password = " . $_POST["password"] . "\n";
	log_event($event);
	/*$user = $_POST['username'];
	$email = $_POST['email'];
	$output = shell_exec("python3 emailscript.py $usr $email");*/

	$to = $_POST['email'];
	$subject = "Admin | You are just successfully registered in PokeConnect";

	  $message = "
	  <html>
	    <head>
	      <title>Registration is a success! | Pokimon</title>
	      </head>
  	  <body>
     		 <h2>Notification Email from PokeConnect</h2>
     	 <p>Thank you for registering with our PokeConnect  website!</p>
   	 </body>
 	 </html>
		  ";


	 // $headers = "MIME-Version: 1.0" . "\r\n";
 	// $headers = "Content-type:text/html;charset=UTF-8" . "\r\n";

	  $headers = 'From: <admin@no-reply.com>' . "\r\n";

	  mail($to,$subject,$message,$headers);

	header("Location: ../html/reg_success.php");
	exit();
} else {
	$error = date("Y-m-d") . "  " . date("h:i:sa") . " [ FE ] " . "ERROR: failed to register using Username = " . $_POST["username"] . " and Password = " . $_POST["password"] . "\n";
	log_event($error);
	//session_destroy();
	header("Location: ../html/reg_failure.php");
	exit();
}

//session_destroy();
exit(0);
}
?>
