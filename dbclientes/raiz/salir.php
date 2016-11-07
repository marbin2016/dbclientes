<? 
function salir() 
{ 
$accion = $_POST['Accion']; 
if($accion=="salir") 
{ 
echo " <script>"; 
echo "<a href=../dbclientes/index.php></a>"; 
echo "</script> "; 
}} 
?> 