<?php
require_once("sistema/sistema.php");
require_once("componentes/teste/teste.class.php");

global $bd;

$teste = new Teste();

$teste->nome = "Teste2";
$teste->idade = "10";

var_dump($teste);

$teste->save();

//$teste->remove();

var_dump($teste);

//$teste->save();

//var_dump($teste);

//$resultado = $bd->fetch_row('SELECT * FROM teste');
//var_dump($resultado);

?>
