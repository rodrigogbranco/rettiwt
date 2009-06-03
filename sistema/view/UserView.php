<?php

/*Inclusão do arquivo da classe base*/
include_once("View.php");

/*Classe que implementa uma visão de um usuário validado*/
class UserView extends View
{	
	//Função de exibição	
	function show()
	{
		//Verificar a sessao atraves do controller
		global $controller;
		//Algum erro foi cometido?
		if($this->msg == "")
		{
			include "sistema/view/include/showUser.php";
		}
		else
		{
			//Um erro foi detectado, vamos ver qual é...
			switch($this->msg)
			{
				//Usuário inválido
				case "invalidUser":
					$this->specifiedMsg = "Usuário Inválido";
					break;
				case "invalidPassword":
					$this->specifiedMsg = "Password Inválido";
					break;
			}
			include "sistema/view/include/showDefault.php";

		}
	}
}

?>