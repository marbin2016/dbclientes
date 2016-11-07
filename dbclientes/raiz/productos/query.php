<!DOCTYPE html>
<html lang="sp">
<head>
    <meta charset="utf-8">

    <link   href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/bootstrap.min.js"></script>
   
</head>

<body>
    <div class="container">
    		
			<div class="mmenu" align="center">
					<table width="750" >
						<tr>
						<td align="center"><H4>CONTROL DE PRODUCTOS</H4></td>
					 <td><a href="index.php"  class="btn">Salir</a></td>	
						
						</tr>
					</table>
					<a href="create.php" alt="Nuevo Registro..." class="btn btn-info"> Nuevo</a> 
					<a href="query.php" alt="Consultar Registros..." class="btn btn-info">Consultar</a> 
					<hr>	
					
			 </div>
			 <table class="table table-striped table-bordered">
		              <thead>
		                <tr>
		                  <td>Codigo Producto</td>
		                  <td>Nombre </td>
		                  <td>Descripcion</td>
				  <td>Marca</td>
				  <td>¿Que desea Hacer?</td>
		                </tr>
		              </thead>
		              <tbody>
		              <?php 
					   include '../database.php';
					   $pdo = Database::connect();
					   $sql = 'SELECT * FROM productos ORDER BY nombre';
	 				   foreach ($pdo->query($sql) as $row) {
						   		echo '<tr>';
							   	echo '<td>'. $row['idproducto'] . '</td>';
							   	echo '<td>'. $row['nombre'] . '</td>';
							   	echo '<td>'. $row['descripcion'] . '</td>';
								echo '<td>'. $row['marca'] . '</td>';
								echo '<td width=300>';
							   	echo '<a class="btn btn-info" href="read.php?id='.$row['idproducto'].'">Ver</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-info" href="update.php?id='.$row['idproducto'].'">Modificar</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-info" href="delete.php?id='.$row['idproducto'].'">Borrar</a>';
							   	echo '</td>';
							   	echo '</tr>';
					   }
					   Database::disconnect();
					  ?>
				      </tbody>
	         </table>
    	 
    </div> <!-- /container -->
  
  </body>
</html>
