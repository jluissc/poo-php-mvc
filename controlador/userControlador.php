<?php

if($peticionAjax){
		require_once '../modelo/userModelo.php';
	}else{
		require_once './modelo/userModelo.php';
	}
/**
 *
 * 
 */
class userControlador
{
	
	// function __construct()
	// {
	// 	# code...
	// }

	public function new_usuario_C(){
		$name = $_POST['u_name'];
		$last = $_POST['u_last'];
		$ciudad = $_POST['u_ciudad'];
		$user = $_POST['u_user'];
		$pass = $_POST['u_pass'];
		$datos = [$name,$last,$ciudad,$user,$pass];
		$modelo = new userModelo();
		$modelo -> new_usuario_M($datos);
		if($modelo){
				return header("Location: ../index.php");
			}else{
				echo "Algo salio mal";
			}
	}

	public function listar_User_C()
	{
		$pers = new userModelo();
		$personas= $pers -> listar_User_M();
		return $personas;
	}

	public function mostrarUserId_C($id)
	{
		$pers = new userModelo();
		$personas= $pers -> mostrarUserId_M($id);
		return $personas;
		
	}
	public function edit_usuario_C()
	{	
		$name = $_POST['ue_name'];
		$last = $_POST['ue_last'];
		$ciudad = $_POST['ue_ciudad'];
		$user = $_POST['ue_user'];
		$pass = $_POST['ue_pass'];
		$id = $_POST['btnEdit_user'];
		$datos = [$name,$last,$ciudad,$user,$pass,$id];
		$modelo = new userModelo();
		$modelo -> edit_usuario_M($datos);
		if($modelo){
			return header("Location: ../index.php");
		}else{
			echo "Algo salio mal";
		}
		// return print_r($modelo);
	}

	public function del_usuario_C()
	{
		$id = $_GET['id_del'];
		$inst = new userModelo();
		$inst -> del_usuario_M($id);
		if($inst){
			return header("Location: ../index.php");
		}else{
			echo "Algo salio mal";
		}
	}
}
