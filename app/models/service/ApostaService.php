<?php
namespace app\models\service;

use app\models\validacao\ApostaValidacao;
use app\models\dao\ApostaDao;
use app\core\Flash;

class ApostaService {

    public static function salvar($aposta, $campo, $tabela)
    {
        $validacao = ApostaValidacao::salvar($aposta);
        return Service::salvar($aposta, $campo, $validacao->listaErros(), $tabela);
    }

    public static function listaJogos($valor)
    {
        $dao = new ApostaDao();
        return $dao->listaJogos($valor);
    }

    public static function atualizar($idJogo, $idUsuario, $situacao)
    {
        $dao = new ApostaDao();
        $resultado = false;
        if ($dao->atualizar($idJogo, $idUsuario, $situacao)) {
            $dao->atualizarPremiacao($idJogo);
            return true;
        }
        return $resultado;
    }

    public static function getExiste($idJogo, $idUsuario)
    {
        $dao = new ApostaDao();
        return $dao->getExiste($idJogo, $idUsuario);
    }

    public static function getCupom($id)
    {
        $dao = new ApostaDao();
        return $dao->getCupom($id);
    }

}
