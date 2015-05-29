<?php

include_once "conexion.php";
include_once "libreria.php";

$sqlUpdate = traerSql('id_inscripto','impresiontemp');

$sql = '';

while($rowUpdate = pg_fetch_array($sqlUpdate))
{
	$sql .= "UPDATE inscripto SET impreso='true' WHERE id=".$rowUpdate['id_inscripto'].";";
}

$error = guardarSql($sql);
pg_query('TRUNCATE TABLE impresiontemp');
echo '<script language="JavaScript">window.location = "impresionInscriptos.php";</script>';


?>