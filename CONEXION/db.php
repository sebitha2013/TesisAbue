<?php
class Conectar{
	
	public static function Conexion(){
		
		$conexion = new mysqli("localhost", "root", "", "abue");
		
		$conexion->query("SET NAMES 'utf8'");
		
		return $conexion;
		
		}
	}
?>