<?php
//Reportar erros
error_reporting(E_ERROR|E_WARNING);

//Incluir o arquivo do Controller
require_once("sistema/sistema.php");
require_once("./sistema/controller/Controller.php");
require_once($diretorioSistemaComponentes."multimidia/multimidia.class.php");

$imagem = new Multimidia();
$imagem->tipo = Multimidia::IMAGEM;
$imagem->save('arquivo');
$imagem->resizeImage(500,0);


?>