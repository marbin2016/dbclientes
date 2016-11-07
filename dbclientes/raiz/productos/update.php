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
		$descripcion = $_POST['descripcion'];
		$marca = $_POST['marca'];
		$modelo = $_POST['modelo'];
		$cantidad = $_POST['cantidad'];
		$preciounitario = $_POST['preciounitario'];
		$total = $_POST['total'];
		$preciodeventa = $_POST['preciodeventa'];
		$valorcuotames = $_POST['valorcuotames'];
		$valorcuotaquince = $_POST['valorcuotaquince'];
		
	 
		 //verificar que el nombre no vaya en blanco
	  	$valid = true;
		if (empty($nombre)) {
	 		$valid = false;
		}
	 	if ($valid) {
			//si al menos el nombre va... actualizar la tabla en la base de datos
			//arreglo de variables
			$arr= array($nombre,$descripcion,$marca,$modelo,$cantidad,$preciounitario,$total,$preciodeventa,$valorcuotames,$valorcuotaquince);
			//llamar funcion modificar definiendo tabla y demas datos para el UPDATE
			actualizar("productos","nombre=?,descripcion=?,marca=?,modelo=?,cantidad=?,preciounitario=?,total=?, preciodeventa=?,valorcuotames=?,valorcuotaquince=?, where idproducto = ?",$arr);
			$msg=1;
		}
		 
	
		
	} else {
		//si no se envian datos modificados...entonces se muestra los datos del registro a modificar
		//instrucciones para consultar el registro de cliente con id seleccionado:
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM productos where idproducto = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
	 	$nombre = $data['nombre'];
		$descripcion = $_POST['descripcion'];
		$marca = $data['marca'];
		$modelo = $data['modelo'];
		$cantidad = $data['cantidad'];
		$preciounitario = $data['preciounitario'];
		$total = $_POST['total'];
		$preciodeventa = $data['preciodeventa'];
		$valorcuotames = $data['valorcuotames'];
		$valorcuotaquince = $data['valorcuotaquince'];
		 
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
    				<div class="mmenu">
					<table width="750" >
						<tr>
						<td align="center"><H4>CONTROL DE PRODUCTOS</H4></td>
						 <td><a href="index.php"  class="btn">Salir</a></td>	
						
						</tr>
					</table>
					<a href="create.php" alt="Nuevo Registro..." class="btn btn-info"> Nuevo</a> 
					<a href="query.php" alt="Consultar Registros..." class="btn btn-info">Consultar</a> 
					<hr>	
				 <h3>Editar Producto</h3>
		    		</div>
    		
	    			<form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">
					
					  </div>
					  <div class="control-group ">
					    <label class="control-label">Nombre:</label>
					    <div class="controls">
					      	<input name="nombre" type="text"  value="<?php echo  $nombre ;?>" required=true>
					       
					    </div>
					  </div>
					   <div class="control-group">
					    <label class="control-label">Descripcion:</label>
					    <div class="controls">
					      	<input name="descripcion" type="text" size="30" value="<?php echo  $descripcion ;?>">
					      	 
					    </div>
					  </div>
					   <div class="control-group">
					    <label class="control-label">Marca: ( <?php echo  $tipo; ?> )</label>
					    <div class="controls">
					      <input name="marca" type="text" size="30" value="<?php echo  $marca;?>">	
					    </div>
					  </div>
					   <div class="control-group">
					    <label class="control-label">Modelo: ( <?php echo  $tipo; ?> )</label>
					    <div class="controls">
					      	<input name="modelo" type="text" size="30" value="<?php echo  $modelo ;?>">
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Cantidad:</label>
					    <div class="controls">
					      	<input name="cantidad" type="text" size="10" value="<?php echo  $cantidad ;?>">
					      	 
					    </div>
					  </div>
					    <div class="control-group">
					    <label class="control-label">Precio Unitario:</label>
					    <div class="controls">
					      	<input name="preciounitario" type="text" size="10" value="<?php echo  $preciounitario ;?>">
					      	 
					    </div>
					  </div>
					    <div class="control-group">
					    <label class="control-label">Total:</label>
					    <div class="controls">
					      	<input name="total" type="text" size="12" value="<?php echo  $total ;?>" >
					      	 
					    </div>
					  </div>
		
					<div class="control-group">
					    <label class="control-label">Precio de Venta:</label>
					    <div class="controls">
					      	<input name="preciodeventa" type="text" size="12" value="<?php echo  $preciodeventa ;?>" >
					      	 
					    </div>
					  </div>

					<div class="control-group">
					    <label class="control-label">Valor Cuota Mes:</label>
					    <div class="controls">
					      	<input name="valorcuotames" type="text" size="12" value="<?php echo  $valorcuotames ;?>" >
					      	 
					    </div>
					  </div>
					 

					<div class="control-group">
					    <label class="control-label">Valor Cuota Quince:</label>
					    <div class="controls">
					      	<input name="valorcuotaquince" type="text" size="12" value="<?php echo  $valorcuotaquince ;?>" >
					      	 
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
