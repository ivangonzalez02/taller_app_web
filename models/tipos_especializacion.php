<?php

namespace models;

use models\Model;

class tipos_especializacion extends Model
{
    protected $id;
    protected $nombre;

    public function __construct()
    {
        $this->superClass($this);
        $this->table = 'tipos_especializacion';
    }
}
