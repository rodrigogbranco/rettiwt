<?php

require_once("sistema/componentes/mutimidia.class.php");
require_once("sistema/model/Twitt.php");
require_once("sistema/model/User.php");

$usuario = new User("alias", $_SESSION['alias']);
$multimidia = new Multimidia();
$multimida->id_usuario = $usuario->id;
if ($_POST['tipo'] == 'imagem')
	$multimida->tipo = Multimidia::IMAGEM;
else
	$multimida->tipo = Multimidia::VIDEO;

$multimida->save("upfile");

$twitt = new TwitterController($usuario->id);
$twitt->insertTwitt($_POST['text'], $multimidia->id);
}


?>