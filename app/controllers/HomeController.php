<?php
namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\models\service\JogoService;

class HomeController extends Controller {

    public function index()
    {
        $dados["jogo"] = JogoService::getJogo();
        $dados["view"] = "home";
        $this->load("template", $dados);
    }

}
