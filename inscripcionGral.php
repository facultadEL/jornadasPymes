<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>
    Inscripci&oacute;n
</title>
<meta name="keywords" content="HTML5, CSS3, Javascript"/>
<link rel="stylesheet" href="css/inscripcionGral.css">
<script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="jquery.mask.js" type="text/javascript"></script>
<script>

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

</script>
</head>
<body>
<?php
include_once "conexion.php";
include_once "libreria.php";

$id_Inscripto = $_REQUEST['idInscripto'];

if ($id_Inscripto != 0 || $id_Inscripto != NULL) {
    $consultaSql = traerSqlCondicion('nombre, apellido, tipo_dni, nrodni, direccion, numero, piso, dpto, localidad, mail, telfijo, telcel, razon_social, titaca, info, actividad1, actividad2, actividad3, actividad4, actividad5, actividad6, actividad7, actividad8, actividad9, actividad10, actividad11, actividad12','inscripto','id='.$id_Inscripto);
    $rowInscripto=pg_fetch_array($consultaSql,NULL,PGSQL_ASSOC);
        $nombre = $rowInscripto['nombre'];
        $apellido = $rowInscripto['apellido'];
        $tipo_dni = $rowInscripto['tipo_dni'];
        $nrodni = $rowInscripto['nrodni'];
        $direccion = $rowInscripto['direccion'];
        $numero = $rowInscripto['numero'];
        $piso = $rowInscripto['piso'];
        $dpto = $rowInscripto['dpto'];
        $localidad = $rowInscripto['localidad'];
        $mail = $rowInscripto['mail'];
        $telfijo = $rowInscripto['telfijo'];
        $telcel = $rowInscripto['telcel'];
        $razon_social = $rowInscripto['razon_social'];
        $titaca = $rowInscripto['titaca'];
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
        $info = $rowInscripto['info'];
}
?> 
<form id="form" name="formInscripcionJornada" method="post" action="guardarIncripcionJornada.php?idInscripto=<?php echo $id_Inscripto;?>" enctype="multipart/form-data">
<div id="tablaGral">
<table id="tabla" align="center">
    <tr>  
        <td colspan="2" id="tdTitulo"><strong><l1>Inscripci&oacute;n a Segundas Jornadas Nacionales para PyMEs de la UTN</l1></strong></td>
    </tr>
    <tr>
        <td id="tdTexto"><label>Nombre:</label></td>
        <td id="tdCampos"><input name="nombre" type="text" class="campos" value="<?php echo $nombre;?>" size="30" maxlength="70" required autofocus/></td>
    </tr>
    <tr>
        <td id="tdTexto"><label>Apellido:</label></td>
        <td id="tdCampos"><input name="apellido" type="text" class="campos" value="<?php echo $apellido;?>" size="30" maxlength="70" required/></td>
    </tr>
    <tr>
        <td id="tdTexto"><label>Tipo de Documento:</label></td>
        <td id="tdCampos">
            <label>
                <select size="1" class="campos" name="tipo_dni" required>
                <?php
                    $traerTipoDni = traerSql('id,nombre','tipo_dni');
                    while($rowTipo=pg_fetch_array($traerTipoDni,NULL,PGSQL_ASSOC)){
                        $idBD = $rowTipo['id'];
                        if ($idBD == $tipo_dni) {
                            echo "<option value=".$idBD." selected><label>".$rowTipo['nombre']."</label></option>";
                        }else{
                            echo "<option value=".$idBD."><label>".$rowTipo['nombre']."</label></option>";
                        }
                    }
                ?>
                </select>
            </label>
        </td>
    </tr>
    <tr>
        <td id="tdTexto"><label>N&deg; documento:</label></td>
        <!-- <td id="tdCampos"><input type="text" name="nrodni" id="nrodni" onkeyup="maskDni()" onfocus="this.value = '';" pattern="[0-9]{1,2}+[.]{1}[0-9]{3}+[.]{1}[0-9]{3}" class="campos" value="<?php //echo $nrodni;?>" size="30" maxlength="10" title="Ingrese su documento correctamente." required/></td> -->
        <td id="tdCampos"><input type="text" name="nrodni" id="nrodni" onkeyup="maskDni()" pattern="[0-9]{1,2}+[.]{1}[0-9]{3}+[.]{1}[0-9]{3}" class="campos" value="<?php echo $nrodni;?>" size="30" maxlength="10" title="Ingrese su documento correctamente." required/></td>
    </tr>
    <tr>
        <td id="tdTexto"><label>Direcci&oacute;n:</label></td>
        <td id="tdCampos"><input name="direccion" type="text" class="campos" value="<?php echo $direccion;?>" size="30" maxlength="60" required/></td>
    </tr>
    <tr>
        <td id="tdTexto"><label>N&uacute;mero:</label></td>
        <td id="tdCampos"><input pattern="[0-9]{2,6}" name="numero" type="text" class="campos" value="<?php echo $numero;?>" size="30" maxlength="60" required/></td>
    </tr>
    <tr>
        <td id="tdTexto"><label>Piso:</label></td>
        <td id="tdCampos"><input name="piso" type="text" pattern="[0-9]{0,2}" class="campos" value="<?php echo $piso;?>" size="30" maxlength="2"/></td>
    </tr>
    <tr>
        <td id="tdTexto"><label>Dpto:</label></td>
        <td id="tdCampos"><input name="dpto" type="text" class="campos" value="<?php echo $dpto;?>" size="30" maxlength="3"/></td>
    </tr>
    <tr>
        <td id="tdTexto"><label>Localidad:</label></td>
        <td id="tdCampos"><input name="localidad" type="text" class="campos" value="<?php echo $localidad;?>" size="30" maxlength="60" required/></td>
    </tr>
    <tr>
        <td id="tdTexto"><label>E-Mail:</label></td>
        <td id="tdCampos"><input name="mail" type="email" class="campos" value="<?php echo $mail;?>" size="30" maxlength="70" novalidate required/></td>
    </tr>
    <tr>
        <td id="tdTexto"><label>Tel&eacute;fono Fijo:</label></td>
        <td id="tdCampos"><input name="telfijo" pattern="[1-9]{10}" placeholder="La característica sin 0" type="text" class="campos" value="<?php echo $telfijo;?>" size="30" maxlength="30"/></td>
    </tr>
    <tr>
        <td id="tdTexto"><label>Tel&eacute;fono Celular:</label></td>
        <td id="tdCampos"><input name="telcel" pattern="[1-9]{1}[0-9]{9}" type="text" class="campos" placeholder="Sin 0 (cero) ni 15" value="<?php echo $telcel;?>" size="30" maxlength="15" title="El n&uacute;mero de celular sin 0 (cero) ni 15 (quince)." required/></td>
    </tr>
    <tr>
        <td id="tdTexto"><label>Raz&oacute;n Social donde trabaja:</label></td>
        <td id="tdCampos"><input name="razon_social" type="text" class="campos" placeholder="Empresa donde trabaja" value="<?php echo $razon_social;?>" size="30" maxlength="70" required/></td>
    </tr>
    <tr>
        <td id="tdTexto"><label>T&iacute;tulo Acad&eacute;mico:</label></td>
        <td id="tdCampos"><input name="titaca" type="text" class="campos" placeholder="Título de recibido" value="<?php echo $titaca;?>" size="30" maxlength="70" required/></td>
    </tr>
    <tr>
        <td id="tdTexto"><label>&iquest;C&oacute;mo te enteraste de las Jornadas?</label></td>
        <td id="tdCampos"><input name="info" type="text" class="campos" value="<?php echo $info?>" size="30"/></td>
    </tr>
