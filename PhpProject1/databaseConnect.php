<?php
//define database parameters
define('DB_USER', 'will');  //username of the database
define('DB_PASSWORD', 'password'); //password of the database
define('DB_HOST', '40.126.242.64'); //host of the database
define('DB_NAME', 'beach'); //database name
//setting up connection to the database
$dbc = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME)
        OR die('Could not connect to MySQL'.  mysqli_connect_error()); //check database connection
?>