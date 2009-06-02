<?php

//Reportar erros
error_reporting(E_ALL);

//Incluir o arquivo do Controller
require_once("sistema/sistema.php");
require_once("./sistema/controller/Controller.php");

//Instância do Controller
$controller = new Controller();
//Inicia o Controller
$controller->run();

?>