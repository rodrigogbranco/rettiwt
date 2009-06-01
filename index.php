<?php

//Reportar erros
error_reporting(E_ALL);

//Incluir o arquivo do Controller
require_once("./sistema/controller/Controller.php");

/*Renan tem que tratar*/
$conectar = @mysql_connect("localhost","root","");
$conectar = @mysql_select_db("rettwit");
/**/

//Instância do Controller
$controller = new Controller();
//Inicia o Controller
$controller->run();

?>