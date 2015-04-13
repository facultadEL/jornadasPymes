<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="jquery.mask.js" type="text/javascript"></script>
	<link rel="stylesheet" href="css/ver_inscripto.css">
	<title>Informaci&oacute;n del Inscripto</title>
</head>
<body>
<?php
include_once "conexion.php";
include_once "libreria.php";

$id_Inscripto = $_REQUEST['idInscripto'];
?>
<table id="lista" align="center">
	<tr>  
        <td id="tdTitulo"><strong>Informaci&oacute;n del Inscripto</strong></td>
    </tr>
	<?php
		$consultaSql = traerSqlCondicion('i.id, i.nombre as ins_nombre, apellido, t.nombre as tid_nombre, nrodni, direccion, numero, piso, dpto, localidad, mail, telfijo, telcel, razon_social, titaca, fechainscripto, info, actividad1, actividad2, actividad3, actividad4, actividad5, actividad6, actividad7, actividad8, actividad9, actividad10, actividad11, actividad12', 'inscripto i INNER JOIN tipo_dni t ON i.tipo_dni = t.id', 'i.id='.$id_Inscripto);
		$rowConsulta=pg_fetch_array($consultaSql,NULL,PGSQL_ASSOC);
			$fecha = $rowConsulta['fechainscripto'];
			$fechainscripto = setDate($fecha);
	?>
	<tr>
		<td><l2>Nombre: </l2><?php echo $rowConsulta['apellido'].', '.$rowConsulta['ins_nombre'];?></td>
	</tr>
	<tr>
		<td><l2>Tipo y N&deg; doc.: </l2><?php echo $rowConsulta['tid_nombre'].' - '.$rowConsulta['nrodni'];?></td>
	</tr>
	<tr>
		<td><l2>Direcci&oacute;n: </l2><?php echo $rowConsulta['direccion'];?> <l2>Nro: </l2><?php echo $rowConsulta['numero'];?></td>
	</tr>
	<tr>
		<td><l2>Piso: </l2><?php echo $rowConsulta['piso'];?> <l2>Dpto.: </l2><?php echo $rowConsulta['dpto'];?></td>
	</tr>
	<tr>
		<td><l2>Localidad: </l2><?php echo $rowConsulta['localidad'];?></td>
	</tr>
	<tr>
		<td><l2>Mail: </l2><?php echo $rowConsulta['mail'];?></td>
	</tr>
	<tr>
		<td><l2>Tel. Fijo: </l2><?php echo $rowConsulta['telfijo'];?> <l2>Tel. Cel.: </l2><?php echo $rowConsulta['telcel'];?></td>
	</tr>
	<tr>
		<td><l2>Trabaja en: </l2><?php echo $rowConsulta['razon_social'];?></td>
	</tr>
	<tr>
		<td><l2>T&iacute;tulo acad&eacute;mico: </l2><?php echo $rowConsulta['titaca'];?></td>
	</tr>
	<tr>
		<td><l2>Fec. Inscripcí&oacute;n: </l2><?php echo $fechainscripto;?></td>
	</tr>
	<tr>
		<td><l2>Conocimiento sobre la Jornada: </l2><?php echo $rowConsulta['info'];?></td>
	</tr>
<!-- 	<tr>
		<td><l2>Actividades a la que asistir&aacute;: </l2>
		<?php
			//for ($i=1; $i < 13 ; $i++) { 
			//	if ($rowConsulta['actividad'.$i] == 't') {
			//		echo $rowConsulta['actividad'.$i];
			//	}				
			//}
		?></td>
	</tr> -->
</table>
<table id="btn" align="center">
	<tr>
		<td align="right">
			<?php echo '<a href="consultaInscripciones.php"><input type="button" id="btn_atras" value="Atr&aacute;s"/></a>';?>
		</td>
		<td align="left">
			<?php echo '<a href="inscripcion.php?idInscripto='.$rowConsulta['id'].'"><input type="button" id="btn_editar" value="Modificar"/></a>';?>
		</td>
	</tr>
</table>
</body>
</html>