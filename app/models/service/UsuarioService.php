<?php
namespace app\models\service;

use app\models\validacao\UsuarioValidacao;
use app\models\dao\UsuarioDao;
use app\core\Flash;
use app\util\UtilService;

class UsuarioService {

    public static function salvar($usuario, $campo, $tabela)
    {
        global $config_upload;
        $validacao = UsuarioValidacao::salvar($usuario);
        if ($validacao->qtdeErro() <= 0) {
            if (!empty($_FILES['foto']['name'])) {
                $usuario->foto = UtilService::upload('foto', $config_upload, 2064768, 600, 400, array("image/jpg", "image/jpeg", "image/png"), 'usuarios/foto/');
                if (!$usuario->foto) {
                    return false;
                } else {
                    $dadosUsuario = Service::get($tabela, $campo, $usuario->id);
                    $foto = $config_upload["caminho_absoluto"] . 'usuarios/foto/' . $dadosUsuario->foto;
                    if (file_exists($foto) && $dadosUsuario->foto != "user.png") {
                        unlink($foto);
                    }
                }
            }
        }
        return Service::salvar($usuario, $campo, $validacao->listaErros(), $tabela);
    }

    public static function listaUsuariosPorJogo($id)
    {
        $dao = new UsuarioDao();
        return $dao->listaUsuariosPorJogo($id);
    }

    public static function getExiste($nome, $celular)
    {
        $dao = new UsuarioDao();
        return $dao->getExiste($nome, $celular);
    }

}
