<?php
	//conexao
	require_once 'db_connect.php';

	//sessão
	session_start();

	//botao enviar
	if (isset($_POST['btn-entrar'])):
		$erros = array();
		$login = mysqli_escape_string($connect, $_POST['login']);
		$senha = mysqli_escape_string($connect, $_POST['senha']);

		if (empty($login) or empty($senha)):
			$erros[] = "<li> O campo login/senha precisa ser preenchido </li>";
		echo "O campo login/senha precisa ser preenchido";
			else:
				$sql = "SELECT * FROM usuarios WHERE login = '$login'";
				$resultado = mysqli_query($connect, $sql);

				if (mysqli_num_rows($resultado) > 0):
					$senha = md5($senha);
					$sql = "SELECT * FROM usuarios Where login = '$login' AND senha = '$senha'";
					$resultado = mysqli_query($connect, $sql);

						if (mysqli_num_rows($resultado) ==1):
							$dados = mysqli_fetch_array($resultado);
							mysqli_close($connect);
							$_SESSION['logado'] = true;
							$_SESSION['id_usuario'] = $dados['id'];
							header('Location: home.php');
						else:
							$erros[] = "<li> Usuário e senha não conferem </li>";
							echo "Usuário e senha não conferem";
						endif;

					else:
						$erros[] = "<li> Usuário inexistente </li>";
						echo "Usuário inexistente";
				endif;
		endif;

	endif;
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="css/estilo.css">

	</head>
	<body>
		<div>
			<div id="area-logo">
			<h1><span class="branco">Comunidade de </span><span class="vermelho">Vídeos</span></h1>
			</div>
			<br><br><br>
				<div id="area-principal">
						<div id="area-login"><!--abertura login -->
							<div class="ac_box">
				      			<div class="ac_box_top"></div>
				            		<div class="ac_box_cont">
				            			<h2 class="branco">Faça Login</h2><br>
											<div class="login">
												<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
													Login: <input type="text" name="login" class="texto"><br><br>
													Senha: <input type="password" name="senha" class="texto"><br><br>
													<button type="submit" name="btn-entrar" class="button">Entrar</button>
												</form>
											</div>
									</div>
								</div>
							</div><br><br><br><br><br><br><br><br><br><br><br><br>
						</div><!--fechamento login -->
					<div id="rodape">
						<span>Todos os direitos reservados</span>
					</div>
				</div>		
		</div>					
	</body>
</html>
