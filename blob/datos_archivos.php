<?php 

//Recibimos los datos de la imagen
 $nombre_archivo=$_FILES["archivo"]["name"];
 $tipo_archivo=$_FILES["archivo"]["type"];
 $tamaño_archivo=$_FILES["archivo"]["size"];

 //echo $tamaño_archivo;
 //echo $tipo_archivo;


 if ($tamaño_archivo<=1000000) {


 		 //ruta de la carpeta destino en el servidor
	 $carpeta_destino=$_SERVER["DOCUMENT_ROOT"] . "/intranet/uploads/";

	//movemos la archivo del directorio temporal o carpeta temporal al directorio o carpeta escogida
	 move_uploaded_file($_FILES["archivo"]["tmp_name"],$carpeta_destino . $nombre_archivo); 	

	 }
	 else{
	 	echo "El tamaño de la archivo es demaciado grande....";
	 }


	require("datos_conexion.php");

	$conexion=mysqli_connect($db_host,$db_usuario,$db_contra);

	if(mysqli_connect_errno()){//verifica si  no existe conecion
		echo "Error de  conexion a bd";
		exit();
	}


	mysqli_select_db($conexion,$db_nombre) or die("No se encuentra la base de datos");//en caso de no encontrar la base de datos

	mysqli_set_charset($conexion,"utf8");//linea que permite mostrar 

	$archivo_objetivo=fopen($carpeta_destino . $nombre_archivo,"r");
	
	$contenido = fread($archivo_objetivo, $tamaño_archivo);

	//$contenido=addcslashes($contenido,'A..z');
	$contenido=addslashes($contenido);

	fclose($archivo_objetivo);

	$sql="insert into archivos (id,nombre,tipo,contenido) values (0,'$nombre_archivo','$tipo_archivo','$contenido')";
	
	$resultado=mysqli_query($conexion,$sql);	


	if(mysqli_affected_rows($conexion)>0){
		echo "Se ha insertado registro con exito";
	}
	else{
		echo "No se ha pidido insertar el archivo";
	}








?>	
