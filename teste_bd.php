<?php
require_once ('sistema/config.inc.php');
require_once('sistema/componentes/bd/controladorbd.class.php');

$bd = ControladorBD::inicializar($config);

$resultado = $bd->fetch_array_list('SELECT * FROM teste');

var_dump($resultado);

?>
