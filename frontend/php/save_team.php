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
$request['type'] = "saveteam";
$request['teamname'] = $_POST["teamname"];
$request['slot1'] = $_POST["Pokemon1"];
$request['slot2'] = $_POST["Pokemon2"];
$request['slot3'] = $_POST["Pokemon3"];
$request['slot4'] = $_POST["Pokemon4"];
$request['slot5'] = $_POST["Pokemon5"];
$request['slot6'] = $_POST["Pokemon6"];

$response = $client->send_request($request);

if($response == 1){
	$event = date("Y-m-d") . "  " . date("h:i:sa") . " [ FE ] " . "SUCCESS: saving team successful.\n";
	log_event($event);
	header("Location: ../html/reg_success.php");
	exit();
} else {
	$error = date("Y-m-d") . "  " . date("h:i:sa") . " [ FE ] " . "ERROR: failed to save team.\n";
	log_event($error);
	//session_destroy();
	header("Location: ../html/reg_failure.php");
	exit();
}

//session_destroy();
exit(0);
}
?>
