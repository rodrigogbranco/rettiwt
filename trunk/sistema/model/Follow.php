<?php
/*Arquivo de acesso ao banco*/
require_once "sistema/componentes/acessabd/acessabd.class.php";

//Classe que instancia um Usuario
class Follow extends AcessaBD
{
	/*Dados do banco de Dados*/
	var $id; //id do follow
	var $id_user; //id do usuario
	var $id_user_follow; //id do usuario que está seguindo

	/*Construtor*/
	function __construct ( $nomeCampo = null, $valorCampo = null )
	{
		$this->nomeTabela = "user";
		$this->nomeCampos = array("id","id_user","id_user_follow");
		
    		parent::__construct($nomeCampo, $valorCampo);
	}

	/*Função de validação do usuário*/
	function validFollow()
	{
		//verifica se a instanciação foi correta
		return ($this->id > 0);
	}
}
?>