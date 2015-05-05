<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<?php
include_once "conexion.php";
include_once "libreria.php";

$cuerpo = "
        <div align='left'>
            <div align='left'>
                <strong>Inscripci&oacute;n a Segundas Jornadas Nacionales para PyMEs de la UTN</strong><br/><br/>

                Su registro ha sido completado con &eacute;xito.<br/><br />
                
                Muchas Gracias.
                <br />
            </div>
        </div>
        ";

$asunto = "Recordario Jornadas PyMEs";

$sqlCount = pg_query("SELECT count(id) AS ".'"contar"'." FROM inscripto WHERE avisado IS FALSE AND mail IS NOT NULL AND mail != ''");
$rowCount = pg_fetch_array($sqlCount);
if($rowCount['contar'] != 0)
{
	$sql = pg_query("SELECT id,mail FROM inscripto WHERE avisado IS FALSE AND mail IS NOT NULL AND mail != '' LIMIT 5");

	$mails = '';
	while($row = pg_fetch_array($sql))
	{

	        
	        $sendFrom = "extension@frvm.utn.edu.ar";
	        $from_name = "Segundas Jornadas Pymes";
	        $to = $row['mail'];
			
			//enviarMail($cuerpo,$asunto,$sendFrom,$from_name,$to);

			$id = $row['id'];
			pg_query("UPDATE inscripto SET AVISADO=TRUE WHERE id=$id");
			$mails .= $to.'/--/';
	}
}


echo $rowCount['contar'];
?>
</body>
</html>