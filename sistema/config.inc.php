<?php
error_reporting(E_ERROR | E_WARNING);

/*
 * Arquivo de configuração do sistema inteiro.
 */

$config = array();

/*
 * Dados do banco de dados.
 */
$config['bd']['type'] = "mysql";
$config['bd']['user'] = "rettiwt";
$config['bd']['password'] = "rettiwt.09";
$config['bd']['host'] = "localhost";
$config['bd']['database'] = "rettiwt";

$diretorioSistema = "/var/www/rettiwt/";
$diretorioSistemaComponentes = $diretorioSistema."sistema/componentes/";
$enderecoSistema = "http://localhost/rettiwt/";

?>
