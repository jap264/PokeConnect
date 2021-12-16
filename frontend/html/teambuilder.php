<?php
session_start();
?>

<html lang="en">
<head>
  <title>PokeConnect</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
  </style>
</head>
<script>
function HandleResponse(response){
	var resp = JSON.parse(response);
	var returnCode = parseInt(resp.returnCode);
	if(returnCode == 0){
		//modify the modal here
	}
}

function GetStrengthsAndWeakness(pokemon){
	var request = new XMLHttpRequest();
	request.open("POST","../php/search.php",true);
	request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	request.onreadystatechange = function(){
	if((this.readyState == 4) && (this.status == 200)){
		HandleResponse(this.responseText);
		}
	}

	request.send("type=saveteam&input=snom");
}
</script>
<body>

<div class="jumbotron text-center" style="margin-bottom:0">
  <h1>PokeConnect</h1>
  <p>Where you go to connect and plan your matches!</p>
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="boothomepage.php">HOME</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="account.php">Account</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="forums.php">Forums</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="teambuilder.php">Team Builder</a>
      </li> 
    </ul>
  </div>
</nav>

<!-- THIS IS WHERE THE TEAM BUILDING BEGINS --> 
<h1>PokeConnect Team Builder</h1>

<div class="m_content-box">
<form role="form" method="post">

<h3>Team Input</h3>

<ul id="m_tb-team-input" class="m_tb-team-input">

<li class="m_tb-pkmn-input">
<div class="m_tb-pkmn-label"><span>Pokémon 1</span>:<div class="m_no-gen-8-text"></div></div> 
<input type="text" class="m_tb-pkmn-name" name="Pokemon1">

<div class="m_tb-pkmn-options">
<div class="m_tb-pkmn-moves">
<div class="m_tb-custom-types-label">Moves</div>
<select class="m_tb-pkmn-move-1" name="poke1_move1">
<option value="" selected>Move 1</option>
<option value="normal">Pound</option>
<option value="fire">Fire Punch</option>
<option value="water">Water Gun</option>
<option value="electric">Thunder Punch</option>
<option value="grass">Vine Whip</option>
<option value="ice">Ice Punch</option>
<option value="fighting">Karate Chop</option>
<option value="poison">Poison Sting</option>
<option value="ground">Sand Attack</option>
<option value="flying">Wing Attack</option>
<option value="psychic">Psybeam</option>
<option value="bug">Pin Missile</option>
<option value="rock">Rock Throw</option>
<option value="ghost">Curse</option>
<option value="dragon">Outrage</option>
<option value="dark">Thief</option>
<option value="steel">Steel</option>
<option value="fairy">Sweet Kiss</option>
</select>
<select class="m_tb-pkmn-move-2" name="poke1_move2">
<option value="" selected>Move 2</option>
<option value="normal">Pound</option>
<option value="fire">Fire Punch</option>
<option value="water">Water Gun</option>
<option value="electric">Thunder Punch</option>
<option value="grass">Vine Whip</option>
<option value="ice">Ice Punch</option>
<option value="fighting">Karate Chop</option>
<option value="poison">Poison Sting</option>
<option value="ground">Sand Attack</option>
<option value="flying">Wing Attack</option>
<option value="psychic">Psybeam</option>
<option value="bug">Pin Missile</option>
<option value="rock">Rock Throw</option>
<option value="ghost">Curse</option>
<option value="dragon">Outrage</option>
<option value="dark">Thief</option>
<option value="steel">Steel</option>
<option value="fairy">Sweet Kiss</option>
</select>
<select class="m_tb-pkmn-move-3" name="poke1_move3">
<option value="" selected>Move 3</option>
<option value="normal">Pound</option>
<option value="fire">Fire Punch</option>
<option value="water">Water Gun</option>
<option value="electric">Thunder Punch</option>
<option value="grass">Vine Whip</option>
<option value="ice">Ice Punch</option>
<option value="fighting">Karate Chop</option>
<option value="poison">Poison Sting</option>
<option value="ground">Sand Attack</option>
<option value="flying">Wing Attack</option>
<option value="psychic">Psybeam</option>
<option value="bug">Pin Missile</option>
<option value="rock">Rock Throw</option>
<option value="ghost">Curse</option>
<option value="dragon">Outrage</option>
<option value="dark">Thief</option>
<option value="steel">Steel</option>
<option value="fairy">Sweet Kiss</option>
</select>
<select class="m_tb-pkmn-move-4" name="poke1_move4">
<option value="" selected>Move 4</option>
<option value="normal">Pound</option>
<option value="fire">Fire Punch</option>
<option value="water">Water Gun</option>
<option value="electric">Thunder Punch</option>
<option value="grass">Vine Whip</option>
<option value="ice">Ice Punch</option>
<option value="fighting">Karate Chop</option>
<option value="poison">Poison Sting</option>
<option value="ground">Sand Attack</option>
<option value="flying">Wing Attack</option>
<option value="psychic">Psybeam</option>
<option value="bug">Pin Missile</option>
<option value="rock">Rock Throw</option>
<option value="ghost">Curse</option>
<option value="dragon">Outrage</option>
<option value="dark">Thief</option>
<option value="steel">Steel</option>
<option value="fairy">Sweet Kiss</option>
</select>

