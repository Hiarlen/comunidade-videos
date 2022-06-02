<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Cadastro de Canais</title>
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
	</head>
	<body>
		<div id="area-logo">
			<h1><span class="branco">Comunidade de </span><span class="vermelho">Vídeos</span></h1>
			</div>
			<br><br><br>
		<div id="area-principal">
			<div id="area-menu">
				<a href="home.php">Home</a>
				<a href="cadastro-canais.php">Cadastrar canal</a>
				<a href="cadastro-videos.php">Cadastrar vídeo</a>
				<a href="listarcanais.php">Listagem de Canais</a>
				<a href="listarvideos.php">Listagem de Vídeos</a>
				<h2>Cadastrar Canais</h2>
				<?php
				if (isset($_SESSION ['msg'])) {
					echo $_SESSION ['msg'];
					unset ($_SESSION['msg']);
				}
				?>
				<form method="POST" action="processacanais.php" class="esquerda">
					<label>Nome:</label>
					<input type="text" name="nome" placeholder="Digite o nome completo"><br><br>

					<label>E-mail:</label>
					<input type="email" name="email" placeholder="Digite o seu melhor e-mail"><br><br>

					<input type="submit" value="Cadastrar" name="Cadastrar"><br><br><br><br><br><br><br><br><br><br><br><br>
				</form>
			</div>
			<div id="rodape">
				<a href="logout.php" class="button">Sair</a><br><br>
				<p><span>Todos os direitos reservados</span></p>
			</div>
		</div>
	</body>
</html>