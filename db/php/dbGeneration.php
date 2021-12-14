#!/usr/bin/php
<?php
require_once('../event_logging/event_logger.php');
require_once('rabbitMQClient.php');

$hostname = 'localhost';
$user = 'testuser';
$password = '12345';
$db = 'it490';
$table_name_users = 'users';
$table_name_pokemon = 'Pokemons';
$table_name_stats = 'Stats';
$table_name_moves = 'Moves';
$table_name_teams = 'Teams';
$table_name_thread = 'thread';
$table_name_threadchat = 'threadchat';

echo "Database & Table Generation Start".PHP_EOL;

// Create connection
//sudo apt install mysql-server
//sudo apt install php-mysql

$connection = new mysqli($hostname,$user,$password);

if(!$connection){
        $event = date("Y-m-d") . "  " . date("h:i:sa") . " [ DB ] " . "ERROR: mysqli connection failure: " . $connection->connect_errno.PHP_EOL . "\n";
        //log_event($event);
        die("Mysqli Connection Failure: " . $connection->connect_error.PHP_EOL);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS ".$db;
if ($connection->query($sql) === TRUE) {
  echo "Database ".$db." created successfully".PHP_EOL;
} else {
        $event = date("Y-m-d") . "  " . date("h:i:sa") . " [ DB ] " . "ERROR: database creation failure:" . $connection->connect_errno.PHP_EOL . "\n";
	//log_event($event);
	die("Database Creation Failure: " . $connection->connect_error.PHP_EOL);
}

$connection-> select_db($sql);

$query = "CREATE TABLE IF NOT EXISTS ".$db.".".$table_name_users." (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,username VARCHAR(50) NOT NULL,email VARCHAR(50) NOT NULL,h_password VARCHAR(64) NOT NULL,created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP)";
    
if ($connection->query($query) === TRUE) {
    echo "Table ".$table_name_users." created successfully";
} else {
	echo "Error creating table: " . $connection->error;
	$event = date("Y-m-d") . "  " . date("h:i:sa") . " [ DB ] " . "ERROR: users table creation failure:" . $connection->connect_errno.PHP_EOL . "\n";
        //log_event($event);

}
echo PHP_EOL;

$query2 = "CREATE TABLE IF NOT EXISTS ".$db.".".$table_name_pokemon." (pokemon_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, poke_name VARCHAR(20) NOT NULL, poke_image VARCHAR(180) NOT NULL, type1 VARCHAR(10) NOT NULL, type2 VARCHAR(10))";

if ($connection->query($query2) === TRUE) {
    echo "Table ".$table_name_pokemon." created successfully";
} else {
    echo "Error creating table: " . $connection->error;
	$event = date("Y-m-d") . "  " . date("h:i:sa") . " [ DB ] " . "ERROR: pokemon table creation failure:" . $connection->connect_errno.PHP_EOL . "\n";
        //log_event($event);
}
echo PHP_EOL;

$query3 = "CREATE TABLE IF NOT EXISTS ".$db.".".$table_name_stats." (stat_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, pokemon_id INT NOT NULL, HP INT NOT NULL, Attack INT NOT NULL, Defense INT NOT NULL, SpAttack INT NOT NULL, SpDefense INT NOT NULL, Speed INT NOT NULL)";

if ($connection->query($query3) === TRUE) {
    echo "Table ".$table_name_stats." created successfully";
} else {
    echo "Error creating table: " . $connection->error;
	$event = date("Y-m-d") . "  " . date("h:i:sa") . " [ DB ] " . "ERROR: stats table creation failure:" . $connection->connect_errno.PHP_EOL . "\n";
        //log_event($event);
}
echo PHP_EOL;

$query4 = "CREATE TABLE IF NOT EXISTS ".$db.".".$table_name_moves." (move_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, type VARCHAR(10) NOT NULL)";

if ($connection->query($query4) === TRUE) {
    echo "Table ".$table_name_moves." created successfully";
} else {
    echo "Error creating table: " . $connection->error;
        $event = date("Y-m-d") . "  " . date("h:i:sa") . " [ DB ] " . "ERROR: moves table creation failure:" . $connection->connect_errno.PHP_EOL . "\n";
        //log_event($event);
}
echo PHP_EOL;

$query5 = "CREATE TABLE IF NOT EXISTS ".$db.".".$table_name_thread." (thread_ID INT AUTO_INCREMENT PRIMARY KEY, title varchar(255) NOT NULL, dat datetime NOT NULL, owner_ID INT NOT NULL, purge_status varchar(20), tags varchar(255) NOT NULL, FOREIGN KEY (owner_ID) REFERENCES users(id))";

if ($connection->query($query5) === TRUE) {
    echo "Table ".$table_name_thread." created successfully";
} else {
    echo "Error creating table: " . $connection->error;
        $event = date("Y-m-d") . "  " . date("h:i:sa") . " [ DB ] " . "ERROR: thread table creation failure:" . $connection->connect_errno.PHP_EOL . "\n";
        //log_event($event);
}
echo PHP_EOL;

$query6 = "CREATE TABLE IF NOT EXISTS ".$db.".".$table_name_thread." (threadchat_ID INT AUTO_INCREMENT PRIMARY KEY, thread_ID INT NOT NULL, mtext varchar(1000) NOT NULL, DAT datetime NOT NULL, owner_ID INT NOT NULL, purge_status varchar(20), FOREIGN KEY (thread_ID) REFERENCES thread(thread_ID), FOREIGN KEY (owner_ID) REFERENCES users(id))";

if ($connection->query($query6) === TRUE) {
    echo "Table ".$table_name_thread." created successfully";
} else {
    echo "Error creating table: " . $connection->error;
        $event = date("Y-m-d") . "  " . date("h:i:sa") . " [ DB ] " . "ERROR: threadchat table creation failure:" . $connection->connect_errno.PHP_EOL . "\n";
        //log_event($event);
}
echo PHP_EOL;

$query7 = "CREATE TABLE IF NOT EXISTS ".$db.".".$table_name_teams." (teams_ID INT AUTO_INCREMENT PRIMARY KEY, team_name VARCHAR(100) NOT NULL,slot1 VARCHAR(20) NOT NULL, slot2 VARCHAR(20), slot3 VARCHAR(20), slot4 VARCHAR(20), slot5 VARCHAR(20), slot6 VARCHAR(20))";

if ($connection->query($query7) === TRUE) {
    echo "Table ".$table_name_teams." created successfully";
} else {
    echo "Error creating table: " . $connection->error;
        $event = date("Y-m-d") . "  " . date("h:i:sa") . " [ DB ] " . "ERROR: teams table creation failure:" . $connection->connect_errno.PHP_EOL . "\n";
        //log_event($event);
}
echo PHP_EOL;

echo "Database Generation End".PHP_EOL;

$connection->close();

?>
