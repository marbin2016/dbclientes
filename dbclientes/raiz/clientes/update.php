<?php 
	$msg=0;
	//incluir el codigo para acceso a la base de datos
	require '../database.php';

	$id = null;
	//verificar si se envio el id a modificar
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	 
	
	if (!empty($_POST)) {
		//extraer datos que se quiere modificar
	  	 $nombre = $_POST['nombre'];
		$apellidos = $_POST['apellidos'];
		$direccion = $_POST['direccion'];
		$tipo = $_POST['tipo'];
		$telefono = $_POST['telefono'];
		$email = $_POST['email'];
		$dui = $_POST['dui'];
		
	 
		 //verificar que el nombre no vaya en blanco
	  	$valid = true;
		if (empty($nombre)) {
	 		$valid = false;
		}
	 	if ($valid) {
			//si al menos el nombre va... actualizar la tabla en la base de datos
			//arreglo de variables
			$arr= array($nombre,$apellidos,$direccion,$tipo,$telefono,$email,$dui,$id);
			//llamar funcion modificar definiendo tabla y demas datos para el UPDATE
			actualizar("clientes ","nombre = ?, apellidos = ?, direccion =? , tipo=? ,telefono=?, email=?, dui=? where idcliente = ?",$arr);
			$msg=1;
		}
		 
	
		
	} else {
		//si no se envian datos modificados...entonces se muestra los datos del registro a modificar
		//instrucciones para consultar el registro de cliente con id seleccionado:
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM clientes where idcliente = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		$nombre = $data['nombre'];
		$apellidos = $data['apellidos'];
		$direccion = $data['direccion'];
		$tipo=$data['tipo'];
		$telefono= $data['telefono'];
		$email=$data['email'];
		$dui=$data['dui'];
		 
		Database::disconnect();
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
    
    			<div class="span10 offset1" align="center">
    				<div class="mmenu" align="center">
					<table width="750" >
						<tr>
						<td><H4>CONTROL DEL CLIENTES</H4></td>
						 <td><a href="index.php"  class="btn">Salir</a></td>	
						
						</tr>
					</table>
					<a href="create.php" alt="Nuevo Registro..." class="btn btn-info"> Nuevo</a> 
					<a href="query.php" alt="Consultar Registros..." class="btn btn-info">Consultar</a> 
					<hr>	
				 <h3>Editar Cliente</h3>
		    		</div>
    		
	    			<form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">
					  <div class="control-group ">
					    <label class="control-label">Nombre</label>
					    <div class="controls">
					      	<input name="nombre" type="text"  value="<?php echo  $nombre ;?>" required=true>
					       
					    </div>
					  </div>
					   <div class="control-group">
					    <label class="control-label">Apellidos</label>
					    <div class="controls">
					      	<input name="apellidos" type="text" size="30" value="<?php echo  $apellidos ;?>">
					      	 
					    </div>
					  </div>
					   <div class="control-group">
					    <label class="control-label">Direccion</label>
					    <div class="controls">
					      	<input name="direccion" type="text" size="60" value="<?php echo  $direccion ;?>">
					      	 
					    </div>
					  </div>
					   <div class="control-group">
					    <label class="control-label">tipo ( <?php echo  $tipo; ?> )</label>
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
					      	<input name="telefono" type="text" size="10" value="<?php echo  $telefono ;?>">
					      	 
					    </div>
					  </div>
					    <div class="control-group">
					    <label class="control-label">email</label>
					    <div class="controls">
					      	<input name="email" type="email" size="10" value="<?php echo  $email ;?>" >
					      	 
					    </div>
					  </div>
					    <div class="control-group">
					    <label class="control-label">DUI:</label>
					    <div class="controls">
					      	<input name="dui" type="text" size="12" value="<?php echo  $dui ;?>" >
					      	 
					    </div>
					  </div>
					 
					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Modificar</button>
						  <a class="btn" href="index.php">Atrás</a>
						  <?php if ($msg) echo ("Registro Actualizado"); ?>
						</div>
					</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>
