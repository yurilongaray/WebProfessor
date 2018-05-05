<?php
	session_start();
	include "conexao.php";
	unset(
		$_SESSION['usuarioId'],
		$_SESSION['usuarioNome'],
		$_SESSION['usuarioNiveisAcessoId'],
		$_SESSION['usuarioEmai'],
		$_SESSION['usuarioSenha']
	);

		
	//isset() = é setado, ou seja, verifica se a variável existe

	//unset() = dessetado, ou seja, destroi a variável e realiza o logout 	

	//Certificando que está fechando a sessão
	session_unset();
	mysqli_close();
	header("Location: login.php");
?>
