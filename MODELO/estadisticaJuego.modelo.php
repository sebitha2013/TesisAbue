<?php

class estadisticaJuego_modelo{
	
	private $db;
	
	private $estadistica_juego;
	
	
	public function __construct(){
		
		$this->db=Conectar::Conexion();
		
		$this->estadistica_juego = array();
	}
	


			public function obtener_estadisticaJuego_us($id_usuario, $id_juego){

			
							$consulta=$this->db->query("SELECT * FROM estadistica_juego WHERE fk_usuario = '$id_usuario' and fk_juego = '$id_juego';");
			
							while($filas=$consulta->fetch_assoc()){
				
							$this->estadistica_juego[]=$filas;
				
							}

							return $this->estadistica_juego;

			}

			public function cambiar_estadisticaJuego($id_estadistica, $aciertos, $fracasos, $nivel_actual){


							$consulta=$this->db->prepare("UPDATE estadistica_juego SET acierto_est = ?, fracaso_est = ?, nivel_actual_est = ? WHERE id_est = ?;");

							$consulta->bind_param('iiii', $aciertos, $fracasos, $nivel_actual, $id_estadistica);

							$consulta->execute();

			}	
				
	
	} //cierra la clase estadistica_juego

?>