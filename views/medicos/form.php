<?php

use controllers\MedicosController;
use models\medicos;

require_once dirname(__DIR__) . '/../utils/model_util.php';
require_once dirname(__DIR__) . '/../db/conexion_db.php';
require_once dirname(__DIR__) . '/../models/model.php';
require_once dirname(__DIR__) . '/../models/medicos.php';
require_once dirname(__DIR__) . '/../controllers/base_controller.php';
require_once dirname(__DIR__) . '/../controllers/medicos_controller.php';

$medicosController = new MedicosController();
$medicos = empty($_GET['id']) ? new medicos() : $medicosController->detail($_GET['id']);
$titulo = empty($_GET['id']) ? 'Registrar medico' : 'Modificar medico';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title><?php echo $titulo; ?></title>
</head>

<body>
    <a href="index.php?page=medicos">Volver</a>
    <div>
        <h1><?php echo $titulo; ?></h1>
        <form action="index.php?page=medicos&view=save" method="POST">
            <?php
            if (!empty($_GET['id'])) {
                echo '<input name="id" id="id" type="hidden" value="' . $medicos->get('id') . '">';
            }
            ?>

            <div>
                <label>Nombre:</label>
                <input name="nombres" id="nombres" type="text" value="<?php echo $medicos->get('nombres'); ?>" required>
            </div>
            <div>
                <button type="submit">Guardar</button>
            </div>
        </form>
    </div>
</body>

</html>