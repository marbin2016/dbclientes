<?php 
	$msg=0;
	//incluir el codigo para acceso de datos:
	require '../database.php';

	if ( !empty($_POST)) {
		 // si se envian datos capturar la información
	 	$nombre = $_POST['nombre'];
		$apellidos = $_POST['apellidos'];
		$direccion = $_POST['direccion'];
		$tipo = $_POST['tipo'];
		$telefono = $_POST['telefono'];
		$email = $_POST['email'];
		$dui = $_POST['dui'];
	 
	
	
		
		$valid = true;
		if (empty($nombre)) {
	 		$valid = false;
		}
	 	if ($valid) { //guardar registro con los datos capturados 
		 	$xv=array($nombre,$apellidos,$direccion,$tipo,$telefono,$email,$dui);
			guardar("clientes","nombre,apellidos,direccion,tipo,telefono,email,dui","?, ?, ?, ?, ?, ?, ?",$xv);
			$msg=1; 
		}
	
		
	}
?>
 
<!DOCTYPE html>
<html lang="sp">
<head>
    <meta charset="utf-8">
    <link   href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
    
    			<div class="span10 offset1">
    				<div class="mmenu">
					<table width="750" >
							<tr>
							<td><H4>CONTROL DEL CLIENTES</H4></td>
						 	<td><a href="../index.php"  class="btn">Salir</a></td>	
							
							</tr>
						</table>
						<a href="create.php" alt="Nuevo Registro..." class="btn btn-info"> Nuevo</a> 
						<a href="query.php" alt="Consultar Registros..." class="btn btn-info">Consultar</a> 
						<hr>	

						<h4>REGISTRAR NUEVOS CLIENTES:</h4>
				 </div>	
    		 	<form class="form-horizontal" action="create.php" method="post">
					  <div class="control-group">
					    <label class="control-label">Nombre:</label>
					    <div class="controls">
					      	<input name="nombre" type="text" size="30" required=true maxlength="30">
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Apellidos</label>
					    <div class="controls">
					      	<input name="apellidos" type="text" size="30" required=true maxlength="30">
					      	 
					    </div>
					  </div>
					   <div class="control-group">
					    <label class="control-label">Direccion</label>
					    <div class="controls">
					      	<input name="direccion" type="text" size="60" maxlength="100" >
					      </div>
					  </div>
					   <div class="control-group">
					    <label class="control-label">tipo</label>
					    <div class="controls">
					      	<select name="tipo">
								<option>A</option>
								<option>B</option>
								<option>C</option>
								<option>D</option>
					      	 </select>
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Telefono</label>
					    <div class="controls">
					      	<input name="telefono" type="text" size="10" >
					      	 
					    </div>
					  </div>
					    <div class="control-group">
					    <label class="control-label">email</label>
					    <div class="controls">
					      	<input name="email" type="email" size="10" >
					      	 
					    </div>
					  </div>
					    <div class="control-group">
					    <label class="control-label">DUI:</label>
					    <div class="controls">
					      	<input name="dui" type="text" size="12" >
					      	 
					    </div>
					  </div>
					      <div class="control-group">
					   
					   
					  </div>
					    
					   
					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Guardar</button>
						  <a class="btn" href="index.php">Atrás</a>
						  <?php if ($msg) echo ("Registro Guardado"); ?>
						</div>
					</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>