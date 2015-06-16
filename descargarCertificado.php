<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php
//include_once "PdfGenerator/fpdf.php";
include_once "PdfGenerator/WriteHTML.php";
//$pdf = new FPDF();
$pdf=new PDF_HTML();
include_once "conexion.php";
include_once "libreria.php";

$id_inscripto = $_REQUEST['id'];

$charla[0] = "1/--/Escenario Actual de las Pymes/--/192";
$charla[1] = "2/--/Rentabilidad de las Pymes: El Secreto No Pasa Por Hacer Más Sino Hacer Lo Correcto/--/193";
$charla[2] = "3/--/Taller de Experiencias Casos Exitosos UTN/--/202";
$charla[3] = "4/--/De Villa María al Mundo: Como Armar Una Red de Representantes Comerciales/--/194";
$charla[4] = "5/--/De la Idea al Negocio: Como Crear las Condiciones Para que Tu Idea Termine en Una Pyme/--/195";
$charla[5] = "9/--/Planificación en Empresas de Familia/--/196";
$charla[6] = "7/--/Como Emprender con Éxito en la Argentina. Cadena de Valor/--/198";
$charla[7] = "8/--/Taller Programa de Financiamiento y Creditos para Pymes/--/203";
$charla[8] = "6/--/Crecimiento, Delegación y Dirección en las Pymes: Los Roles del Fundador - Gerente General/--/199";
$charla[9] = "10/--/Lanzando Nuestra Pyme al Mundo Digital/--/200";
$charla[10] = "11/--/Innovación/Vinculación/--/197";

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

if($rowCertificado['actividad1']=='t')
{
	$vCharla = explode('/--/', $charla[0]);
	$nombreCharla = $vCharla[1];
	$nroRes = $vCharla[2];

	$pdf->AddPage('L','A4');
	$pdf->SetRightMargin(20);
	$pdf->SetFont('Helvetica','',15);
	$pdf->Image('img/certificado.jpg',0,0,297,210);
	$pdf->SetLeftMargin(40);
	$pdf->SetXY(60,85);

	$pdf->WriteHTML(utf8_decode('Por cuanto <font size="5"><b>'.$nombre.' '.$apellido.'</b></font>, DNI N°: <font size="5"><b>'.$dni.'</b></font> ha asistido al seminario de capacitación en <font size="5"><b>"'.$nombreCharla.'"</b></font> autorizado por Resolución N° '.$nroRes.'/15 de fecha '.$fechaCharla.', llevado a cabo en la <b>Segunda Jornadas Nacionales para PYMES de la UTN</b> en Universidad Tecnológica Nacional - Facultad Regional Villa María los días 3 y 4 de Junio de 2015, se le otorga el presente certificado.'));

	$pdf->Image('img/firmaHuber.png',70,145,30,30);
	$pdf->SetXY(60,170);
	$pdf->SetFont('Helvetica','I',11);
	$pdf->Write(10,'Ing. Huber Fernandez');
	$pdf->SetXY(59,175);
	$pdf->SetFont('Helvetica','',11);
	$pdf->Write(10,utf8_decode('Secretaría de Extensión'));

	$pdf->Image('img/firmaRosso.png',210,145,37,27);
	$pdf->SetXY(208,170);
	$pdf->SetFont('Helvetica','I',11);
	$pdf->Write(10,'Ing. Pablo A. Rosso');
	$pdf->SetXY(218,175);
	$pdf->SetFont('Helvetica','',11);
	$pdf->Write(10,utf8_decode('Decano'));

	$pdf->SetXY(130,189);
	$pdf->SetFont('Helvetica','',10);
	$pdf->Write(0,utf8_decode($fechaActual));
}

