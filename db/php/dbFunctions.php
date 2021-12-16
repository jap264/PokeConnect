<?php
require_once('../rabbitmqphp_example/path.inc');
require_once('../rabbitmqphp_example/get_host_info.inc');
require_once('../rabbitmqphp_example/rabbitMQLib.inc');
require_once('rabbitMQClient.php');
require_once('dbConnection.php');
require_once('../event_logging/event_logger.php');

error_reporting(E_ALL);
ini_set('display_errors', 'off');
ini_set('log_errors', 'On');

//user login
function login($username, $password){
	
	$connection = dbConnection();

	$query = "SELECT * FROM users WHERE username = '$username'";
	$result = $connection->query($query);

	if($result){
		if($result->num_rows == 0){
			echo("No users in table.");
			$event = date("Y-m-d") . "  " . date("h:i:sa") . " [ DB ] " . "ERROR: this user does not exist: $username" . "\n";
	                log_event($event);
			return false;
		}
		else {
			while($row = $result->fetch_assoc()){
				$h_password = generateHash($password);
				if ($row['h_password'] == $h_password){
					echo "User Authenicated".PHP_EOL;
					return 1;
				}
				else{
					$event = date("Y-m-d") . "  " . date("h:i:sa") . " [ DB ] " . "ERROR: Username & Password do not match" . "\n";
			                log_event($event);
					return 0;
				}
			}
		}
	}
}

//registers a new user
function  register($username, $password, $email){

	$connection = dbConnection();

	//check username if not taken
	if(!checkUsername($username)){
		echo "Username is taken.".PHP_EOL;
		$event = date("Y-m-d") . "  " . date("h:i:sa") . " [ DB ]  " . "ERROR: trying to register a taken username: $username" . "\n";
		log_event($event);
		return 0;
	}

	$salt = generateSalt(29);

	$h_password = generateHash($password);

	$new_query = "INSERT INTO users (username,email,h_password) VALUES ('$username','$email','$h_password')";

	$result = $connection->query($new_query);

	return 1;	
}
function search($input){
	$connection = dbConnection();
	$query = "SELECT * FROM Pokemons WHERE poke_name  = '$input'";
	$result = $connection->query($query);
	if($result){
		if($result->num_rows == 0){
			echo("No Pokemon with this species name.");
			$event = date("Y-m-d") . " " . date("h:i:sa") . " [ DB ] " . "ERROR: No Pokemon with this species name: $input" . "\n";
			log_event($event);
			return 0;
		}
		else{
			while($row = $result->fetch_assoc()){
				if($row['poke_name'] == $input){
					echo "Pokemon Found.".PHP_EOL;
					return $row;
				}
				else{
					$event = date("Y-m-d") . " " . date("h:i:sa") . " [DB] " . "ERROR: This shouldn't ever throw but if it does holy shit." . "\n";
					log_event($event);
					return 0;
				}
			}
		}
	}
}

