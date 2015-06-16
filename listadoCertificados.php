<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="jquery.mask.js" type="text/javascript"></script>
	<link rel="stylesheet" href="css/consulta_inscripcion.css">
	<title>Listado de Certificados</title>
</head>
<body>
<?php
include_once "conexion.php";
include_once "libreria.php";
$id_inscripto = $_REQUEST['id'];
$charla[0] = "1/--/Escenario actual de las Pymes/--/03/06/2015";
$charla[1] = "2/--/Rentabilidad de las pymes: el secreto no pasa por hacer más sino hacer lo correcto/--/03/06/2015";
$charla[2] = "3/--/Taller de Experiencias Casos Exitosos UTN/--/03/06/2015";
$charla[3] = "4/--/De Villa María al Mundo: Como armar una red de representantes comerciales/--/03/06/2015";
$charla[4] = "5/--/De la idea al negocio: Como crear las condiciones para que tu idea termine en una Pyme/--/03/06/2015";
$charla[5] = "9/--/Planificación en empresas de familia/--/04/06/2015";
$charla[6] = "7/--/Como emprender con &eacute;xito en la Argentina. Cadena de valor/--/04/06/2015";
$charla[7] = "8/--/Taller Programa de Financiamiento y Creditos para Pymes/--/04/06/2015";
$charla[8] = "6/--/Crecimiento, Delegaci&oacute;n y direcci&oacute;n en las Pymes: Los roles del Fundador - Gerente General/--/04/06/2015";
$charla[9] = "10/--/Lanzando nuestra Pyme al mundo Digital/--/04/06/2015";
?>
<div id="lista1">
	<table id="tabla1" align="center">
		<tr>  
	        <td colspan="2" id="tdTitulo"><strong>Certificados por descargar</strong></td>
	    </tr>
	    <tr>  
	        <td colspan="2" id="tdTitulo"><font size="3" color="black"><i>Si necesitas validar tu certificado o tenes alg&uacute;n problema comunicate con nosotros a s_extension@frvm.utn.edu.ar o llamanos al 0353 4537500 int. 124 o 125</i></font></td>
	    </tr>
	    <tr align="center">  
	    <?php
	        echo '<td colspan="2" id="tdTitulo2" align="center"><a href="descargarCertificado.php?id='.$id_inscripto.'" target="_blank"><input type="button" id="btn_verincs" value="Descargar" title="Descargar Certificados" alt="ver"></a></td>';
	    ?>
	    </tr>
	</table>
	<table id="lista" align="center">
		<tr>
		<td class="td_titcol" width="70%">Charla</td>
		<td class="td_titcol" width="15%">Fecha</td>
		</tr>
		<?php
			$condicion = "asistio='true' and id=".$id_inscripto." LIMIT 1";
			$sql = traerSqlCondicion('*','inscripto',$condicion);
			//$sql = traerSqlCondicion('asistencia.*','inscripto INNER JOIN asistencia ON(asistencia.id_inscripto = inscripto.id)',$condicion);
			$rowSql = pg_fetch_array($sql);
			//echo $rowSql['fechainscripto'];
			$fecha = new datetime($rowSql['fechainscripto']);
			//$fecha = new datetime(date('Y-m-d'));
			$fechaSegundoDia = new datetime('2015-06-04');
			//echo $fechaActual;
			//echo $fecha;
			if($fecha < $fechaSegundoDia)
			{
				$inicio = 0;
			}
			else
			{
				$inicio = 4;
			}
			
			for($i=$inicio;$i<count($charla);$i++)
			{
				$vCharla = explode('/--/', $charla[$i]);
				$nombreActividad = 'actividad'.$vCharla[0];
				$checkActividad = $rowSql[$nombreActividad];
				if($checkActividad == 't')
				{
					echo '<tr>';
					echo '<td><l2>'.$vCharla[1].'</l2></td>';
					echo '<td align="center"><l2>'.$vCharla[2].'</l2></td>';
					echo '</tr>';	
				}
			}
		?>
		<tr>
		<td><l2>Innovaci&oacute;n/Vinculaci&oacute;n</l2></td>
		<td align="center"><l2>04/06/2015</l2></td>
	</table>
</div>
</body>
</html>
<!--
<td colspan="2" rowspan="3" align="center"><img src="generarcodbarra/barcode.php?code=<? //echo $inscripto.$contcuota.$row29["cantcuota"].$montomostrar.date("y");?>&amp;scale=1" alt="" /></td>
-->