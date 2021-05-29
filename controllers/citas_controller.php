<?php

namespace controllers;

use controllers\BaseController;
use models\citas;

class CitasController extends BaseController
{
    public function index()
    {
        $model = new citas();
        $rows =  $model->all();
        return $rows;
    }

    public function detail($id)
    {
        $model = new citas();
        $row =  $model->find($id);
        return $row;
    }

    public function create($request)
    {
        $modelValidation = new citas();
        $data = $modelValidation->where([
            ['codigo', '=', $request['codigo']]
        ]);
        if (count($data) > 0) {
            return "El código ya se cuentra registrado";
        }

        $model = new citas();
        $model->set('fecha', $request['fecha']);
        $model->set('hora',  $request['hora']);
        $model->set('persona_id',  $request['persona_id']);
        $model->set('especializacion_id',  $request['especializacion_id']);
        $status = $model->save();
        return $status ? 'Registro guardado' : 'Error al guardar el registro';
    }

    public function update($id, $request)
    {

        $modelValidation = new citas();
        $data = $modelValidation->where([
            ['codigo', '=', $request['codigo']],
            ['id', '<>', $id]
        ]);
        if (count($data) > 0) {
            return "El código ya se cuentra registrado";
        }

        $model = new citas();
        $model->set('id', $id);
        $model->set('fecha', $request['fecha']);
        $model->set('hora',  $request['hora']);
        $model->set('persona_id',  $request['persona_id']);
        $model->set('especializacion_id',  $request['especializacion_id']);
        $status = $model->update();
        return $status ? 'Registro actualizado' : 'Error al actualizar el registro';
    }

    public function delete($id)
    {
        $model = new Citas();
        $model->set('id', $id);
        $status = $model->delete();
        return $status ? 'Registro eliminado' : 'Error al eliminar el registro';
    }
}
