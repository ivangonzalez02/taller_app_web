<?php

namespace models;

use models\Model;

class citas extends Model
{
    protected $id;
    protected $fecha;
    protected $hora;
    protected $persona_id;
    protected $especializacion_id;

    public function __construct()
    {
        $this->superClass($this);
        $this->table = 'citas';
    }
}
