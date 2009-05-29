<?php

include_once("sistema/view/View.php");
include_once("sistema/view/AnonimousView.php");
include_once("sistema/view/UserView.php");
include_once("sistema/model/User.php");

class Controller
{	
	//função que invoca o controller
	function run()
	{	
		var_dump($_GET);
		if ($_GET['alias'] != null)
		{
			//Um usuário foi identificado
			$user = new User($_GET['alias']);

			$view = new AnonimousView();
			if (!$user->validUser())
				$view->setError("unknownUser");
			else
				$view->setUser($user);
		}
		else
		{
			if ($_POST['alias'] != null)
			{
				//Usuário está tentando se validar
				$user = new User($_POST['alias']);

				$view = new UserView();				

				if (!$user->validUser())
					$view->setError("invalidUser");
				else
				{
					if(sha1($_POST['password']) == $user->getPassword())
						$view->setUser($user);
					else
						$view->setError("invalidPassword");
				}
			}
			else
			{
				//Página inicial
				$view = new AnonimousView();
			}	
		}
		
		//mostre a view resultante
		$view->show();
	}
}
?>