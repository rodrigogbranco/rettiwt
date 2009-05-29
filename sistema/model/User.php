<?php

//Classe que instancia um Usuario
class User
{
	var $id; //id do usuário no banco de dados
	var $password; //password do usuario
	var $email; //email do usuario
	var $alias; //nickname do usuario
	var $color; //cores especificas do usuario
	var $valid; //identifica se a instancia é valida

	function __construct($newUser)
	{
		//Consulta ao banco etc
		
		if(false)
			$this->valid = true;
		else
			$this->valid = false;
	}

	function validUser()
	{
		return $this->valid;
	}
}
?>