<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Validar DNI1</title>
</head>
<body>
<?php
include_once "conexion.php";

$numDNI = $_REQUEST['numDNI'];
//echo $numDNI;
//echo $numDNI.'<br>';
$consultaDNI = pg_query("SELECT count(id) AS total,id, asistio FROM inscripto WHERE nrodni = '$numDNI' GROUP BY id");
$rowConsultaDni = pg_fetch_array($consultaDNI,NULL,PGSQL_ASSOC);
$cantidad = $rowConsultaDni['total'];
//echo $cantidad;

	if($cantidad != 0){
		if($rowConsultaDni['asistio'] == 't')
		{
			echo '<script language="JavaScript">alert("Ya se completaron los datos de este inscripto"); window.location = "validarInscripto.php";</script>';	
		}
		else
		{
			echo '<script language="JavaScript"> window.location = "completarInscripto.php?id='.$rowConsultaDni['id'].'";</script>';
		}
	}else
	{
		echo '<script language="JavaScript">alert("El inscripto no se encuentra registrado"); window.location = "validarInscripto.php";</script>';
	}

?>
</body>
</html>