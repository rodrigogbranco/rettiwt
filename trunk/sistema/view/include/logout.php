<?php
global $diretorioRaiz;
//Desregistrando a sessão
session_start();
session_destroy();

//Redirecionando para a index
header("Location:../../../index.php");
?>