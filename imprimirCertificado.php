<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>
    Impresi&oacute;n
</title>
</head>
<body onload="print();">
<style>
body{

font-family: Arial, Helvetica;
font-size: 15px;
}

.divCertificado
{
	height: 2480px;
	height: 3508px;
	background-image: "img/cert.jpg";
	background-repeat: no-repeat;
	background-size: 100% 100%;
}
</style>
<table width="100%" left="0px" top="0px" cellpadding="12px" cellspacing="0px">
<?php
include_once "conexion.php";
include_once "libreria.php";

$id_inscripto = $_REQUEST['id'];
$nroCert = $_REQUEST['nroCert'];
$sqlImprimir = traerSqlCondicion('*','inscripto',"asistio='true' and impreso='false'");

while($rowImprimir = pg_fetch_array($sqlImprimir))
{
	$id = $rowImprimir['id'];
	$sqlInscTemp .= "INSERT INTO impresiontemp(id_inscripto) values($id);";
	$cant++;
	if($cant==1)
	{
		echo '<tr width="100%" align="center" >';
	}

		echo '<td width="33%" align="center">';
		echo $rowImprimir['apellido'].', '.$rowImprimir['nombre'];
		echo '<br>';
		$id = $rowImprimir['id'];
		if(strlen($id) <= 4)
		{
			do
			{
				$id = '0'.$id;
			}while(strlen($id) <= 4);
		}
		$code = $id;
		for($i=1; $i <= 7; $i++)
		{
			$code .= rand(0,9);
		}
		$code .= '1';
		echo '<img src="generarcodbarra/barcode.php?code='.$code.'&scale=1" />';
		//echo '<img src="img/codigoBarraPrueba.png" />';
		echo '</td>';

	if($cant==3)
	{
		echo '</tr>';
		$cant = 0;
		$entraron++;
	}
}

$error = guardarSql($sqlInscTemp);

do
{
	$entraron++;
	echo '<tr width="100%">';
		echo '<td colspan="3">';
		echo '</td>';
	echo '</tr>';


}while($entraron < 11);
?>
<div class="divCertificado">
</div>
</body>
</html>