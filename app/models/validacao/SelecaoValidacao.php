<?php
namespace app\models\validacao;

use app\core\Validacao;
use app\models\service\SelecaoService;

class SelecaoValidacao {

    public static function salvar($selecao)
    {
        $validacao = new Validacao();
        $validacao->setData("selecao", $selecao->selecao);
        $validacao->setData("escudo", $selecao->escudo);
        $validacao->setData("tipo", $selecao->tipo);
        $validacao->getData("selecao")->isVazio("O campo seleção não pode ficar vazio.");
        $validacao->getData("escudo")->isVazio("O escudo da seleção é obrigatório.");
        $validacao->getData("tipo")->isVazio("Você deve escolher entre mandante e visitante.");
        if ($selecao->selecao) {
            $existe = SelecaoService::getSelecaoRepetida($selecao->selecao, $selecao->tipo);
            if (($existe) && (($existe->selecao == $selecao->selecao) && ($existe->tipo == $selecao->tipo))) {
                $validacao->getData("selecao")->isUnico(1, "Está seleção já está cadastrada.");
            }
        }
        return $validacao;
    }

}
