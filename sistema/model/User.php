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
	var $foto_id_multimidia; //????


	/*Construtor*/
	function __construct ( $nomeCampo = null, $valorCampo = null )
	{
		$this->nomeTabela = "user";
		$this->nomeCampos = array("id","password","email","alias","foto_id_multimidia");
		
    		parent::__construct($nomeCampo, $valorCampo);
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