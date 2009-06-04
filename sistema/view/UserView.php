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
			//Uma msg foi detectada, vamos ver qual é...
			switch($this->msg)
			{
				//Usuário inválido
				case "invalidUser":
					$this->specifiedMsg = "Usuário Invalido";
					include "sistema/view/include/showDefault.php";
					break;
				case "invalidPassword":
					$this->specifiedMsg = "Password Invalido";
					include "sistema/view/include/showDefault.php";
					break;
				case "unknownUser":
					$this->specifiedMsg = "Ops! O usuario nao foi encontrado.";
					include "sistema/view/include/showUser.php";
					break;
				case "newUser":
					$this->specifiedMsg = "Parabens, seu Rettiwt foi criado com sucesso!";
					include "sistema/view/include/showUser.php";
					break;						
			}
		}
	}
}

?>