//save team to database and return team weaknesses
function saveteam($teamname, $poke1, $poke2, $poke3, $poke4, $poke5, $poke6, $moves){

	$connection = dbConnection();

	if(checkPokemon($poke1)==0 || checkPokemon($poke2)==0 || checkPokemon($poke3)==0 || checkPokemon($poke4)==0 || checkPokemon($poke5)==0|| checkPokemon($poke6)==0){
		echo("One of the pokemon in this team was not found.").PHP_EOL;
                $event = date("Y-m-d") . "  " . date("h:i:sa") . " [ DB ] " . "ERROR: One of the pokemon in this team was not found." . "\n";
                log_event($event);
                return false;
	}
	else{
		$new_query = "INSERT INTO Teams	(team_name,slot1,slot2,slot3,slot4,slot5,slot6) VALUES ('$teamname','$poke1','$poke2','$poke3','$poke4','$poke5','$poke6')";
	        $result = $connection->query($new_query);
	}

	$weaknesses = array();
	$weaknesses['normal'] = 0;
	$weaknesses['fire'] = 0;
	$weaknesses['water'] = 0;
	$weaknesses['grass'] = 0;
	$weaknesses['electric'] = 0;
	$weaknesses['ice'] = 0;
	$weaknesses['fighting'] = 0;
	$weaknesses['poison'] = 0;
	$weaknesses['ground'] = 0;
	$weaknesses['flying'] = 0;
	$weaknesses['psychic'] = 0;
	$weaknesses['bug'] = 0;
	$weaknesses['rock'] = 0;
	$weaknesses['ghost'] = 0;
	$weaknesses['dragon'] = 0;
	$weaknesses['dark'] = 0;
	$weaknesses['steel'] = 0;
	$weaknesses['fairy'] = 0;
	
	$weaknesses = weakness($poke1,$weaknesses);
	$weaknesses = weakness($poke2,$weaknesses);
	$weaknesses = weakness($poke3,$weaknesses);
	$weaknesses = weakness($poke4,$weaknesses);
	$weaknesses = weakness($poke5,$weaknesses);
	$weaknesses = weakness($poke6,$weaknesses);

	$strengths = array();
	$strengths['normal'] = 0;
        $strengths['fire'] = 0;
        $strengths['water'] = 0;
        $strengths['grass'] = 0;
        $strengths['electric'] = 0;
        $strengths['ice'] = 0;
        $strengths['fighting'] = 0;
        $strengths['poison'] = 0;
        $strengths['ground'] = 0;
        $strengths['flying'] = 0;
        $strengths['psychic'] = 0;
        $strengths['bug'] = 0;
        $strengths['rock'] = 0;
        $strengths['ghost'] = 0;
        $strengths['dragon'] = 0;
        $strengths['dark'] = 0;
        $strengths['steel'] = 0;
        $strengths['fairy'] = 0;

	$strengths = strength($moves['poke1_move1'],$strengths);
	$strengths = strength($moves['poke1_move2'],$strengths);
	$strengths = strength($moves['poke1_move3'],$strengths);
	$strengths = strength($moves['poke1_move4'],$strengths);
	$strengths = strength($moves['poke2_move1'],$strengths);
        $strengths = strength($moves['poke2_move2'],$strengths);
        $strengths = strength($moves['poke2_move3'],$strengths);
	$strengths = strength($moves['poke2_move4'],$strengths);
	$strengths = strength($moves['poke3_move1'],$strengths);
        $strengths = strength($moves['poke3_move2'],$strengths);
        $strengths = strength($moves['poke3_move3'],$strengths);
	$strengths = strength($moves['poke3_move4'],$strengths);
	$strengths = strength($moves['poke4_move1'],$strengths);
        $strengths = strength($moves['poke4_move2'],$strengths);
        $strengths = strength($moves['poke4_move3'],$strengths);
	$strengths = strength($moves['poke4_move4'],$strengths);
	$strengths = strength($moves['poke5_move1'],$strengths);
        $strengths = strength($moves['poke5_move2'],$strengths);
        $strengths = strength($moves['poke5_move3'],$strengths);
	$strengths = strength($moves['poke5_move4'],$strengths);
	$strengths = strength($moves['poke6_move1'],$strengths);
        $strengths = strength($moves['poke6_move2'],$strengths);
        $strengths = strength($moves['poke6_move3'],$strengths);
        $strengths = strength($moves['poke6_move4'],$strengths);

	$response = array();
	$response['strengths'] = $strengths;
	$response['weaknesses'] = $weaknesses;
	return $response;
}

