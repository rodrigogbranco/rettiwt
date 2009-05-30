<?php

/*Arquivo de acesso ao banco*/
require_once "sistema/componentes/acessabd/acessabd.class.php";

//Classe que instancia um Usuario
class User extends AcessaBD
{
	/*Dados do banco de Dados*/
	var $id; //id do usuário no banco de dados
	var $password; //password do usuario
	var $email; //email do usuario
	var $alias; //nickname do usuario
	var $color; //cores especificas do usuario

	/*Construtor*/
	function __construct($id = -1 )
	{
		//Consulta ao banco
		$this->nomeTabela = "usuario";
		$this->nomeCampos = array('id','password','email','alias','color');
		parent::__construct($id);
	}

	/*Função de validação do usuário*/
	function validUser()
	{
		//verifica se a instanciação foi correta
		return ($this->id > 0);
	}
}
?>