if($rowCertificado['actividad2']=='t')
{
	$vCharla = explode('/--/', $charla[1]);
	$nombreCharla = $vCharla[1];
	$nroRes = $vCharla[2];

	$pdf->AddPage('L','A4');
	$pdf->SetRightMargin(20);
	$pdf->SetFont('Helvetica','',15);
	$pdf->Image('img/certificado.jpg',0,0,297,210);
	$pdf->SetLeftMargin(40);
	$pdf->SetXY(60,85);
	
	$pdf->WriteHTML(utf8_decode('Por cuanto <font size="5"><b>'.$nombre.' '.$apellido.'</b></font>, DNI N°: <font size="5"><b>'.$dni.'</b></font> ha asistido al seminario de capacitación en <font size="5"><b>"'.$nombreCharla.'"</b></font> autorizado por Resolución N° '.$nroRes.'/15 de fecha '.$fechaCharla.', llevado a cabo en la <b>Segunda Jornadas Nacionales para PYMES de la UTN</b> en Universidad Tecnológica Nacional - Facultad Regional Villa María los días 3 y 4 de Junio de 2015, se le otorga el presente certificado.'));
	
	$pdf->Image('img/firmaHuber.png',70,145,30,30);
	$pdf->SetXY(60,170);
	$pdf->SetFont('Helvetica','I',11);
	$pdf->Write(10,'Ing. Huber Fernandez');
	$pdf->SetXY(59,175);
	$pdf->SetFont('Helvetica','',11);
	$pdf->Write(10,utf8_decode('Secretaría de Extensión'));

	$pdf->Image('img/firmaRosso.png',210,145,37,27);
	$pdf->SetXY(208,170);
	$pdf->SetFont('Helvetica','I',11);
	$pdf->Write(10,'Ing. Pablo A. Rosso');
	$pdf->SetXY(218,175);
	$pdf->SetFont('Helvetica','',11);
	$pdf->Write(10,utf8_decode('Decano'));

	$pdf->SetXY(130,189);
	$pdf->SetFont('Helvetica','',10);
	$pdf->Write(0,utf8_decode($fechaActual));
}

if($rowCertificado['actividad3']=='t')
{
	$vCharla = explode('/--/', $charla[2]);
	$nombreCharla = $vCharla[1];
	$nroRes = $vCharla[2];

	$pdf->AddPage('L','A4');
	$pdf->SetRightMargin(20);
	$pdf->SetFont('Helvetica','',15);
	$pdf->Image('img/certificado.jpg',0,0,297,210);
	$pdf->SetLeftMargin(40);
	$pdf->SetXY(60,85);

	$pdf->WriteHTML(utf8_decode('Por cuanto <font size="5"><b>'.$nombre.' '.$apellido.'</b></font>, DNI N°: <font size="5"><b>'.$dni.'</b></font> ha asistido al seminario de capacitación en <font size="5"><b>"'.$nombreCharla.'"</b></font> autorizado por Resolución N° '.$nroRes.'/15 de fecha '.$fechaCharla.', llevado a cabo en la <b>Segunda Jornadas Nacionales para PYMES de la UTN</b> en Universidad Tecnológica Nacional - Facultad Regional Villa María los días 3 y 4 de Junio de 2015, se le otorga el presente certificado.'));
	
	$pdf->Image('img/firmaHuber.png',70,145,30,30);
	$pdf->SetXY(60,170);
	$pdf->SetFont('Helvetica','I',11);
	$pdf->Write(10,'Ing. Huber Fernandez');
	$pdf->SetXY(59,175);
	$pdf->SetFont('Helvetica','',11);
	$pdf->Write(10,utf8_decode('Secretaría de Extensión'));

	$pdf->Image('img/firmaRosso.png',210,145,37,27);
	$pdf->SetXY(208,170);
	$pdf->SetFont('Helvetica','I',11);
	$pdf->Write(10,'Ing. Pablo A. Rosso');
	$pdf->SetXY(218,175);
	$pdf->SetFont('Helvetica','',11);
	$pdf->Write(10,utf8_decode('Decano'));

	$pdf->SetXY(130,189);
	$pdf->SetFont('Helvetica','',10);
	$pdf->Write(0,utf8_decode($fechaActual));
}

