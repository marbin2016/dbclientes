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
						<td><H4>CONTROL DEL CLIENTES</H4></td>
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
		                  <td>Codigo Cliente</td>
		                  <td>Nombres </td>
		                  <td>Apellidos</td>
				  <td>Tipo</td>
		                  <td>¿Que desea Hacer?</td>
		                </tr>
		              </thead>
		              <tbody>
		              <?php 
					   include '../database.php';
					   $pdo = Database::connect();
					   $sql = 'SELECT idcliente,nombre,apellidos,tipo FROM clientes ORDER BY apellidos';
	 				   foreach ($pdo->query($sql) as $row) {
						   		echo '<tr>';
							   	echo '<td>'. $row['idcliente'] . '</td>';
							   	echo '<td>'. $row['nombre'] . '</td>';
							   	echo '<td>'. $row['apellidos'] . '</td>';
								echo '<td>'. $row['tipo'] . '</td>';
							   	echo '<td width=300>';
							   	echo '<a class="btn btn-info" href="read.php?id='.$row['idcliente'].'">Ver</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-info" href="update.php?id='.$row['idcliente'].'">Modificar</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-info" href="delete.php?id='.$row['idcliente'].'">Borrar</a>';
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
