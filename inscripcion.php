<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>
    Inscripci&oacute;n
</title>
<meta name="keywords" content="HTML5, CSS3, Javascript"/>
<link rel="stylesheet" href="css/inscripcion.css">
<script type='text/javascript' src="jquery.min-1.9.1.js"></script>
<script src="jquery.mask.js" type="text/javascript"></script>
<script>
	var dniDictionary = [];

    function maskDni()
    {
    	var mascara;
        valDni = $('#nrodni').val();
        switch(valDni.length)
        {
            case 7:
            case 9:
                mascara = "0.000.000";
                break;
            case 8:
            case 10:
                mascara = "00.000.000";
                break;
            default:
            	mascara = null;
        }
        if(mascara != null)
        {
        	$('#nrodni').mask(mascara);
        }
    }

    function setDNI(dniToSet)
		{
			dniDictionary.push(dniToSet);
		}

		function checkDNI()
		{
			var dni_buscar = $('#nrodni').val();
			if($.inArray(dni_buscar, dniDictionary) != -1)
			{
				alert("Usted ya se encuentra registrado");
				$('#nrodni').val("");
				$('#nrodni').focus();
			}
		}

</script>
</head>
<body>
<?php
include_once "conexion.php";
include_once "libreria.php";

$id_Inscripto = $_REQUEST['idInscripto'];

if ($id_Inscripto != 0 || $id_Inscripto != NULL) {
    $consultaSql = traerSqlCondicion('nombre, apellido, nrodni, localidad, mail, telfijo, actividad1, actividad2, actividad3, actividad4, actividad5, actividad6, actividad7, actividad8, actividad9, actividad10, actividad11, actividad12','inscripto','id='.$id_Inscripto);
    $rowInscripto=pg_fetch_array($consultaSql,NULL,PGSQL_ASSOC);
        $nombre = $rowInscripto['nombre'];
        $apellido = $rowInscripto['apellido'];
        $nrodni = $rowInscripto['nrodni'];
        $localidad = $rowInscripto['localidad'];
        $mail = $rowInscripto['mail'];
        $tel = $rowInscripto['telfijo'];
        $actividad1 = $rowInscripto['actividad1'];
        $actividad2 = $rowInscripto['actividad2'];
        $actividad3 = $rowInscripto['actividad3'];
        $actividad4 = $rowInscripto['actividad4'];
        $actividad5 = $rowInscripto['actividad5'];
        $actividad6 = $rowInscripto['actividad6'];
        $actividad7 = $rowInscripto['actividad7'];
        $actividad8 = $rowInscripto['actividad8'];
        $actividad9 = $rowInscripto['actividad9'];
        $actividad10 = $rowInscripto['actividad10'];
        $actividad11 = $rowInscripto['actividad11'];
        $actividad12 = $rowInscripto['actividad12'];
}

$verificarDNI=pg_query("SELECT nrodni FROM inscripto;");
	while($rowVerifDNI=pg_fetch_array($verificarDNI,NULL,PGSQL_ASSOC)){
		echo "<script>setDNI('".$rowVerifDNI['nrodni']."')</script>";
	}
