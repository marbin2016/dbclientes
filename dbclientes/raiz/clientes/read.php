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
		$sql = "SELECT * FROM clientes where idcliente = ?";
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
<body >
    <div class="container" >
    
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
				 
						<h3>Detalle de Cliente</h3>
		    		</div>
		    		
	    			<div class="form-horizontal" >
					  <div class="control-group">
					    <label class="control-label">Nombre</label>
					    <div class="controls">
						    <label class="checkbox">
						     	<?php echo $data['nombre'];?>
						    </label>
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Apellidos</label>
					    <div class="controls">
						    <label class="checkbox">
						     	<?php echo $data['apellidos'];?>
						    </label>
					    </div>
					  </div>
					  
					   <div class="control-group">
					    <label class="control-label">Direccion</label>
					    <div class="controls">
						    <label class="checkbox">
						     	<?php echo $data['direccion'];?>
						    </label>
					    </div>
					  </div>
					   <div class="control-group">
					    <label class="control-label">Tipo:</label>
					    <div class="controls">
						    <label class="checkbox">
						     	<?php echo $data['tipo'];?>
						    </label>
					    </div>
					  </div>
					   <div class="control-group">
					    <label class="control-label">DUI:</label>
					    <div class="controls">
						    <label class="checkbox">
						     	<?php echo $data['dui'];?>
						    </label>
					    </div>
					  </div>
					   <div class="control-group">
					    <label class="control-label">Telefono</label>
					    <div class="controls">
						    <label class="checkbox">
						     	<?php echo $data['telefono'];?>
						    </label>
					    </div>
					  </div>
					   <div class="control-group">
					    <label class="control-label">Email:</label>
					    <div class="controls">
						    <label class="checkbox">
						     	<?php echo $data['email'];?>
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
