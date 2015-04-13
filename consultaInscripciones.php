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
?>
<table id="lista" align="center">
	<tr>  
        <td colspan="3" id="tdTitulo"><strong>Consulta de Inscripciones a Segundas Jornadas Nacionales para PyMEs de la UTN</strong></td>
    </tr>
    <tr>
    	<td id="tdBtn">
    		<a href="totalInscriptos.php"><input type="button" id="btn_info" value="Total Inscriptos" title="Ver total de inscriptos de cada actividad" alt="ver"></a>
    	</td>
    </tr>
	<tr>
		<td class="td_titcol">Inscripto</td>
		<td class="td_titcol">Fec. Inscripci&oacute;n</td>
		<td class="td_titcol">Consultar</td>
	</tr>
	<?php
		$consultaSql = traerSql("id,nombre,apellido,fechainscripto", "inscripto");
		while($rowConsulta=pg_fetch_array($consultaSql,NULL,PGSQL_ASSOC)){
			$id = $rowConsulta['id'];
			$nombre = $rowConsulta['nombre'];
			$apellido = $rowConsulta['apellido'];
			$fecha = $rowConsulta['fechainscripto'];
			$fechainscripto = setDate($fecha);
			echo '<tr>';
				echo '<td><l2>'.$apellido.', '.$nombre.'</l2></td>';
				echo '<td><l2>'.$fechainscripto.'</l2></td>';
				//hacer un if para que diferencie los botones segun el estado del alumno --> $confirmado
				echo '<td align="center"><a href="verInscripto.php?idInscripto='.$id.'"><input type="button" id="btn_verincs" value="Ver" title="Ver Informaci&oacute;n del inscripto" alt="ver"></a></td>';
			echo '</tr>';
		}
	?>
</table>

</body>
</html>