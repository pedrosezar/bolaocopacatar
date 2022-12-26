        <div class="logo">
            <a href="<?= URL_BASE; ?>"><img src="<?= URL_BASE; ?>/assets/img/logo.png"></a>
        </div>
        <div class="usuario">
            <div class="thumb">
            <?php $foto = (isset($_SESSION[SESSION_LOGIN])) ? "/usuarios/foto/{$_SESSION[SESSION_LOGIN]->foto}" : "/usuarios/foto/user.png"; ?>
                <img src="<?= URL_IMAGEM . $foto; ?>">
            </div>
            <div class="nome"><?= isset($_SESSION[SESSION_LOGIN]) ? $_SESSION[SESSION_LOGIN]->nome : "Usuário"; ?></div>
        </div>