if($rowCertificado['actividad4']=='t')
{
	$vCharla = explode('/--/', $charla[3]);
	$nombreCharla = $vCharla[1];
	$nroRes = $vCharla[2];

	$pdf->AddPage('L','A4');
	$pdf->SetRightMargin(20);
	$pdf->SetFont('Helvetica','',15);
	$pdf->Image('img/certificado.jpg',0,0,297,210);
	$pdf->SetLeftMargin(40);
	$pdf->SetXY(60,85);

	$pdf->WriteHTML(utf8_decode('Por cuanto <font size="5"><b>'.$nombre.' '.$apellido.'</b></font>, DNI N°: <font size="5"><b>'.$dni.'</b></font> ha asistido al seminario de capacitación en <font size="5"><b>"'.$nombreCharla.'"</b></font> autorizado por Resolución N° '.$nroRes.'/15 de fecha '.$fechaCharla.', llevado a cabo en la <b>Segunda Jornadas Nacionales para PYMES de la UTN</b> en Universidad Tecnológica Nacional - Facultad Regional Villa María los días 3 y 4 de Junio de 2015, se le otorga el presente certificado.'));
	
	$pdf->Image('img/firmaHuber.png',70,145,30,30);
	$pdf->SetXY(60,170);
	$pdf->SetFont('Helvetica','I',11);
	$pdf->Write(10,'Ing. Huber Fernandez');
	$pdf->SetXY(59,175);
	$pdf->SetFont('Helvetica','',11);
	$pdf->Write(10,utf8_decode('Secretaría de Extensión'));

	$pdf->Image('img/firmaRosso.png',210,145,37,27);
	$pdf->SetXY(208,170);
	$pdf->SetFont('Helvetica','I',11);
	$pdf->Write(10,'Ing. Pablo A. Rosso');
	$pdf->SetXY(218,175);
	$pdf->SetFont('Helvetica','',11);
	$pdf->Write(10,utf8_decode('Decano'));

	$pdf->SetXY(130,189);
	$pdf->SetFont('Helvetica','',10);
	$pdf->Write(0,utf8_decode($fechaActual));
}

if($rowCertificado['actividad5']=='t')
{
	$vCharla = explode('/--/', $charla[4]);
	$nombreCharla = $vCharla[1];
	$nroRes = $vCharla[2];

	$pdf->AddPage('L','A4');
	$pdf->SetRightMargin(20);
	$pdf->SetFont('Helvetica','',15);
	$pdf->Image('img/certificado.jpg',0,0,297,210);
	$pdf->SetLeftMargin(40);
	$pdf->SetXY(60,85);

	$pdf->WriteHTML(utf8_decode('Por cuanto <font size="5"><b>'.$nombre.' '.$apellido.'</b></font>, DNI N°: <font size="5"><b>'.$dni.'</b></font> ha asistido al seminario de capacitación en <font size="5"><b>"'.$nombreCharla.'"</b></font> autorizado por Resolución N° '.$nroRes.'/15 de fecha '.$fechaCharla.', llevado a cabo en la <b>Segunda Jornadas Nacionales para PYMES de la UTN</b> en Universidad Tecnológica Nacional - Facultad Regional Villa María los días 3 y 4 de Junio de 2015, se le otorga el presente certificado.'));
	
	$pdf->Image('img/firmaHuber.png',70,145,30,30);
	$pdf->SetXY(60,170);
	$pdf->SetFont('Helvetica','I',11);
	$pdf->Write(10,'Ing. Huber Fernandez');
	$pdf->SetXY(59,175);
	$pdf->SetFont('Helvetica','',11);
	$pdf->Write(10,utf8_decode('Secretaría de Extensión'));

	$pdf->Image('img/firmaRosso.png',210,145,37,27);
	$pdf->SetXY(208,170);
	$pdf->SetFont('Helvetica','I',11);
	$pdf->Write(10,'Ing. Pablo A. Rosso');
	$pdf->SetXY(218,175);
	$pdf->SetFont('Helvetica','',11);
	$pdf->Write(10,utf8_decode('Decano'));

	$pdf->SetXY(130,189);
	$pdf->SetFont('Helvetica','',10);
	$pdf->Write(0,utf8_decode($fechaActual));
}

