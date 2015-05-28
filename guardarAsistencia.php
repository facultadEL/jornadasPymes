<?php

include_once "conexion.php";
include_once "libreria.php";

$barCode = (empty($_REQUEST['codigoBarra'])) ? 0 : $_REQUEST['codigoBarra'];

if($barCode == 0)
{
	require("asistencia.php");
	exit;
}

for($i=0;$i<=3;$i++)
{
	if($barCode[$i]!='0')
		$idInscripto .= $barCode[$i];
}

$dia = date("j");
$hora = date("H");
$minutos = date("i");

echo $idInscripto.'<br>';

$horaTotal = $hora.$minutos;
/*
switch ($dia) {
	case '3':
		if($horaTotal >)
		break;
	case '4':
		break;
	default:
		break;
}
*/
echo $dia, $hora.':'.$minutos;

?>