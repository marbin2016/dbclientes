<?php 
	$msg=0;


	//incluir el codigo para acceso de datos:
	 require '../database.php';
// require 'database.php';

	if ( !empty($_POST)) {
		 // si se envian datos capturar la información	
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
	 
	
			
		$valid = true;
		if (empty($nombre)) {
	 		$valid = false;
		}
	 	if ($valid) { //guardar registro con los datos capturados 
		 	$xv=array($nombre,$descripcion,$marca,$modelo,$cantidad,$preciounitario,$total,$preciodeventa,$valorcuotames,  $valorcuotaquince);
			guardar("nombre,descripcion,marca,modelo,cantidad,preciounitario,total,preciodeventa,valorcuotames,valorcuotaquince, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? ",$xv);
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
    
    			<div class="span10 offset1" align="center" >
    				<div class="mmenu">
					<table width="750" >
							<tr>
							<td><H4>CONTROL DE PROCUTOS</H4></td>
						 	<td><a href="index.php"  class="btn">Salir</a></td>	
							
							</tr>
						</table>
						<a href="create.php" alt="Nuevo Registro..." class="btn btn-info"> Nuevo</a> 
						<a href="query.php" alt="Consultar Registros..." class="btn btn-info">Consultar</a> 
						<hr>	

						<h4>REGISTRAR NUEVOS PRODUCTOS:</h4>
				 </div>	
					<form class="form-horizontal" action="" method="post">
					  
    		 
					  <div class="control-group">
					    <label class="control-label">Nombre:</label>
					    <div class="controls">
					      	<input name="nombre" type="text" size="30" required=true maxlength="30">
					    </div>
					  </div>

					  <div class="control-group">
					    <label class="control-label">Descripcion:</label>
					    <div class="controls">
					      	<input name="descripcion" type="text" size="30" required=true maxlength="30">					      	 
					    </div>
					  </div>

					 <div class="control-group">
					    <label class="control-label">Marca:</label>
					    <div class="controls">
					      	<input name="marca" type="text" size="30" required=true maxlength="30">					      	 
					    </div>
					  </div>

					  <div class="control-group">
					    <label class="control-label">Modelo:</label>
					    <div class="controls">
					      	<input name="modelo" type="text" size="30" required=true maxlength="30">					      	 
					    </div>
					  </div>

					  <div class="control-group">
					    <label class="control-label">Cantidad:</label>
					    <div class="controls">
					      	<input name="cantidad" type="text" size="10" >					      	 
					    </div>
					  </div>

					  <div class="control-group">
					    <label class="control-label">Precio Unitario:</label>
					    <div class="controls">
					      	<input name="preciounitario" type="text" size="10">					  	 
					    </div>
					  </div>

					  <div class="control-group">
					    <label class="control-label">TOTAL:</label>
					    <div class="controls">
					      	<input name="total" type="text" size="12" >					      	 
					    </div>
					  </div>

					  <div class="control-group">
					    <label class="control-label">Precio de Venta:</label>
					    <div class="controls">
					      	<input name="preciodeventa" type="text" size="12" >					      	 
					    </div>
					  </div>

					  <div class="control-group">
					    <label class="control-label">Cuota Mes:</label>
					    <div class="controls">
					      	<input name="valorcuotames" type="text" size="12" >					      	 
					    </div>
					  </div>

 					  <div class="control-group">
					    <label class="control-label">Cuota Quince:</label>
					    <div class="controls">
					      	<input name="valorcuotaquince" type="text" size="12" >					      	 
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
