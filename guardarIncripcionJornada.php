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
		$actividad1 = $_REQUEST['actividad1'];
		$actividad2 = $_REQUEST['actividad2'];
		$actividad3 = $_REQUEST['actividad3'];
		$actividad4 = $_REQUEST['actividad4'];
		$actividad5 = $_REQUEST['actividad5'];
		$actividad6 = $_REQUEST['actividad6'];
		$actividad7 = $_REQUEST['actividad7'];
		$actividad8 = $_REQUEST['actividad8'];
		$actividad9 = $_REQUEST['actividad9'];
		$actividad10 = $_REQUEST['actividad10'];
		$actividad11 = $_REQUEST['actividad11'];
		$actividad12 = $_REQUEST['actividad12'];

		if ($actividad1 == on) {
			$actividad1 = 'TRUE';
		}else{
			$actividad1 = 'FALSE';
		}
		if ($actividad2 == on) {
			$actividad2 = 'TRUE';
		}else{
			$actividad2 = 'FALSE';
		}
		if ($actividad3 == on) {
			$actividad3 = 'TRUE';
		}else{
			$actividad3 = 'FALSE';
		}
		if ($actividad4 == on) {
			$actividad4 = 'TRUE';
		}else{
			$actividad4 = 'FALSE';
		}
		if ($actividad5 == on) {
			$actividad5 = 'TRUE';
		}else{
			$actividad5 = 'FALSE';
		}
		if ($actividad6 == on) {
			$actividad6 = 'TRUE';
		}else{
			$actividad6 = 'FALSE';
		}
		if ($actividad7 == on) {
			$actividad7 = 'TRUE';
		}else{
			$actividad7 = 'FALSE';
		}
		if ($actividad8 == on) {
			$actividad8 = 'TRUE';
		}else{
			$actividad8 = 'FALSE';
		}
		if ($actividad9 == on) {
			$actividad9 = 'TRUE';
		}else{
			$actividad9 = 'FALSE';
		}
		if ($actividad10 == on) {
			$actividad10 = 'TRUE';
		}else{
			$actividad10 = 'FALSE';
		}
		if ($actividad11 == on) {
			$actividad11 = 'TRUE';
		}else{
			$actividad11 = 'FALSE';
		}
		if ($actividad12 == on) {
			$actividad12 = 'TRUE';
		}else{
			$actividad12 = 'FALSE';
		}
		$info = ucfirst($_REQUEST['info']);

		$newInscripto="INSERT INTO inscripto(nombre, apellido, tipo_dni, nrodni, direccion, numero, piso, dpto, localidad, mail, telfijo, telcel, razon_social, titaca, fechainscripto, info, actividad1, actividad2, actividad3, actividad4, actividad5, actividad6, actividad7, actividad8, actividad9, actividad10, actividad11, actividad12)VALUES('$nombre','$apellido','$tipo_dni','$nrodni','$direccion','$numero','$piso','$dpto','$localidad','$mail','$telfijo','$telcel','$razon_social','$titaca','$fechainscripto','$info','$actividad1','$actividad2','$actividad3','$actividad4','$actividad5','$actividad6','$actividad7','$actividad8','$actividad9','$actividad10','$actividad11','$actividad12');";
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
		$actividad1 = $_REQUEST['actividad1'];
		$actividad2 = $_REQUEST['actividad2'];
		$actividad3 = $_REQUEST['actividad3'];
		$actividad4 = $_REQUEST['actividad4'];
		$actividad5 = $_REQUEST['actividad5'];
		$actividad6 = $_REQUEST['actividad6'];
		$actividad7 = $_REQUEST['actividad7'];
		$actividad8 = $_REQUEST['actividad8'];
		$actividad9 = $_REQUEST['actividad9'];
		$actividad10 = $_REQUEST['actividad10'];
		$actividad11 = $_REQUEST['actividad11'];
		$actividad12 = $_REQUEST['actividad12'];

		if ($actividad1 == on) {
			$actividad1 = 'TRUE';
		}else{
			$actividad1 = 'FALSE';
		}
		if ($actividad2 == on) {
			$actividad2 = 'TRUE';
		}else{
			$actividad2 = 'FALSE';
		}
		if ($actividad3 == on) {
			$actividad3 = 'TRUE';
		}else{
			$actividad3 = 'FALSE';
		}
		if ($actividad4 == on) {
			$actividad4 = 'TRUE';
		}else{
			$actividad4 = 'FALSE';
		}
		if ($actividad5 == on) {
			$actividad5 = 'TRUE';
		}else{
			$actividad5 = 'FALSE';
		}
		if ($actividad6 == on) {
			$actividad6 = 'TRUE';
		}else{
			$actividad6 = 'FALSE';
		}
		if ($actividad7 == on) {
			$actividad7 = 'TRUE';
		}else{
			$actividad7 = 'FALSE';
		}
		if ($actividad8 == on) {
			$actividad8 = 'TRUE';
		}else{
			$actividad8 = 'FALSE';
		}
		if ($actividad9 == on) {
			$actividad9 = 'TRUE';
		}else{
			$actividad9 = 'FALSE';
		}
		if ($actividad10 == on) {
			$actividad10 = 'TRUE';
		}else{
			$actividad10 = 'FALSE';
		}
		if ($actividad11 == on) {
			$actividad11 = 'TRUE';
		}else{
			$actividad11 = 'FALSE';
		}
		if ($actividad12 == on) {
			$actividad12 = 'TRUE';
		}else{
			$actividad12 = 'FALSE';
		}
		$info = ucfirst($_REQUEST['info']);

		$modifInscripto="UPDATE inscripto SET nombre='$nombre', apellido='$apellido', tipo_dni='$tipo_dni', nrodni='$nrodni', direccion='$direccion', numero='$numero',piso='$piso', dpto='$dpto', localidad='$localidad', mail='$mail', telfijo='$telfijo', telcel='$telcel', razon_social='$razon_social', titaca='$titaca', fechainscripto='$fechainscripto', info='$info', actividad1='$actividad1', actividad2='$actividad2', actividad3='$actividad3', actividad4='$actividad4', actividad5='$actividad5', actividad6='$actividad6', actividad7='$actividad7', actividad8='$actividad8', actividad9='$actividad9', actividad10='$actividad10', actividad11='$actividad11', actividad12='$actividad12' WHERE id = $id_Inscripto;";

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