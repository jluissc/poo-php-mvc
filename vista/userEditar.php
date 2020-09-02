<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<style>
* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}

body { 
    width: 80%; 
    margin-left:auto; 
    margin-right: auto; 
    min-height:100%;
    height:100%;
    background-color: #FFFFFF;
    border-radius: 20px;
    -moz-border-radius: 20px
}
</style>
</head>
<body>
	<br>
	<br>
  <?php 
    $peticionAjax= true;
    require_once '../controlador/userControlador.php';
    $inst = new userControlador();
    $pers = $inst -> mostrarUserId_C($_GET['id']);
    foreach ($pers as $persona):
   ?>
	<form action="../ajax/usuarioAjax.php" method="POST">
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationDefault01">Nombres</label>
        <input type="text" class="form-control" name="ue_name" placeholder="Digite sus nombres" value="<?php echo $persona['nombre_u']; ?>" >
      </div>
      <div class="col-md-6 mb-3">
        <label for="validationDefault02">Apellidos</label>
        <input type="text" class="form-control" name="ue_last" placeholder="Digite sus apellidos"  value="<?php echo $persona['apellidos_u']; ?>">
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationDefault03">Ciudad</label>
        <input type="text" class="form-control" name="ue_ciudad" placeholder="Ciudad" value="<?php echo $persona['ciudad_u']; ?>">
      </div>
      
      <div class="col-md-3 mb-3">
        <label for="validationDefault05">Usuario</label>
        <input type="text" class="form-control" name="ue_user" placeholder="Usuario" value="<?php echo $persona['user_u']; ?>"> 
      </div>

      <div class="col-md-3 mb-3">
        <label for="validationDefault05">Contraseña</label>
        <input type="password" class="form-control" name="ue_pass" placeholder="Contraseña" value="<?php echo $persona['pass_u']; ?>">
      </div>
    </div>
    <button class="btn btn-primary" type="submit" name="btnEdit_user" value="<?php echo $persona['id_u']; ?>">Editar Usuario</button>
  </form>
  <?php 
endforeach
   ?>








</body>
</html>