</div></div>

<li class="m_tb-pkmn-input">
<div class="m_tb-pkmn-label"><span>Pokémon 2</span>:<div class="m_no-gen-8-text"></div></div> 
<input type="text" class="m_tb-pkmn-name" name="Pokemon2"> 
<div class="m_tb-pkmn-options">
<div class="m_tb-pkmn-moves">
<div class="m_tb-custom-types-label">Moves</div>
<select class="m_tb-pkmn-move-1" name="poke2_move1">
<option value="" selected>Move 1</option>
<option value="normal">Pound</option>
<option value="fire">Fire Punch</option>
<option value="water">Water Gun</option>
<option value="electric">Thunder Punch</option>
<option value="grass">Vine Whip</option>
<option value="ice">Ice Punch</option>
<option value="fighting">Karate Chop</option>
<option value="poison">Poison Sting</option>
<option value="ground">Sand Attack</option>
<option value="flying">Wing Attack</option>
<option value="psychic">Psybeam</option>
<option value="bug">Pin Missile</option>
<option value="rock">Rock Throw</option>
<option value="ghost">Curse</option>
<option value="dragon">Outrage</option>
<option value="dark">Thief</option>
<option value="steel">Steel</option>
<option value="fairy">Sweet Kiss</option>
</select>
<select class="m_tb-pkmn-move-2" name="poke2_move2">
<option value="" selected>Move 2</option>
<option value="normal">Pound</option>
<option value="fire">Fire Punch</option>
<option value="water">Water Gun</option>
<option value="electric">Thunder Punch</option>
<option value="grass">Vine Whip</option>
<option value="ice">Ice Punch</option>
<option value="fighting">Karate Chop</option>
<option value="poison">Poison Sting</option>
<option value="ground">Sand Attack</option>
<option value="flying">Wing Attack</option>
<option value="psychic">Psybeam</option>
<option value="bug">Pin Missile</option>
<option value="rock">Rock Throw</option>
<option value="ghost">Curse</option>
<option value="dragon">Outrage</option>
<option value="dark">Thief</option>
<option value="steel">Steel</option>
<option value="fairy">Sweet Kiss</option>
</select>
<select class="m_tb-pkmn-move-3" name="poke2_move3">
<option value="" selected>Move 3</option>
<option value="normal">Pound</option>
<option value="fire">Fire Punch</option>
<option value="water">Water Gun</option>
<option value="electric">Thunder Punch</option>
<option value="grass">Vine Whip</option>
<option value="ice">Ice Punch</option>
<option value="fighting">Karate Chop</option>
<option value="poison">Poison Sting</option>
<option value="ground">Sand Attack</option>
<option value="flying">Wing Attack</option>
<option value="psychic">Psybeam</option>
<option value="bug">Pin Missile</option>
<option value="rock">Rock Throw</option>
<option value="ghost">Curse</option>
<option value="dragon">Outrage</option>
<option value="dark">Thief</option>
<option value="steel">Steel</option>
<option value="fairy">Sweet Kiss</option>
</select>
<select class="m_tb-pkmn-move-4" name="poke2_move4">
<option value="" selected>Move 4</option>
<option value="normal">Pound</option>
<option value="fire">Fire Punch</option>
<option value="water">Water Gun</option>
<option value="electric">Thunder Punch</option>
<option value="grass">Vine Whip</option>
<option value="ice">Ice Punch</option>
<option value="fighting">Karate Chop</option>
<option value="poison">Poison Sting</option>
<option value="ground">Sand Attack</option>
<option value="flying">Wing Attack</option>
<option value="psychic">Psybeam</option>
<option value="bug">Pin Missile</option>
<option value="rock">Rock Throw</option>
<option value="ghost">Curse</option>
<option value="dragon">Outrage</option>
<option value="dark">Thief</option>
<option value="steel">Steel</option>
<option value="fairy">Sweet Kiss</option>
</select>

</div></div>

