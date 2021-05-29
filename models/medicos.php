<?php

namespace models;

use models\Model;

class medicos extends Model
{
    protected $id;
    protected $nombres;

    public function __construct()
    {
        $this->superClass($this);
        $this->table = 'medicos';
    }
}