if($rowCertificado['actividad6']=='t')
{
	$vCharla = explode('/--/', $charla[8]);
	$nombreCharla = $vCharla[1];
	$nroRes = $vCharla[2];

	$pdf->AddPage('L','A4');
	$pdf->SetRightMargin(20);
	$pdf->SetFont('Helvetica','',15);
	$pdf->Image('img/certificado.jpg',0,0,297,210);
	$pdf->SetLeftMargin(40);
	$pdf->SetXY(60,85);

	$pdf->WriteHTML(utf8_decode('Por cuanto <font size="5"><b>'.$nombre.' '.$apellido.'</b></font>, DNI N°: <font size="5"><b>'.$dni.'</b></font> ha asistido al seminario de capacitación en <font size="5"><b>"'.$nombreCharla.'"</b></font> autorizado por Resolución N° '.$nroRes.'/15 de fecha '.$fechaCharla.', llevado a cabo en la <b>Segunda Jornadas Nacionales para PYMES de la UTN</b> en Universidad Tecnológica Nacional - Facultad Regional Villa María los días 3 y 4 de Junio de 2015, se le otorga el presente certificado.'));
	
	$pdf->Image('img/firmaHuber.png',70,145,30,30);
	$pdf->SetXY(60,170);
	$pdf->SetFont('Helvetica','I',11);
	$pdf->Write(10,'Ing. Huber Fernandez');
	$pdf->SetXY(59,175);
	$pdf->SetFont('Helvetica','',11);
	$pdf->Write(10,utf8_decode('Secretaría de Extensión'));

	$pdf->Image('img/firmaRosso.png',210,145,37,27);
	$pdf->SetXY(208,170);
	$pdf->SetFont('Helvetica','I',11);
	$pdf->Write(10,'Ing. Pablo A. Rosso');
	$pdf->SetXY(218,175);
	$pdf->SetFont('Helvetica','',11);
	$pdf->Write(10,utf8_decode('Decano'));

	$pdf->SetXY(130,189);
	$pdf->SetFont('Helvetica','',10);
	$pdf->Write(0,utf8_decode($fechaActual));
}

if($rowCertificado['actividad7']=='t')
{
	$vCharla = explode('/--/', $charla[6]);
	$nombreCharla = $vCharla[1];
	$nroRes = $vCharla[2];

	$pdf->AddPage('L','A4');
	$pdf->SetRightMargin(20);
	$pdf->SetFont('Helvetica','',15);
	$pdf->Image('img/certificado.jpg',0,0,297,210);
	$pdf->SetLeftMargin(40);
	$pdf->SetXY(60,85);

	$pdf->WriteHTML(utf8_decode('Por cuanto <font size="5"><b>'.$nombre.' '.$apellido.'</b></font>, DNI N°: <font size="5"><b>'.$dni.'</b></font> ha asistido al seminario de capacitación en <font size="5"><b>"'.$nombreCharla.'"</b></font> autorizado por Resolución N° '.$nroRes.'/15 de fecha '.$fechaCharla.', llevado a cabo en la <b>Segunda Jornadas Nacionales para PYMES de la UTN</b> en Universidad Tecnológica Nacional - Facultad Regional Villa María los días 3 y 4 de Junio de 2015, se le otorga el presente certificado.'));
	
	$pdf->Image('img/firmaHuber.png',70,145,30,30);
	$pdf->SetXY(60,170);
	$pdf->SetFont('Helvetica','I',11);
	$pdf->Write(10,'Ing. Huber Fernandez');
	$pdf->SetXY(59,175);
	$pdf->SetFont('Helvetica','',11);
	$pdf->Write(10,utf8_decode('Secretaría de Extensión'));

	$pdf->Image('img/firmaRosso.png',210,145,37,27);
	$pdf->SetXY(208,170);
	$pdf->SetFont('Helvetica','I',11);
	$pdf->Write(10,'Ing. Pablo A. Rosso');
	$pdf->SetXY(218,175);
	$pdf->SetFont('Helvetica','',11);
	$pdf->Write(10,utf8_decode('Decano'));

	$pdf->SetXY(130,189);
	$pdf->SetFont('Helvetica','',10);
	$pdf->Write(0,utf8_decode($fechaActual));
}

