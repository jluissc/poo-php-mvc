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
	<form action="./ajax/usuarioAjax.php" method="POST">
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationDefault01">Nombres</label>
        <input type="text" class="form-control" name="u_name" placeholder="Digite sus nombres" >
      </div>
      <div class="col-md-6 mb-3">
        <label for="validationDefault02">Apellidos</label>
        <input type="text" class="form-control" name="u_last" placeholder="Digite sus apellidos" >
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationDefault03">Ciudad</label>
        <input type="text" class="form-control" name="u_ciudad" placeholder="Ciudad">
      </div>
      
      <div class="col-md-3 mb-3">
        <label for="validationDefault05">Usuario</label>
        <input type="text" class="form-control" name="u_user" placeholder="Usuario">
      </div>

      <div class="col-md-3 mb-3">
        <label for="validationDefault05">Contraseña</label>
        <input type="text" class="form-control" name="u_pass" placeholder="Contraseña">
      </div>
    </div>
    <button class="btn btn-primary" type="submit" name="btnNew_user">Agregar Usuario</button>
  </form>
<br>
	<br>

<h2>Mis usuarios</h2>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar unicamente por nombre" title="Type in a name">


<table class="table" id="myTable">
  <caption>Lista de usuarios</caption>
  <thead>
   
    <tr class="header"> 
      <th scope="col">#</th>
      <th scope="col">Nombres</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Ciudad</th>
      
    </tr>
  </thead>
  <tbody>
     <?php 
      require_once './controlador/userControlador.php';
      $inst = new userControlador();
      $pers = $inst -> listar_User_C();
      foreach ($pers as $index => $lista):
        // echo $lista['nombre_u'];
      // }
     ?>
    <tr>
      <th scope="row"><?php echo $index+1; ?></th>
      <td><?php echo $lista['nombre_u']; ?></td>
      <td><?php echo $lista['apellidos_u']; ?></td>
      <td><?php echo $lista['ciudad_u']; ?></td>
      <td><button class="bt btn-warning"><a href="./vista/userEditar.php?id=<?php echo $lista['id_u']; ?>" >Editar</a></button></td>
      <td><a href="./ajax/usuarioAjax.php?id_del=<?php echo $lista['id_u']; ?>">Eliminar</a></td>
    </tr>
    <?php 
      endforeach
     ?>
    
  </tbody>
</table>
  <br>



<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

</body>
</html>