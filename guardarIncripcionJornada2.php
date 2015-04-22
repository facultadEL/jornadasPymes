<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<?php
include_once "conexion.php";

$id_Inscripto = $_REQUEST['idInscripto'];
	$direccion = ucwords($_REQUEST['direccion']);
	$numero = $_REQUEST['numero'];
	$piso = $_REQUEST['piso'];
	$dpto = $_REQUEST['dpto'];
	$razon_social = $_REQUEST['razon_social'];
	$titaca = $_REQUEST['titaca'];
	$info = ucfirst($_REQUEST['info']);

	$modifInscripto="UPDATE inscripto SET direccion='$direccion', numero='$numero',piso='$piso', dpto='$dpto', razon_social='$razon_social', titaca='$titaca', info='$info' WHERE id = $id_Inscripto;";

		$error=0;

		if (!pg_query($conn, $modifInscripto)){
			$errorpg = pg_last_error($conn);
			$termino = "ROLLBACK";
			$error=1;
		}else{
			$termino = "COMMIT";
		}
	   pg_query($termino);
			
	if ($error==1){
		echo '<script language="JavaScript"> alert("Los datos no se modificaron correctamente. Pongase en contacto con el administrador");</script>';
	}else{
		echo '<script language="JavaScript"> alert("Los datos se actualizaron correctamente."); window.location = "consultaInscripciones.php";</script>';
	}

?>
</body>
</html>