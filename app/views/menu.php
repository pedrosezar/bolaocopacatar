            <div class="navigation">
                <ul>
                    <?php $page = basename($_SERVER["PHP_SELF"]); ?>
                    <li class="list<?= ($page == "index.php") ? " active" : ""; ?>">
                        <a href="<?= URL_BASE; ?>">
                            <span class="icon"><ion-icon name="home"></ion-icon></span>
                            <span class="title">Home</span>
                        </a>
                    </li>
                    <li class="list<?= ($page == "usuario") ? " active" : ""; ?>">
                        <a href="<?= URL_BASE; ?>/usuario">
                            <span class="icon"><ion-icon name="person-add"></ion-icon></span>
                            <span class="title">Criar Cadastro</span>
                        </a>
                    </li>
                    <li class="list<?= ($page == "aposta") ? " active" : ""; ?>">
                        <a href="<?= URL_BASE; ?>/aposta">
                            <span class="icon"><ion-icon src="<?= URL_BASE; ?>/assets/img/aposta.svg"></ion-icon></span>
                            <span class="title">Apostas</span>
                        </a>
                    </li>
                    <li class="list<?= ($page == "apostador") ? " active" : ""; ?>">
                        <a href="<?= URL_BASE; ?>/apostador">
                            <span class="icon"><ion-icon src="<?= URL_BASE; ?>/assets/img/apostador.svg"></ion-icon></span>
                            <span class="title">Apostadores</span>
                        </a>
                    </li>
                    <li class="list<?= ($page == "ganhador") ? " active" : ""; ?>">
                        <a href="<?= URL_BASE; ?>/ganhador">
                            <span class="icon"><ion-icon src="<?= URL_BASE; ?>/assets/img/ganhador.svg"></ion-icon></span>
                            <span class="title">Ganhadores</span>
                        </a>
                    </li>
                    <?php if (empty($_SESSION[SESSION_LOGIN])) : ?>
                    <li class="list<?= ($page == "login") ? " active" : ""; ?>">
                        <a href="<?= URL_BASE; ?>/login">
                            <span class="icon"><ion-icon name="log-in"></ion-icon></span>
                            <span class="title">Entrar</span>
                        </a>
                    </li>
                    <?php endif; ?>

                    <?php if (isset($_SESSION[SESSION_LOGIN]) && $_SESSION[SESSION_LOGIN]->status === "user") : ?>
                    <li class="list<?= (strpos($_SERVER["REQUEST_URI"], "perfil")) ? " active" : ""; ?>">
                        <a href="<?= URL_BASE . "/usuario/perfil"; ?>">
                            <span class="icon"><ion-icon name="people"></ion-icon></span>
                            <span class="title">Perfil</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="<?= URL_BASE; ?>/login/logoff">
                            <span class="icon"><ion-icon name="log-out"></ion-icon></span>
                            <span class="title">Sair</span>
                        </a>
                    </li>
                    <?php endif; ?>

                    <?php if (isset($_SESSION[SESSION_LOGIN]) && $_SESSION[SESSION_LOGIN]->status === "admin") : ?>
                    <li class="list<?= ($page == "selecao") ? " active" : ""; ?>">
                        <a href="<?= URL_BASE; ?>/selecao">
                            <span class="icon"><ion-icon src="<?= URL_BASE; ?>/assets/img/selecao.svg"></ion-icon></span>
                            <span class="title">Cadastrar Seleção</span>
                        </a>
                    </li>
                    <li class="list<?= ($page == "jogo") ? " active" : ""; ?>">
                        <a href="<?= URL_BASE; ?>/jogo">
                            <span class="icon"><ion-icon src="<?= URL_BASE; ?>/assets/img/jogo.svg"></ion-icon></span>
                            <span class="title">Jogos</span>
                        </a>
                    </li>
                    <li class="list<?= (strpos($_SERVER["REQUEST_URI"], "perfil")) ? " active" : ""; ?>">
                        <a href="<?= URL_BASE . "/usuario/perfil"; ?>">
                            <span class="icon"><ion-icon name="people"></ion-icon></span>
                            <span class="title">Perfil</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="<?= URL_BASE; ?>/login/logoff">
                            <span class="icon"><ion-icon name="log-out"></ion-icon></span>
                            <span class="title">Sair</span>
                        </a>
                    </li>
                    <?php endif; ?>

                </ul>
            </div>

            <div class="menu">
                <input type="checkbox" class="menu-fake-trigger">
                <div class="menu-lines">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <ul>

                    <li class="list<?= ($page == "index.php") ? " active" : ""; ?>">
                        <a href="<?= URL_BASE; ?>">
                            <span class="icon"><ion-icon name="home"></ion-icon></span>
                            <span class="title">Home</span>
                        </a>
                    </li>
                    <li class="list<?= ($page == "usuario") ? " active" : ""; ?>">
                        <a href="<?= URL_BASE; ?>/usuario">
                            <span class="icon"><ion-icon name="person-add"></ion-icon></span>
                            <span class="title">Criar Cadastro</span>
                        </a>
                    </li>
                    <li class="list<?= ($page == "aposta") ? " active" : ""; ?>">
                        <a href="<?= URL_BASE; ?>/aposta">
                            <span class="icon"><ion-icon src="<?= URL_BASE; ?>/assets/img/aposta.svg"></ion-icon></span>
                            <span class="title">Apostas</span>
                        </a>
                    </li>
                    <li class="list<?= ($page == "apostador") ? " active" : ""; ?>">
                        <a href="<?= URL_BASE; ?>/apostador">
                            <span class="icon"><ion-icon src="<?= URL_BASE; ?>/assets/img/apostador.svg"></ion-icon></span>
                            <span class="title">Apostadores</span>
                        </a>
                    </li>
                    <li class="list<?= ($page == "ganhador") ? " active" : ""; ?>">
                        <a href="<?= URL_BASE; ?>/ganhador">
                            <span class="icon"><ion-icon src="<?= URL_BASE; ?>/assets/img/ganhador.svg"></ion-icon></span>
                            <span class="title">Ganhadores</span>
                        </a>
                    </li>
                    <?php if (empty($_SESSION[SESSION_LOGIN])) : ?>
                    <li class="list<?= ($page == "login") ? " active" : ""; ?>">
                        <a href="<?= URL_BASE; ?>/login">
                            <span class="icon"><ion-icon name="log-in"></ion-icon></span>
                            <span class="title">Entrar</span>
                        </a>
                    </li>
                    <?php endif; ?>

                    <?php if (isset($_SESSION[SESSION_LOGIN]) && $_SESSION[SESSION_LOGIN]->status === "user") : ?>
                    <li class="list<?= (strpos($_SERVER["REQUEST_URI"], "perfil")) ? " active" : ""; ?>">
                        <a href="<?= URL_BASE . "/usuario/perfil"; ?>">
                            <span class="icon"><ion-icon name="people"></ion-icon></span>
                            <span class="title">Perfil</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="<?= URL_BASE; ?>/login/logoff">
                            <span class="icon"><ion-icon name="log-out"></ion-icon></span>
                            <span class="title">Sair</span>
                        </a>
                    </li>
                    <?php endif; ?>

                    <?php if (isset($_SESSION[SESSION_LOGIN]) && $_SESSION[SESSION_LOGIN]->status === "admin") : ?>
                    <li class="list<?= ($page == "selecao") ? " active" : ""; ?>">
                        <a href="<?= URL_BASE; ?>/selecao">
                            <span class="icon"><ion-icon src="<?= URL_BASE; ?>/assets/img/selecao.svg"></ion-icon></span>
                            <span class="title">Cadastrar Seleção</span>
                        </a>
                    </li>
                    <li class="list<?= ($page == "jogo") ? " active" : ""; ?>">
                        <a href="<?= URL_BASE; ?>/jogo">
                            <span class="icon"><ion-icon src="<?= URL_BASE; ?>/assets/img/jogo.svg"></ion-icon></span>
                            <span class="title">Jogos</span>
                        </a>
                    </li>
                    <li class="list<?= (strpos($_SERVER["REQUEST_URI"], "perfil")) ? " active" : ""; ?>">
                        <a href="<?= URL_BASE . "/usuario/perfil"; ?>">
                            <span class="icon"><ion-icon name="people"></ion-icon></span>
                            <span class="title">Perfil</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="<?= URL_BASE; ?>/login/logoff">
                            <span class="icon"><ion-icon name="log-out"></ion-icon></span>
                            <span class="title">Sair</span>
                        </a>
                    </li>
                    <?php endif; ?>

                </ul>
            </div>