?> 
<form id="form" name="formInscripcionJornada" method="post" action="guardarIncripcionJornada.php?idInscripto=<?php echo $id_Inscripto;?>" enctype="multipart/form-data">
<div id="tablaGral">
<table id="tabla">
    <tr>  
        <td colspan="4" id="tdTitulo"><strong><l1>Inscripci&oacute;n a Segundas Jornadas Nacionales para PyMEs de la UTN</l1></strong></td>
    </tr>
    <tr>
        <td id="tdTexto"><label>Nombre:</label></td>
        <td id="tdCampos"><input name="nombre" type="text" class="campos" value="<?php echo $nombre;?>" maxlength="70" required autofocus/></td>
    
        <td id="tdTexto"><label>Apellido:</label></td>
        <td id="tdCampos"><input name="apellido" type="text" class="campos" value="<?php echo $apellido;?>" maxlength="70" required/></td>
    </tr>
    <tr>
        <td id="tdTexto"><label>N&deg; documento:</label></td>
        <!-- <td id="tdCampos"><input type="text" name="nrodni" id="nrodni" onkeyup="maskDni()" onfocus="this.value = '';" pattern="[0-9]{1,2}+[.]{1}[0-9]{3}+[.]{1}[0-9]{3}" class="campos" value="<?php //echo $nrodni;?>" size="30" maxlength="10" title="Ingrese su documento correctamente." required/></td> -->
        <td id="tdCampos"><input type="text" name="nrodni" id="nrodni" onkeyup="maskDni()" onchange="checkDNI();" pattern="[0-9]{1,2}+[.]{1}[0-9]{3}+[.]{1}[0-9]{3}" class="campos" value="<?php echo $nrodni;?>" size="30" maxlength="10" title="Ingrese su documento correctamente." autocomplete="off" required/></td>
    
        <td id="tdTexto"><label>Localidad:</label></td>
        <td id="tdCampos"><input name="localidad" type="text" class="campos" value="<?php echo $localidad;?>" size="30" maxlength="60" required/></td>
    </tr>
    <tr>
        <td id="tdTexto"><label>E-Mail:</label></td>
        <td id="tdCampos"><input name="mail" type="email" class="campos" value="<?php echo $mail;?>" size="30" maxlength="70" novalidate required/></td>
    
        <td id="tdTexto"><label>Tel&eacute;fono:</label></td>
        <td id="tdCampos"><input name="telfijo" pattern="[0-9]{6,15}" type="text" class="campos" value="<?php echo $telfijo;?>" size="30" maxlength="15"/></td>
    </tr>
</table>
<table id="tabla2">
    <tr>  
        <td colspan="2" class="tdTitulo"><strong><l1>Programa de Actividades</l1></strong><br><l2>*Desmarque a las actividades que no asistir&aacute;</l2></td>
    </tr>
