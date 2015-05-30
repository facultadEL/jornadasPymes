<?php
include_once "conexion.php";
include_once "libreria.php";

$sep = '/--/';

$sqlUpdateInscripto = "UPDATE inscripto SET asistio='true', impreso='false' ";

$idInscripto = $_REQUEST['idInscripto'];
if(!empty($_REQUEST['selAlumno']))
{
	if($_REQUEST['selAlumno'] == 'on')
	{
		$carreraAlumno = $_REQUEST['carreraAlumno'];
		$anioCursado = $_REQUEST['anioCursado'];
		$datosAlumno = $carreraAlumno.$sep.$anioCursado;
		$sqlUpdateInscripto .= ",esalumno='true', datosalumno='$datosAlumno'";
	}
	else
	{
		$sqlUpdateInscripto .= ",esalumno='false', datosalumno=null";
	}
}
else
{
	$sqlUpdateInscripto .= ",esalumno='false', datosalumno=null";
}

if(!empty($_REQUEST['selGraduado']))
{
	if($_REQUEST['selGraduado'] == 'on')
	{
		$carreraGraduado = $_REQUEST['carreraGraduado'];
		$anioGraduado = $_REQUEST['anioGraduado'];
		$datosGraduado = $carreraGraduado.$sep.$anioGraduado;
		$sqlUpdateInscripto .= ",esgraduado='true', datosgraduado='$datosGraduado'";
	}
	else
	{
		$sqlUpdateInscripto .= ",esgraduado='false', datosgraduado=null";
	}
}
else
{
	$sqlUpdateInscripto .= ",esgraduado='false', datosgraduado=null";
}

if(!empty($_REQUEST['selEmpresa']))
{
	if($_REQUEST['selEmpresa'] == 'on')
	{
		$nombreEmpresa = $_REQUEST['nombreEmpresa'];
		$areaEmpresa = $_REQUEST['areaEmpresa'];
		$localidadEmpresa = $_REQUEST['localidadEmpresa'];
		$datosEmpresa = $nombreEmpresa.$sep.$areaEmpresa.$sep.$localidadEmpresa;

		$sqlUpdateInscripto .= ",esempresa='true', datosempresa='$datosEmpresa'";
	}
	else
	{
		$sqlUpdateInscripto .= ",esempresa='false', datosempresa=null";
	}
}
else
{
	$sqlUpdateInscripto .= ",esempresa='false', datosempresa=null";
}

$sqlUpdateInscripto .= " WHERE id=$idInscripto;";
//echo $sqlUpdateInscripto;

$sqlUpdateInscripto .= "INSERT INTO asistencia(id_inscripto) VALUES('$idInscripto');";

$error = guardarSql($sqlUpdateInscripto);

if($error == 1)
	mostrarMensaje("El inscripto no se pudo actualizar","validarInscripto.php");
else
	mostrarMensaje("El inscripto se actualizo correctamente","validarInscripto.php");

?>