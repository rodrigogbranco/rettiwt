<?php
//Reportar erros
error_reporting(E_ERROR|E_WARNING);

//Incluir o arquivo do Controller
require_once("sistema/sistema.php");
require_once("sistema/controller/Controller.php");
require_once("sistema/componentes/multimidia/multimidia.class.php");

$usuario = new User('alias', 'karenLinda');

$imagem = new Multimidia();
$imagem->tipo = Multimidia::IMAGEM;
$imagem->id_usuario = $usuario->id;
$imagem->save('arquivo');
$usuario->foto_id_multimidia = $imagem->id;
$usuario->save();
//$imagem->resizeImage(60,60);


?>