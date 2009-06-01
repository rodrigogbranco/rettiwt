<?php
require_once('mysqlbd.class.php');

/*
 * Classe que contém métodos para inicializar e gerenciar o sistema de abstração
 * de banco de dados.
 */
class ControladorBD
{
  public static function inicializar($config)
  {
    if ( empty($config) )
    {
      throw new ConfigBDException('Houve um erro ao acessar os parâmetros de configuração.');
      return;
    }

    //   Verificando o tipo de banco de dados especificado...
    switch($config['bd']['type'])
    {
      case 'mysql':
        return new MysqlDB($config['bd']['host'], $config['bd']['user'],
          $config['bd']['password'], $config['bd']['database']);
        break;
      // Se não é suportado, catapulteamos uma excessão. :)
      default:
        throw new ConfigBDException('Nenhum banco de dados expecificado');
        break;
    }
  }
}

?>
