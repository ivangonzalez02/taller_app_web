<?php

use controllers\EspecializacionesController;
use models\especializaciones;

require_once dirname(__DIR__) . '/../utils/model_util.php';
require_once dirname(__DIR__) . '/../db/conexion_db.php';
require_once dirname(__DIR__) . '/../models/model.php';
require_once dirname(__DIR__) . '/../models/especializaciones.php';
require_once dirname(__DIR__) . '/../controllers/base_controller.php';
require_once dirname(__DIR__) . '/../controllers/especializaciones_controller.php';

$especializacionesController = new EspecializacionesController();
$especializaciones = empty($_GET['id']) ? new especializaciones() : $especializacionesController->detail($_GET['id']);
$titulo = empty($_GET['id']) ? 'Registrar especializacion' : 'Modificar especializacion';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title><?php echo $titulo; ?></title>
</head>

<body>
    <a href="index.php?page=especializaciones">Volver</a>
    <div>
        <h1><?php echo $titulo; ?></h1>
        <form action="index.php?page=especializaciones&view=save" method="POST">
            <?php
            if (!empty($_GET['id'])) {
                echo '<input name="id" id="id" type="hidden" value="' . $especializacioness->get('id') . '">';
            }
            ?>

            <div>
                <label>Medico_id:</label>
                <input name="medico_id" id="medico_id" type="text" value="<?php echo $citas->get('medico_id'); ?>" required>
            </div>
            <div>
                <label>Tipo_especializacion_id:</label>
                <input name="tipo_especializacion_id" id="tipo_especializacion_id" type="text" value="<?php echo $citas->get('tipo_especializacion_id'); ?>" required>
            </div>
            <div>
                <button type="submit">Guardar</button>
            </div>
        </form>
    </div>
</body>

</html>