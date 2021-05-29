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

$request = [
    'medico_id' => $_POST['medico_id'],
    'tipo_especializacion_id' => $_POST['tipo_especializacion_id'],
];

$estado = empty($_POST['id']) ? $especializacionesController->create($request) : $especializacionesController->update($_POST['id'], $request);
$url = 'index.php?page=especializaciones';
if ($estado != 'Registro actualizado' &&  !empty($_POST['id'])) {
    $url .= '&view=form&id=' . $_POST['id'];
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro guardado</title>
</head>

<body>
    <div>
        <h1>Resultado de la operación</h1>
        <p>
            <?php echo $estado; ?>
        </p>
        <a href="<?php echo  $url; ?>">Volver</a>
    </div>
</body>

</html>