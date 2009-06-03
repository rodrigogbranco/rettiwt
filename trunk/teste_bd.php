<?php
require_once("sistema/sistema.php");
require_once("componentes/teste/teste.class.php");

global $bd;

$teste = new Teste();

$teste->nome = "Mais um teste";
$teste->idade = "20";

$teste->save();

//$teste->remove();
//$teste->save();
//var_dump($teste);
//$resultado = $bd->fetch_row('SELECT * FROM teste');
//var_dump($resultado);

?>
