<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<?php
include_once "conexion.php";

$id_Inscripto = $_REQUEST['idInscripto'];
	if ($id_Inscripto == 0){
		$nombre = ucwords($_REQUEST['nombre']);
		$apellido = ucwords($_REQUEST['apellido']);
		$tipo_dni = $_REQUEST['tipo_dni'];
		$nrodni = $_REQUEST['nrodni'];
		$direccion = ucwords($_REQUEST['direccion']);
		$numero = $_REQUEST['numero'];
		$piso = $_REQUEST['piso'];
		$dpto = $_REQUEST['dpto'];
		$localidad = ucwords($_REQUEST['localidad']);
		$mail = $_REQUEST['mail'];
		$telfijo = $_REQUEST['telfijo'];
		$telcel = ucwords($_REQUEST['telcel']);
		$razon_social = $_REQUEST['razon_social'];
		$titaca = $_REQUEST['titaca'];
		$fechainscripto = date('Ymd');
		$martes = $_REQUEST['martes'];
		$jueves = $_REQUEST['jueves'];
		if ($martes == on) {
			$martes = 'TRUE';
		}else{
			$martes = 'FALSE';
		}
		if ($jueves == on) {
			$jueves = 'TRUE';
		}else{
			$jueves = 'FALSE';
		}
		$info = ucfirst($_REQUEST['info']);

		$newInscripto="INSERT INTO inscripto(nombre, apellido, tipo_dni, nrodni, direccion, numero, piso, dpto, localidad, mail, telfijo, telcel, razon_social, titaca, fechainscripto, martes, jueves, info)VALUES('$nombre','$apellido','$tipo_dni','$nrodni','$direccion','$numero','$piso','$dpto','$localidad','$mail','$telfijo','$telcel','$razon_social','$titaca','$fechainscripto','$martes','$jueves','$info');";
			$error=0;
			if (!pg_query($conn, $newInscripto)){
				$errorpg = pg_last_error($conn);
				$termino = "ROLLBACK";
				$error=1;
			}else{
				$termino = "COMMIT";
			}
		   pg_query($termino);

				
		if ($error==1){
			echo '<script language="JavaScript"> 	alert("Los datos no se guardaron correctamente. Pongase en contacto con el administrador");</script>';
			//echo $errorpg;
		}else{
			echo '<script language="JavaScript"> alert("Los datos se guardaron correctamente."); window.location = "inscripcion.php";</script>';
		}
	}else{
		//aca va el update

		$nombre = ucwords($_REQUEST['nombre']);
		$apellido = ucwords($_REQUEST['apellido']);
		$tipo_dni = $_REQUEST['tipo_dni'];
		$nrodni = $_REQUEST['nrodni'];
		$direccion = ucwords($_REQUEST['direccion']);
		$numero = $_REQUEST['numero'];
		$piso = $_REQUEST['piso'];
		$dpto = $_REQUEST['dpto'];
		$localidad = ucwords($_REQUEST['localidad']);
		$mail = $_REQUEST['mail'];
		$telfijo = $_REQUEST['telfijo'];
		$telcel = ucwords($_REQUEST['telcel']);
		$razon_social = $_REQUEST['razon_social'];
		$titaca = $_REQUEST['titaca'];
		$fechainscripto = date('Ymd');
		$martes = $_REQUEST['martes'];
		$jueves = $_REQUEST['jueves'];
		if ($martes == on) {
			$martes = 'TRUE';
		}else{
			$martes = 'FALSE';
		}
		if ($jueves == on) {
			$jueves = 'TRUE';
		}else{
			$jueves = 'FALSE';
		}
		$info = ucfirst($_REQUEST['info']);

		$modifInscripto="UPDATE inscripto SET nombre='$nombre', apellido='$apellido', tipo_dni='$tipo_dni', nrodni='$nrodni', direccion='$direccion', numero='$numero',piso='$piso', dpto='$dpto', localidad='$localidad', mail='$mail', telfijo='$telfijo', telcel='$telcel', razon_social='$razon_social', titaca='$titaca', fechainscripto='$fechainscripto', martes='$martes', jueves='$jueves', info='$info' WHERE id = $id_Inscripto;";

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
			echo '<script language="JavaScript"> alert("Los datos se actualizaron correctamente."); window.location = "inscripcion.php";</script>';
		}
}
?>
</body>
</html>