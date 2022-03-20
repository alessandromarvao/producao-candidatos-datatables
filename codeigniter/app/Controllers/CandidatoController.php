<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CandidatoModel;

class CandidatoController extends BaseController
{
    private $model;

    function __construct()
    {
        $this->model = new CandidatoModel();
    }

    public function index()
    {
        return \json_encode([
            'data' => $this->model->findAll()
        ]);
    }

    public function save()
    {

        $this->model->save([
            'nome' => service('request')->getPost('nome'),
            'email' => service('request')->getPost('email'),
            'avaliacao' => service('request')->getPost('nota')
        ]);

        return \json_encode([
            'data' => $this->model->findAll()
        ]);
    }

    public function update()
    {        
        $this->model->update([
            'nome' => '', 
            'email' => '', 
            'avaliacao' => ''
        ]);
    }

    public function search()
    {
        $candidatos = $this->model->like('nome', service('request')->getGet('text'))->findAll();
        return \json_encode([
            'data' => $candidatos
        ]);
    }

    public function delete()
    {
        $this->model->delete();
    }

    public function __destruct()
    {
        $this->model = null;
    }
}
