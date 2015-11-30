<?php

require_once("../MODELO/usuario.modelo.php");

		Private $modelo_usuario = new usuario_modelo();


		function obtener_usuario($id_usuario){ // Obtendremos el usuario en especifico.
	
				 $usuario_buscado = $modelo_usuario->obtener_usuario($id_usuario);
	
				 return $usuario_buscado;
	
		}

		function listar_usuarios(){ //Obtendremos todos los usuarios que se encuentran en la BD
	
				 $lista_usuarios = $modelo_usuario->obtener_usuarios();
	
				 return $lista_usuarios;
	
		}

/*
		function crear_usuario($run, $nombres, $apellidos, $correo, $password, $fecha_nacimiento, $sexo){

				 $nuevo_usuario = $modelo_usuario->crear_usuario($run, $nombres, $apellidos, $correo, $password, $fecha_nacimiento, $sexo);
		}
+/
?>