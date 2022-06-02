</<?php 
session_start();
include_once ("conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$assunto = filter_input(INPUT_POST, 'assunto', FILTER_SANITIZE_STRING);
$autor = filter_input(INPUT_POST, 'autor', FILTER_SANITIZE_STRING);
$canal = filter_input(INPUT_POST, 'canal', FILTER_SANITIZE_STRING);
$palavraschave = filter_input(INPUT_POST, 'palavraschave', FILTER_SANITIZE_STRING);
$link = filter_input(INPUT_POST, 'link', FILTER_SANITIZE_STRING);

//echo "nome: $nome <br>";
//echo "email: $email <br>";

$result_usuario = "INSERT INTO videos (nome, assunto, autor, canal, palavraschave, link) VALUES ('$nome', '$assunto', '$autor', '$canal', '$palavraschave', '$link')";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if (mysqli_insert_id ($conn)) {
	$_SESSION ['msg'] = "<p style='color:green;'>Vídeo cadastrado com sucesso</p>";
	header("location: cadastro-videos.php");
}
else{
	$_SESSION ['msg'] = "<p style='color:red;'>Vídeo não foi cadastrado</p>";
	header("location: cadastro-videos.php");
}