<?php 
	require '../database.php';
	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	
	if ( null==$id ) {
		header("Location: index.php");
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM productos where idproducto = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
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
				 
						<h3>Detalle de Producto</h3>
		    		</div>
		    		
	    			<div class="form-horizontal" >
					  <div class="control-group">
					    <label class="control-label">Nombre:</label>
					    <div class="controls">
						    <label class="checkbox">
						     	<?php echo $data['nombre'];?>
						    </label>
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Descripcion:</label>
					    <div class="controls">
						    <label class="checkbox">
						     	<?php echo $data['descripcion'];?>
						    </label>
					    </div>
					  </div>
					  
					   <div class="control-group">
					    <label class="control-label">Marca:</label>
					    <div class="controls">
						    <label class="checkbox">
						     	<?php echo $data['marca'];?>
						    </label>
					    </div>
					  </div>
					   <div class="control-group">
					    <label class="control-label">Modelo:</label>
					    <div class="controls">
						    <label class="checkbox">
						     	<?php echo $data['modelo'];?>
						    </label>
					    </div>
					  </div>
					   <div class="control-group">
					    <label class="control-label">Cantidad:</label>
					    <div class="controls">
						    <label class="checkbox">
						     	<?php echo $data['cantidad'];?>
						    </label>
					    </div>
					  </div>
					   <div class="control-group">
					    <label class="control-label">Precio Unitario:</label>
					    <div class="controls">
						    <label class="checkbox">
						     	<?php echo $data['preciounitario'];?>
						    </label>
					    </div>
					  </div>
					   <div class="control-group">
					    <label class="control-label">Total:</label>
					    <div class="controls">
						    <label class="checkbox">
						     	<?php echo $data['total'];?>
						    </label>
					    </div>
					  </div> 
						<div class="control-group">
					    <label class="control-label">Precio de Venta:</label>
					    <div class="controls">
						    <label class="checkbox">
						     	<?php echo $data['preciodeventa'];?>
						    </label>
					    </div>
					  </div>
						<div class="control-group">
					    <label class="control-label">Valor Cuota Mes:</label>
					    <div class="controls">
						    <label class="checkbox">
						     	<?php echo $data['valorcuotames'];?>
						    </label>
					    </div>
					  </div>
						<div class="control-group">
					    <label class="control-label">Valor Cuota Quince:</label>
					    <div class="controls">
						    <label class="checkbox">
						     	<?php echo $data['valorcuotaquince'];?>
						    </label>
					    </div>
					  </div>   
					    <div class="form-actions">
						  <a class="btn" href="index.php">Cerrar</a>
					   </div>
					 
					</div>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>
