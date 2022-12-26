<?php
namespace app\models\validacao;

use app\core\Validacao;
use app\models\service\Service;
use app\models\service\UsuarioService;

class UsuarioValidacao {

    public static function salvar($usuario)
    {
        $validacao = new Validacao();
        $validacao->setData('nome', $usuario->nome);
        $validacao->setData('celular', $usuario->celular);
        $validacao->setData('senha', $usuario->senha);
        $validacao->getData('nome')->isVazio()->isMinimo(3);
        $validacao->getData('celular')->isVazio()->isCelular();
        if (!$usuario->id) {
            $validacao->getData('senha')->isVazio();
            $existe = UsuarioService::getExiste($usuario->nome, $usuario->celular);
            if (($existe) && ($existe->nome == $usuario->nome)) {
                $validacao->getData('nome')->isUnico(1, 'Este nome já está cadastrado.');
            }
            $existe = Service::get('usuarios', 'celular', $usuario->celular);
            if (($existe) && ($existe->celular == $usuario->celular)) {
                $validacao->getData('celular')->isUnico(1, 'Este celular já está cadastrado.');
            }
        }
        return $validacao;
    }

}