<li class="m_tb-pkmn-input">
<div class="m_tb-pkmn-label"><span>Pokémon 3</span>:<div class="m_no-gen-8-text"></div></div> 
<input type="text" class="m_tb-pkmn-name" name="Pokemon3"> 
<div class="m_tb-pkmn-options">
<div class="m_tb-pkmn-moves">
<div class="m_tb-custom-types-label">Moves</div>
<select class="m_tb-pkmn-move-1" name="poke3_move1">
<option value="" selected>Move 1</option>
<option value="normal">Pound</option>
<option value="fire">Fire Punch</option>
<option value="water">Water Gun</option>
<option value="electric">Thunder Punch</option>
<option value="grass">Vine Whip</option>
<option value="ice">Ice Punch</option>
<option value="fighting">Karate Chop</option>
<option value="poison">Poison Sting</option>
<option value="ground">Sand Attack</option>
<option value="flying">Wing Attack</option>
<option value="psychic">Psybeam</option>
<option value="bug">Pin Missile</option>
<option value="rock">Rock Throw</option>
<option value="ghost">Curse</option>
<option value="dragon">Outrage</option>
<option value="dark">Thief</option>
<option value="steel">Steel</option>
<option value="fairy">Sweet Kiss</option>
</select>
<select class="m_tb-pkmn-move-2" name="poke3_move2">
<option value="" selected>Move 2</option>
<option value="normal">Pound</option>
<option value="fire">Fire Punch</option>
<option value="water">Water Gun</option>
<option value="electric">Thunder Punch</option>
<option value="grass">Vine Whip</option>
<option value="ice">Ice Punch</option>
<option value="fighting">Karate Chop</option>
<option value="poison">Poison Sting</option>
<option value="ground">Sand Attack</option>
<option value="flying">Wing Attack</option>
<option value="psychic">Psybeam</option>
<option value="bug">Pin Missile</option>
<option value="rock">Rock Throw</option>
<option value="ghost">Curse</option>
<option value="dragon">Outrage</option>
<option value="dark">Thief</option>
<option value="steel">Steel</option>
<option value="fairy">Sweet Kiss</option>
</select>
<select class="m_tb-pkmn-move-3" name="poke3_move3">
<option value="" selected>Move 3</option>
<option value="normal">Pound</option>
<option value="fire">Fire Punch</option>
<option value="water">Water Gun</option>
<option value="electric">Thunder Punch</option>
<option value="grass">Vine Whip</option>
<option value="ice">Ice Punch</option>
<option value="fighting">Karate Chop</option>
<option value="poison">Poison Sting</option>
<option value="ground">Sand Attack</option>
<option value="flying">Wing Attack</option>
<option value="psychic">Psybeam</option>
<option value="bug">Pin Missile</option>
<option value="rock">Rock Throw</option>
<option value="ghost">Curse</option>
<option value="dragon">Outrage</option>
<option value="dark">Thief</option>
<option value="steel">Steel</option>
<option value="fairy">Sweet Kiss</option>
</select>
<select class="m_tb-pkmn-move-4" name="poke3_move4">
<option value="" selected>Move 4</option>
<option value="normal">Pound</option>
<option value="fire">Fire Punch</option>
<option value="water">Water Gun</option>
<option value="electric">Thunder Punch</option>
<option value="grass">Vine Whip</option>
<option value="ice">Ice Punch</option>
<option value="fighting">Karate Chop</option>
<option value="poison">Poison Sting</option>
<option value="ground">Sand Attack</option>
<option value="flying">Wing Attack</option>
<option value="psychic">Psybeam</option>
<option value="bug">Pin Missile</option>
<option value="rock">Rock Throw</option>
<option value="ghost">Curse</option>
<option value="dragon">Outrage</option>
<option value="dark">Thief</option>
<option value="steel">Steel</option>
<option value="fairy">Sweet Kiss</option>
</select>

</div></div>

<li class="m_tb-pkmn-input">
<div class="m_tb-pkmn-label"><span>Pokémon 4</span>:<div class="m_no-gen-8-text"></div></div> 
<input type="text" class="m_tb-pkmn-name" name="Pokemon4"> 
<div class="m_tb-pkmn-options">
<div class="m_tb-pkmn-moves">
<div class="m_tb-custom-types-label">Moves</div>
<select class="m_tb-pkmn-move-1" name="poke4_move1">
<option value="" selected>Move 1</option>
<option value="normal">Pound</option>
<option value="fire">Fire Punch</option>
<option value="water">Water Gun</option>
<option value="electric">Thunder Punch</option>
<option value="grass">Vine Whip</option>
<option value="ice">Ice Punch</option>
<option value="fighting">Karate Chop</option>
<option value="poison">Poison Sting</option>
<option value="ground">Sand Attack</option>
<option value="flying">Wing Attack</option>
<option value="psychic">Psybeam</option>
<option value="bug">Pin Missile</option>
<option value="rock">Rock Throw</option>
<option value="ghost">Curse</option>
<option value="dragon">Outrage</option>
<option value="dark">Thief</option>
<option value="steel">Steel</option>
<option value="fairy">Sweet Kiss</option>
</select>
<select class="m_tb-pkmn-move-2" name="poke4_move2">
<option value="" selected>Move 2</option>
<option value="normal">Pound</option>
<option value="fire">Fire Punch</option>
<option value="water">Water Gun</option>
<option value="electric">Thunder Punch</option>
<option value="grass">Vine Whip</option>
<option value="ice">Ice Punch</option>
<option value="fighting">Karate Chop</option>
<option value="poison">Poison Sting</option>
<option value="ground">Sand Attack</option>
<option value="flying">Wing Attack</option>
<option value="psychic">Psybeam</option>
<option value="bug">Pin Missile</option>
<option value="rock">Rock Throw</option>
<option value="ghost">Curse</option>
<option value="dragon">Outrage</option>
<option value="dark">Thief</option>
<option value="steel">Steel</option>
<option value="fairy">Sweet Kiss</option>
</select>
<select class="m_tb-pkmn-move-3" name="poke4_move3">
<option value="" selected>Move 3</option>
<option value="normal">Pound</option>
<option value="fire">Fire Punch</option>
<option value="water">Water Gun</option>
<option value="electric">Thunder Punch</option>
<option value="grass">Vine Whip</option>
<option value="ice">Ice Punch</option>
<option value="fighting">Karate Chop</option>
<option value="poison">Poison Sting</option>
<option value="ground">Sand Attack</option>
<option value="flying">Wing Attack</option>
<option value="psychic">Psybeam</option>
<option value="bug">Pin Missile</option>
<option value="rock">Rock Throw</option>
<option value="ghost">Curse</option>
<option value="dragon">Outrage</option>
<option value="dark">Thief</option>
<option value="steel">Steel</option>
<option value="fairy">Sweet Kiss</option>
</select>
<select class="m_tb-pkmn-move-4" name="poke4_move4">
<option value="" selected>Move 4</option>
<option value="normal">Pound</option>
<option value="fire">Fire Punch</option>
<option value="water">Water Gun</option>
<option value="electric">Thunder Punch</option>
<option value="grass">Vine Whip</option>
<option value="ice">Ice Punch</option>
<option value="fighting">Karate Chop</option>
<option value="poison">Poison Sting</option>
<option value="ground">Sand Attack</option>
<option value="flying">Wing Attack</option>
<option value="psychic">Psybeam</option>
<option value="bug">Pin Missile</option>
<option value="rock">Rock Throw</option>
<option value="ghost">Curse</option>
<option value="dragon">Outrage</option>
<option value="dark">Thief</option>
<option value="steel">Steel</option>
<option value="fairy">Sweet Kiss</option>
</select>
</div></div>

