<?php 
// DB credentials.
define('DB_HOST','us-cdbr-east-03.cleardb.com');
define('DB_USER','b7dbe0e0571407');
define('DB_PASS','acbc5361');
define('DB_NAME','heroku_d9b71055f5566a8');
// Establish database connection.'/;::;::;;;
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}

?>

