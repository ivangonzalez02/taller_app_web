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

$request = [
    'fecha' => $_POST['fecha'],
    'hora' => $_POST['hora'],
    'persona_id' => $_POST['persona_id'],
    'especializacion_id' => $_POST['especializacion_id'],
];

$estado = empty($_POST['id']) ? $citaseController->create($request) : $citasController->update($_POST['id'], $request);
$url = 'index.php?page=citas';
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