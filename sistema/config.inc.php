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
$config['bd']['user'] = "root";
$config['bd']['password'] = "";
$config['bd']['host'] = "localhost";
$config['bd']['database'] = "rettiwt";

$diretorioSistema = "/var/www/rettiwt/";
$diretorioSistemaComponentes = $diretorioSistema."sistema/componentes/";
$enderecoSistema = "http://localhost/rettiwt/";

?>
