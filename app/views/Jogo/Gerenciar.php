			<div class="wrapper">
				<div class="title"><span>Gerenciamento de Jogos</span></div>
				<div class="message">
					<?php
						$this->verErro();
						$this->verMsg();
					?>
				</div>
				<form action="<?= URL_BASE . "/jogo/atualizar" ?>" method="POST">
					<div class="row">
						<span class="icon"><ion-icon src="<?= URL_BASE; ?>/assets/img/selecao.svg"></ion-icon></span>
						<input type="text" name="jogo" value="<?= $jogo->mandante . " x " . $jogo->visitante; ?>" readonly>
					</div>
					<div class="row">
						<input type="checkbox" name="exibir"<?= (isset($jogo->exibir) && $jogo->exibir) ? " checked" : null; ?>>
					</div>
					<div class="row button">
						<input type="hidden" name="id" value="<?= isset($jogo->id) ? $jogo->id : null; ?>">
						<button id="cadastrar">Cadastrar</button>
					</div>
				</form>
			</div>
