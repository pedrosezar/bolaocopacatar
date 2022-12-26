			<div class="wrapper">
				<div class="title"><span>Editar Perfil</span></div>
				<div class="message">
					<?php
						$this->verErro();
						$this->verMsg();
					?>
				</div>
				<form action="<?= URL_BASE . "/usuario/salvar"; ?>" method="POST" enctype="multipart/form-data">
					<div class="row">
						<label for="foto">
							<span class="foto">Selecionar Imagem</span>
							<span>Procurar</span>
						</label>
						<input type="file" name="foto" id="foto" accept="image/*">
					</div>
					<div class="row">
						<span class="icon"><ion-icon src="<?= URL_BASE; ?>/assets/img/pessoa.svg"></ion-icon></span>
						<input type="text" name="nome" value="<?= $usuario->nome; ?>" placeholder="Nome completo">
					</div>
					<div class="row">
						<span class="icon"><ion-icon name="logo-whatsapp"></ion-icon></span>
						<input type="text" name="celular" value="<?= $usuario->celular; ?>" placeholder="Celular" class="mascara-celular">
					</div>
					<div class="row">
						<span class="icon"><ion-icon name="lock"></ion-icon></span>
						<input type="password" name="senha" placeholder="Senha">
					</div>
					<div class="row button">
						<input type="hidden" name="id" value="<?= $_SESSION[SESSION_LOGIN]->id; ?>">
						<input type="submit" value="Editar">
					</div>
				</form>
			</div>
