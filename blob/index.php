<!DOCTYPE html>
<html>
<head>
	<title>Imagenes servidor</title>
	<style type="text/css">
		
table{
	margin: auto;
	width: 450px;
	border: 2px dotted #FF0000;
}

	</style>
</head>
<body>

	<form action="datos_imagen.php" method="post" enctype="multipart/form-data">


		<table>

			<tr>
				<td><label for="imagen">Imagen: </label></td>
				<td><input type="file" name="imagen" size="200"></td>
			</tr>
			<tr>
				<td colspan="2" style="text-align: center"><input type="submit" name="envie" value="Enviar imagen"></td>
			</tr>


		</table>


	</form>


</body>
</html>