<?php 
	require '../database.php';
	$id = 0;
 	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	
	if ( !empty($_POST)) {
 		$id = $_POST['id'];
		
		// delete data
		borrar("clientes","idcliente = ?",$id);
 		borrar("referencias","idcliente = ?",$id);
 		
		header("Location: query.php");
		
	} 
?>

<!DOCTYPE html>
<html lang="sp">
<head>
    <meta class="mmenu">
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
 
						
						<h3>BORRAR REGISTRO DE CLIENTE:</h3>
		    		</div>
					
	    			<form class="form-horizontal" action="delete.php" method="post">
	    			  <input type="hidden" name="id" value="<?php echo $id;?>"/>
					  <p class="alert alert-error">SEGURO DE BORRAR ESTE REGISTRO?</p>
					  <div class="form-actions">
						  <button type="submit" class="btn btn-danger">Si</button>
						  <a class="btn" href="index.php">No</a>
						</div>
					</form>
				</div> 
    </div> <!-- /container -->
  </body>
</html>