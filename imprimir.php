<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>
    Impresi&oacute;n
</title>
</head>
<!--body onload="print()"-->
<body>
<table width="612px" height="600px">
<?php
include_once "conexion.php";
include_once "libreria.php";

//$sqlImprimir = traerSqlCondicion('id,nombre,apellido,nrodni','inscripto',"asistio='true' order by id desc limit 33");
//$sqlImprimir = traerSqlCondicion('*','inscripto',"asistio='true' and impreso='false'");
$cant = 0;

while($rowImprimir = pg_fetch_array($sqlImprimir))
{
	echo 'entro1';
	$cant++;
	if($cant==1)
	{
		echo '<tr width=100%>';
	}

		echo '<td width="33%" align="center">';
		echo $rowImprimir['apellido'].', '.$rowImprimir['nombre'];
		echo '<br>';
		$id = $rowImprimir['id'];
		if(strlen($id) < 4)
		{
			do
			{
				$id = '0'.$id;
			}while(strlen($id) < 4);
		}
		$code = $id;
		for($i=1; $i <= 7; $i++)
		{
			$code .= rand(0,9);
		}
		$code .= '1';
		echo '<img src="generarcodbarra/barcode.php?code='.$code.'&scale=1" />';
		echo '</td>';

	if($cant==3)
	{
		echo '</tr>';
		$cant = 0;
	}
}

?>
</body>
</html>