<li class="m_tb-pkmn-input">
<div class="m_tb-pkmn-label"><span>Pokémon 5</span>:<div class="m_no-gen-8-text"></div></div> 
<input type="text" class="m_tb-pkmn-name" name="Pokemon5"> 
<div class="m_tb-pkmn-options">
<div class="m_tb-pkmn-moves">
<div class="m_tb-custom-types-label">Moves</div>
<select class="m_tb-pkmn-move-1" name="poke5_move1">
<option value="" selected>Move 1</option>
<option value="normal">Pound</option>
<option value="fire">Fire Punch</option>
<option value="water">Water Gun</option>
<option value="electric">Thunder Punch</option>
<option value="grass">Vine Whip</option>
<option value="ice">Ice Punch</option>
<option value="fighting">Karate Chop</option>
<option value="poison">Poison Sting</option>
<option value="ground">Sand Attack</option>
<option value="flying">Wing Attack</option>
<option value="psychic">Psybeam</option>
<option value="bug">Pin Missile</option>
<option value="rock">Rock Throw</option>
<option value="ghost">Curse</option>
<option value="dragon">Outrage</option>
<option value="dark">Thief</option>
<option value="steel">Steel</option>
<option value="fairy">Sweet Kiss</option>
</select>
<select class="m_tb-pkmn-move-2" name="poke5_move2">
<option value="" selected>Move 2</option>
<option value="normal">Pound</option>
<option value="fire">Fire Punch</option>
<option value="water">Water Gun</option>
<option value="electric">Thunder Punch</option>
<option value="grass">Vine Whip</option>
<option value="ice">Ice Punch</option>
<option value="fighting">Karate Chop</option>
<option value="poison">Poison Sting</option>
<option value="ground">Sand Attack</option>
<option value="flying">Wing Attack</option>
<option value="psychic">Psybeam</option>
<option value="bug">Pin Missile</option>
<option value="rock">Rock Throw</option>
<option value="ghost">Curse</option>
<option value="dragon">Outrage</option>
<option value="dark">Thief</option>
<option value="steel">Steel</option>
<option value="fairy">Sweet Kiss</option>
</select>
<select class="m_tb-pkmn-move-3" name="poke5_move3">
<option value="" selected>Move 3</option>
<option value="normal">Pound</option>
<option value="fire">Fire Punch</option>
<option value="water">Water Gun</option>
<option value="electric">Thunder Punch</option>
<option value="grass">Vine Whip</option>
<option value="ice">Ice Punch</option>
<option value="fighting">Karate Chop</option>
<option value="poison">Poison Sting</option>
<option value="ground">Sand Attack</option>
<option value="flying">Wing Attack</option>
<option value="psychic">Psybeam</option>
<option value="bug">Pin Missile</option>
<option value="rock">Rock Throw</option>
<option value="ghost">Curse</option>
<option value="dragon">Outrage</option>
<option value="dark">Thief</option>
<option value="steel">Steel</option>
<option value="fairy">Sweet Kiss</option>
</select>
<select class="m_tb-pkmn-move-4" name="poke5_move4">
<option value="" selected>Move 4</option>
<option value="normal">Pound</option>
<option value="fire">Fire Punch</option>
<option value="water">Water Gun</option>
<option value="electric">Thunder Punch</option>
<option value="grass">Vine Whip</option>
<option value="ice">Ice Punch</option>
<option value="fighting">Karate Chop</option>
<option value="poison">Poison Sting</option>
<option value="ground">Sand Attack</option>
<option value="flying">Wing Attack</option>
<option value="psychic">Psybeam</option>
<option value="bug">Pin Missile</option>
<option value="rock">Rock Throw</option>
<option value="ghost">Curse</option>
<option value="dragon">Outrage</option>
<option value="dark">Thief</option>
<option value="steel">Steel</option>
<option value="fairy">Sweet Kiss</option>
</select>

