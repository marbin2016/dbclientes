<?php
//clase para conectar a la base de datos
class Database 
{
	private static $dbName = 'dbclientes' ; 
	private static $dbHost = 'localhost' ;
	private static $dbUsername = 'marbin';
	private static $dbUserPassword = "mrodriguez";
	
	private static $cont  = null;
	
	public function __construct() {
		exit('Init function is not allowed');
	}
	
	public static function connect()
	{
	   // Haremos una conexion para toda la aplicacion
       if ( null == self::$cont )
       {      
        try 
        {
          self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword);  
        }
        catch(PDOException $e) 
        {
          die($e->getMessage());  
        }
       } 
       return self::$cont;
	}
	//funcion para desconectar
	public static function disconnect()
	{
		self::$cont = null;
	}
	 
}
function borrar($tabla,$condicion,$param)
{	//funcion para borrar un registro
	$sql = "DELETE FROM $tabla  WHERE $condicion";
	$pdo = Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$q = $pdo->prepare($sql);
	$q->execute(array($param));
	Database::disconnect();
		  
}
function actualizar($tabla,$param,$valores)
{	//función para modificar datos de un registro
	$pdo = Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "UPDATE $tabla set $param";
	$q = $pdo->prepare($sql);
	$q->execute($valores);
	Database::disconnect();
}
function guardar($ta,$campos,$param,$valores)
{	//función para guardar un registro en una tabla
	$pdo = Database::connect();	
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "INSERT INTO $ta ($campos) values($param)";
	
 	$q = $pdo->prepare($sql);
	$q->execute($valores);
	Database::disconnect();
 
}


?>
