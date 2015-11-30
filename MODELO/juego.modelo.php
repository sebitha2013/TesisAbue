<?php

class juego_modelo{
	
	private $db;
	
	private $juego;
	
	
	public function __construct(){
		
		$this->db=Conectar::Conexion();
		
		$this->juego=array();
	}

			

			public function obtener_juego($id_juego){
			
							$consulta=$this->db->query("SELECT * FROM juego WHERE id_ju = '$id_juego'");
			
							while($filas=$consulta->fetch_assoc()){
				
							$this->juego[]=$filas;
				
							}

							return $this->juego;
			}

			public function obtener_juegos(){
			
							$consulta=$this->db->query("SELECT * FROM juego");
			
							while($filas=$consulta->fetch_assoc()){
				
							$this->juego[]=$filas;
				
							}

							return $this->juego;
			}	
				
	
	}

?>