</div></div>

<li class="m_tb-pkmn-input">
<div class="m_tb-pkmn-label"><span>Pokémon 6</span>:<div class="m_no-gen-8-text"></div></div> 
<input type="text" class="m_tb-pkmn-name" name="Pokemon6"> 
<div class="m_tb-pkmn-options">
<div class="m_tb-pkmn-moves">
<div class="m_tb-custom-types-label">Moves</div>
<select class="m_tb-pkmn-move-1" name="poke6_move1" >
<option value="" selected>Move 1</option>
<option value="normal">Pound</option>
<option value="fire">Fire Punch</option>
<option value="water">Water Gun</option>
<option value="electric">Thunder Punch</option>
<option value="grass">Vine Whip</option>
<option value="ice">Ice Punch</option>
<option value="fighting">Karate Chop</option>
<option value="poison">Poison Sting</option>
<option value="ground">Sand Attack</option>
<option value="flying">Wing Attack</option>
<option value="psychic">Psybeam</option>
<option value="bug">Pin Missile</option>
<option value="rock">Rock Throw</option>
<option value="ghost">Curse</option>
<option value="dragon">Outrage</option>
<option value="dark">Thief</option>
<option value="steel">Steel</option>
<option value="fairy">Sweet Kiss</option>
</select>
<select class="m_tb-pkmn-move-2" name="poke6_move2">
<option value="" selected>Move 2</option>
<option value="normal">Pound</option>
<option value="fire">Fire Punch</option>
<option value="water">Water Gun</option>
<option value="electric">Thunder Punch</option>
<option value="grass">Vine Whip</option>
<option value="ice">Ice Punch</option>
<option value="fighting">Karate Chop</option>
<option value="poison">Poison Sting</option>
<option value="ground">Sand Attack</option>
<option value="flying">Wing Attack</option>
<option value="psychic">Psybeam</option>
<option value="bug">Pin Missile</option>
<option value="rock">Rock Throw</option>
<option value="ghost">Curse</option>
<option value="dragon">Outrage</option>
<option value="dark">Thief</option>
<option value="steel">Steel</option>
<option value="fairy">Sweet Kiss</option>
</select>
<select class="m_tb-pkmn-move-3" name="poke6_move3">
<option value="" selected>Move 3</option>
<option value="normal">Pound</option>
<option value="fire">Fire Punch</option>
<option value="water">Water Gun</option>
<option value="electric">Thunder Punch</option>
<option value="grass">Vine Whip</option>
<option value="ice">Ice Punch</option>
<option value="fighting">Karate Chop</option>
<option value="poison">Poison Sting</option>
<option value="ground">Sand Attack</option>
<option value="flying">Wing Attack</option>
<option value="psychic">Psybeam</option>
<option value="bug">Pin Missile</option>
<option value="rock">Rock Throw</option>
<option value="ghost">Curse</option>
<option value="dragon">Outrage</option>
<option value="dark">Thief</option>
<option value="steel">Steel</option>
<option value="fairy">Sweet Kiss</option>
</select>
<select class="m_tb-pkmn-move-4" name="poke6_move4">
<option value="" selected>Move 4</option>
<option value="normal">Pound</option>
<option value="fire">Fire Punch</option>
<option value="water">Water Gun</option>
<option value="electric">Thunder Punch</option>
<option value="grass">Vine Whip</option>
<option value="ice">Ice Punch</option>
<option value="fighting">Karate Chop</option>
<option value="poison">Poison Sting</option>
<option value="ground">Sand Attack</option>
<option value="flying">Wing Attack</option>
<option value="psychic">Psybeam</option>
<option value="bug">Pin Missile</option>
<option value="rock">Rock Throw</option>
<option value="ghost">Curse</option>
<option value="dragon">Outrage</option>
<option value="dark">Thief</option>
<option value="steel">Steel</option>
<option value="fairy">Sweet Kiss</option>
</select>

</div></div>

</li></li></li></li></li></li></ul>

<div id="m_tb-save-team-row" class="m_tb-options-row">
<div class="m_tb-options-label">Calculate Strengths and Weakness For Current Team</div>
<input type="submit" OnClick='GetStrengthsAndWeakness("someTeamName", document.getElementById("Pokemon1").value, document.getElementById("Pokemon2").value, document.getElementById("Pokemon3").value, document.getElementById("Pokemon4").value, document.getElementById("Pokemon5").value, document.getElementById("Pokemon6").value )' name="calculate" value="Calculate" data-toggle="modal" data-target="#mymodal">
</div>
</form>

<div>

<?php
session_start();

