<?php

/*Arquivos fonte*/
require_once("sistema/view/View.php");
require_once("sistema/view/AnonimousView.php");
require_once("sistema/view/UserView.php");
require_once("sistema/model/User.php");

/*Classe do Controlador*/
class Controller
{	
	//função que invoca o controller
	function run()
	{	
		//Verifica se algo vem por GET
		if (isset($_GET['alias']))
		{
			//Tentativa de instanciar o User
			$user = new User($_GET['alias']);

			//Cria a visão
			$view = new AnonimousView();
			//Verifica se o User foi instanciado
			if (!$user->validUser())
				$view->setError("unknownUser"); //Ops, usuário desconhecido
			else
				$view->setUser($user); //Usuário foi encontrado
		}
		else
		{
			//Verifica se vem algo por post
			if (isset($_POST['email']))
			{
				//Tentativa de instanciar o User
				$user = new User($_POST['email']);
				
				//Cria a visão
				$view = new UserView();				

				//Verifica se o User foi instanciado
				if (!$user->validUser())
					$view->setError("invalidUser"); //Ops, usuário inválido
				else
				{
					//Será que é o usuário mesmo?
					if(sha1($_POST['password']) == $user->getPassword())
						$view->setUser($user); //Logon permitido
					else
						$view->setError("invalidPassword"); //Erro de senha
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