<?php 

/**
 * 
 */
class mainModelo{
	private $SERVER ='localhost';
	private $BD = 'user';
	private $USER = 'root';
	private $PASSWORD = '';
	private $pdo;

	// public function __construct()
	// {
	// 	$this -> SERVER 	= 'localhost';
	// 	// $this -> BD 		= 'user';
	// 	// $this -> USER 		= 'root';
	// 	// $this -> PASSWORD 	= '';
	// }

	public function conectar(){
		
		$SGBD = "mysql:host=".$this-> SERVER.";dbname=".$this-> BD;
		$conexion = new PDO($SGBD, $this-> USER, $this-> PASSWORD);
		$conexion -> exec("SET CHARACTER SET utf8");
		return $conexion;
	}
}
