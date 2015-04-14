<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="jquery.mask.js" type="text/javascript"></script>
	<link rel="stylesheet" href="css/consulta_inscripcion.css">
	<title>Consulta de Inscripciones</title>
	<script>
	var alumnosSeleccionados = [];
	var alumnosDiccionario = {};
	var separador = '/--/';

	prevHtml = '<tr>';
	prevHtml += '<td colspan="3" id="tdTitulo"><strong>Consulta de Inscripciones a Segundas Jornadas Nacionales para PyMEs de la UTN</strong></td>';
	prevHtml += '</tr>';
	prevHtml += '<tr>';
	prevHtml += '<td id="tdBtn">';
	prevHtml += '<a href="totalInscriptos.php"><input type="button" id="btn_info" value="Total Inscriptos" title="Ver total de inscriptos de cada actividad" alt="ver"></a>';
	prevHtml += '</td>';
	prevHtml += '<td id="tdBtn">';
	prevHtml += '<input type="search" id="txt_busqueda" value="" onchange="controlBusqueda()" onKeyUp="controlBusqueda()" placeholder="Buscar inscripto" title="Buscar inscriptos" alt="Buscar"></a>';
	prevHtml += '</td>';
    prevHtml += '</tr>';
    prevHtml += '<tr>';
	prevHtml += '<td class="td_titcol">Inscripto</td>';
	prevHtml += '<td class="td_titcol">Fec. Inscripci&oacute;n</td>';
	prevHtml += '<td class="td_titcol">Consultar</td>';
	prevHtml += '</tr>';

	function cargarAlumno(id, stringAlumno)
	{
		alumnosDiccionario[id] = stringAlumno;
	}

	function controlBusqueda()
	{
		if(($('#txt_busqueda').val()) == '' || ($('#txt_busqueda').val()) == null)
		{
			mostrarAlumnos(false);
		}
		else
		{
			mostrarAlumnos(true);
		}
	}

	function mostrarAlumnos(busqueda)
	{
		var alumnosToAdd = '';
		if(busqueda == false)
		{
			//prevHtml = $('#tabla').html();		
			$.each(alumnosDiccionario, function(key,value)
			{
				alumnosToAdd += '<tr><td><l2>'+vStringAlumno[1]+', '+vStringAlumno[2]+'</l2></td><td><l2>'+vStringAlumno[3]+'</l2></td><td align="center"><a href="verInscripto.php?idInscripto='+vStringAlumno[0]+'"><input type="button" id="btn_verincs" value="Ver" title="Ver Informaci&oacute;n del inscripto" alt="ver"></a></td></tr>';
			});
		}
		else
		{
			var alumnoEncontrado = false;
			palabraABuscar = ($('#txt_busqueda').val()).toLowerCase();
			$.each(alumnosDiccionario, function(key,value)
			{
				alumnoEncontrado = false;
				var vStringAlumno = value.toLowerCase().split(separador);
				for(var i = 0; i < vStringAlumno.length; i++)
				{
					if(i != 0)
					{
						if(vStringAlumno[i].indexOf(palabraABuscar) != -1)
						{
							alumnoEncontrado = true;
							break;
						}
					}
				}
				if(alumnoEncontrado)
				{
					alumnosToAdd += '<tr><td><l2>'+vStringAlumno[1]+', '+vStringAlumno[2]+'</l2></td><td><l2>'+vStringAlumno[3]+'</l2></td><td align="center"><a href="verInscripto.php?idInscripto='+vStringAlumno[0]+'"><input type="button" id="btn_verincs" value="Ver" title="Ver Informaci&oacute;n del inscripto" alt="ver"></a></td></tr>';
				}
			});
		}
		htmlToAdd = prevHtml + alumnosToAdd;
		$('#lista').html(htmlToAdd);
		//$('#date').val(fechaIngreso);
	}

	$(document).ready(function(){
	    mostrarAlumnos(false);
	    //Ver si se pone desp de que se busquen los alumnos para una etapa
	});
	</script>
</head>
<body>
<?php
include_once "conexion.php";
include_once "libreria.php";

$sep = '/--/';
$consultaSql = traerSql("id,nombre,apellido,fechainscripto", "inscripto");
$val = pg_query($consultaSql);
$contador = 0;

//Esto es por si vuelve desde otra pagina
//$controlR = 0;

//$controlR = $_REQUEST['controlR'];	

while($row = pg_fetch_array($val)){
	$contador += 1;
	$fecha = $row['fechainscripto'];
	$fechainscripto = setDate($fecha);
	$stringAlumno = $row['id'].$sep.$row['apellido'].$sep.$row['nombre'].$sep.$fechainscripto;
	echo '<script>cargarAlumno('.$contador.',"'.$stringAlumno.'")</script>';
}

//if($controlR == 1)
//{
	//$alumnosRecibidos = $_REQUEST['alumnosPasar'];
	//echo '<script>setAlumnoSelectRedireccion("'.$alumnosRecibidos.'")</script>';
//}

?>
<table id="lista" align="center">
	<tr>  
        <td colspan="3" id="tdTitulo"><strong>Consulta de Inscripciones a Segundas Jornadas Nacionales para PyMEs de la UTN</strong></td>
    </tr>
    <tr>
    	<td id="tdBtn">
    		<a href="totalInscriptos.php"><input type="button" id="btn_info" value="Total Inscriptos" title="Ver total de inscriptos de cada actividad" alt="ver"></a>
    	</td>
    	<td id="tdBtn">
    		<input type="search" id="txt_busqueda" value="" placeholder="Buscar inscripto" title="Buscar inscriptos" alt="Buscar"></a>
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