<?php

namespace controllers;

use controllers\BaseController;
use models\medicos;

class MedicosController extends BaseController
{
    public function index()
    {
        $model = new medicos();
        $rows =  $model->all();
        return $rows;
    }

    public function detail($id)
    {
        $model = new medicos();
        $row =  $model->find($id);
        return $row;
    }

    public function create($request)
    {
        $modelValidation = new medicos();
        $data = $modelValidation->where([
            ['codigo', '=', $request['codigo']]
        ]);
        if (count($data) > 0) {
            return "El código ya se cuentra registrado";
        }

        $model = new medicos();
        $model->set('nombres', $request['nombres']);
        $status = $model->save();
        return $status ? 'Registro guardado' : 'Error al guardar el registro';
    }

    public function update($id, $request)
    {

        $modelValidation = new medicos();
        $data = $modelValidation->where([
            ['codigo', '=', $request['codigo']],
            ['id', '<>', $id]
        ]);
        if (count($data) > 0) {
            return "El código ya se cuentra registrado";
        }

        $model = new medicos();
        $model->set('id', $id);
        $model->set('nombres', $request['nombres']);
        $status = $model->update();
        return $status ? 'Registro actualizado' : 'Error al actualizar el registro';
    }

    public function delete($id)
    {
        $model = new medicos();
        $model->set('id', $id);
        $status = $model->delete();
        return $status ? 'Registro eliminado' : 'Error al eliminar el registro';
    }
}
