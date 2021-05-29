<?php

namespace models;

use models\Model;

class especializaciones extends Model
{
    protected $id;
    protected $medico_id;
    protected $tipo_especializacion_id;

    public function __construct()
    {
        $this->superClass($this);
        $this->table = 'especializaciones';
    }
}
