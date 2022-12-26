			<div class="wrapper">
				<div class="title"><span>Cadastro de Jogo</span></div>
				<div class="message">
					<?php
						$this->verErro();
						$this->verMsg();
					?>
				</div>
				<form action="<?= URL_BASE; ?>/jogo/salvar" method="POST">
					<div class="row">
						<span class="icon"><ion-icon name="calendar"></ion-icon></span>
						<input type="datetime-local" name="data_hora" value="<?= isset($jogo->data_hora) ? $jogo->data_hora : null; ?>" placeholder="Data e horário do jogo">
					</div>
					<div class="row">
						<span class="icon"><ion-icon src="<?= URL_BASE; ?>/assets/img/selecao.svg"></ion-icon></span>
						<select name="mandante">
							<option selected disabled>Selecione o mandante</option>
						<?php foreach ($mandantes as $mandante) : ?>
							<option value="<?= $mandante->id; ?>"<?= (isset($jogo) && $jogo->mandante == $mandante->id) ? " selected" : null; ?>><?= $mandante->selecao; ?></option>
						<?php endforeach; ?>
						</select>
					</div>
					<div class="row">
						<span class="icon"><ion-icon src="<?= URL_BASE; ?>/assets/img/selecao.svg"></ion-icon></span>
						<select name="visitante">
							<option selected disabled>Selecione o visitante</option>
						<?php foreach ($visitantes as $visitante) : ?>
							<option value="<?= $visitante->id; ?>"<?= (isset($jogo) && $jogo->visitante == $visitante->id) ? " selected" : null; ?>><?= $visitante->selecao; ?></option>
						<?php endforeach; ?>
						</select>
					</div>
					<div class="row">
						<span class="icon"><ion-icon src="<?= URL_BASE; ?>/assets/img/bola.svg"></ion-icon></span>
						<input type="number" name="gols_mandante" min="0" value="<?= isset($jogo->gols_mandante) ? $jogo->gols_mandante : 0; ?>">
					</div>
					<div class="row">
						<span class="icon"><ion-icon src="<?= URL_BASE; ?>/assets/img/bola.svg"></ion-icon></span>
						<input type="number" name="gols_visitante" min="0" value="<?= isset($jogo->gols_visitante) ? $jogo->gols_visitante : 0; ?>">
					</div>
					<div class="row button">
						<input type="hidden" name="id" value="<?= isset($jogo->id) ? $jogo->id : null; ?>">
						<input type="submit" value="Cadastrar">
					</div>
				</form>
			</div>
