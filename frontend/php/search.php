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
$request['type'] = "search";
$request['input'] = $_POST["pokemon"];

$response = $client->send_request($request);

if($response == 0){
	//$event = date("Y-m-d") . "  " . date("h:i:sa") . " [ FE ] " . "SUCCESS:  = " . $_POST["pokemon"]."\n";
	//log_event($event);
	$user = $_POST['username'];
	$email = $_POST['email'];
	$output = shell_exec("python3 emailscript.py $usr $email");
	//header("Location: ../html/reg_success.html");
	exit();
} else {
	$error = date("Y-m-d") . "  " . date("h:i:sa") . " [ FE ] " . "ERROR: failed to register using Username = " . $_POST["username"] . " and Password = " . $_POST["password"] . "\n";
	log_event($error);
	//session_destroy();
	header("Location: ../html/reg_failure.html");
	exit();
}*/

session_destroy();
exit(0);
}
?>
