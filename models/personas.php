<?php

namespace models;

use models\Model;

class personas extends Model
{
    protected $id;
    protected $tipo_identificacion;
    protected $numero_identificacion;
    protected $nombres

    public function __construct()
    {
        $this->superClass($this);
        $this->table = 'personas';
    }
}
