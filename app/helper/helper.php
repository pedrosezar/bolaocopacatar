<?php
function i($array) {
    echo "<pre>";
    print_r($array);
    echo "</pre>";
    exit;
}

function tira_mascara($valor) {
    return preg_replace("/\D+/", "", $valor);
}

function objToArray($objeto) {
    return is_array($objeto) ? $objeto : (array) $objeto;
}

function validaEmail($email) {
    $conta = "/[a-zA-Z0-9\._-]+@";
    $domino = "[a-zA-Z0-9\._-]+.";
    $extensao = "([a-zA-Z]{2,4})$/";
    $pattern = $conta . $domino . $extensao;
    if (preg_match($pattern, $email))
        return true;
    else
        return false;
}

function validaCPF($cpf) {
    // Extrai somente os números
    $cpf = preg_replace('/[^0-9]/is', '', $cpf);

    // Verifica se foi informado todos os digitos corretamente
    if (strlen($cpf) != 11) {
        return false;
    }

    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    // Faz o calculo para validar o CPF
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }
    return true;
}

function validaCNPJ($cnpj) {
    $cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);

    // Valida tamanho
    if (strlen($cnpj) != 14)
        return false;

        // Verifica se todos os digitos são iguais
        if (preg_match('/(\d)\1{13}/', $cnpj))
        return false;

            // Valida primeiro dígito verificador
            for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
                $soma += $cnpj[$i] * $j;
                $j = ($j == 2) ? 9 : $j - 1;
            }

            $resto = $soma % 11;

            if ($cnpj[12] != ($resto < 2 ? 0 : 11 - $resto))
                return false;

                // Valida segundo dígito verificador
                for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
                    $soma += $cnpj[$i] * $j;
                    $j = ($j == 2) ? 9 : $j - 1;
                }

                $resto = $soma % 11;

                return $cnpj[13] == ($resto < 2 ? 0 : 11 - $resto);
}

function upload($arq, $config_upload, $tamanho, $largura_maxima, $altura_maxima, $tipos, $pasta) {
    set_time_limit(0);
    $nome_arquivo       = $_FILES[$arq]["name"];
    $tamanho_arquivo    = $_FILES[$arq]["size"];
    $arquivo_temporario = $_FILES[$arq]["tmp_name"];
    $tipo_arquivo       = $_FILES[$arq]['type'];
    $erro               = 0;
    $msg                = "";
    $retorno            = array();
    if (!empty($nome_arquivo)) {
        $extensao   = strrchr($nome_arquivo, ".");
        $nome_final = ($config_upload["renomeia"]) ? md5(time()) . $extensao : $nome_arquivo . $extensao;
        $caminho    = $config_upload["caminho_absoluto"] . $pasta . $nome_final;
        if ($tamanho_arquivo > $tamanho) {
            $msg  = "O arquivo é maior que o permitido";
            $erro = -1;
        }
        if (!in_array($tipo_arquivo, $tipos)) {
            $msg  = "O arquivo não é permitido para upload";
            $erro = -1;
        }
        if ((in_array($tipo_arquivo, array("image/jpg", "image/jpeg", "image/png"))) && ($erro !== -1)) {
            list($largura_original, $altura_original) = getimagesize($arquivo_temporario);
            $largura_maxima   = $altura_maxima;
            $altura_maxima    = $altura_maxima;
            $proporcao        = $largura_original / $altura_original;
            $nova_largura     = $largura_maxima;
            $nova_altura      = $altura_maxima;
            $proporcao_maxima = $largura_maxima / $altura_maxima;
            if ($proporcao_maxima > $proporcao) {
                $nova_largura = $nova_altura * $proporcao;
            } else {
                $nova_altura = $nova_largura / $proporcao;
            }
            $imagem_final = imagecreatetruecolor(intval($nova_largura), intval($nova_altura));
            switch ($tipo_arquivo) {
                case 'image/png' :
                    $image = imagecreatefrompng($arquivo_temporario);
                    break;
                case 'image/jpg' :
                case 'image/jpeg' :
                    $image = imagecreatefromjpeg($arquivo_temporario);
                    break;
            }
            imagecopyresampled($imagem_final, $image, 0, 0, 0, 0, intval($nova_largura), intval($nova_altura), intval($largura_original), intval($altura_original));
            imagejpeg($imagem_final, $caminho);
        }
        if ($erro !== -1) {
            if (move_uploaded_file($arquivo_temporario, $caminho)) {
                $msg  = "Arquivo enviado com sucesso";
                $erro = 0;
            } else {
                $msg  = "Erro ao fazer o upload";
                $erro = -1;
            }
        }
    } else {
        $msg  = "Arquivo vazio";
        $erro = -1;
    }
    $retorno = (object) array("erro" => $erro, "msg" => $msg, "nome" => $nome_final);
    return $retorno;
}

function gerar_senha($tamanho, $maiusculas, $minusculas, $numeros, $simbolos) {
    $maiusculas = "ABCDEFGHIJKLMNOPQRSTUVYXWZ"; // $maiusculas contem as letras maiúsculas
    $minusculas = "abcdefghijklmnopqrstuvyxwz"; // $minusculas contem as letras minusculas
    $numeros = "0123456789"; // $numeros contem os números
    $simbolos = "!@#$%¨&*()_+="; // $simbolos contem os símbolos
    $senha = "";

    if ($maiusculas) {
        //se $maiusculas for "true", a variável $maiusculas é embaralhada e adicionada para a variável $senha
        $senha .= str_shuffle($maiusculas);
    }

    if ($minusculas) {
        //se $minusculas for "true", a variável $minusculas é embaralhada e adicionada para a variável $senha
        $senha .= str_shuffle($minusculas);
    }

    if ($numeros) {
        //se $numeros for "true", a variável $numeros é embaralhada e adicionada para a variável $senha
        $senha .= str_shuffle($numeros);
    }

    if ($simbolos) {
        //se $simbolos for "true", a variável $simbolos é embaralhada e adicionada para a variável $senha
        $senha .= str_shuffle($simbolos);
    }

    //retorna a senha embaralhada com "str_shuffle" com o tamanho definido pela variável $tamanho
    return substr(str_shuffle($senha), 0, $tamanho);
}

function gerarControle($qtdeCaracteres = 6) {
    //Letras maiúsculas embaralhadas
    $maiusculas = str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ');

    //Números aleatórios
    $numeros = (((date('Ymd') / 12) * 24) + mt_rand(800, 9999));
    $numeros .= 1234567890;

    //Junta tudo
    $caracteres = $maiusculas . $numeros;

    //Embaralha e pega apenas a quantidade de caracteres informada no parâmetro
    $resultado = substr(str_shuffle($caracteres), 0, $qtdeCaracteres);

    return $resultado;
}

function validaCelular(string $valor): bool {
    //processa a string mantendo apenas números no valor de entrada.
    $valor = preg_replace("/[^0-9]/", "", $valor);

    $lenValor = strlen($valor);

    //validando a quantidade de caracteres de telefone celular.
    if ($lenValor != 11) {
        return false;
    }

    //DD e número de telefone não podem começar com zero.
    if ($valor[0] == "0" || $valor[2] == "0") {
        return false;
    }

    return true;
}
