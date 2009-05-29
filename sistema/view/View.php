<?php

/*Classe abstrata que implementa uma visão*/
abstract class View
{
	//Usuario corrente, se nulo, é um anônimo
	var $user;
	var $error = "";
	
	function getUser()
	{
		return $user;
	}
	
	function setUser($newUser)
	{
		$user = $newUser;
	}
	
	abstract function show();

	function setError($newError)
	{
		$this->error = $newError;
	}
}

?>