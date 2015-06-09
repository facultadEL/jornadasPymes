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
	position: absolute;
	left: 0px;
	top: 0px;
	height: 208mm;
	width: 295mm;
	background-image: url("img/certificado.jpg");
	background-size: 100% 100%;
	text-align: justify;
}

#textInCert
{
	position: inherit;
  	top: 310px;
  	width: 80%;
  	left: 115px;
  	font-family: Arial, Helvetica;
  	font-size: 20px;
	line-height: 40px;
}

#divFirmas
{

}

#textFechaActual
{

	width: 100%;
 	top: 720px;
  	position: inherit;
  	text-align: center;
  	font-family: Arial, Helvetica;
  	font-size: 14px;
}

</style>
<?php
include_once "conexion.php";
include_once "libreria.php";

$id_inscripto = $_REQUEST['id'];
$nroCert = $_REQUEST['nroCert'];
$condicion = 'id='.$id_inscripto;

$sqlImprimir = traerSqlCondicion('*','inscripto',$condicion);

$rowImprimir = pg_fetch_array($sqlImprimir);

$nombre = $rowImprimir['nombre'];
$apellido = $rowImprimir['apellido'];

$dniToFormat = $rowImprimir['nrodni'];
if(strlen($dniToFormat) == 7)
{
	$dni = $dniToFormat[0].'.'.$dniToFormat[1].$dniToFormat[2].$dniToFormat[3].'.'.$dniToFormat[4].$dniToFormat[5].$dniToFormat[6];
}
else if(strlen($dniToFormat) == 8)
{
	$dni = $dniToFormat[0].$dniToFormat[1].'.'.$dniToFormat[2].$dniToFormat[3].$dniToFormat[4].'.'.$dniToFormat[5].$dniToFormat[6].$dniToFormat[7];	
}
else if(strlen($dniToFormat) == 9)
{
	$dni = $dniToFormat[0].$dniToFormat[1].$dniToFormat[2].'.'.$dniToFormat[3].$dniToFormat[4].$dniToFormat[5].'.'.$dniToFormat[6].$dniToFormat[7].$dniToFormat[8];	
}

switch ($nroCert) {
	case '1':
		$nombreCharla = 'Escenario actual de las Pymes';
		$nroRes = '192';
		break;
	case '2':
		$nombreCharla = 'Rentabilidad de las pymes: el secreto no pasa por hacer más sino hacer lo correcto';
		$nroRes = '193';
		break;
	case '3':
		$nombreCharla = 'Taller de Experiencias Casos Exitosos UTN';
		$nroRes = '202';
		break;
	case '4':
		$nombreCharla = 'De Villa María al Mundo: Como armar una red de representantes comerciales';
		$nroRes = '194';
		break;
	case '5':
		$nombreCharla = 'De la idea al negocio: Como crear las condiciones para que tu idea termine en una Pyme';
		$nroRes = '195';
		break;
	case '9':
		$nombreCharla = 'Planificación en empresas de familia';
		$nroRes = '196';
		break;
	case '11':
		$nombreCharla = 'Innovaci&oacute;n/Vinculaci&oacute;n';
		$nroRes = '197';
		break;
	case '7':
		$nombreCharla = 'Como emprender con &eacute;xito en la Argentina. Cadena de valor';
		$nroRes = '198';
		break;
	case '8':
		$nombreCharla = 'Taller Programa de Financiamiento y Creditos para Pymes';
		$nroRes = '203';
		break;
	case '6':
		$nombreCharla = 'Crecimiento, Delegaci&oacute;n y direcci&oacute;n en las Pymes: Los roles del Fundador - Gerente General';
		$nroRes = '199';
		break;
	case '10':
		$nombreCharla = 'Lanzando nuestra Pyme al mundo Digital';
		$nroRes = '200';
		break;
}
$fechaCharla = '02 de Junio de 2015';
$textToShow = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Por cuanto <font size="5"><b>'.$nombre.' '.$apellido.'</b></font>, DNI N°: <font size="5"><b>'.$dni.'</b></font> ha asistido al seminario de capacitaci&oacute;n en <font size="5"><b>"'.$nombreCharla.'"</b></font> autorizado por Resoluci&oacute;n N° '.$nroRes.'/15 de fecha '.$fechaCharla.', llevado a cabo en la <b>Segunda Jornadas Nacionales para PYMES de la UTN</b> en Universidad Tecnol&oacute;gica Nacional - Facultad Regional Villa Mar&iacute;a, se le otorga el presente certificado.';
//echo $textToShow;

switch (date('m')) {
	case '01':
		$mes = 'Enero';
		break;
	case '02':
		$mes = 'Febrero';
		break;
	case '03':
		$mes = 'Marzo';
		break;
	case '04':
		$mes = 'Abril';
		break;
	case '05':
		$mes = 'Mayo';
		break;
	case '06':
		$mes = 'Junio';
		break;
	case '07':
		$mes = 'Julio';
		break;
	case '08':
		$mes = 'Agosto';
		break;
	case '09':
		$mes = 'Septiembre';
		break;
	case '10':
		$mes = 'Octubre';
		break;
	case '11':
		$mes = 'Noviembre';
		break;
	case '12':
		$mes = 'Diciembre';
		break;
}


$fechaActual = 'Villa Mar&iacute;a, '.date('d').' de '.$mes.' de '.date('Y');
?>
<div class="divCertificado">
<span id="textInCert">
<?php
echo $textToShow;
?>
</span>
<div id="textFechaActual">
<?php
echo $fechaActual
?>
</div>
</div>
</body>
</html>