<?php

	$db = parse_url('postgres://xlhhwtovzqgyxz:d76662130d013289f38c20bf195c3c91c57990ff6740afaf5b67c8838b6ed6fc@ec2-54-197-254-117.compute-1.amazonaws.com:5432/d4g3li5f7i5nnr');

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

	//$todos = $pdo->prepare("SELECT * FROM NOTIFICATIONS order by id limit 1");
	//$todos->execute();

	$datos = array();

	foreach ($pdo->query("SELECT * FROM NOTIFICATIONS order by id limit 1") as $row) {
        $datos['id'] = $row['id'];
        $datos['live_mode'] = $row['live_mode'];
        $datos['type'] = $row['type'];
        $datos['date_created'] = $row['date_created'];
        $datos['application_id'] = $row['application_id'];
        $datos['user_id'] = $row['user_id'];
        $datos['version'] = $row['version'];
        $datos['api_version'] = $row['api_version'];
        $datos['action'] = $row['action'];
        $datos['data'] = array('id' => $row['data_id']);
    }

	//$datos = $todos->fetchAll();
	//$datas = $datos[count($datos)-1];

	/*unset($datos['data_values']);

	$data['id'] = $datos['data_id'];

	unset($datos['data_id']);

	$datos['data'] = $data;*/
	//echo count($datos);
	echo json_encode($datos);

	/*foreach ($pdo->query($sql) as $row) {
        print $row['name'] . "\t";
        print $row['color'] . "\t";
        print $row['calories'] . "\n";
    }*/
 ?>