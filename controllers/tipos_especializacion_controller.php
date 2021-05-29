<?php

namespace controllers;

use controllers\BaseController;
use models\tipos_especializacion;

class TiposEspecializacionController extends BaseController
{
    public function index()
    {
        $model = new tipos_especializacion();
        $rows =  $model->all();
        return $rows;
    }

    public function detail($id)
    {
        $model = new tipos_especializacion();
        $row =  $model->find($id);
        return $row;
    }

    public function create($request)
    {
        $modelValidation = new tipos_especializacion();
        $data = $modelValidation->where([
            ['codigo', '=', $request['codigo']]
        ]);
        if (count($data) > 0) {
            return "El código ya se cuentra registrado";
        }

        $model = new tipos_especializacion();
        $model->set('nombre', $request['nombre']);
        $status = $model->save();
        return $status ? 'Registro guardado' : 'Error al guardar el registro';
    }

    public function update($id, $request)
    {

        $modelValidation = new tipos_especializacion();
        $data = $modelValidation->where([
            ['codigo', '=', $request['codigo']],
            ['id', '<>', $id]
        ]);
        if (count($data) > 0) {
            return "El código ya se cuentra registrado";
        }

        $model = new tipos_especializacion();
        $model->set('id', $id);
        $model->set('nombre', $request['nombre']);
        $status = $model->update();
        return $status ? 'Registro actualizado' : 'Error al actualizar el registro';
    }

    public function delete($id)
    {
        $model = new tipos_especializacion();
        $model->set('id', $id);
        $status = $model->delete();
        return $status ? 'Registro eliminado' : 'Error al eliminar el registro';
    }
}
