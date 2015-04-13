<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="jquery.mask.js" type="text/javascript"></script>
	<link rel="stylesheet" href="css/total_inscriptos.css">
	<title>Total de inscriptos</title>
</head>
<body>
<?php
include_once "conexion.php";
include_once "libreria.php";

$id_Inscripto = $_REQUEST['idInscripto'];
?>
<table id="lista" align="center">
	<tr>  
        <td id="tdTitulo" colspan="2"><strong>Cantidad de Inscriptos</strong></td>
    </tr>
	<?php	$true = 'true';	?>
	<tr>
		<td class="texto"><li><label>Apertura de la Segunda Jornada para Pymes:</label></td><td class="total"><l1><?php echo $contarActividad1 = contarRegistro('actividad1','inscripto','actividad1='.$true);?></l1></li></td>
	</tr>
	<tr>
		<td class="texto"><li><label>Escenario actual de las Pymes:</label></td><td class="total"><l1><?php echo $contarActividad2 = contarRegistro('actividad2','inscripto','actividad2='.$true);?></l1></li></td>
	</tr>
	<tr>
		<td class="texto"><li><label><l3>Rentabilidad de las pymes:</l3> el secreto no pasa por hacer más sino hacer lo correcto:</label></td><td class="total"><l1><?php echo $contarActividad3 = contarRegistro('actividad3','inscripto','actividad3='.$true);?></l1></li></td>
	</tr>
	<tr>
		<td class="texto"><li><label><l3>De Villa María al Mundo:</l3> Como armar una red de representantes comerciales:</label></td><td class="total"><l1><?php echo $contarActividad4 = contarRegistro('actividad4','inscripto','actividad4='.$true);?></l1></li></td>
	</tr>
	<tr>
		<td class="texto"><li><label><l3>De la idea al negocio:</l3> Como crear las condiciones para que tu idea termine en una Pyme:</label></td><td class="total"><l1><?php echo $contarActividad5 = contarRegistro('actividad5','inscripto','actividad5='.$true);?></l1></li></td>
	</tr>
	<tr>
		<td class="texto"><li><label>Taller Experiencias Pymes/Graduados:</label></td><td class="total"><l1><?php echo $contarActividad6 = contarRegistro('actividad6','inscripto','actividad6='.$true);?></l1></li></td>
	</tr>
	<tr>
		<td class="texto"><li><label><l3>Crecimiento, Delegaci&oacute;n y direcci&oacute;n en la Pymes:</l3> los roles del fundador – gerente general:</label></td><td class="total"><l1><?php echo $contarActividad7 = contarRegistro('actividad7','inscripto','actividad7='.$true);?></l1></li></td>
	</tr>
	<tr>
		<td class="texto"><li><label>Como emprender con &eacute;xito en la Argentina. Cadena de valor:</label></td><td class="total"><l1><?php echo $contarActividad8 = contarRegistro('actividad8','inscripto','actividad8='.$true);?></l1></li></td>
	</tr>
	<tr>
		<td class="texto"><li><label>Planificación en empresas de familia:</label></td><td class="total"><l1><?php echo $contarActividad9 = contarRegistro('actividad9','inscripto','actividad9='.$true);?></l1></li></td>
	</tr>
	<tr>
		<td class="texto"><li><label>Lanzando nuestra Pyme al mundo Digital:</label></td><td  class="total"><l1><?php echo $contarActividad10 = contarRegistro('actividad10','inscripto','actividad10='.$true);?></l1></li></td>
	</tr>
	<tr>
		<td class="texto"><li><label>Taller Programa de fortalecimiento y Cr&eacute;ditos para Pymes:</label></td><td class="total"><l1><?php echo $contarActividad11 = contarRegistro('actividad11','inscripto','actividad11='.$true);?></l1></li></td>
	</tr>
	<tr>
		<td class="texto"><li><label>Almuerzo Libre:</label></td><td class="total"><l1><?php echo $contarActividad12 = contarRegistro('actividad12','inscripto','actividad12='.$true);?></l1></li></td>
	</tr>
	<tr>
		<td class="textoT"><label>Total Inscriptos:</label></td>
		<td class="nroTotal">
			
				<?php
					//No se si va el total de abajo.
					//echo $total = $contarActividad1 + $contarActividad2 + $contarActividad3 + $contarActividad4 + $contarActividad5 + $contarActividad6 + $contarActividad7 + $contarActividad8 + $contarActividad9 + $contarActividad10 + $contarActividad11 + $contarActividad12;
					//creo que va este:
					echo $total = contarRegistro('id','inscripto', '');;
				?>
			
		</td>
	</tr>
</table>
<table id="btn" align="center">
	<tr>
		<td align="right">
			<?php echo '<a href="consultaInscripciones.php"><input type="button" id="btn_atras" value="Atr&aacute;s"/></a>';?>
		</td>
		<td align="left">
			<?php echo '<a href="totalInscriptosExcel.php"><input type="button" id="btn_excel" value="Excel"/></a>';?>
		</td>
	</tr>
</table>
</body>
</html>