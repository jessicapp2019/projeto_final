<?php
session_start();
include("../conexao/conexao.php");

$nome = mysqli_real_escape_string($conexao, trim($_GET['nome']));
$usuario = mysqli_real_escape_string($conexao, trim($_GET['usuario']));
$senha = mysqli_real_escape_string($conexao, trim(md5($_GET['senha'])));

$sql = "select count(*) as total from usuario where usuario = '$usuario'";
$result = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1) {
	$_SESSION['usuario_existe'] = true;
	header('Location: ../view/cadastro.php');
	exit;
}

$sql = "INSERT INTO usuario (nome, usuario, senha, data_cadastro) VALUES ('$nome', '$usuario', '$senha', NOW())";

if($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;
}

$conexao->close();

header('Location: ../view/cadastro.php');
exit;
?>