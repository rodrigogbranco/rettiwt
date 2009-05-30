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
				//Usuário desconhecido
				case "invalidUser":
					echo "Usuario Inválido";
					break;
				case "invalidPassword":
					echo "Password invalido";
					break;
			}
		}
	}
}

?>