<?php

include_once("View.php");

class AnonimousView extends View
{	
	function show()
	{
		if($this->error == "")
		{
			if($this->user)
				echo "Usuario especifico";
			else
				echo "tela inicial";
		}
		else
		{
			switch($this->error)
			{
				case "unknownUser":
					echo "Usuario Desconhecido";
					break;
				case "invalidUser":
					echo "Usuario Invalido";
					break;
				case "invalidPassword":
					echo "Password Invalido";
					break;
			}
		}
	}
}

?>