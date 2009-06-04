<?php

/*Arquivo da classe base View*/
include_once("View.php");

/*Classe do Controlador*/
class AnonimousView extends View
{	
	/*Função de visualização*/
	function show()
	{
		global $controller;
		//Algum erro foi cometido?
		if($this->msg == "")
		{
			//Não ocorreu erro, mas existe um usuário especificado?
			if($this->user)
				include "sistema/view/include/showUser.php";
			else
				include "sistema/view/include/showDefault.php";

		}
		else
		{
			//Um erro foi detectado, vamos ver qual é...
			switch($this->msg)
			{
				//Usuário desconhecido
				case "unknownUser":
					$this->specifiedMsg = "Usuario Desconhecido";
					break;
			}
			include "sistema/view/include/showDefault.php";

		}
	}
}

?>