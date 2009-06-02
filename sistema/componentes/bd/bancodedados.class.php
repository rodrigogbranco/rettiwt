<?php
/*
 * Classes dos tipos de Exceções que podem ocorrer durante o uso do banco de dados.
 */
class ParametroInvalidoException extends Exception
{
  public function __construct($message)
  {
    parent::__construct('Parametro inválido: '.$message,0);
  }
}

class AutenticacaoException extends Exception
{
  public function __construct($message)
  {
    parent::__construct('Erro de autenticação: '.$message,0);
  }
}

class ConfigBDException extends Exception
{
  public function __construct($message)
  {
    parent::__construct('Erro de configuração: '.$message,0);
  }
}

/*
 * Classe abstrata para controle de acesso ao banco de dados. A partir dela
 * deverão ser implementadas classes para acessos a outros bancos, ex: MySql,
 * PostgreSql.
 */
interface BancoDeDados
{
  /**
 * query()
 *
 * @param string $querystring A query em formato string
 */
  function query($queryString);
  /**
 * fetch_array_list()
 *
 * @param string $querystring A query em formato string
 * @return array Um vetor contendo todos os registros indexados pelo nome do
 * campo.
 */
  function fetch_array_list($queryString);
  /**
 * fetch_row()
 *
 * @param string $querystring A query em formato string
 * @return array Um vetor contendo o registro indexado pelo nome do
 * campo.
 */
  function fetch_row($queryString);
 /**
 * fetch_object_list()
 *
 * @param string $querystring A query em formato string
 * @param string $nomeClasse O nome da classe do modelo a ser instanciado
 * @return array Um vetor contendo todos os objetos instanciados e preenchidos.
 */
  function fetch_object_list($queryString, $nomeClasse);
 /**
 * fetch_object()
 *
 * @param string $querystring A query em formato string
 * @param string $nomeClasse O nome da classe do modelo a ser instanciado
 * @return array Um objeto contendo todos os atributos preenchidos.
 */
  function fetch_object($queryString, $nomeClasse);
  /**
 * affected_rows()
 *
 * @return integer Quantidade de registros afetados.
 */
  function affected_rows();

  /**
 * insert_id()
 *
 * @return integer Id do ultimo registro inserido no bd;
 */
  function insert_id();
}

?>
