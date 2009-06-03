<?php

/*Inclus�o do arquivo da classe base*/
include_once("View.php");

/*Classe que implementa uma vis�o de um usu�rio validado*/
class RegisterView extends View
{	
	//Fun��o de exibi��o	
	function show()
	{
		global $controller;
		//Algum erro foi cometido?
		if($this->error != "")
		{
			//Um erro foi detectado, vamos ver qual �...
			switch($this->error)
			{
				//Usu�rio inv�lido
				case "mismatchPassword":
					$this->specifiedMsgError = "Password n�o confere, tente novamente";
					break;
				//J� existe email cadastrado
				case "registeredEmail":
					$this->specifiedMsgError = "Esse email j� consta nos registros, por favor coloque outro";
					break;
				//J� existe alias cadastrado
				case "registeredAlias":
					$this->specifiedMsgError = "Esse Alias j� consta nos registros, por favor coloque outro";
					break;
			}
		}
		/*inclua o arquivo para visualizar*/
		include "sistema/view/include/showRegisterForm.php";
	}
}

?>