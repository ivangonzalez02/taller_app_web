<?php
require_once dirname(__DIR__) . '/utils/model_util.php';
require_once dirname(__DIR__) . '/db/conexion_db.php';
require_once dirname(__DIR__) . '/models/model.php';
require_once dirname(__DIR__) . '/controllers/base_controller.php';
require_once dirname(__DIR__) . '/api/parse_array_reponse.php';
require_once dirname(__DIR__) . '/api/response.php';

$uriRelativeApp =  '/taller_app_web';

$uriClass = [
    "citas" => [
        'model' => 'models/citas.php',
        'controller' => 'controllers/citas_controller.php'
    ],
    "especializaciones" => [
        'model' => 'models/especializaciones.php',
        'controller' => 'controllers/especializaciones_controller.php'
    ],
    "medicos" => [
        'model' => 'models/medicos.php',
        'controller' => 'controllers/medicos_controller.php'
    ],
    "personas" => [
        'model' => 'models/personas.php',
        'controller' => 'controllers/personas_controller.php'
    ],
    "tipos_especializacion" => [
        'model' => 'models/tipos_especializacion.php',
        'controller' => 'controllers/tipos_especializacion_controller.php'
    ],
];

$controllers = [
    "citas" => 'controllers\CitasController',
    "especializaciones" => 'controllers\EspecializacionesController',
    "medicos" => 'controllers\MedicosController',
    "personas" => 'controllers\PersonasController',
    "tipos_especializacion" => 'controllers\TiposEspecializacionController'
];


$getArrayUrlCurrent = function () {
    $urlData = str_replace($GLOBALS['uriRelativeApp'], '', $_SERVER['REQUEST_URI']);
    $urlArray  =  explode('/', $urlData);
    return  $urlArray;
};

