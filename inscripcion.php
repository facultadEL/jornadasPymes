<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>
    Inscripci&oacute;n
</title>
<meta name="keywords" content="HTML5, CSS3, Javascript"/>
<link rel="stylesheet" href="CSS/inscripcion.css">
<script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="jquery.mask.js" type="text/javascript"></script>
<script>

    function maskDni()
    {
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
        }
        $('#nrodni').mask(mascara);
    }

</script>
</head>
<body>
<?php
include_once "conexion.php";
?> 
<form id="form" name="formInscripcionJornada" method="post" action="guardarIncripcionJornada.php?idInscripto=0" enctype="multipart/form-data">
<table id="tabla" align="center">
    <tr>  
        <td colspan="2" id="tdTitulo"><strong><l1>Inscripci&oacute;n a Segundas Jornadas Nacionales para PyMEs de la UTN</l1></strong></td>
    </tr>
    <tr>
        <td id="tdTexto"><label>Nombre:</label></td>
        <td id="tdCampos"><input name="nombre" type="text" class="campos" value="<?=$nombre?>" size="30" maxlength="70" required autofocus/></td>
    </tr>
    <tr>
        <td id="tdTexto"><label>Apellido:</label></td>
        <td id="tdCampos"><input name="apellido" type="text" class="campos" value="<?=$apellido?>" size="30" maxlength="70" required/></td>
    </tr>
    <tr>
        <td id="tdTexto"><label>Tipo de Documento:</label></td>
        <td id="tdCampos">
            <label>
                <select size="1" class="campos" name="tipo_dni" required>
                <?php
                    $valores2 = pg_query("SELECT id,nombre FROM tipo_dni");                            
                        while($row=pg_fetch_array($valores2,NULL,PGSQL_ASSOC)){
                            $idCat = $row['id'];
                            $idCat = '"'.$idCat.'"';
                            echo "<option value=".$idCat."><label>".$row['nombre']."</label></option>";
                        }
                ?>
                </select>
            </label>
        </td>
    </tr>
    <tr>
        <td id="tdTexto"><label>N&deg; documento:</label></td>
        <td id="tdCampos"><input type="text" name="nrodni" id="nrodni" onkeyup="maskDni()" onfocus="this.value = '';" pattern="[0-9]{1,2}+[.]{1}[0-9]{3}+[.]{1}[0-9]{3}" class="campos" value="<?=$nrodni?>" size="30" maxlength="10" title="Ingrese su documento correctamente." required/></td>
    </tr>
    <tr>
        <td id="tdTexto"><label>Direcci&oacute;n:</label></td>
        <td id="tdCampos"><input name="direccion" type="text" class="campos" value="<?=$direccion?>" size="30" maxlength="60" required/></td>
    </tr>
    <tr>
        <td id="tdTexto"><label>N&uacute;mero:</label></td>
        <td id="tdCampos"><input pattern="[0-9]{2,6}" name="numero" type="text" class="campos" value="<?=$numero?>" size="30" maxlength="60" required/></td>
    </tr>
    <tr>
        <td id="tdTexto"><label>Piso:</label></td>
        <td id="tdCampos"><input name="piso" type="text" pattern="[0-9]{0,2}" class="campos" value="<?=$piso?>" size="30" maxlength="2"/></td>
    </tr>
    <tr>
        <td id="tdTexto"><label>Dpto:</label></td>
        <td id="tdCampos"><input name="dpto" type="text" class="campos" value="<?=$dpto?>" size="30" maxlength="3"/></td>
    </tr>
    <tr>
        <td id="tdTexto"><label>Localidad:</label></td>
        <td id="tdCampos"><input name="localidad" type="text" class="campos" value="<?=$localidad?>" size="30" maxlength="60" required/></td>
    </tr>
    <tr>
        <td id="tdTexto"><label>E-Mail:</label></td>
        <td id="tdCampos"><input name="mail" type="email" class="campos" value="<?=$mail?>" size="30" maxlength="70" novalidate required/></td>
    </tr>
    <tr>
        <td id="tdTexto"><label>Tel&eacute;fono Fijo:</label></td>
        <td id="tdCampos"><input name="telfijo" pattern="[1-9]{10}" placeholder="La característica sin 0" type="text" class="campos" value="<?=$telfijo?>" size="30" maxlength="30"/></td>
    </tr>
    <tr>
        <td id="tdTexto"><label>Tel&eacute;fono Celular:</label></td>
        <td id="tdCampos"><input name="telcel" pattern="[1-9]{1}[0-9]{9}" type="text" class="campos" placeholder="Sin 0 (cero) ni 15" value="<?=$telcel?>" size="30" maxlength="15" title="El n&uacute;mero de celular sin 0 (cero) ni 15 (quince)." required/></td>
    </tr>
    <tr>
        <td id="tdTexto"><label>Raz&oacute;n Social donde trabaja:</label></td>
        <td id="tdCampos"><input name="razon_social" type="text" class="campos" placeholder="Empresa donde trabaja" value="<?=$razon_social?>" size="30" maxlength="70" required/></td>
    </tr>
    <tr>
        <td id="tdTexto"><label>T&iacute;tulo Acad&eacute;mico:</label></td>
        <td id="tdCampos"><input name="titaca" type="text" class="campos" placeholder="Título de recibido" value="<?=$titaca?>" size="30" maxlength="70" required/></td>
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
        <td class="tdCampos"><input type="checkbox" name="actividad1" checked/></td>
    </tr>
    <tr>
        <td class="tdTexto"><label>Escenario actual de las Pymes</label></td>
        <td class="tdCampos"><input type="checkbox" name="actividad2" checked/></td>
    </tr>
    <tr>
        <td class="tdTexto"><label><l3>Rentabilidad de las pymes:</l3> el secreto no pasa por hacer más sino hacer lo correcto</label></td>
        <td class="tdCampos"><input type="checkbox" name="actividad3" checked/></td>
    </tr>
    <tr>
        <td class="tdTexto"><label><l3>De Villa María al Mundo:</l3> Como armar una red de representantes comerciales</label></td>
        <td class="tdCampos"><input type="checkbox" name="actividad4" checked/></td>
    </tr>
    <tr>
        <td class="tdTexto"><label><l3>De la idea al negocio:</l3> Como crear las condiciones para que tu idea termine en una Pyme</label></td>
        <td class="tdCampos"><input type="checkbox" name="actividad5" checked/></td>
    </tr>
    <tr>
        <td class="tdTexto"><label>Taller Experiencias Pymes/Graduados</label></td>
        <td class="tdCampos"><input type="checkbox" name="actividad6" checked/></td>
    </tr>
    <tr>
        <td class="tdTexto"><label><l3>Crecimiento, Delegaci&oacute;n y direcci&oacute;n en la Pymes:</l3> los roles del fundador – gerente general</label></td>
        <td class="tdCampos"><input type="checkbox" name="actividad7" checked/></td>
    </tr>
    <tr>
        <td class="tdTexto"><label>Como emprender con &eacute;xito en la Argentina. Cadena de valor</label></td>
        <td class="tdCampos"><input type="checkbox" name="actividad8" checked/></td>
    </tr>
    <tr>
        <td class="tdTexto"><label>Planificación en empresas de familia</label></td>
        <td class="tdCampos"><input type="checkbox" name="actividad9" checked/></td>
    </tr>
    <tr>
        <td class="tdTexto"><label>Lanzando nuestra Pyme al mundo Digital</label></td>
        <td class="tdCampos"><input type="checkbox" name="actividad10" checked/></td>
    </tr>
    <tr>
        <td class="tdTexto"><label>Taller Programa de fortalecimiento y Cr&eacute;ditos para Pymes</label></td>
        <td class="tdCampos"><input type="checkbox" name="actividad11" checked/></td>
    </tr>
    <tr>
        <td class="tdTexto"><label>Almuerzo Libre</label></td>
        <td class="tdCampos"><input type="checkbox" name="actividad12" checked/></td>
    </tr>
</table>
<table width="100%">
    <tr width="100%">
        <td width="100%" align="center"><input type="submit" name="Submit" id="Submit" value="Enviar" /></td>
    </tr>
</table>
</form>
</body>
</html>