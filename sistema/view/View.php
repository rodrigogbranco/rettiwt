<?php

/*Classe abstrata que implementa uma visão*/
abstract class View
{
	//Usuario corrente, se nulo, é um anônimo
	var $user;
	var $error = "";

	//html inicial
	function __construct()
	{
		?>
		<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/xhtml1/DTD/strict.dtd">
		<html lang="pt-br">
			<head>
				<title>..:: R E T T I W T ::..</title>
				<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
				<link href="estilos.css" rel="stylesheet" type="text/css">
			</head>
			<body>
		<?php
	}

	//html inicial
	function __destruct()
	{
		?>
			</body>
		</html>
		<?php
	}
	
	//Qual o usuário?
	function getUser()
	{
		return $this->user;
	}
	
	//novo usuário instanciado
	function setUser($newUser)
	{
		$this->user = $newUser;
	}
	
	//Função abstrata show, cada view implementa a sua
	abstract function show();

	//Erros ocorreram
	function setError($newError)
	{
		$this->error = $newError;
	}

	/*Função da tela padrão*/
	function showDefault()
	{
		include "sistema/view/showDefault.php";
	}
}

?>