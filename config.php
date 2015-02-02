<?php

//db settings
$db_username = 'root';
$db_password = '';
$db_name = 'nilushicms';
$db_host = 'localhost';
define( "DB_DSN", "mysql:host=localhost;dbname=nilushicms" );
define( "DB_USERNAME", "root" );
define( "DB_PASSWORD", "" );
define( "DB_HOST", $db_host );
define( "DB_NAME", $db_name );


//define( "ADMIN_USERNAME", "admin" );
//define( "ADMIN_PASSWORD", "mypass" );



//$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);


$con=mysqli_connect($db_host, $db_username, $db_password,$db_name);
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}



?>