<?php 
/**
 * 
 */
require_once 'mainModelo.php';
class userModelo extends mainModelo
{
	// private $pdo;
	function __construct()
	{
		$this ->pdo= mainModelo::conectar();
	}

	public function new_usuario_M($datos){
		$sql=$this -> pdo ->prepare("INSERT INTO usuarios( `nombre_u`, `apellidos_u`, `ciudad_u`, `user_u`, `pass_u`) VALUES (:nam,:last,:ciu,:use,md5(:pas))");
			$sql->bindParam(":nam",$datos[0]);
			$sql->bindParam(":last",$datos[1]);
			$sql->bindParam(":ciu",$datos[2]);
			$sql->bindParam(":use",$datos[3]);
			$sql->bindParam(":pas",$datos[4]);
			$sql->execute();
			return $sql; 
	}

	public function listar_User_M()
	{
		$personas =[];
		$sql = "SELECT * FROM usuarios";
		$con = $this -> pdo -> prepare($sql);
		$con -> execute();
		while($user = $con->fetch(PDO::FETCH_ASSOC)) {
		        $personas[]=$user;
		    }
		 return $personas; 
	}
	public function mostrarUserId_M($id)
	{
		$personas =[];
		$sql = "SELECT * FROM usuarios WHERE id_u=$id";
		$con = $this -> pdo -> prepare($sql);
		$con -> execute();
		while($user = $con->fetch(PDO::FETCH_ASSOC)) {
		        $personas[]=$user;
		    }
		 return $personas; 
	}

	public function edit_usuario_M($datos){
		$sql=$this -> pdo ->prepare("UPDATE usuarios SET `nombre_u`=:nam, `apellidos_u`=:last, `ciudad_u`=:ciu, `user_u`=:use, `pass_u`=:pas  WHERE id_u =:id");
		$sql->bindParam(":nam",$datos[0]);
		$sql->bindParam(":last",$datos[1]);
		$sql->bindParam(":ciu",$datos[2]);
		$sql->bindParam(":use",$datos[3]);
		$sql->bindParam(":pas",$datos[4]);
		$sql->bindParam(":id",$datos[5]);
		$sql->execute();	
		return $sql; 
	}

	public function del_usuario_M($id){
			$sql= "DELETE FROM `usuarios` WHERE id_u = $id";
			$cons = $this -> pdo ->prepare($sql);
			$cons -> execute();
			return $cons;	
		}
}