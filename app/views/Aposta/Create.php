			<div class="wrapper">
				<div class="title"><span><?= $aposta->mandante . " x " . $aposta->visitante; ?></span></div>
				<div class="message">
					<?php
						$this->verErro();
						$this->verMsg();
					?>
				</div>
				<form action="<?= URL_BASE; ?>/aposta/salvar" method="POST">
					<div class="row">
						<span class="icon"><ion-icon src="<?= URL_BASE; ?>/assets/img/bola.svg"></ion-icon></span>
						<input type="number" name="gols_mandante" min="0" placeholder="Gols <?= $aposta->mandante; ?>">
					</div>
					<div class="row">
						<span class="icon"><ion-icon src="<?= URL_BASE; ?>/assets/img/bola.svg"></ion-icon></span>
						<input type="number" name="gols_visitante" min="0" placeholder="Gols <?= $aposta->visitante; ?>">
					</div>
					<div class="row button">
						<input type="hidden" name="id_jogo" value="<?= $aposta->id; ?>">
						<input type="submit" value="Cadastrar">
					</div>
				</form>
			</div>
