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

/*$datos = array(
	'id' => $_POST['id'],
	'live_mode' => $_POST['live_mode'],
	'type' => $_POST['type'],
	'date_created' => $_POST['date_created'],
	'user_id' => $_POST['user_id'],
	'version' => $_POST['version'], 
	'api_version' => $_POST['api_version'], 
	'action' => $_POST['action'],  
	'data' => $_POST['data']);

$fp = fopen('id_not_'.$datos['id'].'.json', 'w');
fwrite($fp, json_encode($datos));
fclose($fp);



if($_POST){
	$fp = fopen('id_not.json', 'w');
	fwrite($fp, json_encode($_POST));
	fclose($fp);
}
else{
	$fp = fopen('id_not_creado.json', 'w');
	//fwrite($fp, json_encode($_POST));
	fclose($fp);
}
*/


// Recibir el cuerpo de la petición.
$input = @file_get_contents("php://input");
// Parsear el contenido como JSON.
$eventJson = json_decode($input, true);


/*$fp = fopen('./notifications/id_noti_creada.json', 'w');
	fwrite($fp, "Sijala creo");
	fclose($fp);

// Usar los datos del Webhooks para alguna acción.
*/


	$sentencia = $pdo->prepare("INSERT INTO notifications (id, live_mode, type, date_created,application_id, user_id, version, api_version, action, data_id, data_values) VALUES (:id, :live_mode, :type, :date_created, :application_id, :user_id, :version, :api_version, :action, :data_id, :data_values)");

	$id = $eventJson["id"];
	$live_mode = $eventJson["live_mode"];
	$type = $eventJson["type"];
	$date_created = $eventJson["date_created"];
	$application_id = $eventJson["application_id"];
	$user_id = $eventJson["user_id"];
	$version = $eventJson["version"];
	$api_version = $eventJson["api_version"];
	$action = $eventJson["action"];
	$data_id = $eventJson["data"];

	if($id != NULL){
		$val_datos ="";

		if(is_array($data_id)){
			if(count($data_id)>1){
				foreach ($datos as $key => $value) {
					$val_datos.$key.'='.$value.'/';
				}
			}
			else{
				$val_datos = NULL;
			}
		}
		else $val_datos = NULL;

		$id_data = $data_id['id'];

		$sentencia->bindParam(':id', $id);
		$sentencia->bindParam(':live_mode', $live_mode);
		$sentencia->bindParam(':type', $type);
		$sentencia->bindParam(':date_created', $date_created);
		$sentencia->bindParam(':application_id', $application_id);
		$sentencia->bindParam(':user_id', $user_id);
		$sentencia->bindParam(':version', $version);
		$sentencia->bindParam(':api_version', $api_version);
		$sentencia->bindParam(':action', $action);
		$sentencia->bindParam(':data_id', $id_data);
		$sentencia->bindParam(':data_values', $val_datos);

		// insertar una fila
		$sentencia->execute();
	}

	
	
// Responder
http_response_code(200);
?>