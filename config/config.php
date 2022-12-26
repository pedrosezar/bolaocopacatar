<?php
define("SERVIDOR", "localhost");
define("BANCO", "bolaodacopa");
define("USUARIO", "root");
define("SENHA", "");
define("CHARSET", "UTF8");

define("CONTROLLER_PADRAO", "home");
define("METODO_PADRAO", "index");
define("NAMESPACE_CONTROLLER", "app\\controllers\\");
define("TIMEZONE", "America/Sao_Paulo");
define("CAMINHO", realpath("./"));
define("TITULO_SITE", "Sistema Bolão da Copa | Catar 2022");

define("URL_BASE", "http://" . $_SERVER["HTTP_HOST"] . "/bolaocopacatar");
define("URL_IMAGEM", "http://" . $_SERVER["HTTP_HOST"] . "/bolaocopacatar/upload");

define("SESSION_LOGIN", "usuario_logado");

$config_upload["caminho_absoluto"]  = realpath("./"). "/upload/";
$config_upload["renomeia"]          = true;
