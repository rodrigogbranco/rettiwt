<?php
/*
 * AcessaBD
 *
 * Classe abstrata para controle de acesso ao banco de dados. A partir dela
 * deverão ser implementadas classes para acessos a outros bancos, ex: MySql,
 * PostgreSql.
 *
 * Será utilizada como um esqueleto para uso dos Modelos que farão acesso ao
 * banco.
 */

abstract class AcessaBD
{
  private $nomeTabela;
  private $nomeCampos;
  
  public function __construct ()
  {

  }

  public abstract function insert()
  {

  }

  public abstract function remove()
  {

  }

  public abstract function save()
  {

  }

  public abstract function bind()
  {

  }
}

?>
