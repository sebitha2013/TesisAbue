<?php

class usuario_modelo{
	
	private $db;
	
	private $Usuario;
	
	
	public function __construct(){
		
		$this->db=Conectar::Conexion();
		
		$this->datos=array();
	}
	


			public function obtener_usuario($id_usuario){
			
							$consulta=$this->db->query("SELECT * FROM usuario WHERE id_us = '$id_usuario'");
			
							while($filas=$consulta->fetch_assoc()){
				
							$this->Usuario[]=$filas;
				
							}

							return $this->Usuario;
			}

		/*
			public function Agregar_Usuario($Nombre_Usuario, $Password_Usuario, $Correo_Usuario, $estado){
		
							$consulta=$this->db->prepare("INSERT INTO usuario (usuario, password, correo, fk_estado) VALUES (?, ?, ?, ?)");
				
							$consulta->bind_param('sssi', $Nombre_Usuario, $Password_Usuario, $Correo_Usuario, $estado);
				
							$consulta->execute();

			}	*/
				
	
	}

?>