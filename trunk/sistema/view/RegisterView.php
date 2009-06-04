<?php

/*Inclusуo do arquivo da classe base*/
include_once("View.php");

/*Classe que implementa uma visуo de um usuсrio validado*/
class RegisterView extends View
{	
	//Funчуo de exibiчуo	
	function show()
	{
		//Algum erro foi cometido?
		if($this->msg != "")
		{
			//Um erro foi detectado, vamos ver qual щ...
			switch($this->msg)
			{
				//Usuсrio invсlido
				case "mismatchPassword":
					$this->specifiedMsg = "Password nao confere, tente novamente";
					break;
				//Jс existe email cadastrado
				case "registeredEmail":
					$this->specifiedMsg = "Esse email ja consta nos registros, por favor coloque outro";
					break;
				//Jс existe alias cadastrado
				case "registeredAlias":
					$this->specifiedMsg = "Esse Alias ja consta nos registros, por favor coloque outro";
					break;
			}
		}
		/*inclua o arquivo para visualizar*/
		include "sistema/view/include/showRegisterForm.php";
	}
}

?>