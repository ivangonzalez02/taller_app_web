<?php

namespace controllers;

use controllers\BaseController;
use models\especializaciones;

class EspecializacionesController extends BaseController
{
    public function index()
    {
        $model = new especializaciones();
        $rows =  $model->all();
        return $rows;
    }

    public function detail($id)
    {
        $model = new especializaciones();
        $row =  $model->find($id);
        return $row;
    }

    public function create($request)
    {
        $modelValidation = new especializaciones();
        $data = $modelValidation->where([
            ['codigo', '=', $request['codigo']]
        ]);
        if (count($data) > 0) {
            return "El código ya se cuentra registrado";
        }

        $model = new especializaciones();
        $model->set('medico_id',  $request['medico_id']);
        $model->set('tipo_especializacion_id',  $request['tipo_especializacion_id']);
        $status = $model->save();
        return $status ? 'Registro guardado' : 'Error al guardar el registro';
    }

    public function update($id, $request)
    {

        $modelValidation = new especializaciones();
        $data = $modelValidation->where([
            ['codigo', '=', $request['codigo']],
            ['id', '<>', $id]
        ]);
        if (count($data) > 0) {
            return "El código ya se cuentra registrado";
        }

        $model = new especializaciones();
        $model->set('id', $id);
        $model->set('medico_id', $request['medico_id']);
        $model->set('tipo_especializacion_id',  $request['tipo_especializacion_id']);
        $status = $model->update();
        return $status ? 'Registro actualizado' : 'Error al actualizar el registro';
    }

    public function delete($id)
    {
        $model = new especializaciones();
        $model->set('id', $id);
        $status = $model->delete();
        return $status ? 'Registro eliminado' : 'Error al eliminar el registro';
    }
}
