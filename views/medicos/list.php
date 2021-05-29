<?php
require_once dirname(__DIR__) . '/../utils/model_util.php';
require_once dirname(__DIR__) . '/../db/conexion_db.php';
require_once dirname(__DIR__) . '/../models/model.php';
require_once dirname(__DIR__) . '/../models/medicos.php';
require_once dirname(__DIR__) . '/../controllers/base_controller.php';
require_once dirname(__DIR__) . '/../controllers/medicos_controller.php';

use controllers\MedicosController;

$medicosController = new MedicosController();
?>
<!doctype HTML>
<html>

<head>
    <title>Medicos</title>
</head>

<body>
    <h1>Listado de medicos</h1>
    <a href="index.php?page=medicos&view=form">Registrar</a>
    <table>
        <thead>
            <tr>
                <th>Nombres</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $rows = $medicosController->index();
            foreach ($rows as $row) {
                echo '<tr>';
                echo '  <td>', $row->get('nombres'), '</td>';
            ?>
                <td>
                    <a href="index.php?page=medicos&view=delete&id=<?php echo $row->get('id'); ?>">Eliminar</a>
                    <a href="index.php?page=medicos&view=form&id=<?php echo $row->get('id'); ?>">Actualizar</a>
                    <button onclick="ver(<?php echo $row->get('id'); ?>)">Ver detalle</button>
                </td>
            <?php
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
    <select name="medicos" id="medicos">
        <?php
        $rows = $medicosController->index();
        foreach ($rows as $row) {
            echo '<option value="' . $row->get('id') . '">' . $row->get('nombres') . '</option>';
        }
        ?>
    </select>
</body>

</html>