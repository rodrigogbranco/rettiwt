<?php

/*Inclusão do arquivo da classe base*/
include_once("View.php");

/*Classe que implementa uma visão de um usuário validado*/
class UserView extends View
{	
	//Função de exibição	
	function show()
	{
		global $controller;
		//Algum erro foi cometido?
		if($this->error == "")
		{
			include "sistema/view/showUser.php";
		}
		else
		{
			//Um erro foi detectado, vamos ver qual é...
			switch($this->error)
			{
				//Usuário inválido
				case "invalidUser":
					$this->specifiedMsgError = "Usuário Inválido";
					break;
				case "invalidPassword":
					$this->specifiedMsgError = "Password Inválido";
					break;
			}
			include "sistema/view/showDefault.php";

		}
	}
}

?>