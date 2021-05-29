<?php

namespace controllers;

use controllers\BaseController;
use models\personas;

class PersonasController extends BaseController
{
    public function index()
    {
        $model = new personas();
        $rows =  $model->all();
        return $rows;
    }

    public function detail($id)
    {
        $model = new personas();
        $row =  $model->find($id);
        return $row;
    }

    public function create($request)
    {
        $modelValidation = new personas();
        $data = $modelValidation->where([
            ['numero_identificacion', '=', $request['numero_identificacion']]
        ]);
        if (count($data) > 0) {
            return "El numero de identificacion ya se cuentra registrado";
        }

        $model = new personas();
        $model->set('tipo_identificacion',  $request['tipo_identificacion']);
        $model->set('numero_identificacion',  $request['numero_identificacion']);
        $model->set('nombres',  $request['nombres']);
        $status = $model->save();
        return $status ? 'Registro guardado' : 'Error al guardar el registro';
    }

    public function update($id, $request)
    {

        $modelValidation = new personas();
        $data = $modelValidation->where([
            ['numero_identificacion', '=', $request['numero_identificacion']],
            ['id', '<>', $id]
        ]);
        if (count($data) > 0) {
            return "El numero de identificacion ya se cuentra registrado";
        }

        $model = new personas();
        $model->set('id', $id);
        $model->set('tipo_identificacion', $request['tipo_identificacion']);
        $model->set('numero_identificacion',  $request['numero_identificacion']);
        $model->set('nombres',  $request['nombres']);
        $status = $model->update();
        return $status ? 'Registro actualizado' : 'Error al actualizar el registro';
    }

    public function delete($id)
    {
        $model = new personas();
        $model->set('id', $id);
        $status = $model->delete();
        return $status ? 'Registro eliminado' : 'Error al eliminar el registro';
    }
}
