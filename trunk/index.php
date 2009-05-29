<?php
// Exemplo de uso no modelo do AcessaBD e classe teste
require_once('componentes/teste/teste.class.php');

$teste = new Teste();

var_dump($teste);

$teste->bind();

var_dump($teste);

?>