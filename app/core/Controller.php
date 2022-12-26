<?php
namespace app\core;

use function Composer\Autoload\includeFile;

class Controller {

    public function load($viewName, $viewData = array()) {
        extract($viewData);
        include "app/views/" . $viewName . ".php";
    }

    public function verMsg($view = null) {
        $view = ($view) ? $view : "inc/msg";
        $msg = Flash::getMsg();
        if ($msg) {
            include "app/views/" . $view . ".php";
        }
    }

    public function verErro($view = null) {
        $view = ($view) ? $view : "inc/erros";
        $erros = Flash::getErro();
        if ($erros) {
            include "app/views/" . $view . ".php";
        }
    }

    public function redirect($view) {
        header('Location:' . $view);
        exit;
    }

    public function incluir($view) {
        include "app/views/" . $view . ".php";
    }

}
