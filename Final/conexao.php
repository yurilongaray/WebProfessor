<?php
	$servidor = "localhost";
	$usuario = "root";
	$senha = "123456";
	$dbname = "Web_professor";

	//informa qual o conjunto de caracteres será usado
	header('Content-Type: text/html; charset=utf8');

	//Abrir conexão com o MySQL
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

	//Checando conexão
	if (!$conn) {
	  die("Falha de Conexão: " . mysqli_connect_error());
	}

	//querys para retirar os caracteres especiais e transformar em utf8
	mysqli_query($conn, "SET NAMES 'utf8'");
	mysqli_query($conn, 'SET character_set_connection = utf8');
	mysqli_query($conn, 'SET character_set_client = utf8');
	mysqli_query($conn, 'SET character_set_results = utf8');

?>



