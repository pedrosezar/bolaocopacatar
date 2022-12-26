<?php
namespace app\models\validacao;

use app\core\Validacao;
use app\models\service\Service;
use app\models\service\ApostaService;

class ApostaValidacao {

    public static function salvar($aposta)
    {
        $validacao = new Validacao();
        $validacao->setData("gols_mandante", $aposta->gols_mandante);
        $validacao->setData("gols_visitante", $aposta->gols_visitante);
        $validacao->getData("gols_mandante")->isVazio("O campo gols do mandante não pode ficar vazio.");
        $validacao->getData("gols_visitante")->isVazio("O campo gols do visitante não pode ficar vazio.");
        if (!$aposta->id) {
            $existe = ApostaService::getExiste($aposta->id_jogo, $aposta->id_usuario);
            if (($existe) && (($existe->id_jogo == $aposta->id_jogo) || ($existe->id_usuario == $aposta->id_usuario))) {
                $validacao->getData("gols_mandante")->isUnico(1, "Você já fez sua aposta neste jogo.");
            }
        }
        return $validacao;
    }

}
