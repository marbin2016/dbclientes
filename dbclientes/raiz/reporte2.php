 
<!DOCTYPE html>
<html lang="sp">
<head>
    <meta charset="utf-8">

    <link   href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
    		
				<div>
					<h2>Comercial La Mejor</h2> <br>
					<h2>Sistema de control de clientes</h2>
    		  </div>
			  <h2>Reporte de Clientes</h2>
			 <table class="table table-striped table-bordered">
		             <thead>
		                <tr>
		                  <td>Codigo Cliente</td>
		                  <td>Nombres </td>
		                  <td>Apellidos</td>
						  <td>Tipo</td>
		                  <td>Direccion</td>
						  <td>Telefono</td>
						  <td>email</td>
						  <td>DUI</td>
						  </tr>
		              </thead>
		               <tbody> <?php 
					   include '../database.php';
					   $pdo = Database::connect();
						if ($_GET["rep"]=="todos")	
						{	$sql = 'SELECT * FROM clientes ORDER BY apellidos';
						}
						if ($_GET["rep"]=="consaldo")	
						{	$sql = 'SELECT clientes.*,ventas.saldo FROM clientes,ventas where clientes.idcliente=ventas.idcliente and saldo>0 ORDER BY apellidos';
						}
					   if ($_GET["rep"]=="clientex")	
						{	$sql = 'SELECT clientes.* FROM clientes where clientes.idcliente='.$_GET["idcliente"];
							 
						}
					   
					   foreach ($pdo->query($sql) as $row) {
						   		echo '<tr>';
							   	echo '<td>'. $row['idcliente'] . '</td>';
							   	echo '<td>'. $row['nombre'] . '</td>';
							   	echo '<td>'. $row['apellidos'] . '</td>';
								echo '<td>'. $row['tipo'] . '</td>';
								echo '<td>'. $row['direccion'] . '</td>';
								echo '<td>'. $row['telefono'] . '</td>';
								echo '<td>'. $row['dui'] . '</td>';
								echo '<td>'. $row['email'] . '</td>';
							
							   	echo '</tr>';
					   }
					   Database::disconnect();
					  ?>
				     
				      </tbody>
	         </table>
			 
			 <?php
			 if ($_GET["rep"]=="clientex")	
						{	$sql = 'SELECT clientes.idcliente as idclien,referencias.* FROM clientes,referencias where clientes.idcliente=referencias.idcliente and clientes.idcliente='.$_GET["idcliente"];
						
			 ?>
			 <h4>Referencias del cliente:</h4>
			 <table class="table table-striped table-bordered">
		             <thead>
		                <tr>
		                   
		                  <td>Nombres </td>
		                  <td>Parentesco</td>
						
		                  <td>Direccion</td>
						  <td>Telefono</td>
						 </tr>
		              </thead>
		               <tbody> <?php 
			 		   $pdo = Database::connect();
					 
					   
					   foreach ($pdo->query($sql) as $row) {
						   		echo '<tr>';
							    echo '<td>'. $row['nombre'] . '</td>';
							   	echo '<td>'. $row['parentesco'] . '</td>';
								echo '<td>'. $row['direccion'] . '</td>';
								echo '<td>'. $row['telefono'] . '</td>';
								echo '</tr>';
					   }
					   Database::disconnect();
					  ?>
				     
				      </tbody>
	         
			 
			 </table>
			<?php 
				} 
			?>
    </div> <!-- /container -->
 <script>window.print();</script>  
  </body>
</html>