//returns the offensive coverage of one move
//name is the type of the move
function strength($name, $response){
        if($name=='fire'){
		$response['grass'] += 1;
		$response['ice'] += 1;
		$response['bug'] += 1;
		$response['steel'] += 1;	
		return $response;
	}
	if($name=='water'){
		$response['fire'] += 1;
		$response['ground'] += 1;
		$response['rock'] += 1;
		return $response;
	}
	if($name=='grass'){
		$response['water'] += 1;
		$response['ground'] += 1;
		$response['rock'] += 1;
                return $response;
	}
	if($name=='electric'){
		$response['water'] += 1;
		$response['flying'] += 1;
                return $response;
	}
	if($name=='ice'){
		$response['grass'] += 1;
		$response['ground'] += 1;
		$response['flying'] += 1;
		$response['dragon'] += 1;
                return $response;
	}
	if($name=='fighting'){
		$response['normal'] += 1;
		$response['ice'] += 1;
		$response['rock'] += 1;
		$response['dark'] += 1;
		$response['steel'] += 1;
                return $response;
	}
	if($name=='poison'){
		$response['grass'] += 1;
		$response['fairy'] += 1;
                return $response;
	}
	if($name=='ground'){
		$response['fire'] += 1;
		$response['electric'] += 1;
		$response['poison'] += 1;
		$response['rock'] += 1;
		$response['steel'] += 1;
                return $response;
	}
	if($name=='flying'){
		$response['grass'] += 1;
		$response['ice'] += 1;
		$response['bug'] += 1;
                return $response;
	}
	if($name=='psychic'){
		$response['fighting'] += 1;
		$response['poison'] += 1;
                return $response;
	}
	if($name=='bug'){
		$response['grass'] += 1;
		$response['flying'] += 1;
		$response['psychic'] += 1;
		$response['dark'] += 1;
                return $response;
	}
	if($name=='rock'){
		$response['fire'] += 1;
		$response['ice'] += 1;
		$response['flying'] += 1;
		$response['bug'] += 1;
                return $response;
	}
	if($name=='ghost'){
		$response['psychic'] += 1;
		$response['ghost'] += 1;
                return $response;
	}
	if($name=='dragon'){
                $response['dragon'] += 1;
                return $response;
	}
	if($name=='dark'){
		$response['psychic'] += 1;
		$response['ghost'] += 1;
                return $response;
	}
	if($name=='steel'){
		$response['ice'] += 1;
		$response['rock'] += 1;
		$response['fairy'] += 1;
                return $response;
	}
	if($name=='fairy'){
		$response['fighting'] += 1;
		$response['dragon'] += 1;
		$response['dark'] += 1;
                return $response;
	}
	if($name=='normal'){
        return $response;
	}

        //if no type matching, return error
        echo "No type for this move: " . $name . PHP_EOL;
        $event = date("Y-m-d") . " " . date("h:i:sa") . " [ DB ] " . "ERROR: No matching type with this name: $name" . "\n";
        log_event($event);
        return 0;
}


//returns the weaknesses for one pokemon
function weakness($name, $response){ 

	if(checkPokemonType($name)=='normal'){
		$response['fighting'] += 1;
		return $response;
	}
	if(checkPokemonType($name)=='fire'){
		$response['water'] += 1;
		$response['ground'] += 1;
		$response['rock'] += 1;
		return $response;
	}
        if(checkPokemonType($name)=='water'){
		$response['grass'] += 1;
		$response['electric'] += 1;
		return $response;
        }
        if(checkPokemonType($name)=='grass'){
		$response['fire'] += 1;
		$response['ice'] += 1;
		$response['poison'] += 1;
		$response['flying'] += 1;
		$response['bug'] += 1;
		return $response;
        }
        if(checkPokemonType($name)=='electric'){
		$response['ground'] += 1;
		return $response;
        }
        if(checkPokemonType($name)=='ice'){
		$response['fire'] += 1;
		$response['fighting'] += 1;
		$response['rock'] += 1;
		$response['steel'] += 1;
		return $response;
        }
        if(checkPokemonType($name)=='fighting'){
		$response['flying'] += 1;
		$response['psychic'] += 1;
		$response['fairy'] += 1;
		return $response;
        }
        if(checkPokemonType($name)=='poison'){
		$response['ground'] += 1;
		$response['psychic'] += 1;
		return $response;
        }
        if(checkPokemonType($name)=='ground'){
		$response['water'] += 1;
		$response['grass'] += 1;
		$response['ice'] += 1;
		return $response;
        }
        if(checkPokemonType($name)=='flying'){
		$response['electric'] += 1;
		$response['ice'] += 1;
		$response['rock'] += 1;
		return $response;
        }
        if(checkPokemonType($name)=='psychic'){
		$response['bug'] += 1;
		$response['ghost'] += 1;
		$response['dark'] += 1;
		return $response;
        }
        if(checkPokemonType($name)=='bug'){
		$response['fire'] += 1;
		$response['flying'] += 1;
		$response['rock'] += 1;
		return $response;
        }
        if(checkPokemonType($name)=='rock'){
		$response['water'] += 1;
		$response['grass'] += 1;
		$response['fighting'] += 1;
		$response['ground'] += 1;
		$response['steel'] += 1;
		return $response;
        }
        if(checkPokemonType($name)=='ghost'){
		$response['ghost'] += 1;
		$response['dark'] += 1;
		return $response;
        }
        if(checkPokemonType($name)=='dragon'){
		$response['ice'] += 1;
		$response['dragon'] += 1;
		$response['fairy'] += 1;
		return $response;
        }
        if(checkPokemonType($name)=='dark'){
		$response['fighting'] += 1;
		$response['bug'] += 1;
		$response['fairy'] += 1;
		return $response;
        }
        if(checkPokemonType($name)=='steel'){
		$response['fire'] += 1;
		$response['fightin'] += 1;
		$response['ground'] += 1;
		return $response;
        }
        if(checkPokemonType($name)=='fairy'){
		$response['poison'] += 1;
		$response['steel'] += 1;
		return $response;
	}

	//if no type matching, return error
	echo "No type for this pokemon: " . $name . PHP_EOL;
	$event = date("Y-m-d") . " " . date("h:i:sa") . " [ DB ] " . "ERROR: No Pokemon with this species name: $input" . "\n";
        log_event($event);
	return 0;
}

