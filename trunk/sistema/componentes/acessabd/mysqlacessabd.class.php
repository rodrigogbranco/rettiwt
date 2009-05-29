<?php
require_once('acessabd.class.php');

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

class MysqlAcessaBD extends AcessaBD
{
  public function __construct ($id)
  {
//    if ($id > 0)
//      $this;
  }

  public function load()
  {

  }

  public function insert()
  {

  }

  public function remove()
  {

  }

  public function save()
  {

  }
}

?>