if($rowCertificado['actividad8']=='t')
{
	$vCharla = explode('/--/', $charla[7]);
	$nombreCharla = $vCharla[1];
	$nroRes = $vCharla[2];

	$pdf->AddPage('L','A4');
	$pdf->SetRightMargin(20);
	$pdf->SetFont('Helvetica','',15);
	$pdf->Image('img/certificado.jpg',0,0,297,210);
	$pdf->SetLeftMargin(40);
	$pdf->SetXY(60,85);

	$pdf->WriteHTML(utf8_decode('Por cuanto <font size="5"><b>'.$nombre.' '.$apellido.'</b></font>, DNI N°: <font size="5"><b>'.$dni.'</b></font> ha asistido al seminario de capacitación en <font size="5"><b>"'.$nombreCharla.'"</b></font> autorizado por Resolución N° '.$nroRes.'/15 de fecha '.$fechaCharla.', llevado a cabo en la <b>Segunda Jornadas Nacionales para PYMES de la UTN</b> en Universidad Tecnológica Nacional - Facultad Regional Villa María los días 3 y 4 de Junio de 2015, se le otorga el presente certificado.'));
	
	$pdf->Image('img/firmaHuber.png',70,145,30,30);
	$pdf->SetXY(60,170);
	$pdf->SetFont('Helvetica','I',11);
	$pdf->Write(10,'Ing. Huber Fernandez');
	$pdf->SetXY(59,175);
	$pdf->SetFont('Helvetica','',11);
	$pdf->Write(10,utf8_decode('Secretaría de Extensión'));

	$pdf->Image('img/firmaRosso.png',210,145,37,27);
	$pdf->SetXY(208,170);
	$pdf->SetFont('Helvetica','I',11);
	$pdf->Write(10,'Ing. Pablo A. Rosso');
	$pdf->SetXY(218,175);
	$pdf->SetFont('Helvetica','',11);
	$pdf->Write(10,utf8_decode('Decano'));

	$pdf->SetXY(130,189);
	$pdf->SetFont('Helvetica','',10);
	$pdf->Write(0,utf8_decode($fechaActual));
}

if($rowCertificado['actividad9']=='t')
{
	$vCharla = explode('/--/', $charla[5]);
	$nombreCharla = $vCharla[1];
	$nroRes = $vCharla[2];

	$pdf->AddPage('L','A4');
	$pdf->SetRightMargin(20);
	$pdf->SetFont('Helvetica','',15);
	$pdf->Image('img/certificado.jpg',0,0,297,210);
	$pdf->SetLeftMargin(40);
	$pdf->SetXY(60,85);

	$pdf->WriteHTML(utf8_decode('Por cuanto <font size="5"><b>'.$nombre.' '.$apellido.'</b></font>, DNI N°: <font size="5"><b>'.$dni.'</b></font> ha asistido al seminario de capacitación en <font size="5"><b>"'.$nombreCharla.'"</b></font> autorizado por Resolución N° '.$nroRes.'/15 de fecha '.$fechaCharla.', llevado a cabo en la <b>Segunda Jornadas Nacionales para PYMES de la UTN</b> en Universidad Tecnológica Nacional - Facultad Regional Villa María los días 3 y 4 de Junio de 2015, se le otorga el presente certificado.'));
	
	$pdf->Image('img/firmaHuber.png',70,145,30,30);
	$pdf->SetXY(60,170);
	$pdf->SetFont('Helvetica','I',11);
	$pdf->Write(10,'Ing. Huber Fernandez');
	$pdf->SetXY(59,175);
	$pdf->SetFont('Helvetica','',11);
	$pdf->Write(10,utf8_decode('Secretaría de Extensión'));

	$pdf->Image('img/firmaRosso.png',210,145,37,27);
	$pdf->SetXY(208,170);
	$pdf->SetFont('Helvetica','I',11);
	$pdf->Write(10,'Ing. Pablo A. Rosso');
	$pdf->SetXY(218,175);
	$pdf->SetFont('Helvetica','',11);
	$pdf->Write(10,utf8_decode('Decano'));

	$pdf->SetXY(130,189);
	$pdf->SetFont('Helvetica','',10);
	$pdf->Write(0,utf8_decode($fechaActual));
}

