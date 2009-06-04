<?php
/*Arquivos fonte*/
require_once("sistema/view/View.php");
require_once("sistema/view/AnonimousView.php");
require_once("sistema/view/UserView.php");
require_once("sistema/view/RegisterView.php");
require_once("sistema/model/User.php");

/*Classe do Controlador*/
class Controller
{
	//Usuário ativo para controle de seção
	var $activeUser = null;
	var $visualisedUser = null;
	var $activeSession = false;
	
	
	//função que invoca o controller
	function run()
	{
		//A variavel de controle de usuario está setada?
		if(isset($_SESSION['user']))
		{
			//Instanciando o usuario
			$user = new User('alias',$_SESSION['user']);
			
			//O usuario esta ativo?
			if($user->validUser())
			{
				//eba, ta sim
				$this->activeUser = $user;
				//a sessao tem boa procedência
				$this->activeSession = true;
			}
		}

		//A sessão é valida?
		if ($this->activeSession)
			$this->registeredSession();
		else
			$this->unRegisteredSession();
				
	}
	
	//funcao que trata uma sessao registrada
	function registeredSession()
	{
		//Instanciando a visao de usuario
		$view = new UserView();

		//O usuario quer ver outro usuario?
		if(isset($_GET['alias']))
		{
			
			//O usuario existe?
			$user = new User('alias',$_GET['alias']);
			
			//É claro que sim!
			if($user->validUser())
			{
				//Avisa a sessao quem é pra mostrar
				$view->setUser($user);
				//Salvando o estado
				$this->visualisedUser = $user; 
			}
			else
				$view->setMsg("error","unknownUser"); //É claro que não
				
		}
		else
		{
			$view->setUser($this->activeUser);
			$this->visualisedUser = $this->activeUser;
		}
		

		//Mostra a visao
		$view->show();
	}

	//funcao que trata uma sessao nao registrada
	function unRegisteredSession()
	{
		if (isset($_POST['validarcadastro'])) //verificar se há um cadastro para efetuar
		{
			//Instanciando a nova View
			$view = new RegisterView();
			
			/*Verificando se o password confere com a verificação*/
			if($_POST['password'] == $_POST['confirm'])
			{
				/*instanciando um novo objeto User*/
				$user = new User('email',$_POST['email']);
				
				if(!$user->validUser())
				{
					/*instanciando o objeto User novamente*/
					$user = new User('alias',$_POST['alias']);
					
					if(!$user->validUser())
					{
						//Beleza, nosso registro é possivel
						$user = new User();
						
						$user->email = $_POST['email'];
						$user->alias = $_POST['alias'];
						$user->password = sha1($_POST['password']);
						/*lembrar o lance das cores*/$user->color = 1;
						
						/*Vamos persistir o indivíduo*/
						$user->save();
						
						$view =  new UserView();
						$view->setUser($user); //Logon permitido
						$this->activeUser = $user; //Registrando o Usuário ativo
						$this->visualisedUser = $user;
						$this->activeSession = true;
						//registrando a sessão
						$_SESSION['user'] = $user->alias;
						
						$view->setMsg("information","newUser");
					}
					else
						$view->setMsg('error','registeredAlias'); //Ja tem um caboclo com esse alias.
				}
				else
					$view->setMsg('error','registeredEmail'); //Ja tem um caboclo com esse email.
			}
			else
				$view->setMsg('error','mismatchPassword'); //Ops!
		}
		else if (isset($_POST['cadastro'])) //verificar se o cadastro foi solicitado
		{
			$view = new RegisterView();
		}
		else if (isset($_POST['email'])) //Verifica se vem algo por post
		{
			//Tentativa de instanciar o User
			$user = new User('email',$_POST['email']);
			
			//Cria a visão
			$view = new UserView();				

			//Verifica se o User foi instanciado
			if (!$user->validUser())
				$view->setMsg("error","invalidUser"); //Ops, usuário inválido
			else
			{
				//Será que é o usuário mesmo?
				if(sha1($_POST['password']) == $user->getPassword())
				{
					$view->setUser($user); //Logon permitido
					$this->activeUser = $user; //Registrando o Usuário ativo
					$this->visualisedUser = $user;
					$this->activeSession = true;
					//registrando a sessão
					$_SESSION['user'] = $user->alias;
				}
				else
					$view->setMsg("error","invalidPassword"); //Erro de senha
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
				$view->setMsg("error","unknownUser"); //Ops, usuário desconhecido
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