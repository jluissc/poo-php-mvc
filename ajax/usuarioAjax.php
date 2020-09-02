<?php
$peticionAjax = true;

if(isset($_POST['btnNew_user'])){
	require_once '../controlador/userControlador.php';
	
	$inst = new userControlador();
	$inst -> new_usuario_C();

}
if(isset($_POST['btnEdit_user'])){
	require_once '../controlador/userControlador.php';

	$inst = new userControlador();
	$inst -> edit_usuario_C();
}

if(isset($_GET['id_del'])){
	require_once '../controlador/userControlador.php';
	
	$inst = new userControlador();
	$inst -> del_usuario_C();
}
