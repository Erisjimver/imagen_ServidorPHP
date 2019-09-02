<?php 

//Recibimos los datos de la imagen
 $nombre_imagen=$_FILES["imagen"]["name"];
 $tipo_imagen=$_FILES["imagen"]["type"];
 $tamaño_imagen=$_FILES["imagen"]["size"];

 //echo $tamaño_imagen;
 //echo $tipo_imagen;


 if ($tamaño_imagen<=1000000) {

 	if ($tipo_imagen=="image/jpg"||$tipo_imagen=="image/png"||$tipo_imagen=="image/jpeg") {
 		 //ruta de la carpeta destino en el servidor
	 $carpeta_destino=$_SERVER["DOCUMENT_ROOT"] . "/intranet/uploads/";

	//movemos la imagen del directorio temporal o carpeta temporal al directorio o carpeta escogida
	 move_uploaded_file($_FILES["imagen"]["tmp_name"],$carpeta_destino . $nombre_imagen); 	
	 //echo "Se subio";
 	}
 	else{
 		echo "No es un formato permitido";
 	}
	
	 }
	 else{
	 	echo "El tamaño de la imagen es demaciado grande....";
	 }


	require("datos_conexion.php");

	$conexion=mysqli_connect($db_host,$db_usuario,$db_contra);

	if(mysqli_connect_errno()){//verifica si  no existe conecion
		echo "Error de  conexion a bd";
		exit();
	}


	mysqli_select_db($conexion,$db_nombre) or die("No se encuentra la base de datos");//en caso de no encontrar la base de datos

	mysqli_set_charset($conexion,"utf8");//linea que permite mostrar 

	$sql="update productos set foto='$nombre_imagen' where códigoartículo='AR01'";
	
	$resultado=mysqli_query($conexion,$sql);	











?>	
