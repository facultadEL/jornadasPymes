<?php
include_once "libreria.php";

$cuerpo = "
        <div align='left'>
            <div align='left'>
            ¡Hola <strong>".$nombre."</strong>!<br/><br/>
			
			Te has inscripto correctamente a las Jornadas para PyMEs de la UTN, que se llevarán a cabo los días miércoles 3 y jueves 4 de junio de 2015 a partir de las 14:00 hs. 
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
        $to = "eze.olea.f@gmail.com";

enviarMail($cuerpo,$asunto,$sendFrom,$from_name,$to);
?>