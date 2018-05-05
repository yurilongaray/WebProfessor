<?php
	session_start();

	//Incluindo conexão com banco de dados:
	include_once "conexao.php";

	
	//isset() = é setado, ou seja, verifica se a variável existe

	//unset() = dessetado, ou seja, destroi a variável e realiza o logout 	

	//Os campos usuário e senha preenchidos são validados no if abaixo
	if ((isset($_POST["email_usuario"])) && (isset($_POST["senha_usuario"]))) { //verifica se estão vazias para então prosseguir
		$usuario = mysqli_real_escape_string($conn, $_POST["email_usuario"]);//Escapar de caracteres especiais e SQL injection
		$senha = mysqli_real_escape_string($conn, $_POST["senha_usuario"]);

		/* Busca na tabela o usuario que corresponde com os dados do form */
		$result_usuario = "SELECT * FROM usuarios WHERE email_usuario = '$usuario' && senha_usuario = '$senha' LIMIT 1";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		$resultado = mysqli_fetch_assoc($resultado_usuario);

		/* Encontrando o usuario com mesmos dados */
		if (isset($resultado)) {
			$_SESSION["usuarioId"] = $resultado["id_usuario"];
			$_SESSION["usuarioNome"] = $resultado["nome_usuario"];
			$_SESSION["usuarioNiveisAcessoId"] = $resultado["niveis_acesso_id"];
			$_SESSION["usuarioEmail"] = $resultado["email_usuario"];
				if ($_SESSION["usuarioNiveisAcessoId"] == "1") {
					header("Location: administrativo.php");
				}elseif ($_SESSION["usuarioNiveisAcessoId"] == "2") {
					header("Location: home.php");
				}else{
					header("Location: aluno.php");
				}
		}else { /* Nenhum usuario encontrado com os dados do form */
			header("Location: login.php"); //Redireciona para página no Location
		}
	}else { /* bloqueia usuario e senha em branco tentando informar url para passar pelo login*/
		header("Location: login.php"); //Redireciona para página no Location
	}

?>

