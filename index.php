<?php

//Reportar erros
error_reporting(E_ALL);

//Incluir o arquivo do Controller
require_once("sistema/sistema.php");
require_once("./sistema/controller/Controller.php");

session_cache_expire(10);
session_start();

$_SESSION['user'] = 'rodrigo';

//Instância do Controller
$controller = new Controller();
//Inicia o Controller
$controller->run();

?>