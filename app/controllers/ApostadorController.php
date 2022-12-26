<?php
namespace app\controllers;

use app\core\Controller;
use app\models\service\ApostadorService;

class ApostadorController extends Controller {

    public function index()
    {
        $dados["apostas"] = ApostadorService::getApostas($id = null);
        $dados["view"]    = "apostador";
        $this->load("template", $dados);
    }

    public function show($id)
    {
        $lista = ApostadorService::getApostas($id);
        echo json_encode($lista);
    }

}
