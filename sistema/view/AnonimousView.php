<?php

/*Arquivo da classe base View*/
include_once("View.php");

/*Classe do Controlador*/
class AnonimousView extends View
{	
	/*Função de visualização*/
	function show()
	{
		//Algum erro foi cometido?
		if($this->error == "")
		{
			//Não ocorreu erro, mas existe um usuário especificado?
			if($this->user)
				$this->showUser();
			else
				$this->showDefault();
		}
		else
		{
			//Um erro foi detectado, vamos ver qual é...
			switch($this->error)
			{
				//Usuário desconhecido
				case "unknownUser":
					$this->specifiedMsgError = "Usuário Desconhecido";
					break;
			}
			$this->showDefault();
		}
	}

	/*Função para mostrar um usuário específico*/
	function showUser()
	{
		include "sistema/view/showUser.php";
	}
}

?>