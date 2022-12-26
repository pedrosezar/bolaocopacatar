            <div class="palco">
                <div class="horario">
                    <span>Horário:<small><?= (isset($jogo->data_hora) ? horaAbreviada($jogo->data_hora) : null); ?></small></span>
                </div>
                <div class="data">
                    <span><?= (isset($jogo->data_hora) ? dataFormatada($jogo->data_hora) : null); ?></span>
                </div>
                <div class="mandante">
                    <div class="time">
                        <?= (isset($jogo->mandante) ? $jogo->mandante : null); ?>
                    </div>
                    <div class="placar">
                        <?= (isset($jogo->gols_mandante) ? $jogo->gols_mandante : null); ?>
                    </div>
                    <div class="escudo">
                        <img src="<?= (isset($jogo->escudo_mandante) ? URL_IMAGEM . "/selecoes/escudos/" . $jogo->escudo_mandante : null); ?>">
                    </div>
                </div>
                <div class="visitante">
                    <div class="time">
                        <?= (isset($jogo->visitante) ? $jogo->visitante : null); ?>
                    </div>
                    <div class="placar">
                        <?= (isset($jogo->gols_visitante) ? $jogo->gols_visitante : null); ?>
                    </div>
                    <div class="escudo">
                        <img src="<?= (isset($jogo->escudo_visitante) ? URL_IMAGEM . "/selecoes/escudos/" . $jogo->escudo_visitante : null); ?>">
                    </div>
                </div>
                <img src="<?= URL_BASE; ?>/assets/img/placar.svg">
            </div>
