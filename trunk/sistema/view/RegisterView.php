<?php

/*Inclusуo do arquivo da classe base*/
include_once("View.php");

/*Classe que implementa uma visуo de um usuсrio validado*/
class RegisterView extends View
{	
	//Funчуo de exibiчуo	
	function show()
	{
		global $controller;
		//Algum erro foi cometido?
		if($this->error != "")
		{
			//Um erro foi detectado, vamos ver qual щ...
			switch($this->error)
			{
				//Usuсrio invсlido
				case "mismatchPassword":
					$this->specifiedMsgError = "Password nуo confere, tente novamente";
					break;
				//Jс existe email cadastrado
				case "registeredEmail":
					$this->specifiedMsgError = "Esse email jс consta nos registros, por favor coloque outro";
					break;
				//Jс existe alias cadastrado
				case "registeredAlias":
					$this->specifiedMsgError = "Esse Alias jс consta nos registros, por favor coloque outro";
					break;
			}
		}
		/*inclua o arquivo para visualizar*/
		include "sistema/view/include/showRegisterForm.php";
	}
}

?>