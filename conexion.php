<?php
//$conn = pg_connect("host=190.114.198.126 port=5432 user=extension password=newgenius dbname=jornada") or die("Error de conexion.".pg_last_error()); //conexion facu

$conn = pg_connect("host=localhost port=5432 user=postgres password=postgres dbname=jornada") or die("Error de conexion.".pg_last_error());//conexion local
?>