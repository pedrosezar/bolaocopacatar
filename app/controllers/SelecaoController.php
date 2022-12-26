<?php
namespace app\controllers;

use app\core\Controller;
use app\models\service\SelecaoService;
use app\core\Flash;
use app\util\UtilService;

class SelecaoController extends Controller {

    private $tabela = "selecoes";
    private $campo  = "id";

    public function __construct()
    {
        $this->usuario = UtilService::getUsuario();
        if (!$this->usuario || $this->usuario->status != "admin") {
            $this->redirect(URL_BASE);
        }
    }

    public function index()
    {
        $dados["selecao"] = Flash::getForm();
        $dados["view"]    = "Selecao/Create";
        $this->load("template", $dados);
    }

    public function salvar()
    {
        $selecao          = new \stdClass();
        $selecao->id      = intval($_POST['id']);
        $selecao->selecao = filter_input(INPUT_POST, "selecao");
        $selecao->tipo    = filter_input(INPUT_POST, "tipo");
        $selecao->escudo  = $_FILES["escudo"]["name"];
        Flash::setForm($selecao);
        SelecaoService::salvar($selecao, $this->campo, $this->tabela);
        $this->redirect(URL_BASE . "/selecao");
    }

}
