<?php 

//Recibimos los datos de la imagen
 $nombre_imagen=$_FILES["imagen"]["name"];
 $tipo_imagen=$_FILES["imagen"]["type"];
 $tamaño_imagen=$_FILES["imagen"]["size"];

 //echo $tamaño_imagen;



 if ($tamaño_imagen<=1000000) {

	 //ruta de la carpeta destino en el servidor
	 $carpeta_destino=$_SERVER["DOCUMENT_ROOT"] . "/intranet/uploads/";

	//movemos la imagen del directorio temporal o carpeta temporal al directorio o carpeta escogida
	 move_uploaded_file($_FILES["imagen"]["tmp_name"],$carpeta_destino . $nombre_imagen); 	
	 echo "Se subio";
	 }
	 else{
	 	echo "El tamaño de la imagen es demaciado grande....";
	 }

?>	