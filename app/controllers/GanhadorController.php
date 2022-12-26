<?php
namespace app\controllers;

use app\core\Controller;
use app\models\service\GanhadorService;

class GanhadorController extends Controller {

    public function index()
    {
        $jogo = GanhadorService::getJogo();
        if ($jogo != null) {
            $dados["ganhadores"] = GanhadorService::getGanhadoresPorJogo($jogo->id);
        }
        $dados["jogo"] = $jogo;
        $dados["view"] = "ganhador";
        $this->load("template", $dados);
    }

}
