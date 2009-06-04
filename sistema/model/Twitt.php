<?php
/*Arquivo de acesso ao banco*/
require_once "sistema/componentes/acessabd/acessabd.class.php";

//Classe que instancia um Usuario
class Twitt extends AcessaBD
{
	/*Dados do banco de Dados*/
	public $id; //id do twitt no banco de dados
	public $id_user; //id do usuário que postou o twitt
	public $text; //texto do usuário
	public $date; //data da postagem do twitt
	public $time; //hora da postagem do twitt
	public $file;
	public $reply;
	

	/*Construtor*/
	function __construct ( $nomeCampo = null, $valorCampo = null )
	{
		$this->nomeTabela = "twitt";
		$this->nomeCampos = array("id","id_user", "text","date","time", "file", "reply");
		
     		parent::__construct($nomeCampo, $valorCampo);
	}

	/*Função de validação do twitt*/
	function validTwitt()
	{
		//verifica se a instanciação foi correta
		return ($this->id > 0);
	}

  /**
   * Método para retornar um Objeto instanciado do usuário
   * @return User Objeto instanciado do usuário
   */
  function getUser()
  {
    return new User('id',"{$this->id_user}");
  }
}
?>