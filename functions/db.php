<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'samu_events');
define('DB_USER', 'root');
define('DB_PASS', '');


// Connect to the database and get error if it fails    
$db =  mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
global $db;
// check error
if (mysqli_connect_errno()) {
    echo 'Failed to connect to MySQL: ' . mysqli_connect_error();
}