<!--     <tr>
    	<td colspan="2" class="tdSubTitulo"><l2>Desmarque a las actividades que no asistir&aacute;</l2></td>
    </tr> -->
    <tr>
        <td class="tdTexto"><label>Escenario actual de las Pymes</label></td>
        <?php
            if ($id_Inscripto != NULL) {
                if ($actividad1 == 't') {
                    echo '<td class="tdCampos"><input type="checkbox" name="actividad1" checked/></td>';
                }else{
                    echo '<td class="tdCampos"><input type="checkbox" name="actividad1"/></td>';
                }
            }else{
                echo '<td class="tdCampos"><input type="checkbox" name="actividad1" checked/></td>';
            }
        ?>
    </tr>
    <tr>
        <td class="tdTexto"><label><l3>Rentabilidad de las pymes:</l3> el secreto no pasa por hacer más sino hacer lo correcto</label></td>
        <?php
            if ($id_Inscripto != NULL) {
                if ($actividad2 == 't') {
                    echo '<td class="tdCampos"><input type="checkbox" name="actividad2" checked/></td>';
                }else{
                    echo '<td class="tdCampos"><input type="checkbox" name="actividad2"/></td>';
                }
            }else{
                echo '<td class="tdCampos"><input type="checkbox" name="actividad2" checked/></td>';
            }
        ?>
    </tr>
    <tr>
        <td class="tdTexto"><label>Taller Experiencias Casos Exitosos UTN</label></td>
        <?php
            if ($id_Inscripto != NULL) {
                if ($actividad3 == 't') {
                    echo '<td class="tdCampos"><input type="checkbox" name="actividad3" checked/></td>';
                }else{
                    echo '<td class="tdCampos"><input type="checkbox" name="actividad3"/></td>';
                }
            }else{
                echo '<td class="tdCampos"><input type="checkbox" name="actividad3" checked/></td>';
            }
        ?>
    </tr>
    <tr>
        <td class="tdTexto"><label><l3>De Villa María al Mundo:</l3> Como armar una red de representantes comerciales</label></td>
        <?php
            if ($id_Inscripto != NULL) {
                if ($actividad4 == 't') {
                    echo '<td class="tdCampos"><input type="checkbox" name="actividad4" checked/></td>';
                }else{
                    echo '<td class="tdCampos"><input type="checkbox" name="actividad4"/></td>';
                }
            }else{
                echo '<td class="tdCampos"><input type="checkbox" name="actividad4" checked/></td>';
            }
        ?>
    </tr>
    <tr>
        <td class="tdTexto"><label><l3>De la idea al negocio:</l3> Como crear las condiciones para que tu idea termine en una Pyme</label></td>
        <?php
            if ($id_Inscripto != NULL) {
                if ($actividad5 == 't') {
                    echo '<td class="tdCampos"><input type="checkbox" name="actividad5" checked/></td>';
                }else{
                    echo '<td class="tdCampos"><input type="checkbox" name="actividad5"/></td>';
                }
            }else{
                echo '<td class="tdCampos"><input type="checkbox" name="actividad5" checked/></td>';
            }
        ?>
    </tr>
    <tr>
        <td class="tdTexto"><label><l3>Crecimiento, Delegaci&oacute;n y direcci&oacute;n en las Pymes:</l3> Los roles del Fundador - Gerente General</label></td>
        <?php
            if ($id_Inscripto != NULL) {
                if ($actividad6 == 't') {
                    echo '<td class="tdCampos"><input type="checkbox" name="actividad6" checked/></td>';
                }else{
                    echo '<td class="tdCampos"><input type="checkbox" name="actividad6"/></td>';
                }
            }else{
                echo '<td class="tdCampos"><input type="checkbox" name="actividad6" checked/></td>';
            }
        ?>
    </tr>
    <tr>
        <td class="tdTexto"><label><l3>Como emprender con &eacute;xito en la Argentina. Cadena de valor</label></td>
        <?php
            if ($id_Inscripto != NULL) {
                if ($actividad7 == 't') {
                    echo '<td class="tdCampos"><input type="checkbox" name="actividad7" checked/></td>';
                }else{
                    echo '<td class="tdCampos"><input type="checkbox" name="actividad7"/></td>';
                }
            }else{
                echo '<td class="tdCampos"><input type="checkbox" name="actividad7" checked/></td>';
            }
        ?>
    </tr>
    <tr>
        <td class="tdTexto"><label>Taller Programa de Financiamiento y Creditos para Pymes</label></td>
        <?php
            if ($id_Inscripto != NULL) {
                if ($actividad8 == 't') {
                    echo '<td class="tdCampos"><input type="checkbox" name="actividad8" checked/></td>';
                }else{
                    echo '<td class="tdCampos"><input type="checkbox" name="actividad8"/></td>';
                }
            }else{
                echo '<td class="tdCampos"><input type="checkbox" name="actividad8" checked/></td>';
            }
        ?>
    </tr>
    <tr>
        <td class="tdTexto"><label>Planificación en empresas de familia</label></td>
        <?php
            if ($id_Inscripto != NULL) {
                if ($actividad9 == 't') {
                    echo '<td class="tdCampos"><input type="checkbox" name="actividad9" checked/></td>';
                }else{
                    echo '<td class="tdCampos"><input type="checkbox" name="actividad9"/></td>';
                }
            }else{
                echo '<td class="tdCampos"><input type="checkbox" name="actividad9" checked/></td>';
            }
        ?>
    </tr>
    <tr>
        <td class="tdTexto"><label>Lanzando nuestra Pyme al mundo Digital</label></td>
        <?php
            if ($id_Inscripto != NULL) {
                if ($actividad10 == 't') {
                    echo '<td class="tdCampos"><input type="checkbox" name="actividad10" checked/></td>';
                }else{
                    echo '<td class="tdCampos"><input type="checkbox" name="actividad10"/></td>';
                }
            }else{
                echo '<td class="tdCampos"><input type="checkbox" name="actividad10" checked/></td>';
            }
        ?>
    </tr>
</table>
</div>
<table width="100%">
    <tr width="100%">
        <?php
            if ($id_Inscripto != 0 || $id_Inscripto != NULL) {
                echo '<td width="50%" align="right"><a href="verInscripto.php?idInscripto='.$id_Inscripto.'"><input type="button" name="cancelar" id="btn_cancelar" value="Cancelar" /></a></td>';
                echo '<td width="50%" align="left"><input type="submit" name="Submit" id="btn_confirmar" value="Confirmar" /></td>';
            }else{
                echo '<td width="100%" align="center"><input type="submit" name="Submit" id="Submit" value="Enviar" /></td>';
            }
        ?>
    </tr>
</table>
</form>
</body>
</html>