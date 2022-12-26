			<div class="wrapper">
				<div class="title"><span>Cadastrar Mandante</span></div>
				<div class="message">
					<?php
						$this->verErro();
						$this->verMsg();
					?>
				</div>
				<form action="<?= URL_BASE; ?>/selecao/salvar" method="POST" enctype="multipart/form-data">
					<div class="row">
						<span class="icon"><ion-icon src="<?= URL_BASE; ?>/assets/img/selecao.svg"></ion-icon></span>
						<input type="text" name="selecao" value="<?= isset($selecao->selecao) ? $selecao->selecao : null; ?>" placeholder="Seleção">
					</div>
					<div class="row">
						<label for="escudo">
							<span class="escudo">Selecionar Imagem</span>
							<span>Procurar</span>
						</label>
						<input type="file" name="escudo" id="escudo" accept="image/*">
					</div>
					<input type="radio" name="tipo" value="M" id="mandante" class="input_radio">
					<label for="mandante" class="radio">
						<div class="radio_btn"></div>
						<span>Mandante</span>
					</label>
					<input type="radio" name="tipo" value="V" id="visitante" class="input_radio">
					<label for="visitante" class="radio">
						<div class="radio_btn"></div>
						<span>Visitante</span>
					</label>
					<div class="row button">
						<input type="submit" value="Cadastrar">
					</div>
				</form>
			</div>