if(array_key_exists('Pokemon1',$_POST)) {

require_once('../rabbitmqphp_example/path.inc');
require_once('../rabbitmqphp_example/get_host_info.inc');
require_once('../rabbitmqphp_example/rabbitMQLib.inc');
require_once('../php/rabbitMQClient.php');
require_once('../event_logging/event_logger.php');

$client = new rabbitMQClient("../rabbitmqphp_example/rabbitMQ_rmq.ini","testServer");

$request = array();
$request['type'] = "saveteam";
$request['teamname'] = "someName";
$request['Pokemon1'] = $_POST["Pokemon1"];
$request['Pokemon2'] = $_POST["Pokemon2"];
$request['Pokemon3'] = $_POST["Pokemon3"];
$request['Pokemon4'] = $_POST["Pokemon4"];
$request['Pokemon5'] = $_POST["Pokemon5"];
$request['Pokemon6'] = $_POST["Pokemon6"];
$moves = array();
$moves['poke1_move1'] = $_POST["poke1_move1"];
$moves['poke1_move2'] = $_POST["poke1_move2"];
$moves['poke1_move3'] = $_POST["poke1_move3"];
$moves['poke1_move4'] = $_POST["poke1_move4"];
$moves['poke2_move1'] = $_POST["poke2_move1"];
$moves['poke2_move2'] = $_POST["poke2_move2"];
$moves['poke2_move3'] = $_POST["poke2_move3"];
$moves['poke2_move4'] = $_POST["poke2_move4"];
$moves['poke3_move1'] = $_POST["poke3_move1"];
$moves['poke3_move2'] = $_POST["poke3_move2"];
$moves['poke3_move3'] = $_POST["poke3_move3"];
$moves['poke3_move4'] = $_POST["poke3_move4"];
$moves['poke4_move1'] = $_POST["poke4_move1"];
$moves['poke4_move2'] = $_POST["poke4_move2"];
$moves['poke4_move3'] = $_POST["poke4_move3"];
$moves['poke4_move4'] = $_POST["poke4_move4"];
$moves['poke5_move1'] = $_POST["poke5_move1"];
$moves['poke5_move2'] = $_POST["poke5_move2"];
$moves['poke5_move3'] = $_POST["poke5_move3"];
$moves['poke5_move4'] = $_POST["poke5_move4"];
$moves['poke6_move1'] = $_POST["poke6_move1"];
$moves['poke6_move2'] = $_POST["poke6_move2"];
$moves['poke6_move3'] = $_POST["poke6_move3"];
$moves['poke6_move4'] = $_POST["poke6_move4"];
$request['moves'] = $moves;

$response = $client->send_request($request);

if($response != NULL){
        //$event = date("Y-m-d") . "  " . date("h:i:sa") . " [ FE ] " . "SUCCESS: pokemon found " . $_POST["pokemon"]."\n";
        //log_event($event);
        //$user = $_POST['username'];
        //$email = $_POST['email'];
        //$output = shell_exec("python3 emailscript.py $usr $email");
        //header("Location: ../html/reg_success.html");
        //echo '<div class="modal-body">'.json_encode($response).'</div>';
	      $strengths = $response['strengths'];
        $weakness = $response['weaknesses'];
        //echo '<div class="modal-body">'.json_encode($response).'</div>';
        echo '<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Strengths and Weakness Calculation</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    <h4>Strengths Scores</h4>
                    <h3>' .$strengths['normal']. '</h3>
                    <h3>' .$strengths['fire']. '</h3>
                    <h3>' . $strengths['water']. '</h3>
                    <h3>' . $strengths['grass']. '</h3>
                    <h3>' . $strengths['electric']. '</h3>
                    <h3>' . $strengths['ice']. '</h3>
                    <h3>' . $strengths['fighting']. '</h3>
                    <h3>' . $strengths['poison']. '</h3>
                    <h3>' . $strengths['ground']. '</h3>
                    <h3>' . $strengths['flying']. '</h3>
                    <h3>' . $strengths['psychic']. '</h3>
                    <h3>' . $strengths['bug']. '</h3>
                    <h3>' . $strengths['rock']. '</h3>
                    <h3>' . $strengths['ghost']. '</h3>
                    <h3>' . $strengths['dragon']. '</h3>
                    <h3>' . $strengths['dark']. '</h3>
                    <h3>' . $strengths['steel']. '</h3>
                    <h3>' . $strengths['fairy']. '</h3>
                    <h4>Weaknesses Scores</h4>
                    <h3>' .$weakness['normal']. '</h3>
                    <h3>' .$weakness['fire']. '</h3>
                    <h3>' . $weakness['water']. '</h3>
                    <h3>' . $weakness['grass']. '</h3>
                    <h3>' . $weakness['electric']. '</h3>
                    <h3>' . $weakness['ice']. '</h3>
                    <h3>' . $weakness['fighting']. '</h3>
                    <h3>' . $weakness['poison']. '</h3>
                    <h3>' . $weakness['ground']. '</h3>
                    <h3>' . $weakness['flying']. '</h3>
                    <h3>' . $weakness['psychic']. '</h3>
                    <h3>' . $weakness['bug']. '</h3>
                    <h3>' . $weakness['rock']. '</h3>
                    <h3>' . $weakness['ghost']. '</h3>
                    <h3>' . $weakness['dragon']. '</h3>
                    <h3>' . $weakness['dark']. '</h3>
                    <h3>' . $weakness['steel']. '</h3>
                    <h3>' . $weakness['fairy']. '</h3>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>';
	      exit();
} else {
        $error = date("Y-m-d") . "  " . date("h:i:sa") . " [ FE ] " . "ERROR: failed to return pokemon data\n";
        log_event($error);
        //session_destroy()
        exit();
}
session_destroy();
exit(0);
}
?>

