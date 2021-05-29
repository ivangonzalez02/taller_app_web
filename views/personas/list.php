<?php
require_once dirname(__DIR__) . '/../utils/model_util.php';
require_once dirname(__DIR__) . '/../db/conexion_db.php';
require_once dirname(__DIR__) . '/../models/model.php';
require_once dirname(__DIR__) . '/../models/citas.php';
require_once dirname(__DIR__) . '/../controllers/base_controller.php';
require_once dirname(__DIR__) . '/../controllers/citas_controller.php';

use controllers\CitasController;

$citasController = new CitasController();
?>
<!doctype HTML>
<html>

<head>
    <title>Citas</title>
</head>

<body>
    <h1>Listado de citas</h1>
    <a href="index.php?page=estudiantes&view=form">Registrar</a>
    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Persona_id</th>
                <th>Especializacion_id</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $rows = $citasController->index();
            foreach ($rows as $row) {
                echo '<tr>';
                echo '  <td>', $row->get('fecha'), '</td>';
                echo '  <td>', $row->get('hora'), '</td>';
                echo '  <td>', $row->get('persona_id'), '</td>';
                echo '  <td>', $row->get('especializacion_id'), '</td>';
            ?>
                <td>
                    <a href="index.php?page=citas&view=delete&id=<?php echo $row->get('id'); ?>">Eliminar</a>
                    <a href="index.php?page=citas&view=form&id=<?php echo $row->get('id'); ?>">Actualizar</a>
                    <button onclick="ver(<?php echo $row->get('id'); ?>)">Ver detalle</button>
                </td>
            <?php
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
    <select name="citas" id="citas">
        <?php
        $rows = $citasController->index();
        foreach ($rows as $row) {
            echo '<option value="' . $row->get('id') . '">' . $row->get('persona_id') . '</option>';
        }
        ?>
    </select>
</body>

</html>