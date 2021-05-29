<?php
require_once dirname(__DIR__) . '/../utils/model_util.php';
require_once dirname(__DIR__) . '/../db/conexion_db.php';
require_once dirname(__DIR__) . '/../models/model.php';
require_once dirname(__DIR__) . '/../models/especializacioness.php';
require_once dirname(__DIR__) . '/../controllers/base_controller.php';
require_once dirname(__DIR__) . '/../controllers/especializaciones_controller.php';

use controllers\EspecializacionesController;

$especializacionesController = new EspecializacionesController();
?>
<!doctype HTML>
<html>

<head>
    <title>Especializaciones</title>
</head>

<body>
    <h1>Listado de especializaciones</h1>
    <a href="index.php?page=especializaciones&view=form">Registrar</a>
    <table>
        <thead>
            <tr>
                <th>Medico_id</th>
                <th>Tipo_Especializacion_id</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $rows = $especializacionesController->index();
            foreach ($rows as $row) {
                echo '<tr>';
                echo '  <td>', $row->get('medico_id'), '</td>';
                echo '  <td>', $row->get('tipo_especializacion_id'), '</td>';
            ?>
                <td>
                    <a href="index.php?page=especializaciones&view=delete&id=<?php echo $row->get('id'); ?>">Eliminar</a>
                    <a href="index.php?page=especializaciones&view=form&id=<?php echo $row->get('id'); ?>">Actualizar</a>
                    <button onclick="ver(<?php echo $row->get('id'); ?>)">Ver detalle</button>
                </td>
            <?php
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
    <select name="especializaciones" id="especializaciones">
        <?php
        $rows = $especializacionesController->index();
        foreach ($rows as $row) {
            echo '<option value="' . $row->get('id') . '">' . $row->get('medico_id') . '</option>';
        }
        ?>
    </select>
</body>

</html>