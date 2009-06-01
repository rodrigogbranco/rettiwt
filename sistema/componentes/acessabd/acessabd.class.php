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
  /**
   * __construct()
   *
   * No construtor é necessário especificar o nome da tabela que sera acessada e
   * o nome de seus campos(para que seja feito o mapeamento correto).
   */
  function __construct ($tabela,$id = -1);

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

  /**
 * bindArray()
 *
 * Este método analisa os dados recebidos via vetor $arrayDados e atualiza
 * o modelo com ela. Útil para receber dados de formulários sem precisar
 * setar os valores do modelo manualmente.
 * @param array $arrayDados Vetor contendo os dados que serão usados para
 * popular o modelo
 */
  function bindArray();
}

/*
 * AcessaBD
 *
 * Classe para controle de acesso ao banco de dados.
 *
 * Será utilizada como um esqueleto para uso dos Modelos que farão acesso ao
 * banco de forma transparente, sem se importar com qual tipo de banco é associado.
 */
class AcessaBD implements GeneralAcessaBD
{
  protected $nomeTabela; //< Nome da tabela que será mapeada na classe
  protected $nomeCampos; //< Array do nome dos campos da tabela

//  Cabecalho do Gelinho... Apenas esta aqui para questao de registro, vc vai ter que adaptar isso no seu codigo :P
//  E so para constar, vc vai boatr o nome da tabela no seu modelo que ESTENDER essa classe, e nao aqui. Essa classe eh generica.
//  function __construct ($tabela, $id = -1)

  function __construct ($nomeCampo, $valorCampo)
  {
    if (empty($nomeCampo) && empty($valorCampo))
    {
      // Se foi passado o ID e for maior que zero, o registro existe!
      if (($nomeCampo == 'id') && ((int)$valorCampo > 0))
      {
        $this->load(); // Entao vamos carrega-lo!
      }
      else // Se não for ID, é outro campo, logo vamos busca-lo...
      {
        //TODO
      }
    }
  }

  function load()
  {
    //TODO
  }

  function insert()
  {
    //TODO
  }

  function remove()
  {
    //TODO
  }

  function save()
  {
    //TODO
  }

  function bind()
  {
    $this->bindArray($_REQUEST);
  }

  function bindArray($arrayDados)
  {
    if (is_array($arrayDados))
    {
      // Recebo um vetor com o nome das variaveis passadas por request
      $keys = array_keys($arrayDados);

      // Para cada variavel, eu pego seu valor e atualizo o modelo
      foreach($arrayDados as $chave => $valor)
      {
        $this->${chave} = $valor;
      }
    }
  }
}

?>
