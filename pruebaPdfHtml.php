<?php

include_once "conexion.php";
include_once "libreria.php";

$id_inscripto = 1;

$charla[0] = "1/--/Escenario actual de las Pymes/--/192";
$charla[1] = "2/--/Rentabilidad de las pymes: el secreto no pasa por hacer más sino hacer lo correcto/--/193";
$charla[2] = "3/--/Taller de Experiencias Casos Exitosos UTN/--/202";
$charla[3] = "4/--/De Villa María al Mundo: Como armar una red de representantes comerciales/--/194";
$charla[4] = "5/--/De la idea al negocio: Como crear las condiciones para que tu idea termine en una Pyme/--/195";
$charla[5] = "9/--/Planificación en empresas de familia/--/196";
$charla[6] = "7/--/Como emprender con &eacute;xito en la Argentina. Cadena de valor/--/198";
$charla[7] = "8/--/Taller Programa de Financiamiento y Creditos para Pymes/--/203";
$charla[8] = "6/--/Crecimiento, Delegaci&oacute;n y direcci&oacute;n en las Pymes: Los roles del Fundador - Gerente General/--/199";
$charla[9] = "10/--/Lanzando nuestra Pyme al mundo Digital/--/200";
$charla[10] = "11/--/Innovaci&oacute;n/Vinculaci&oacute;n/--/197";

$fechaCharla = '02 de Junio de 2015';

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


$fechaActual = 'Villa María, '.date('d').' de '.$mes.' de '.date('Y');

$condicion = "id=".$id_inscripto;
$sql = traerSqlCondicion('*','inscripto',$condicion);
$rowCertificado = pg_fetch_array($sql);

$nombre = $rowCertificado['nombre'];
$apellido = $rowCertificado['apellido'];

$dniToFormat = $rowCertificado['nrodni'];
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
$nombreCharla = 'Algo sobre las Pymes segun el Titulo';
$nroRes = '192';
$content = '<page><style>body{font-family: Arial, Helvetica;font-size: 15px;}

.divCertificado
{
	position: absolute;
	left: 0px;
	top: 0px;
	background-image: url("/img/certificado.jpg");
	background-size: 100% 100%;
	height: 207mm;
	width: 295mm;
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

#firmaHuber
{
	position: inherit;
 	top: 550px;
 	left: 200px;
  	text-align: center;
  	font-family: Arial, Helvetica;
  	font-size: 14px;
}
#firmaDecano
{
	position: inherit;
 	top: 550px;
 	left: 750px;
  	text-align: center;
  	font-family: Arial, Helvetica;
  	font-size: 14px;
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
<div class="divCertificado" background-image="img/certificado.jpg" >
<span id="textInCert">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Por cuanto <font size="5"><b>'.$nombre.' '.$apellido.'</b></font>, DNI N°: <font size="5"><b>'.$dni.'</b></font> ha asistido al seminario de capacitaci&oacute;n en <font size="5"><b>"'.$nombreCharla.'"</b></font> autorizado por Resoluci&oacute;n N° '.$nroRes.'/15 de fecha '.$fechaCharla.', llevado a cabo en la <b>Segunda Jornadas Nacionales para PYMES de la UTN</b> en Universidad Tecnol&oacute;gica Nacional - Facultad Regional Villa Mar&iacute;a los d&iacute;as 3 y 4 de Junio de 2015, se le otorga el presente certificado.</span>
<div id="firmaHuber">
	<img src="img/firmaHuber.png" height="115px" width="115px" />
	<br>
	<i>Ing. Huber Fernandez</i><br>
	Secretaria de Extensi&oacute;n
</div>
<div id="firmaDecano">
	<img src="img/firmaRosso.png" height="115px" width="130px" />
	<br>
	<i>Ing. Pablo A. Rosso</i><br>
	Decano
</div>
<div id="textFechaActual">'.$fechaActual.'</div></div></page>';

    require_once('/html2pdf/html2pdf.class.php');
    $html2pdf = new HTML2PDF('L','A4','es');
    $html2pdf->WriteHTML($content);
    ob_end_clean();
    $html2pdf->Output('exemple.pdf');
?>