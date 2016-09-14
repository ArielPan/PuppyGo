<?php

define('DB_USER', 'will');
define('DB_PASSWORD', 'password');
define('DB_HOST', '40.126.238.143');
define('DB_NAME', 'beach');

$dbc = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME)
        OR die('Could not connect to MySQL'.  mysqli_connect_error());
        
?>