if($rowCertificado['actividad10']=='t')
{
	$vCharla = explode('/--/', $charla[9]);
	$nombreCharla = $vCharla[1];
	$nroRes = $vCharla[2];

	$pdf->AddPage('L','A4');
	$pdf->SetRightMargin(20);
	$pdf->SetFont('Helvetica','',15);
	$pdf->Image('img/certificado.jpg',0,0,297,210);
	$pdf->SetLeftMargin(40);
	$pdf->SetXY(60,85);

	$pdf->WriteHTML(utf8_decode('Por cuanto <font size="5"><b>'.$nombre.' '.$apellido.'</b></font>, DNI N°: <font size="5"><b>'.$dni.'</b></font> ha asistido al seminario de capacitación en <font size="5"><b>"'.$nombreCharla.'"</b></font> autorizado por Resolución N° '.$nroRes.'/15 de fecha '.$fechaCharla.', llevado a cabo en la <b>Segunda Jornadas Nacionales para PYMES de la UTN</b> en Universidad Tecnológica Nacional - Facultad Regional Villa María los días 3 y 4 de Junio de 2015, se le otorga el presente certificado.'));
	
	$pdf->Image('img/firmaHuber.png',70,145,30,30);
	$pdf->SetXY(60,170);
	$pdf->SetFont('Helvetica','I',11);
	$pdf->Write(10,'Ing. Huber Fernandez');
	$pdf->SetXY(59,175);
	$pdf->SetFont('Helvetica','',11);
	$pdf->Write(10,utf8_decode('Secretaría de Extensión'));

	$pdf->Image('img/firmaRosso.png',210,145,37,27);
	$pdf->SetXY(208,170);
	$pdf->SetFont('Helvetica','I',11);
	$pdf->Write(10,'Ing. Pablo A. Rosso');
	$pdf->SetXY(218,175);
	$pdf->SetFont('Helvetica','',11);
	$pdf->Write(10,utf8_decode('Decano'));

	$pdf->SetXY(130,189);
	$pdf->SetFont('Helvetica','',10);
	$pdf->Write(0,utf8_decode($fechaActual));
}

$vCharla = explode('/--/', $charla[10]);
$nombreCharla = $vCharla[1];
$nroRes = $vCharla[2];

$pdf->AddPage('L','A4');
$pdf->SetRightMargin(20);
$pdf->SetFont('Helvetica','',15);
$pdf->Image('img/certificado.jpg',0,0,297,210);
$pdf->SetLeftMargin(40);
$pdf->SetXY(60,85);

$pdf->WriteHTML(utf8_decode('Por cuanto <font size="5"><b>'.$nombre.' '.$apellido.'</b></font>, DNI N°: <font size="5"><b>'.$dni.'</b></font> ha asistido al seminario de capacitación en <font size="5"><b>"'.$nombreCharla.'"</b></font> autorizado por Resolución N° '.$nroRes.'/15 de fecha '.$fechaCharla.', llevado a cabo en la <b>Segunda Jornadas Nacionales para PYMES de la UTN</b> en Universidad Tecnológica Nacional - Facultad Regional Villa María los días 3 y 4 de Junio de 2015, se le otorga el presente certificado.'));

$pdf->Image('img/firmaHuber.png',70,145,30,30);
$pdf->SetXY(60,170);
$pdf->SetFont('Helvetica','I',11);
$pdf->Write(10,'Ing. Huber Fernandez');
$pdf->SetXY(59,175);
$pdf->SetFont('Helvetica','',11);
$pdf->Write(10,utf8_decode('Secretaría de Extensión'));

$pdf->Image('img/firmaRosso.png',210,145,37,27);
$pdf->SetXY(208,170);
$pdf->SetFont('Helvetica','I',11);
$pdf->Write(10,'Ing. Pablo A. Rosso');
$pdf->SetXY(218,175);
$pdf->SetFont('Helvetica','',11);
$pdf->Write(10,utf8_decode('Decano'));

$pdf->SetXY(130,189);
$pdf->SetFont('Helvetica','',10);
$pdf->Write(0,utf8_decode($fechaActual));

ob_end_clean();
$pdf->Output('Certificados Jornadas Pymes.pdf','I');
?>