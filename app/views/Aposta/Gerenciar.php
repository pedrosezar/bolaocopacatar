			<div class="wrapper">
				<div class="title"><span>Gerenciar Apostas</span></div>
				<div class="message">
					<?php
						$this->verErro();
						$this->verMsg();
					?>
				</div>
				<form action="<?= URL_BASE . "/aposta/atualizar" ?>" method="POST">
					<div class="row">
						<span class="icon"><ion-icon src="<?= URL_BASE; ?>/assets/img/jogo.svg"></ion-icon></span>
						<input type="text" name="jogo" id="jogo" value="" placeholder="Digite o jogo">
					</div>
					<div class="row">
						<span class="icon"><ion-icon src="<?= URL_BASE; ?>/assets/img/apostador.svg"></ion-icon></span>
						<select name="id_usuario" id="id_usuario">
							<option selected disabled>Selecione o apostador</option>
						</select>
					</div>
					<div class="row">
						<input type="checkbox" id="situacao" name="situacao" value="">
					</div>
					<div class="row button">
						<input type="hidden" id="id_jogo" name="id_jogo">
						<button id="cadastrar">Cadastrar</button>
					</div>
				</form>
			</div>