</div>
</body>
</html>

<!--

<div class="m_content-box m_team-builder-container">
<div class="m_team-builder-container-header">Defensive Coverage</div>
<table id="m_team-builder-table" class="m_team-builder-table">
<thead>
<tr class="m_rowH m_stickproof">
<th class="m_tb-type-header"></th>
<th></th>
<th></th>
<th></th>
<th></th>
<th></th>
<th></th>
<th class="m_tb-weak-header"></th>
<th class="m_tb-resist-header"></th>
</tr>
<tr class="m_rowH">
<th scope="col" class="m_rowH m_tb-type-header">Move<br><i class="m_material-icons">arrow_downward</i></th>
<th scope="col" class="m_rowH m_tb-pokemon"></th>
<th scope="col" class="m_rowH m_tb-pokemon"></th>
<th scope="col" class="m_rowH m_tb-pokemon"></th>
<th scope="col" class="m_rowH m_tb-pokemon"></th>
<th scope="col" class="m_rowH m_tb-pokemon"></th>
<th scope="col" class="m_rowH m_tb-pokemon"></th>
<th scope="col" class="m_rowH m_tb-weak-header">Total Weak</th>
<th scope="col" class="m_rowH m_tb-resist-header">Total Resist</th>
</tr>
</thead>
<tbody>
<tr class="m_row m_tb-row m_tb-row-normal">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Normal</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-weak"></td>
<td class="m_tb-total-resist"></td>
</tr>
<tr class="m_row m_tb-row m_tb-row-fire">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Fire</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-weak"></td>
<td class="m_tb-total-resist"></td>
</tr>
<tr class="m_row m_tb-row m_tb-row-water">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Water</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-weak"></td>
<td class="m_tb-total-resist"></td>
</tr>
<tr class="m_row m_tb-row m_tb-row-electric">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Electric</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-weak"></td>
<td class="m_tb-total-resist"></td>
</tr>
<tr class="m_row m_tb-row m_tb-row-grass">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Grass</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-weak"></td>
<td class="m_tb-total-resist"></td>
</tr>
<tr class="m_row m_tb-row m_tb-row-ice">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Ice</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-weak"></td>
<td class="m_tb-total-resist"></td>
</tr>
<tr class="m_row m_tb-row m_tb-row-fighting">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Fighting</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-weak"></td>
<td class="m_tb-total-resist"></td>
</tr>
<tr class="m_row m_tb-row m_tb-row-poison">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Poison</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-weak"></td>
<td class="m_tb-total-resist"></td>
</tr>
<tr class="m_row m_tb-row m_tb-row-ground">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Ground</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-weak"></td>
<td class="m_tb-total-resist"></td>
</tr>
<tr class="m_row m_tb-row m_tb-row-flying">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Flying</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-weak"></td>
<td class="m_tb-total-resist"></td>
</tr>
<tr class="m_row m_tb-row m_tb-row-psychic">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Psychic</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-weak"></td>
<td class="m_tb-total-resist"></td>
</tr>
<tr class="m_row m_tb-row m_tb-row-bug">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Bug</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-weak"></td>
<td class="m_tb-total-resist"></td>
</tr>
<tr class="m_row m_tb-row m_tb-row-rock">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Rock</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-weak"></td>
<td class="m_tb-total-resist"></td>
</tr>
<tr class="m_row m_tb-row m_tb-row-ghost">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Ghost</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-weak"></td>
<td class="m_tb-total-resist"></td>
</tr>
<tr class="m_row m_tb-row m_tb-row-dragon">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Dragon</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-weak"></td>
<td class="m_tb-total-resist"></td>
</tr>
<tr class="m_row m_tb-row m_tb-row-dark">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Dark</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-weak"></td>
<td class="m_tb-total-resist"></td>
</tr>
<tr class="m_row m_tb-row m_tb-row-steel">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Steel</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-weak"></td>
<td class="m_tb-total-resist"></td>
</tr>
<tr class="m_row m_tb-row m_tb-row-fairy">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Fairy</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-weak"></td>
<td class="m_tb-total-resist"></td>
</tr>
</tbody>
</table>
</div>
<div class="m_content-box m_team-builder-container m_team-builder-coverage-container">
<div class="m_team-builder-container-header">Offensive Coverage</div>
<table id="m_team-builder-coverage-table" class="m_team-builder-table m_team-builder-coverage-table">
<thead>
<tr class="m_rowH m_stickproof">
<th class="m_tb-type-header"></th>
<th></th>
<th></th>
<th></th>
<th></th>
<th></th>
<th></th>
<th class="m_tb-not-very-effective-header"></th>
<th class="m_tb-super-effective-header"></th>
</tr>
<tr class="m_rowH">
<th scope="col" class="m_rowH m_tb-type-header">Enemy<br><i class="m_material-icons">arrow_downward</i></th>
<th scope="col" class="m_rowH m_tb-pokemon"></th>
<th scope="col" class="m_rowH m_tb-pokemon"></th>
<th scope="col" class="m_rowH m_tb-pokemon"></th>
<th scope="col" class="m_rowH m_tb-pokemon"></th>
<th scope="col" class="m_rowH m_tb-pokemon"></th>
<th scope="col" class="m_rowH m_tb-pokemon"></th>
<th scope="col" class="m_rowH m_tb-not-very-effective-header">Not Very Effective</th>
<th scope="col" class="m_rowH m_tb-super-effective-header">Super Effective</th>
</tr>
</thead>
<tbody>
<tr class="m_row m_tb-row m_tb-coverage-row m_tb-row-normal">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Normal</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-not-very-effective"></td>
<td class="m_tb-total-super-effective"></td>
</tr>
<tr class="m_row m_tb-row m_tb-coverage-row m_tb-row-fire">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Fire</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-not-very-effective"></td>
<td class="m_tb-total-super-effective"></td>
</tr>
<tr class="m_row m_tb-row m_tb-coverage-row m_tb-row-water">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Water</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-not-very-effective"></td>
<td class="m_tb-total-super-effective"></td>
</tr>
<tr class="m_row m_tb-row m_tb-coverage-row m_tb-row-electric">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Electric</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-not-very-effective"></td>
<td class="m_tb-total-super-effective"></td>
</tr>
<tr class="m_row m_tb-row m_tb-coverage-row m_tb-row-grass">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Grass</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-not-very-effective"></td>
<td class="m_tb-total-super-effective"></td>
</tr>
<tr class="m_row m_tb-row m_tb-coverage-row m_tb-row-ice">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Ice</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-not-very-effective"></td>
<td class="m_tb-total-super-effective"></td>
</tr>
<tr class="m_row m_tb-row m_tb-coverage-row m_tb-row-fighting">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Fighting</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-not-very-effective"></td>
<td class="m_tb-total-super-effective"></td>
</tr>
<tr class="m_row m_tb-row m_tb-coverage-row m_tb-row-poison">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Poison</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-not-very-effective"></td>
<td class="m_tb-total-super-effective"></td>
</tr>
<tr class="m_row m_tb-row m_tb-coverage-row m_tb-row-ground">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Ground</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-not-very-effective"></td>
<td class="m_tb-total-super-effective"></td>
</tr>
<tr class="m_row m_tb-row m_tb-coverage-row m_tb-row-flying">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Flying</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-not-very-effective"></td>
<td class="m_tb-total-super-effective"></td>
</tr>
<tr class="m_row m_tb-row m_tb-coverage-row m_tb-row-psychic">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Psychic</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-not-very-effective"></td>
<td class="m_tb-total-super-effective"></td>
</tr>
<tr class="m_row m_tb-row m_tb-coverage-row m_tb-row-bug">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Bug</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-not-very-effective"></td>
<td class="m_tb-total-super-effective"></td>
</tr>
<tr class="m_row m_tb-row m_tb-coverage-row m_tb-row-rock">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Rock</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-not-very-effective"></td>
<td class="m_tb-total-super-effective"></td>
</tr>
<tr class="m_row m_tb-row m_tb-coverage-row m_tb-row-ghost">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Ghost</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-not-very-effective"></td>
<td class="m_tb-total-super-effective"></td>
</tr>
<tr class="m_row m_tb-row m_tb-coverage-row m_tb-row-dragon">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Dragon</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-not-very-effective"></td>
<td class="m_tb-total-super-effective"></td>
</tr>
<tr class="m_row m_tb-row m_tb-coverage-row m_tb-row-dark">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Dark</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-not-very-effective"></td>
<td class="m_tb-total-super-effective"></td>
</tr>
<tr class="m_row m_tb-row m_tb-coverage-row m_tb-row-steel">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Steel</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-not-very-effective"></td>
<td class="m_tb-total-super-effective"></td>
</tr>
<tr class="m_row m_tb-row m_tb-coverage-row m_tb-row-fairy">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Fairy</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-not-very-effective"></td>
<td class="m_tb-total-super-effective"></td>
</tr>
</tbody>
</table>
</div>
<div class="m_content-box">
<form id="m_tb-save-load-form" target="_blank">
<h3>Save Team</h3>
<div class="m_tb-options" id="m_tb-save-load-share">
<div id="m_tb-load-team-row" class="m_tb-options-row">

<div id="m_tb-save-team-row" class="m_tb-options-row">
<div class="m_tb-options-label">Save Your Current Team</div>
<div class="m_tb-options-value">
<button id="m_tb-save-team" type="submit">Save Team</button>
</div>



<u></u>
<u></u>
<u></u>
<u></u>







    </div>
</div>
</div>
</form>-->


