<?php
	session_start();

	if(!isset($_SESSION['usuario'])){
		header('Location: index.php?erro=1');
	}

	require_once('db.class.php');

	$texto_tweet = $_POST['texto_tweet'];
	$id_usuario = $_SESSION['id'];

	if($texto_tweet == '' || $id_usuario == ''){
		die();
	}

	$objDB = new Db();
	$link = $objDB->conecta_mysql();

	$sql = "INSERT INTO tweets(id_usuario, tweet) values ($id_usuario, '$texto_tweet')";

	mysqli_query($link, $sql);
?>