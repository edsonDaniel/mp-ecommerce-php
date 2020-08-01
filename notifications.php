<?php 

$db = parse_url('postgres://xlhhwtovzqgyxz:d76662130d013289f38c20bf195c3c91c57990ff6740afaf5b67c8838b6ed6fc@ec2-54-197-254-117.compute-1.amazonaws.com:5432/d4g3li5f7i5nnr');

/*echo var_dump($db);

	echo "<br>";

	echo $db['host'];

	echo "<br>";

	echo "pgsql:" .sprintf(
	    "host=%s;port=%s;user=%s;password=%s;dbname=%s",
	    $db["host"],
	    $db["port"],
	    $db["user"],
	    $db["pass"],
	    ltrim($db["path"], "/"))."<br> <br>";

	echo ltrim($db["path"], "/")."<br> <br>";

	echo $db["path"]."<br><br>";


	//$conexion = new PDO()
*/

try {
    $pdo = new PDO("pgsql:" . sprintf(
    "host=%s;port=%s;user=%s;password=%s;dbname=%s",
    $db["host"],
    $db["port"],
    $db["user"],
    $db["pass"],
    ltrim($db["path"], "/")
));

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

$datos = array(
	'id' => $_GET['id'],
	'live_mode' => $_GET['live_mode'],
	'type' => $_GET['type'],
	'date_created' => $_GET['date_created'],
	'user_id' => $_GET['user_id'],
	'version' => $_GET['version'], 
	'api_version' => $_GET['api_version'], 
	'action' => $_GET['action'],  
	'data' => $_GET['data']);

$fp = fopen('data'.$datos['id'].'.json', 'w');
fwrite($fp, json_encode($datos));
fclose($fp);


?>