<?php
namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\models\service\ApostaService;
use app\models\service\JogoService;
use app\util\UtilService;
use app\core\Flash;
use Dompdf\Dompdf;

class ApostaController extends Controller {

    private $tabela = "apostas";
    private $campo  = "id";

    public function index()
    {
        $dados["apostas"] = JogoService::getJogosParaAposta();
        $dados["view"]    = "Aposta/Index";
        $this->load("template", $dados);
    }

    public function create($id)
    {
        $this->usuario = UtilService::getUsuario();
        if (!$this->usuario) {
            $this->redirect(URL_BASE . "/login");
        } else {
            $aposta = JogoService::getJogoPorId($id);
            if (!$aposta) {
                $this->redirect(URL_BASE . "/aposta");
            }
            $dados["aposta"] = $aposta;
            $dados["view"]   = "Aposta/Create";
            $this->load("template", $dados);
        }
    }

    public function gerenciar()
    {
        $this->usuario = UtilService::getUsuario();
        if (!$this->usuario || $this->usuario->status != "admin") {
            $this->redirect(URL_BASE);
        } else {
            $dados["view"] = "Aposta/Gerenciar";
            $this->load("template", $dados);
        }
    }

    public function salvar()
    {
        $aposta                 = new \stdClass();
        $aposta->id             = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
        $aposta->id_jogo        = filter_input(INPUT_POST, "id_jogo", FILTER_VALIDATE_INT);
        $aposta->id_usuario     = $_SESSION[SESSION_LOGIN]->id;
        $aposta->gols_mandante  = filter_input(INPUT_POST, "gols_mandante", FILTER_VALIDATE_INT);
        $aposta->gols_visitante = filter_input(INPUT_POST, "gols_visitante", FILTER_VALIDATE_INT);
        $aposta->data           = date("Y-m-d H:i:s");
        $aposta->controle       = gerarControle();
        Flash::setForm($aposta);
        $idAposta = ApostaService::salvar($aposta, $this->campo, $this->tabela);
        if ($idAposta) {
            $dados["aposta"] = Service::get($this->tabela, $this->campo, $idAposta);
            $dados["view"]   = "Aposta/Sucesso";
            $this->load("template", $dados);
        } else {
            $this->redirect(URL_BASE . "/aposta/create/{$aposta->id_jogo}");
        }
    }

    public function atualizar()
    {
        $aposta             = new \stdClass();
        $aposta->id_jogo    = filter_input(INPUT_POST, "id_jogo", FILTER_VALIDATE_INT);
        $aposta->id_usuario = filter_input(INPUT_POST, "id_usuario", FILTER_VALIDATE_INT);
        $aposta->situacao   = (isset($_POST["situacao"])) ? true : false;
        if (ApostaService::atualizar($aposta->id_jogo, $aposta->id_usuario, $aposta->situacao)) {
            $this->redirect(URL_BASE . "/aposta");
        } else {
            $this->redirect(URL_BASE . "/aposta/gerenciar");
        }
    }

    public function buscar($valor)
    {
        $jogos = ApostaService::listaJogos($valor);
        echo json_encode($jogos);
    }

    public function cupom($id)
    {
        $dompdf = new Dompdf(["enable_remote" => true]);
        ob_start();

        $dados["cupom"] = ApostaService::getCupom($id);
        $this->load("Aposta/Cupom", $dados);

        $dompdf->loadHtml(ob_get_clean());
        $dompdf->setPaper("A6", "portrait");
        $dompdf->render();
        $dompdf->stream("Partida {$dados["cupom"]->mandante} vs {$dados["cupom"]->visitante}.pdf", ["Attachment" => false]);
    }

}
