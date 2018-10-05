﻿<?php
	$method = $_SERVER['REQUEST_METHOD'];
	//POST METHOD
	if ($method == 'POST') {
		$requestBody = file_get_contents('php://input');
		$json = json_decode($requestBody);

		$saludo = $json->queryResult->parameters->saludo;

		switch ($saludo) {
			case 'hola':
				$speech = "Hi, nice to meet u";
				break;
			case 'bye':
				$speech = "¡Bye!";
				break;
			default:
				$speech = "Sorry, i did not understand u ";
				break;
		}

		$response = new \stdClass();
		#$response->speech = $speech;
		$response->fulfillmentText = $speech;
		$response->source = "webhook";
		echo json_encode($response);

	}
	else{
		echo "Method not allowed";
	}
?>