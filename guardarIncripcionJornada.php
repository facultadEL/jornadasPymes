<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<?php
include_once "conexion.php";
include_once "libreria.php";

$id_Inscripto = $_REQUEST['idInscripto'];
	if ($id_Inscripto == 0){
		$nombre = ucwords($_REQUEST['nombre']);
		$apellido = ucwords($_REQUEST['apellido']);
		$nrodni = $_REQUEST['nrodni'];
		$localidad = ucwords($_REQUEST['localidad']);
		$mail = $_REQUEST['mail'];
		$telfijo = (empty($_REQUEST['telfijo'])) ? '' : $_REQUEST['telfijo'];
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
		//$actividad11 = $_REQUEST['actividad11'];
		//$actividad12 = $_REQUEST['actividad12'];
		$actividad11 = off;
		$actividad12 = off;

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

		$traerId = traerId('inscripto');
		$cuerpo = "
        <div align='left'>
            <div align='left'>
            ¡Hola <strong>".$nombre."</strong>!<br/><br/>
			
			<strong>Te has inscripto correctamente a las Jornadas para PyMEs de la UTN</strong>, que se llevarán a cabo los días miércoles 3 y jueves 4 de junio de 2015 a partir de las 14:00 hs. 
			en la UTN de Villa María.<br/><br/>

			Te invitamos a conocer la agenda del evento y todos los detalles en <a href=".'"www.jornadaspymesutn.com.ar"'.">www.jornadaspymesutn.com.ar</a> <br/><br/>

			Recuerda asistir con tu DNI para que podamos entregarte tú certificado.<br/>
			También te recomendamos llevar tarjetas de presentación para sacar el máximo provecho de esta oportunidad única para ponerte en contacto con otros emprendedores y empresarios.<br/><br/>

			* Por favor, en caso de no poder asistir, notifícanos con tiempo a <a href=".'"mailto:info@jornadaspymesutn.com.ar" target="_top"'.">info@jornadaspymesutn.com.ar</a><br/><br/>

			<strong>¡Te esperamos!</strong>

            </div>
        </div>
        ";
        $asunto = "Jornadas PyMEs";
        $sendFrom = "extension@frvm.utn.edu.ar";
        $from_name = "Segundas Jornadas Pymes";
        $to = $mail;

		$newInscripto="INSERT INTO inscripto(nombre, apellido, nrodni, localidad, mail, telfijo, fechainscripto, actividad1, actividad2, actividad3, actividad4, actividad5, actividad6, actividad7, actividad8, actividad9, actividad10, actividad11, actividad12, tipo_dni)VALUES('$nombre','$apellido','$nrodni','$localidad','$mail','$telfijo','$fechainscripto','$actividad1','$actividad2','$actividad3','$actividad4','$actividad5','$actividad6','$actividad7','$actividad8','$actividad9','$actividad10','$actividad11','$actividad12',1);";
		$error = guardarSql($newInscripto);
				
		if ($error==1){
			echo '<script language="JavaScript"> 	alert("Los datos no se guardaron correctamente. Pongase en contacto con el administrador");</script>';
			//echo $errorpg;
		}else{
			enviarMail($cuerpo,$asunto,$sendFrom,$from_name,$to);
			echo '<script language="JavaScript"> alert("Verifique su casilla de mail, le enviamos un correo."); window.location = "inscripcion.php";</script>';
		}
	}else{
		//aca va el update

		$nombre = ucwords($_REQUEST['nombre']);
		$apellido = ucwords($_REQUEST['apellido']);
		$nrodni = $_REQUEST['nrodni'];
		$localidad = ucwords($_REQUEST['localidad']);
		$mail = $_REQUEST['mail'];
		$telfijo = $_REQUEST['telfijo'];
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
		//$actividad11 = $_REQUEST['actividad11'];
		//$actividad12 = $_REQUEST['actividad12'];
		$actividad11 = off;
		$actividad12 = off;

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

		$modifInscripto="UPDATE inscripto SET nombre='$nombre', apellido='$apellido', nrodni='$nrodni', localidad='$localidad', mail='$mail', telfijo='$telfijo', actividad1='$actividad1', actividad2='$actividad2', actividad3='$actividad3', actividad4='$actividad4', actividad5='$actividad5', actividad6='$actividad6', actividad7='$actividad7', actividad8='$actividad8', actividad9='$actividad9', actividad10='$actividad10', actividad11='$actividad11', actividad12='$actividad12' WHERE id = $id_Inscripto;";

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
}
?>
</body>
</html>