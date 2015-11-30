<?
require_once("CONTROLADOR/estadisticaJuego.controlador.php");

$id_estadistica =  $_POST("id_estadistica");
$nivel_actual = $POST("nivel_actual");
$aciertos = $POST("acierto");
$fracasos = $POST("fracaso");

$editar_estadisticaJuego($id_estadistica, $aciertos, $fracasos, $nivel_actual);


?>