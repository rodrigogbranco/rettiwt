<?php
/*Arquivo de acesso ao banco*/
require_once "sistema/componentes/acessabd/acessabd.class.php";

//Classe que instancia um Usuario
class Twitt extends AcessaBD
{
	/*Dados do banco de Dados*/
	public $id; //id do twitt no banco de dados
	public $text; //texto do usuário
	public $date; //data da postagem do twitt
	public $time; //hora da postagem do twitt
	

	/*Construtor*/
	function __construct ( $nomeCampo = null, $valorCampo = null )
	{
		$this->nomeTabela = "twitt";
		$this->nomeCampos = array("id","text","date","time");
		
    parent::__construct($nomeCampo, $valorCampo);
	}

	/*Função de validação do twitt*/
	function validTwitt()
	{
		//verifica se a instanciação foi correta
		return ($this->id > 0);
	}
}
?>