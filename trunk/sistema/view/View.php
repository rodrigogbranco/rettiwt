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
		<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
		<html lang="pt">
		<head>
		<title>..::R E T T W I T::..</title>
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
		return $user;
	}
	
	//novo usuário instanciado
	function setUser($newUser)
	{
		$user = $newUser;
	}
	
	//Função abstrata show, cada view implementa a sua
	abstract function show();

	//Erros ocorreram
	function setError($newError)
	{
		$this->error = $newError;
	}
}

?>