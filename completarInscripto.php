<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>
    Completar inscripcion
</title>
<meta name="keywords" content="HTML5, CSS3, Javascript"/>
<link rel="stylesheet" href="css/inscripcion.css">
<script type='text/javascript' src="jquery.min-1.9.1.js"></script>
<script>

var htmlToAdd = "";
var checked;

function controlSeleccion(alOGrad)
{
    if(alOGrad == 'a')
    {
        $("#selGraduado").attr('checked', false);
    }

    if(alOGrad == 'g')
    {
        $('#selAlumno').attr('checked', false);
    }

    htmlToAdd = "";
    if($("#selAlumno").is(':checked')) 
    {
        addAlumno();
    }
    if($("#selGraduado").is(':checked')) 
    {
        addGraduado();
    }
    if($("#selEmpresa").is(':checked')) 
    {
        addEmpresa();
    }
    $('#fieldsets').html(htmlToAdd);
}

function addAlumno()
{
    var alumnoToAdd = '<fieldset id="datosAlumno"><legend><b>Datos Alumno</b></legend><table align="center" width="100%"><tr width="100%"><td width="25%" align="right"><label for="carreraAlumno">Carrera: </label></td><td width="25%"><input id="carreraAlumno" name="carreraAlumno" type="text" onkeydown="sacarColor(this)"/></td><td width="25%" align="right"><label for="anioCursado">A&ntilde;o de cursado: </label></td><td width="25%"><input id="anioCursado" name="anioCursado" type="text" onkeydown="sacarColor(this)"/></td></tr></table></fieldset>';
    htmlToAdd += alumnoToAdd;
}

function addGraduado()
{
    var alumnoToAdd = '<fieldset id="datosGraduado"><legend><b>Datos Graduado</b></legend><table align="center" width="100%"><tr width="100%"><td width="25%" align="right"><label for="carreraGraduado">Carrera: </label></td><td width="25%"><input id="carreraGraduado" name="carreraGraduado" type="text" onkeydown="sacarColor(this)"/></td><td width="25%" align="right"><label for="anioGraduado">A&ntilde;o de graduaci&oacute;n: </label></td><td width="25%"><input id="anioGraduado" name="anioGraduado" type="text" onkeydown="sacarColor(this)"/></td></tr></table></fieldset>';
    htmlToAdd += alumnoToAdd;
}

function addEmpresa()
{
    var empresaToAdd = '<fieldset id="datosEmpresa"><legend><b>Datos Empresa</b></legend><table align="center" width="100%"><tr width="100%"><td width="15%" align="right"><label for="nombreEmpresa">Raz&oacute;n Social: </label></td><td width="15%"><input id="nombreEmpresa" name="nombreEmpresa" type="text" onkeydown="sacarColor(this)"/></td><td width="15%" align="right"><label for="areaEmpresa">&Aacute;rea: </label></td><td width="15%"><input id="areaEmpresa" name="areaEmpresa" type="text" onkeydown="sacarColor(this)"/></td><td width="15%" align="right"><label for="localidadEmpresa">Localidad: </label></td><td width="15%"><input id="localidadEmpresa" name="localidadEmpresa" type="text" onkeydown="sacarColor(this)"/></td></tr></table></fieldset>';
    htmlToAdd += empresaToAdd;
}

function sacarColor(me)
{
    $(me).css('border-color','initial');
    $(me).css('outline','1px');
}

function controlVacio(nombreSelector)
{
    checked = true;
    if($.trim($(nombreSelector).val()) == '')
    {
        $(nombreSelector).css('border-color','red');
        $(nombreSelector).css('outline','0px');

        $(nombreSelector).focus();
        return false;
    }
}

