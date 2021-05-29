<!DOCTYPE html>
<html>
<head>
    <title>Registrar usuario</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
    <form method="post">
        <h1>Regístrate </h1>
        <!--Tipo de Documento:
        <select>
            <option disabled selected="">Selecciona</option>
            <option>Cédula de Ciudadanía</option>
            <option>Tarjeta de Identidad</option>
            <option>Cédula de Extranjería</option>
            <option>Registro Civíl</option>
            <option>Pasaporte</option>
        </select>
        !-->
        <p>Tipo de Documento:</p>
        <input type="text" name="tipoidentificacion" placeholder="Tipo de Identificación">
        <br></br>
        <p>Número de Documento:</p>
        <input type="number" name="numeroidentificacion" placeholder="Número Identificación">
        <br></br>
        <p>Nombres Completos:</p>
        <input type="text" name="name" placeholder="Nombres">
        <input type="submit" name="register">
    </form>
    <?php
    include("registrar.php")
    ?>
</body>
</html>