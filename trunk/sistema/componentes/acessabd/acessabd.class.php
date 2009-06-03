<?php
/*
 * AcessaBD
 *
 * Classe para controle de acesso ao banco de dados.
 *
 * Será utilizada como um esqueleto para uso dos Modelos que farão acesso ao
 * banco de forma transparente, sem se importar com qual tipo de banco é associado.
 */
class AcessaBD
{
  protected $nomeTabela; //< Nome da tabela que será mapeada na classe
  protected $nomeCampos; //< Array do nome dos campos da tabela

  /**
   * __construct()
   *
   * No construtor é necessário especificar o nome da tabela que sera acessada e
   * o nome de seus campos(para que seja feito o mapeamento correto).
   *
   * @param string nomeCampo O nome do campo do modelo que será usado para fazer
   * a pesquisa da indexação no banco de dados.
   * @param string valorCampo O valor do campo especificado no primeiro parâmetro.
   */
  function __construct ($nomeCampo = '', $valorCampo = '')
  {
    if ((!empty($nomeCampo)) && (!empty($valorCampo)))
    {
      // Se foi passado o ID e for maior que zero, o registro existe!
      if (($nomeCampo == 'id') && ((int)$valorCampo > 0))
      {
        $this->${nomeCampo} = $valorCampo;

        $this->load(); // Entao vamos carrega-lo!
      }
      else // Se não for ID, é outro campo, logo vamos busca-lo...
      {
        global $bd;
        
        // Se estamos procurando por um valor numerico, usamos a query necessaria...
        if ( is_numeric($valorCampo) )
        {
          $resultado = $bd->fetch_row("SELECT * FROM ".$this->nomeTabela." WHERE ".$nomeCampo." = ".$valorCampo);
        }
        else // ... da mesma forma se for uma string
        {
          $resultado = $bd->fetch_row("SELECT * FROM ".$this->nomeTabela." WHERE ".$nomeCampo." = '".$valorCampo."'");
        }
        
        // Se existe o registro, o carregamos
        if ( !empty($resultado) )
        {
          $this->bindArray($resultado[0]);
        }
        else // senão, zeramos os campos
        {
          foreach($this->nomeCampos as $campo)
          {
            $this->${campo} = '';
          }
        }
      }
    }
    else // Se as variáveis estão vazias, é um novo registro e já inicializamos o conteudo
    {
      foreach($this->nomeCampos as $campo)
      {
        $this->${campo} = '';
      }
    }
  }

  /**
   * load()
   *
   * Carrega os dados da tabela do banco de dados para a instância do modelo.
   */
  function load()
  {
    global $bd;

    $campo = $this->nomeCampos[0];

    $resultado = $bd->fetch_row("SELECT * FROM ".$this->nomeTabela." WHERE id = ".$this->${campo});
    
    // Se existe o registro, o carregamos
    if ( !empty($resultado) )
    {
      $this->bindArray($resultado[0]);
    }
    else // senão, zeramos os campos
    {
      foreach($this->nomeCampos as $campo)
      {
        $this->${campo} = '';
      }
    }
  }

/**
   * update()
   *
   * Este método atualiza no banco de dados um registro com os dados armazenados
   * no modelo.
   */
  function update()
  {
    global $bd;

    $queryString = "UPDATE {$this->nomeTabela} SET ";
    $qtdCampos = count($this->nomeCampos);
    $i = 0;

    // Montando a String da query para salvar os dados...
    foreach ($this->nomeCampos as $campo)
    {
      if ($i < ($qtdCampos-1))
      {
        $queryString .= "{$campo} = '{$this->${campo}}', ";
      }
      else
      {
        $queryString .= "{$campo} = '{$this->${campo}}'";
      }
      $i++;
    }

    $queryString .= " WHERE {$this->nomeTabela}.id = {$this->id}";

    $bd->query($queryString);
  }

  /**
   * insert()
   *
   * Este método insere no banco de dados um novo registro com os dados armazenados
   * no modelo.
   */
  function insert()
  {
    global $bd;

    $queryString = "INSERT INTO {$this->nomeTabela} ( ";
    $qtdCampos = count($this->nomeCampos);
    $i = 0;

    // Montando a String da query para salvar os dados...
    foreach ($this->nomeCampos as $campo)
    {
      if ($i < ($qtdCampos-1))
      {
        $queryString .= "{$campo}, ";
      }
      else
      {
        $queryString .= "{$campo} )";
      }
      
      $i++;
    }

    $i = 0;

    $queryString .= " VALUES ( ";

    // Montando a String da query para salvar os dados...
    foreach ($this->nomeCampos as $campo)
    {
      if ( $campo == 'id' )
      {
        $queryString .= "NULL, ";
      }
      else
      {
        if ($i < ($qtdCampos-1))
        {
          $queryString .= "'{$this->${campo}}', ";
        }
        else
        {
          $queryString .= "'{$this->${campo}}' )";
        }
      }
      
      $i++;
    }
    $bd->query($queryString);
  }

/**
 * remove()
 *
 * Este método remove da tabela no banco de dados o registro existente
 * do modelo.
 */
  function remove()
  {
    global $bd;

    $idStr = $this->nomeCampos[0];

    $queryString = "DELETE FROM {$this->nomeTabela} WHERE {$this->nomeTabela}.{${idStr}} = {$this->${idStr}}";

    $this->${idStr} = '';

    $bd->query($queryString);
  }

/**
 * save()
 *
 * Este método salva no banco de dados com os dados existentes nas variáveis
 * do modelo.
 */
  function save()
  {
    global $bd;
    $idStr = $this->nomeCampos[0];

    if ( $this->${idStr} > 0)
    {
      $this->update();
    }
    else
    {
      $this->insert();
      $this->${idStr} = $bd->insert_id();
      $this->load();
    }
  }

/**
 * bind()
 *
 * Este método analisa os dados recebidos via variável $_REQUEST e atualiza
 * o modelo com ela. Útil para receber dados de formulários sem precisar
 * setar os valores do modelo manualmente.
 */
  function bind()
  {
    $this->bindArray($_REQUEST);
  }

  /**
 * bindArray()
 *
 * Este método analisa os dados recebidos via vetor $arrayDados e atualiza
 * o modelo com ela. Útil para receber dados de formulários sem precisar
 * setar os valores do modelo manualmente.
 * @param array $arrayDados Vetor contendo os dados que serão usados para
 * popular o modelo
 */
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
