<?php
require_once("MODELO/estadisticaJuego.modelo.php");

		Private $modelo_estadisticaJuego = new estadisticaJuego_modelo();


		function obtener_estadisticaJuego($id_usuario, $id_juego){

				 $obtener_estadisticaJuego = $modelo_estadisticaJuego->obtener_estadisticaJuego_us($id_usuario, $id_juego);

				 return $obtener_estadisticaJuego;

		}

		function listar_estadisticaJuegos($id_usuario){

				 $listar_estadistica = $modelo_estadisticaJuego->obtener_estadisticaJuegos($id_usuario);

				 return $listar_estadisticaJuegos;

		function editar_estadisticaJuego($id_estadistica, $aciertos, $fracasos, $nivel_actual){

				 $editar_estadistica = $modelo_estadisticaJuego->cambiar_estadisticaJuego($id_estadistica, $aciertos, $fracasos, $nivel_actual);
		}
}

?>
