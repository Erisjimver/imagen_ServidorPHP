<!DOCTYPE html>
<html>
<head>
	<title>Imagen bd</title>
</head>
<body>

<?php 
	$id="";
	$contenido="";
	$tipo="";

	
	require("datos_conexion.php");

	$conexion=mysqli_connect($db_host,$db_usuario,$db_contra);

	if(mysqli_connect_errno()){//verifica si  no existe conecion
		echo "Error de  conexion a bd";
		exit();
	}


	mysqli_select_db($conexion,$db_nombre) or die("No se encuentra la base de datos");//en caso de no encontrar la base de datos

	mysqli_set_charset($conexion,"utf8");//linea que permite mostrar 

	
	$consulta="select * from archivos where id=4";
	
	$resultado=mysqli_query($conexion,$consulta);	


	while($fila=mysqli_fetch_array($resultado)){
		
		$id=$fila["id"];
		$contenido=$fila["contenido"];
		$tipo=$fila["tipo"];
		
	}
	echo "ID: " . $id . "<br>";
	echo "Tipo: " . $tipo . "<br>";
	echo "<img src='data:image/png; base64," . base64_encode($contenido) . "'>";
 ?>
<div>

<!--
	<img src="/intranet/uploads/$ruta_img">
	
<img src="/intranet/uploads/<?php echo $ruta_img; ?>" alt='Imagen del primer articulo' width='25%'/>
-->

</div>


</body>
</html>