//returns pokemon type
function checkPokemonType($name){
        $connection = dbConnection();
        $query = "SELECT * FROM Pokemons WHERE poke_name  = '$name'";
        $result = $connection->query($query);
        if($result){
                if($result->num_rows == 0){
                        echo("No Pokemon with this species name.");
                        $event = date("Y-m-d") . " " . date("h:i:sa") . " [ DB ] " . "ERROR: No Pokemon with this species name: $name" . "\n";
                        log_event($event);
                        return 0;
                }
                else{
                        while($row = $result->fetch_assoc()){
                                if($row['poke_name'] == $name){
                                        echo "Pokemon found, returning type.".PHP_EOL;
                                        return $row['type1'];
                                }
                                else{
                                        $event = date("Y-m-d") . " " . date("h:i:sa") . " [DB] " . "ERROR: This shouldn't ever throw but if it does holy shit." . "\n";
                                        log_event($event);
                                        return 0;
                                }
			}
		}
        }
}

//checks if pokemon exists
function checkPokemon($name){
	$connection = dbConnection();
        $query = "SELECT * FROM Pokemons WHERE poke_name  = '$name'";
        $result = $connection->query($query);
        if($result){
                if($result->num_rows == 0){
                        echo("No Pokemon with this species name.");
                        $event = date("Y-m-d") . " " . date("h:i:sa") . " [ DB ] " . "ERROR: No Pokemon with this species name: $input" . "\n";
                        log_event($event);
                        return 0;
		}
		else{
		       	return 1;
		}
	}
}

//checks if username is not taken
function checkUsername($username){
	
	$connection = dbConnection();

	$check_query = "SELECT * FROM users WHERE username = '$username'";
	$query_result = $connection->query($check_query);

	if($query_result){
		if($query_result->num_rows == 0){ //username is not taken
			return true;
		}
		else{
			return false;
		}
	}
}

//hashes password to store in the db
function generateHash($password) {
	$new = $password . 'abcdefghjiklmaopqrstuvwxyz1234567890';
	$hash = hash('sha256',$new);
	//echo "Hash: " . $hash.PHP_EOL;
	return $hash;
}

//creates a salt for password
function generateSalt($length) {
	$string = '';
	srand((double) microtime(TRUE) * 1000000);

	$chars = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');

	for($i = 0; $i <= $length; $i++) {
		$rand = rand(0, count($chars) - 1);
		$string .= $chars[$rand];
	}
	
	//echo "Salt: " . $string .PHP_EOL;
	return $string;
}

