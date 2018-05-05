<?php
	session_start();
	include "conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<style>
		#imgemunisociesc{
			position: relative;
			margin: auto;
			display: block;
			width: 150px;
			top: 100px;
			left: 10px;
		}

		form{
			position: relative;
			margin: auto;
			display: block;
			width: 210px;
			left: 10px;
			top: 110px;
		}

		.italico{
			font-style: italic;
		}

		#entrar{
			position: relative;
			margin-left: 70px;
			background-color: red;
			width: 70px;
			top: 10px;
			color: white;
		}

		#esqueci{
			margin-left: 100px;
			font-size: 10px;
			position: relative;
			top: 5px;
			font-weight: bold;
			text-decoration: none;
		}

		#entrar a, a:hover{
			text-decoration: none;
			color: white;
		}

	</style>
</head>
<body>
	<img src="unisociesc.png" id="imgemunisociesc">

	<form class="form-signin" method="POST" action="valida_login.php">
		<input class="form-control italico" name="email_usuario" placeholder="Email" value="professor" required autofocus>
		<br>
		<input type="password" class="form-control italico" name="senha_usuario" placeholder="Senha" value="123" required>
		<a href="EsqueciMinhaSenha.html"><button type="button" class="btn btn-link" id="esqueci">Esqueci minha senha</button></a>
		<button type="submit" class="btn btn-danger" id="entrar">Entrar</button> <!-- type=submit para funcionar o form -->
	</form>
</body>
</html>
