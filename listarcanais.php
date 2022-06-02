<?php
session_start();
include_once ("conexao.php")
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Listar Canais</title>
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
				<h2>Listar Canais</h2>
				<h4>Veja aqui quais os canais que ja estão cadastrados</h4>
			</div>

			<div class="pd">
				<?php
				if (isset($_SESSION ['msg'])) {
					echo $_SESSION ['msg'];
					unset ($_SESSION['msg']);
				}


				//Receber o número da página
				$pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
				$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;


				// Setar a quantidade de itens por página
				$qnt_result_pg = 3;


				//Calcular o inicio da visualização
				$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

				$result_canais = "SELECT * FROM canais LIMIT $inicio, $qnt_result_pg";
				$resultado_canais = mysqli_query ($conn, $result_canais);
				while ($row_usuario = mysqli_fetch_assoc($resultado_canais)) {
					echo "ID: " . $row_usuario ['id'] . "<br>";
					echo "Nome: " . $row_usuario ['nome'] . "<br>";
					echo "E-mail: " . $row_usuario ['email'] . "<br><hr>";
				}

				//Paginação - somar a quantidade de usuários
				$result_pg = "SELECT COUNT(id) AS num_result FROM canais";
				$resultado_pg = mysqli_query($conn, $result_pg);
				$row_pg = mysqli_fetch_assoc($resultado_pg);
				//echo $row_pg['num_result'];

				//Quantidade de página
				$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

				//Limitar os links antes depois
				$max_links = 2;
				echo "<a href='listarcanais.php?pagina=1'>Primeira </a>";

				for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
					if ($pag_ant >=1) {
					echo "<a href='listarcanais.php?pagina=$pag_ant'>$pag_ant </a>";
				}
				}

				echo "$pagina ";

				for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){ 
					if($pag_dep <= $quantidade_pg){
						echo "<a href='listarcanais.php?pagina=$pag_dep'>$pag_dep </a>";
					}
				}

				echo "<a href='listarcanais.php?pagina=$quantidade_pg'>Ultima </a>";
				?>
				<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
			</div>
			<div id="rodape">
				<a href="logout.php" class="button">Sair</a><br><br>
				<p><span>Todos os direitos reservados</span></p>
			</div>
		</div>
	</body>
</html>