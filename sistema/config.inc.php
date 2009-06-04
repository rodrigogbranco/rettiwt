<?php
error_reporting(E_ERROR|E_WARNING);
/*
 * Arquivo de configuração do sistema inteiro.
 */

$config = array();

/*
 * Dados do banco de dados.
 */
$config['bd']['type'] = "mysql";
$config['bd']['user'] = "root";
$config['bd']['password'] = "123456";
$config['bd']['host'] = "localhost";
$config['bd']['database'] = "rettiwt";

/*
 * Informações sobre os diretórios locais:
 * ATENÇÃO: isso é _extremamente necessário_ para correto funcionamento do sistema.
 */

$diretorioRaiz = "/home/helix/www/rettiwt/";
$diretorioSistema = $diretorioRaiz."sistema/";

$diretorioComponentes = $diretorioRaiz."componentes/";
$diretorioSistemaComponentes = $diretorioSistema."componentes/";

$enderecoSistema = "http://localhost/rettiwt/";

?>
