<?php

include_once "conexion.php";
include_once "libreria.php";

$barCode = (empty($_REQUEST['codigoBarra'])) ? 0 : $_REQUEST['codigoBarra'];
//echo $barCode;
if($barCode == 0)
{
	require("asistencia.php");
	exit;
}

$idInscripto = "";

for($i=0;$i<=3;$i++)
{
	if($barCode[$i]!='0')
		$idInscripto .= $barCode[$i];
}

$dia = date("d");
$hora = date("H");
$minutos = date("i");

//echo $idInscripto.'<br>';
$sep = '/--/';

//Horas charlas en un array y en un array en la misma posicion el id
//$charla[0] = "1/--/30/--/0930/--/1625";
$charla[0] = "1/--/03/--/1545/--/1625";
$charla[1] = "2/--/03/--/1625/--/1705";
$charla[2] = "3/--/03/--/1735/--/1835";
$charla[3] = "4/--/03/--/1835/--/1915";
$charla[4] = "5/--/03/--/1915/--/1955";
$charla[5] = "9/--/04/--/1415/--/1455";
$charla[6] = "7/--/04/--/1455/--/1535";
$charla[7] = "8/--/04/--/1635/--/1715";
$charla[8] = "6/--/04/--/1715/--/1745";
$charla[9] = "10/--/04/--/1745/--/1855";


$idCharla = 0;

$horaTotal = $hora.$minutos;
for($i=0; $i < count($charla); $i++)
{
	$vCharla = explode($sep,$charla[$i]);
	if($dia == $vCharla[1])
	{
		if($horaTotal >= $vCharla[2] && $horaTotal < $vCharla[3])
		{
			$idCharla = $vCharla[0];
			break;
		}
	}
}

if($idCharla != 0)
{
	$nombreActividad = 	"actividad".$idCharla;
	$sql = "UPDATE asistencia SET ".$nombreActividad."='true' WHERE id_inscripto=$idInscripto;";
	$error = guardarSql($sql);
	//echo $sql;
}

echo '<script language="JavaScript"> window.location = "asistencia.php";</script>';
//echo $dia, $hora.':'.$minutos;

?>