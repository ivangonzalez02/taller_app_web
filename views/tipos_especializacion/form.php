<?php

use controllers\CitasController;
use models\citas;

require_once dirname(__DIR__) . '/../utils/model_util.php';
require_once dirname(__DIR__) . '/../db/conexion_db.php';
require_once dirname(__DIR__) . '/../models/model.php';
require_once dirname(__DIR__) . '/../models/citas.php';
require_once dirname(__DIR__) . '/../controllers/base_controller.php';
require_once dirname(__DIR__) . '/../controllers/citas_controller.php';

$citasController = new CitasController();
$citas = empty($_GET['id']) ? new citas() : $citasController->detail($_GET['id']);
$titulo = empty($_GET['id']) ? 'Registrar cita' : 'Modificar cita';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title><?php echo $titulo; ?></title>
</head>

<body>
    <a href="index.php?page=citas">Volver</a>
    <div>
        <h1><?php echo $titulo; ?></h1>
        <form action="index.php?page=citas&view=save" method="POST">
            <?php
            if (!empty($_GET['id'])) {
                echo '<input name="id" id="id" type="hidden" value="' . $citas->get('id') . '">';
            }
            ?>

            <div>
                <label>Código:</label>
                <input name="fecha" id="fecha" type="text" value="<?php echo $citas->get('fecha'); ?>" required>
            </div>
            <div>
                <label>Nombres:</label>
                <input name="hora" id="hora" type="text" value="<?php echo $citas->get('hora'); ?>" required>
            </div>
            <div>
                <label>Apellidos:</label>
                <input name="persona_id" id="persona_id" type="text" value="<?php echo $citas->get('persona_id'); ?>" required>
            </div>
            <div>
                <label>Edad:</label>
                <input name="especializacion_id" id="especializacion_id" type="text" value="<?php echo $citas->get('especializacion_id'); ?>" required>
            </div>
            <div>
                <button type="submit">Guardar</button>
            </div>
        </form>
    </div>
</body>

</html>