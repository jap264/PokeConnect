<?php
require_once('../rabbitmqphp_example/path.inc');
require_once('../rabbitmqphp_example/get_host_info.inc');
require_once('../rabbitmqphp_example/rabbitMQLib.inc');
require_once('event_logger.php');
require_once('../../db/php/dbFunctions.php');

function received_event($event_string)
{
        file_put_contents("log.txt", $event_string, FILE_APPEND);
}

function requestProcessor($request)
{
  echo "received request".PHP_EOL;
  
  var_dump($request);
  
  if(!isset($request['type']))
  {
    $event = date("Y-m-d") . "  " . date("h:i:sa") . " [RMQ] " . "ERROR: unsupported message type" . "\n";
    log_event($event);
    return "ERROR: unsupported message type";
  }

  switch ($request['type'])
  {
    case "event_log":
	    echo "An error has occurred.".PHP_EOL;
	    log_event($request['error_message']);
	    break;
    case "login":
	    echo "Requesting to login.".PHP_EOL;
	    $response_msg = login($request['username'], $request['password']);
	    return $response_msg;
	    break;
    case "register":
	    echo "Requesting to register.".PHP_EOL;
	    $response_msg = register($request['username'], $request['password'], $request['email']);
	    return $response_msg;
	    break;	    
    case "search":
	    echo "Requesting a search.".PHP_EOL;
	    $response_msg = search($request['input']);
	    return $response_msg;
	    break;
  }
  
  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}

echo "Start Rabbit Listener".PHP_EOL;

$server = new rabbitMQServer("../rabbitmqphp_example/rabbitMQ_rmq.ini","testServer");

$server->process_requests('requestProcessor');
exit();
?>
