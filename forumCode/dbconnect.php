<?php
  //Defining the Database variables for connection establishment

  define('DB_SERVER', 'localhost');
  define('DB_USERNAME', 'root');
  define('DB_PASSWORD', '');
  define('DB_NAME', 'forum');

  $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if($link===false)
    {
      die("ERROR: Error connecting to WMT Database. " . mysqli_connect_error());
    }
 ?>
