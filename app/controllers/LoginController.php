<?php
namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\core\Flash;

class LoginController extends Controller {

    public function index()
    {
        $dados["view"] = "login";
        $this->load("template", $dados);
    }

    public function logar()
    {
        $celular = tira_mascara(filter_input(INPUT_POST, "celular"));
        $senha   = filter_input(INPUT_POST, "senha");
        Flash::setForm($_POST);
        if (Service::logar("celular", $celular, $senha, "usuarios")) {
            $this->redirect(URL_BASE);
        } else {
            $this->redirect(URL_BASE . "/login");
        }
    }

    public function logoff()
    {
        unset($_SESSION[SESSION_LOGIN]);
        $this->redirect(URL_BASE);
    }

}
