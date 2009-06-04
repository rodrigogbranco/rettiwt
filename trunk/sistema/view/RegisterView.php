<?php

/*Inclus�o do arquivo da classe base*/
include_once("View.php");

/*Classe que implementa uma vis�o de um usu�rio validado*/
class RegisterView extends View
{	
	//Fun��o de exibi��o	
	function show()
	{
		//Algum erro foi cometido?
		if($this->msg != "")
		{
			//Um erro foi detectado, vamos ver qual �...
			switch($this->msg)
			{
				//Usu�rio inv�lido
				case "mismatchPassword":
					$this->specifiedMsg = "Password nao confere, tente novamente";
					break;
				//J� existe email cadastrado
				case "registeredEmail":
					$this->specifiedMsg = "Esse email ja consta nos registros, por favor coloque outro";
					break;
				//J� existe alias cadastrado
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