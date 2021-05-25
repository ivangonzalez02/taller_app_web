<?php 

include("con_db.php");

if(isset($_POST['register'])){
	if (strlen ($_POST['tipoidentificacion']) >= 1 && strlen($_POST['numeroidentificacion']) >= 1 && strlen($_POST['name']) >= 1) {
		$tipoidentificacion = trim($_POST['tipoidentificacion']);
		$numeroidentificacion = trim($_POST['numeroidentificacion']);
		$name = trim($_POST['name']);
		$consulta = "INSERT INTO personas(tipo_identificacion, numero_identificacion, nombres) VALUES ('$tipoidentificacion','$numeroidentificacion','$name')";
		$resultado = mysqli_query($conex,$consulta);
		if ($resultado) {
			?>
			<h3 class="ok">Te has inscrito correctamente</h3>
			<?php
		} else{
			?>
			<h3 class="bad">Ups ha ocurrido un error</h3>
			<?php
		}
	}	else {
			?>
			<h3 class="bad">Por favor complete los campos</h3>
			<?php
	}
}

?>