<?php

error_reporting(E_ALL);

include_once("./sistema/controller/Controller.php");

$controller = new Controller();
$controller->run();

?>