function controlColor()
{
    if($('#selAlumno').is(':checked'))
    {
        controlVacio('#carreraAlumno');
        controlVacio('#anioCursado');
    }
    if($('#selGraduado').is(':checked'))
    {
        controlVacio('#carreraGraduado');
        controlVacio('#anioGraduado');
    }
    if($('#selEmpresa').is(':checked'))
    {
        controlVacio('#nombreEmpresa');
        controlVacio('#areaEmpresa');
        controlVacio('#localidadEmpresa');
    }
}

function controlSumbit()
{

    controlColor();

    checked = false;
    if($('#selAlumno').is(':checked'))
    {

        if(controlVacio('#carreraAlumno')==false)
            return false;

        if(controlVacio('#anioCursado')==false)
            return false;
    }
    if($('#selGraduado').is(':checked'))
    {
        if(controlVacio('#carreraGraduado')==false)
            return false;

        if(controlVacio('#anioGraduado')==false)
            return false;
    }
    if($('#selEmpresa').is(':checked'))
    {
        if(controlVacio('#nombreEmpresa')==false)
            return false;

        if(controlVacio('#areaEmpresa')==false)
            return false;

        if(controlVacio('#localidadEmpresa')==false)
            return false;
    }
    if(checked==false)
        return false;
}

</script>
</head>
<body>
<?php
include_once "conexion.php";
include_once "libreria.php";
$id_Inscripto = (empty($_REQUEST['id'])) ? 0 : $_REQUEST['id'];
if($id_Inscripto == 0)
{
    require("validarInscripto.php");
    exit;
}

$rowDatos = pg_fetch_array(traerSqlCondicion("apellido || ', ' || nombre as nombre, nrodni","inscripto","id=".$id_Inscripto));
$nombreInscripto = $rowDatos['nombre'];
$dniInscripto = $rowDatos['nrodni'];

?>
<form id="form" name="formInscripcionJornada" method="post" action="guardarCompletarInscripto.php" onsubmit="return controlSumbit()" enctype="multipart/form-data">
<input type="hidden" name="idInscripto" value="<?php echo $id_Inscripto;?>" />
<div id="tablaGral">
<center>
<table align="center" width="100%">
    <tr width="100%">
        <td width="100%">
            <fieldset>
                    <table align="center" id="tit_sol"> 
                        <tr width="100%" align="center">
                            <td colspan="3">
                            <?php
                            echo $nombreInscripto.' - '.$dniInscripto;
                            ?>
                            </td>
                        </tr>
                        <tr width="100%" align="center">
                            <td class="tdLblCar" width="30%">
                                <label for="selAlumno">Alumno&nbsp;&nbsp; </label><input type="checkbox" id="selAlumno" name="selAlumno" onchange="controlSeleccion('a')" />
                            </td>
                            <td class="tdLabel" width="30%">
                                <label for="selGraduado">Graduado&nbsp;&nbsp; </label><input type="checkbox" id="selGraduado" name="selGraduado" onchange="controlSeleccion('g')"/>
                            </td>
                            <td class="tdLabel" width="30%">
                                <label for="selEmpresa">Empresa&nbsp;&nbsp; </label><input type="checkbox" id="selEmpresa" name="selEmpresa" onchange="controlSeleccion()"/>
                            </td>
                        </tr>
                    </table>
            </fieldset>
            <div id="fieldsets">

            </div>
        </td>
    </tr>
</table>
</div>
<table width="100%">
    <tr width="100%">
        <?php
            if ($id_Inscripto != 0 && $id_Inscripto != NULL) {
                echo '<td width="50%" align="right"><a href="validarInscripto.php"><input type="button" name="cancelar" id="btn_cancelar" value="Cancelar" /></a></td>';
                echo '<td width="50%" align="left"><input type="submit" name="Submit" id="btn_confirmar" value="Confirmar" /></td>';
            }else{
                echo '<td width="50%" align="right"><a href="validarInscripto.php"><input type="button" name="cancelar" id="btn_cancelar" value="Cancelar" /></a></td>';
            }
        ?>
    </tr>
</table>
</form>
</body>
</html>
