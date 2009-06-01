<?php

/*Arquivo de acesso ao banco*/
require_once "sistema/componentes/acessabd/acessabd.class.php";

//Classe que instancia um Usuario
class User extends AcessaBD
{
	/*Dados do banco de Dados*/
	var $id = -1; //id do usuário no banco de dados
	var $password; //password do usuario
	var $email; //email do usuario
	var $alias; //nickname do usuario
	var $color; //cores especificas do usuario

	/*Construtor*/
	function __construct($tabela,$id = -1 )
	{
		global $conectar;
		//Consulta ao banco
		/*Renan tem que tratar*/
		/*$this->nomeTabela = "usuario";
		$this->nomeCampos = array('id','password','email','alias','color');
		parent::__construct($id);*/
		//var_dump($id);
		$result = mysql_query('Select * from user where '.$tabela.' = "'.$id.'"');
		if ($result)
		{
			$row = mysql_fetch_assoc($result);
			$this->id = $row['id'];
			$this->password = $row['senha'];
			$this->alias = $row['alias'];
			$this->color = $row['cores'];
		}
	}

	/*Função de validação do usuário*/
	function validUser()
	{
		//verifica se a instanciação foi correta
		return ($this->id > 0);
	}
	
	function getPassword()
	{
		return $this->password;
	}
}
?>