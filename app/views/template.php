<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <meta name="keywords" content="Copa do Mundo 2022, Copa do Catar, Sistema Bolão da Copa do Catar">
    <meta name="description" content="Sistema criado para gerenciamento de Bolão da Copa do Mundo do Catar de 2022">
    <meta name="author" content="Pedro Sézar da Rosa">
    <meta property="og:image" content="<?= URL_BASE; ?>/assets/img/bolao-copa-catar.png">
    <link rel="shortcut icon" href="<?= URL_BASE; ?>/assets/img/favicon.png" type="image/x-icon" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?= URL_BASE; ?>/assets/css/style.css">
    <title><?= TITULO_SITE; ?></title>
</head>
<body>
    <header>
    	<?php include_once "cabecalho.php"; ?>
    </header>
    <div id="main">
        <article>
        	<?php $this->load($view, $viewData); ?>
        </article>
        <nav>
            <?php include_once "menu.php"; ?>
        </nav>
    </div>
    <footer>
    	<?php include_once "rodape.php"; ?>
    </footer>
    <script src="<?= URL_BASE; ?>/assets/js/jquery.min.js"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <script src="<?= URL_BASE; ?>/assets/js/jquery.mask.js"></script>
    <script src="<?= URL_BASE; ?>/assets/js/componentes/js_mascara.js"></script>
    <script src="<?= URL_BASE; ?>/assets/js/script.js"></script>
    <script>
        var base_url = "<?= URL_BASE; ?>/";
    </script>
</body>
</html>