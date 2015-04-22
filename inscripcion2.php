<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>
    Inscripci&oacute;n
</title>
<meta name="keywords" content="HTML5, CSS3, Javascript"/>
<link rel="stylesheet" href="css/inscripcion2.css">
<script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<body>
<?php
include_once "conexion.php";
include_once "libreria.php";

$id_Inscripto = $_REQUEST['idInscripto'];

if ($id_Inscripto != 0 || $id_Inscripto != NULL) {
    $consultaSql = traerSqlCondicion('direccion, numero, piso, dpto, localidad, razon_social, titaca, info','inscripto','id='.$id_Inscripto);
    $rowInscripto=pg_fetch_array($consultaSql,NULL,PGSQL_ASSOC);
        $direccion = $rowInscripto['direccion'];
        $numero = $rowInscripto['numero'];
        $piso = $rowInscripto['piso'];
        $dpto = $rowInscripto['dpto'];
        $razon_social = $rowInscripto['razon_social'];
        $titaca = $rowInscripto['titaca'];
        $info = $rowInscripto['info'];
}
?> 
<form id="form" name="formInscripcionJornada" method="post" action="guardarIncripcionJornada2.php?idInscripto=<?php echo $id_Inscripto;?>" enctype="multipart/form-data">
<table id="tablaGral">
    <tr>  
        <td colspan="4" id="tdTitulo"><strong><l1>Inscripci&oacute;n a Segundas Jornadas Nacionales para PyMEs de la UTN</l1></strong></td>
    </tr>
    <tr>  
        <td colspan="4" class="tdTitulo"><l2>Formulario de Inscripci&oacute;n - Parte 2</l2></td>
    </tr>
    <tr>
        <td id="tdTexto"><label>Direcci&oacute;n:</label></td>
        <td id="tdCampos"><input name="direccion" type="text" class="campos" value="<?php echo $direccion;?>" size="30" maxlength="60" required/></td>
    
        <td id="tdTexto"><label>N&uacute;mero:</label></td>
        <td id="tdCampos"><input pattern="[0-9]{2,6}" name="numero" type="text" class="campos" value="<?php echo $numero;?>" size="30" maxlength="60" required/></td>
    </tr>
    <tr>
        <td id="tdTexto"><label>Piso:</label></td>
        <td id="tdCampos"><input name="piso" type="text" pattern="[0-9]{0,2}" class="campos" value="<?php echo $piso;?>" size="30" maxlength="2"/></td>
    
        <td id="tdTexto"><label>Dpto:</label></td>
        <td id="tdCampos"><input name="dpto" type="text" class="campos" value="<?php echo $dpto;?>" size="30" maxlength="3"/></td>
    </tr>
    <tr>
        <td id="tdTexto"><label>Raz&oacute;n Social donde trabaja:</label></td>
        <td id="tdCampos"><input name="razon_social" type="text" class="campos" placeholder="Empresa donde trabaja" value="<?php echo $razon_social;?>" size="30" maxlength="70" required/></td>
    
        <td id="tdTexto"><label>T&iacute;tulo Acad&eacute;mico:</label></td>
        <td id="tdCampos"><input name="titaca" type="text" class="campos" placeholder="Título de recibido" value="<?php echo $titaca;?>" size="30" maxlength="70" required/></td>
    </tr>
    <tr>
        <td id="tdTexto"><label>&iquest;C&oacute;mo te enteraste de las Jornadas?</label></td>
        <td colspan="3" id="tdCampos"><input name="info" type="text" class="campoInfo" value="<?php echo $info?>" size="30"/></td>
    </tr>
</table>
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