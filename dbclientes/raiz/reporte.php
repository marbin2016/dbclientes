<!DOCTYPE html>
<html lang="sp">
<head>
    <meta charset="utf-8">

    <link   href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
    		
			<div >
					
    		  </div>
			 <h2>Reportes de Clientes:</h2>
			  <li> <a href="reporte2.php?rep=todos">Todos los clientes</a><br>
			  <li> <a href="reporte2.php?rep=consaldo">Solo clientes con saldo>0</a><br>
				<form action="reporte2.php" method="get">
					<li>Código cliente:<input type="text" name="idcliente" >
					<input type="hidden" name="rep" value="clientex">
					<input type="submit" value="Ver reporte">
				</form>
				
			   </div> <!-- /container -->
  
  </body>
</html>