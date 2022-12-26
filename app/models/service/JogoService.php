<?php
namespace app\models\service;

use app\models\service\Service;
use app\models\validacao\JogoValidacao;
use app\models\dao\JogoDao;

class JogoService {

    public static function salvar($jogo, $campo, $tabela)
    {
        $validacao = JogoValidacao::salvar($jogo);
        $idJogo    = Service::salvar($jogo, $campo, $validacao->listaErros(), $tabela);
        if (!$jogo->id) {
            self::inserirPremiacao($idJogo);
        }
        return $idJogo;
    }

    public static function getMandantes()
    {
        $dao = new JogoDao();
        return $dao->getMandantes();
    }

    public static function getVisitantes()
    {
        $dao = new JogoDao();
        return $dao->getVisitantes();
    }

    public static function getJogoPorId($id)
    {
        $dao = new JogoDao();
        return $dao->getJogoPorId($id);
    }

    public static function getJogo()
    {
        $dao = new JogoDao();
        return $dao->getJogo();
    }

    public static function getJogos()
    {
        $dao = new JogoDao();
        return $dao->getJogos();
    }

    public static function getJogosParaAposta()
    {
        $dao = new JogoDao();
        return $dao->getJogosParaAposta();
    }

    private static function inserirPremiacao($idJogo)
    {
        $premiacao = new \stdClass();
        $premiacao->id_jogo = $idJogo;
        Service::inserir(objToArray($premiacao), "premiacao");
    }

}
