<?php
/*
* Arquivo para instanciação do sistema completo.
* Isto inclui bancos de dados, variaveis globais e outras configurações necessárias.
*/

require_once ('sistema/config.inc.php');
require_once ('sistema/componentes/bd/controladorbd.class.php');

$bd = ControladorBD::inicializar($config);


?>