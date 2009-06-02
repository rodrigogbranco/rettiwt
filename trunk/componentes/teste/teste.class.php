<?php
require_once('sistema/componentes/acessabd/acessabd.class.php');

class Teste extends AcessaBD
{
  public $id;
  public $nome;
  public $idade;

  public function __construct($nomeCampo='', $valorCampo='')
  {
    $this->nomeTabela = 'teste';
    $this->nomeCampos = array('id','nome','idade');

    parent::__construct($nomeCampo, $valorCampo);
  }
}
?>