</table>
<table id="tabla2" align="center">
    <tr>  
        <td colspan="2" class="tdTitulo"><strong><l1>Programa de Actividades</l1></strong><br><l2>*Desmarque a las actividades que no asistir&aacute;</l2></td>
    </tr>
<!--     <tr>
    	<td colspan="2" class="tdSubTitulo"><l2>Desmarque a las actividades que no asistir&aacute;</l2></td>
    </tr> -->
    <tr>
        <td class="tdTexto"><label>Apertura de la Segunda Jornada para Pymes</label></td>
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
        <td class="tdTexto"><label>Escenario actual de las Pymes</label></td>
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
        <td class="tdTexto"><label><l3>Rentabilidad de las pymes:</l3> el secreto no pasa por hacer más sino hacer lo correcto</label></td>
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
        <td class="tdTexto"><label>Taller Experiencias Pymes/Graduados</label></td>
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
        <td class="tdTexto"><label><l3>Crecimiento, Delegaci&oacute;n y direcci&oacute;n en la Pymes:</l3> los roles del fundador – gerente general</label></td>
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
        <td class="tdTexto"><label>Como emprender con &eacute;xito en la Argentina. Cadena de valor</label></td>
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
    <tr>
        <td class="tdTexto"><label>Taller Programa de fortalecimiento y Cr&eacute;ditos para Pymes</label></td>
        <?php
            if ($id_Inscripto != NULL) {
                if ($actividad11 == 't') {
                    echo '<td class="tdCampos"><input type="checkbox" name="actividad11" checked/></td>';
                }else{
                    echo '<td class="tdCampos"><input type="checkbox" name="actividad11"/></td>';
                }
            }else{
                echo '<td class="tdCampos"><input type="checkbox" name="actividad11" checked/></td>';
            }
        ?>
    </tr>
    <tr>
        <td class="tdTexto"><label>Almuerzo Libre</label></td>
        <?php
            if ($id_Inscripto != NULL) {
                if ($actividad12 == 't') {
                    echo '<td class="tdCampos"><input type="checkbox" name="actividad12" checked/></td>';
                }else{
                    echo '<td class="tdCampos"><input type="checkbox" name="actividad12"/></td>';
                }
            }else{
                echo '<td class="tdCampos"><input type="checkbox" name="actividad12" checked/></td>';
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