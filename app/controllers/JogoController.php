<?php
namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\models\service\JogoService;
use app\util\UtilService;
use app\core\Flash;

class JogoController extends Controller {

    private $tabela = "jogos";
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
        $dados["jogos"] = JogoService::getJogos();
        $dados["view"]  = "Jogo/Index";
        $this->load("template", $dados);
    }

    public function create()
    {
        $dados["jogo"]       = Flash::getForm();
        $dados["mandantes"]  = JogoService::getMandantes();
        $dados["visitantes"] = JogoService::getVisitantes();
        $dados["view"]       = "Jogo/Create";
        $this->load("template", $dados);
    }

    public function edit($id)
    {
        $jogo                = Service::get($this->tabela, $this->campo, $id);
        $dados["mandantes"]  = JogoService::getMandantes();
        $dados["visitantes"] = JogoService::getVisitantes();
        if (!$jogo) {
            $this->redirect(URL_BASE . "/jogo");
        }
        $dados["jogo"] = (Flash::isForm()) ? Flash::getForm() : $jogo;
        $dados["view"] = "Jogo/Create";
        $this->load("template", $dados);
    }

    public function gerenciar($id)
    {
        $jogo = JogoService::getJogoPorId($id);
        if (!$jogo) {
            $this->redirect(URL_BASE . "/jogo");
        }
        $dados["jogo"] = $jogo;
        $dados["view"] = "Jogo/Gerenciar";
        $this->load("template", $dados);
    }

    public function salvar()
    {
        $jogo                 = new \stdClass();
        $jogo->id             = intval($_POST['id']);
        $jogo->mandante       = filter_input(INPUT_POST, "mandante", FILTER_VALIDATE_INT);
        $jogo->visitante      = filter_input(INPUT_POST, "visitante", FILTER_VALIDATE_INT);
        $jogo->data_hora      = filter_input(INPUT_POST, "data_hora");
        $jogo->gols_mandante  = filter_input(INPUT_POST, "gols_mandante", FILTER_VALIDATE_INT);
        $jogo->gols_visitante = filter_input(INPUT_POST, "gols_visitante", FILTER_VALIDATE_INT);
        if ($jogo->id != 0) {
            $jogo->status = 0;
        }
        Flash::setForm($jogo);
        if (JogoService::salvar($jogo, $this->campo, $this->tabela)) {
            $this->redirect(URL_BASE . "/jogo");
        } else {
            if (!$jogo->id) {
                $this->redirect(URL_BASE . "/jogo/create");
            } else {
                $this->redirect(URL_BASE . "/jogo/edit/{$jogo->id}");
            }
        }
    }

    public function atualizar()
    {
        $jogo         = new \stdClass();
        $jogo->id     = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
        $jogo->exibir = (filter_input(INPUT_POST, "exibir", FILTER_VALIDATE_BOOLEAN)) ? 1 : 0;
        if (Service::editar(objToArray($jogo), $this->campo, $this->tabela)) {
            $this->redirect(URL_BASE . "/jogo");
        } else {
            $this->redirect(URL_BASE . "/jogo/gerenciar/{$jogo->id}");
        }
        
    }

    public function excluir($id)
    {
        if (Service::get("apostas", "id_jogo", $id)) {
            Service::excluir("apostas", "id_jogo", $id);
        }
        if (Service::get("premiacao", "id_jogo", $id)) {
            Service::excluir("premiacao", "id_jogo", $id);
        }
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE . "/jogo");
    }

}
