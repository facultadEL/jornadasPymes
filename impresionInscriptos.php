<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="jquery.mask.js" type="text/javascript"></script>
	<link rel="stylesheet" href="css/consulta_inscripcion.css">
	<title>Consulta de Inscripciones</title>
</head>
<body>
<?php
include_once "conexion.php";
include_once "libreria.php";
pg_query('TRUNCATE TABLE impresiontemp');
?>
<div id="lista1">
	<table id="tabla1" align="center">
		<tr>  
	        <td colspan="2" id="tdTitulo"><strong>Consulta de Inscripciones a Segundas Jornadas Nacionales para PyMEs de la UTN</strong></td>
	    </tr>
	    <tr>  
	        <td colspan="2" id="tdTitulo"><a href="imprimir.php"><input type="button" id="btn_info" value="Imprimir"></a></td>
	    </tr>
	</table>
	<table id="lista" align="center">
		<tr>
		<td class="td_titcol">Inscripto</td>
		<td class="td_titcol">Nro Dni</td>
		<td class="td_titcol">Codigo</td>
		</tr>
		<?php
			$sql = traerSqlCondicion('*','inscripto',"asistio='true' and impreso='false'");
			while($rowInscripto = pg_fetch_array($sql))
			{
				echo '<tr>';
				echo '<td><l2>'.$rowInscripto['apellido'].', '.$rowInscripto['nombre'].'</l2></t023916005528267515d>';
				echo '<td><l2>'.$rowInscripto['nrodni'].'</l2></td>';
				$id = $rowInscripto['id'];
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

				echo '<td><l2>'.$code.'</l2></td>';
				echo '<td><img src="generarcodbarra/barcode.php?code='.$code.'&scale=1" /></td>';
				//echo '<td><img src="generarcodbarra/barcode.php?code=000000000000&scale=1" alt=""/></td>';
				//<td align="center"><a href="verInscripto.php?idInscripto='+vStringAlumno[0]+'"><input type="button" id="btn_verincs" value="Ver" title="Ver Informaci&oacute;n del inscripto" alt="ver"></a></td></tr>
			}
		?>
	</table>
</div>
</body>
</html>
<!--
<td colspan="2" rowspan="3" align="center"><img src="generarcodbarra/barcode.php?code=<? //echo $inscripto.$contcuota.$row29["cantcuota"].$montomostrar.date("y");?>&amp;scale=1" alt="" /></td>
-->