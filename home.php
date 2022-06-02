<?php
	//conexao
		require_once 'db_connect.php';

		//sessão
		session_start();

		//verificação
		if (!isset($_SESSION['logado'])):
			header('Location: index.php');
		endif;

	//Dados
	$id = $_SESSION['id_usuario'];
	$sql = "SELECT * FROM usuarios WHERE id = '$id'";
	$resultado = mysqli_query($connect, $sql);
	$dados = mysqli_fetch_array($resultado);
	mysqli_close($connect);
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
				            			<h3 class="branco">Olá <?php echo $dados['nome']?>, Seja Bem-vindo(a)</h3><br>
				            			<h4>Menu</h4>
										<a href="cadastro-canais.php">Cadastro de canais</a><br><br>
										<a href="cadastro-videos.php">Cadastro de vídeos</a><br><br>
										<a href="listarcanais.php">Listagem de canais</a><br><br>
										<a href="listarvideos.php">Listagem de vídeos</a><br><br><br><br><br><br>
										<a href="logout.php" class="button">Sair</a>

									</div>
								</div>
							</div>
						</div><br><br><br><br><br><br><br><br><br><br><br><!--fechamento login -->
					<div id="rodape">
						<p><span>Todos os direitos reservados</span></p>
					</div>
				</div>		
		</div>		

	</body>
</html>