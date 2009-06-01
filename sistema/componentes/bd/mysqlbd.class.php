<?php
require_once ('bancodedados.class.php');
/*
 * Classe que implementa o gerenciamento da conexão e dos dados do banco de dados.
 */
class MysqlDB implements BancoDeDados
{
  private $link;

  public function __construct($host, $user, $password, $database)
  {
    if ( empty($host) || empty($user) || empty($password) || empty($database))
    {
      throw new ConfigBDException('Campos host, usuario, senha ou database não preenchidos.');
      return;
    }

    // Conectando...
    $this->link = mysql_connect($host, $user, $password);

    if (!$this->conexaoHabilitada())
    {
      throw new AutenticacaoException('Não foi possível conectar: '.mysql_error());
    }

    // Se o banco de dados especificado nao existe
    if ( mysql_select_db($database, $this->link) == false )
    {
      mysql_close($this->link);
      throw new ConfigBDException('Não foi possivel selecionar base de dados: '.$database);
    }
  }

  public function __destruct()
  {
    // Fechando a conexão
    mysql_close($this->link);
  }

  /*
   * Método que informa se a conexão está estabelecida
   *
   * @return bool Verdadeiro se a conexão está OK
   */
  public function conexaoHabilitada()
  {
    return ($this->link !== false);
  }

  function query($queryString)
  {
    if ( empty($queryString))
    {
      throw ParametroInvalidoException('queryString vazia.');
      return;
    }
    
    return mysql_query($queryString, $this->link);
  }
  /**
 * fetch_array_list()
 *
 * @param string $querystring A query em formato string
 * @return array Um vetor contendo todos os registros indexados pelo nome do
 * campo.
 */
  function fetch_array_list($queryString)
  {
    $array_list = array();

    $resultado = $this->query($queryString);

    while ( $row = mysql_fetch_array($resultado, MYSQL_ASSOC) )
    {
      array_push($array_list, $row);
    }

    return $array_list;
  }
  /**
 * fetch_row()
 *
 * @param string $querystring A query em formato string
 * @return array Um vetor contendo o registro indexado pelo nome do
 * campo.
 */
  function fetch_row($queryString)
  {
    return $this->fetch_array_list($queryString.' LIMIT 1');
  }
 /**
 * fetch_object_list()
 *
 * @param string $querystring A query em formato string
 * @param string $nomeObjeto O nome da classe do modelo a ser instanciado
 * @return array Um vetor contendo todos os objetos instanciados e preenchidos.
 */
  function fetch_object_list($queryString,$nomeClasse)
  {
    if ( empty($queryString) || empty($nomeClasse))
    {
      throw ParametroInvalidoException('queryString ou nomeClasse vazios.');
      return null;
    }

    $objetos = array();
    $results = $this->fetch_array_list($queryString);

    /* Preenchemos cada objeto e adicionamos ao vetor */
    foreach($results as $item)
    {
      $objeto = new ${nomeClasse}();
      $objeto->bindArray($item);

      array_push($objetos, $objeto);
    }

    return $objetos;
  }
 /**
 * fetch_object()
 *
 * @param string $querystring A query em formato string
 * @param string $nomeObjeto O nome da classe do modelo a ser instanciado
 * @return array Um objeto contendo todos os atributos preenchidos.
 */
  function fetch_object($queryString, $nomeClasse)
  {
    if ( empty($queryString) || empty($nomeClasse))
    {
      throw ParametroInvalidoException('queryString ou nomeClasse vazios.');
      return null;
    }

    $objeto = new ${nomeClasse}();
    $result = $this->fetch_row($queryString);

    /* Preenchemos cada objeto e adicionamos ao vetor */
    $objeto->bindArray($result);

    return $objeto;
  }
  /**
 * affected_rows()
 *
 * @return integer Quantidade de registros afetados.
 */
  function affected_rows()
  {
    return mysql_affected_rows($this->link);
  }
}
?>
