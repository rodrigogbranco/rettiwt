<?php

/*Arquivos fonte*/
require_once("sistema/view/View.php");
require_once("sistema/view/AnonimousView.php");
require_once("sistema/view/UserView.php");
require_once("sistema/model/User.php");

/*Classe do Controlador*/
class Controller
{
	//Usuário ativo para controle de seção
	var $activeUser = null;
	var $visualisedUser = null;
	//função que invoca o controller
	function run()
	{
		//Verifica se vem algo por post
		if (isset($_POST['email']))
		{
			//Tentativa de instanciar o User
			$user = new User('email',$_POST['email']);
			
			//Cria a visão
			$view = new UserView();				

			//Verifica se o User foi instanciado
			if (!$user->validUser())
				$view->setError("invalidUser"); //Ops, usuário inválido
			else
			{
				//Será que é o usuário mesmo?
				if(sha1($_POST['password']) == $user->getPassword())
				{
					$view->setUser($user); //Logon permitido
					$this->activeUser = $user; //Registrando o Usuário ativo
				}
				else
					$view->setError("invalidPassword"); //Erro de senha
			}
		}
		else if(isset($_GET['alias'])) //Verifica se algo vem por GET			
		{
			//Tentativa de instanciar o User
			$user = new User('alias',$_GET['alias']);

			//Cria a visão
			$view = new AnonimousView();
			
			$user->alias = $_GET['alias'];
			
			//Verifica se o User foi instanciado
			if (!$user->validUser())
				$view->setError("unknownUser"); //Ops, usuário desconhecido
			else
			{
				$view->setUser($user); //Usuário foi encontrado
				$this->visualisedUser = $user;
			}
		}
		else
		{
			//Página inicial
			$view = new AnonimousView();
		}	
		//mostre a view resultante
		$view->show();
	}
}
?>