function loadPokemonData($poke_json_string){
	$checkData = false;
	//convert pokemon json string to array
	$poke_arr_data = json_decode($poke_json_string, true);
	//mysql connection, setup mysql query
	$link = dbConnection();
	$name = $image = null;
	$type1 = null; 
	$type2 = "";
	$stmt = $link->prepare("INSERT INTO Pokemons (poke_name, poke_image,type1, type2) 
							VALUES (?, ?, ?,?)");
	$stmt -> bind_param("ssss", $name, $image, $type1, $type2);
	foreach($poke_arr_data as $poke_data) {
		if (array_key_exists('error', $poke_data)) { 
			continue; 
		}
		$type1 = null; 
		$type2 = "";
		//loop through array and add values for mysql table
		$name = $poke_data['name'];
		$image = $poke_data['image'];
		//Get types to load into pokemon table
		$types_in_poke_data = $poke_data['types'];
		for($ty = 0; $ty < count($types_in_poke_data); $ty++){

			if(isset($types_in_poke_data[$ty]) && !isset($type1)) {
				$typeData = $types_in_poke_data[$ty]['type'];
				$typeName1 = $typeData['name'];
				$type1 = $typeName1;
			} elseif (isset($type1)) {
				$typeData = $types_in_poke_data[$ty]['type'];
				$typeName2 = $typeData['name'];
				$type2 = $typeName2;
			} else {
				echo "Error in load type data".PHP_EOL;
			} 
		}
		if ($stmt->execute()) { 
			$checkData = true;
		} else {
			//echo $name." ".$image." ".$type1." ".$type2.PHP_EOL;
			echo "Error on add data to pokemon table".PHP_EOL;
		}
		$last_insert_pokemon_id = mysqli_insert_id($link);
		// Load stats data into stats table
		$stats = array(null,null,null,null,null,null);
		$stmt_stats = $link->prepare("INSERT INTO Stats (pokemon_id, HP, Attack, Defense, SpAttack, SpDefense, Speed) 
								VALUES (?, ?, ?, ?, ?, ?, ?)");
		$stmt_stats -> bind_param("iiiiiii", $last_insert_pokemon_id, $stats[0], $stats[1], $stats[2], $stats[3], $stats[4], $stats[5]);
		$stats_in_poke_data = $poke_data['stats'];
		for($st = 0; $st < count($stats_in_poke_data); $st++) {
			$st_data = $stats_in_poke_data[$st];
			$stats[$st] = $st_data['base_stat'];
		}
		if ($stmt_stats->execute()) { 
			$checkData = true;
		} else {
			echo "Error on add stats to stats table".PHP_EOL;
		}
		
	}
	$link->close();
	// return a boolean for saying if all data is load
	return $checkData;
}
function getPokemonData() {
	//mysql connection, setup mysql query
	$link = dbConnection();
	$pokemon_sql_stmt = "SELECT pokemon_id, poke_name, poke_image, type1, type2 FROM Pokemons";
	$result = $link->query($pokemon_sql_stmt);
	//Load Pokemon Data into array
	$pokemonInfoArr = array();
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			//load pokemone data into array
			$current_pokemon_id = $row['pokemon_id'];
			$pokemonInfoArr[$current_pokemon_id] = array(
													"name" => $row['poke_name'],
													"image" => $row['poke_image'],
													"types" => array("type1" => $row['type1'],
																	"type2" => $row['type2'])
													);
			$stats_sql_stmt = "SELECT HP, Attack, Defense, SpAttack, SpDefense, Speed FROM Stats WHERE WHERE pokemon_id = '$current_pokemon_id'";
			$stats_result = $link->query($stats_sql_stmt);
			if ($stats_result->num_rows > 0) {
				$stats_row = $stats_result->fetch_assoc();
				$statsArr = array(
								"HP" => $stats_row['HP'],
								"Attack" => $stats_row['Attack'],
								"Defense" => $stats_row['Defense'],
								"SpAttack" => $stats_row['SpAttack'],
								"SpDefense" => $stats_row['SpDefense'],
								"Speed" => $stats_row['Speed']);
				$pokemonInfoArr["stats"] = $statsArr;
			} else {
				echo "0 results for Stats Table".PHP_EOL;
			}

		}
	} else {
		echo "0 results for Pokemons Table".PHP_EOL;
	}
	$pokemonInfoJson = json_encode($pokemonInfoArr);
	return $pokemonInfoJson;
}

?>
