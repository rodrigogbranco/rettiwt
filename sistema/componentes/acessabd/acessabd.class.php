<?php

/*
 * GeneralAcessaBD
 *
 * Interface para controle de acesso ao banco de dados. A partir dela
 * deverão ser implementadas classes para acessos a outros bancos, ex: MySql,
 * PostgreSql.
 *
 * Será utilizada como um esqueleto para uso dos Modelos que farão acesso ao
 * banco.
 */

interface GeneralAcessaBD
{
//  private $nomeTabela;
//  private $nomeCampos;

  /**
   * __construct()
   *
   * No construtor é necessário especificar o nome da tabela que sera acessada e
   * o nome de seus campos(para que seja feito o mapeamento correto).
   */
  function __construct ($id = -1);

  /**
   * load()
   *
   * Carrega os dados da tabela do banco de dados para a instância do modelo.
   */
  function load();

  /**
   * insert()
   *
   * Este método insere no banco de dados um novo registro com os dados armazenados
   * no modelo.
   */
  function insert();

/**
 * remove()
 *
 * Este método remove da tabela no banco de dados o registro existente
 * do modelo.
 */
  function remove();

/**
 * save()
 *
 * Este método salva no banco de dados com os dados existentes nas variáveis
 * do modelo.
 */
  function save();

/**
 * bind()
 *
 * Este método analisa os dados recebidos via variável $_REQUEST e atualiza
 * o modelo com ela. Útil para receber dados de formulários sem precisar
 * setar os valores do modelo manualmente.
 */
  function bind();
}

/*
 * AcessaBD
 *
 * Classe para controle de acesso ao banco de dados. A partir dela
 * deverão ser implementadas classes para acessos a outros bancos, ex: MySql,
 * PostgreSql.
 *
 * Será utilizada como um esqueleto para uso dos Modelos que farão acesso ao
 * banco.
 */
class AcessaBD implements GeneralAcessaBD
{
  protected $nomeTabela; //< Nome da tabela que será mapeada na classe
  protected $nomeCampos; //< Array do nome dos campos da tabela

  function __construct ($id = -1)
  {

  }

  function load()
  {

  }

  function insert()
  {

  }

  function remove()
  {

  }

  function save()
  {

  }

  function bind()
  {
    if (is_array($_REQUEST))
    {
      // Recebo um vetor com o nome das variaveis passadas por request
      $keys = array_keys($_REQUEST);

      // Para cada variavel, eu pego seu valor e atualizo o modelo
      foreach($_REQUEST as $chave => $valor)
      {
        $this->${chave} = $valor;
      }
    }
  }
}



?>
