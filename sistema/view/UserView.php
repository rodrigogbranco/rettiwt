<?php

/*Inclusão do arquivo da classe base*/
include_once("View.php");

/*Classe que implementa uma visão de um usuário validado*/
class UserView extends View
{	
	//Função de exibição	
	function show()
	{
		//Algum erro foi cometido?
		if($this->error == "")
		{
			echo "Usuario Validado";
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
			$this->showDefault();
		}
	}
}

?>