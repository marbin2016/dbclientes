<?php
include("conexion.php");
$usuario=$_POST["usuario"];
$pass=$_POST["pass"];
$sql="SELECT * from usuarios where usuario = '$usuario' and password= '$pass'";
$resultado=mysql_query($sql,$con) or die(mysql_error());
//$num=mysql_num_rows($resultado);
if(mysql_num_rows($resultado))
{ // nos devuelve 1 si encontro el usuario y el password
$array=mysql_fetch_array($resultado);


$_SESSION['nombre'] = $array ['nombre'];

echo "<html><head><meta http-equiv='REFRESH' content='0;url=raiz/menu/index.php'></head></html>";
}
 else
{
echo "<html><head><meta http-equiv='REFRESH' content='0;url=negacion.php'></head></html>";	
}
?>



