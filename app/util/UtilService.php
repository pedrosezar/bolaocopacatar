<?php
namespace app\util;

use app\core\Flash;

class UtilService {

    public static function upload($arquivo, $config, $tamanho, $largura_maxima, $altura_maxima, $tipos, $pasta) {
        $subir = upload($arquivo, $config, $tamanho, $largura_maxima, $altura_maxima, $tipos, $pasta);
        if ($subir->erro === 0) {
            Flash::limpaForm();
            return $subir->nome;
        } else {
            Flash::limpaMsg();
            Flash::setMsg("Erro: " . $subir->msg, -1);
            return false;
        }
    }

    public static function getUsuario() {
        $usuario = null;
        if (isset($_SESSION[SESSION_LOGIN])) {
            $usuario = $_SESSION[SESSION_LOGIN];
        }
        return $usuario;
    }

}
