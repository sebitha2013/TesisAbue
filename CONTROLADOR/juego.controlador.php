<?php
require_once("../Modelo/juego.modelo.php"); //Llamamos al modelo.


		private $modelo_juego = new juego_modelo(); //Variable Global


		function obtener_juego($id_juego){
	
				 $juego_buscado = $modelo_juego->obtener_juego($id_juego); //obtiene el juego buscado según su id
	
				 return $juego_buscado; 
	
		}

		function listar_juegos(){
	
				 $lista_juegos = $modelo_juego->obtener_juegos(); //lista la cantidad de juegos que existen
	
				 return $lista_juegos;
				 
		}

?>