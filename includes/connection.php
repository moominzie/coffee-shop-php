<?php 
// DB credentials.
define('DB_HOST','us-cdbr-east-03.cleardb.com');
define('DB_USER','b477989d0dc25f');
define('DB_PASS','74d8c82f');
define('DB_NAME','heroku_56bc75731c693b2');
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

