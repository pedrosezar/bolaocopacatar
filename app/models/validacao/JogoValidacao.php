<?php
namespace app\models\validacao;

use app\core\Validacao;
use app\models\service\Service;

class JogoValidacao {

    public static function salvar($jogo)
    {
        $validacao = new Validacao();
        $validacao->setData("data_hora", $jogo->data_hora);
        $validacao->setData("mandante", $jogo->mandante);
        $validacao->setData("visitante", $jogo->visitante);
        $validacao->getData("data_hora")->isVazio("O campo data e horário não pode ser vazio.");
        $validacao->getData("horario")->isVazio("O campo horário não pode ficar vazio.");
        $validacao->getData("mandante")->isVazio("O campo mandante não pode ficar vazio.");
        $validacao->getData("visitante")->isVazio("O campo visitante não pode ficar vazio.");
        return $validacao;
    }

}
