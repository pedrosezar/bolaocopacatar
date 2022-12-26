<?php
namespace app\models\service;

use app\models\validacao\SelecaoValidacao;
use app\models\dao\SelecaoDao;
use app\util\UtilService;

class SelecaoService {

    public static function salvar($selecao, $campo, $tabela)
    {
        global $config_upload;
        $validacao = SelecaoValidacao::salvar($selecao);
        if ($validacao->qtdeErro() <= 0) {
            if (!empty($_FILES['escudo']['name'])) {
                $selecao->escudo = UtilService::upload('escudo', $config_upload, 2064768, 422, 568, array("image/jpg", "image/jpeg", "image/png"), 'selecoes/escudos/');
                if (!$selecao->escudo) {
                    return false;
                }
            }
        }
        return Service::salvar($selecao, $campo, $validacao->listaErros(), $tabela);
    }

    public static function getSelecaoRepetida($selecao, $tipo) {
        $dao = new SelecaoDao();
        return $dao->getSelecaoRepetida($selecao, $tipo);
    }

}
