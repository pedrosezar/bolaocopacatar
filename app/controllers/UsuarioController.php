<?php
namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\models\service\UsuarioService;
use app\util\UtilService;
use app\core\Flash;

class UsuarioController extends Controller {

    private $tabela = "usuarios";
    private $campo  = "id";

    public function index()
    {
        $dados["usuario"] = Flash::getForm();
        $dados["view"]    = "Usuario/Cadastrar";
        $this->load("template", $dados);
    }

    public function perfil()
    {
        $this->usuario = UtilService::getUsuario();
        $usuario       = Service::get($this->tabela, $this->campo, $_SESSION[SESSION_LOGIN]->id);
        if ($this->usuario->id != $_SESSION[SESSION_LOGIN]->id) {
            $this->redirect(URL_BASE);
        } else {
            $dados["usuario"] = (Flash::isForm()) ? Flash::getForm() : $usuario;
            $dados["view"]    = "Usuario/Perfil";
            $this->load("template", $dados);
        }
    }

    public function edit($id)
    {
        $usuario = Service::get($this->tabela, $this->campo, $id);
        if (!$usuario) {
            $this->redirect(URL_BASE . "usuario");
        }
        $dados["usuario"] = $usuario;
        $dados["view"]    = "Usuario/Perfil";
        $this->load("template", $dados);

    }

    public function salvar()
    {
        $usuario          = new \stdClass();
        $usuario->id      = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
        $usuario->nome    = filter_input(INPUT_POST, "nome");
        if (!empty($_POST["celular"]) || !isset($_SESSION[SESSION_LOGIN])) {
            $usuario->celular = tira_mascara(filter_input(INPUT_POST, "celular"));
        } else {
            $usuario->celular = $_SESSION[SESSION_LOGIN]->celular;
        }
        if (!empty($_POST["senha"]) || !isset($_SESSION[SESSION_LOGIN])) {
            $usuario->senha = password_hash(filter_input(INPUT_POST, 'senha'), PASSWORD_DEFAULT);
        } else {
            $usuario->senha = $_SESSION[SESSION_LOGIN]->senha;
        }
        Flash::setForm($usuario);
        if (UsuarioService::salvar($usuario, $this->campo, $this->tabela)) {
            if (!$usuario->id) {
                $this->redirect(URL_BASE . "/login");
            } else {
                $this->redirect(URL_BASE . "/usuario/perfil/{$usuario->id}");
            }
        } else {
            if (!$usuario->id) {
                $this->redirect(URL_BASE . "/usuario");
            } else {
                $this->redirect(URL_BASE . "/usuario/perfil/{$usuario->id}");
            }
        }
    }

    public function listaPorAposta($id)
    {
        $usuarios = UsuarioService::listaUsuariosPorJogo($id);
        echo json_encode($usuarios);
    }

}
