			<div class="wrapper">
				<div class="title"><span>Formulário de Cadastro</span></div>
				<div class="message">
					<?php
						$this->verErro();
						$this->verMsg();
					?>
				</div>
				<form action="<?= URL_BASE; ?>/usuario/salvar" method="POST">
					<div class="row">
						<span class="icon"><ion-icon src="<?= URL_BASE; ?>/assets/img/pessoa.svg"></ion-icon></span>
						<input type="text" name="nome" value="<?= isset($usuario->nome) ? $usuario->nome : null; ?>" placeholder="Nome completo">
					</div>
					<div class="row">
						<span class="icon"><ion-icon name="logo-whatsapp"></ion-icon></span>
						<input type="text" name="celular" value="<?= isset($usuario->celular) ? $usuario->celular : null; ?>" placeholder="Celular" class="mascara-celular">
					</div>
					<div class="row">
						<span class="icon"><ion-icon name="lock"></ion-icon></span>
						<input type="password" name="senha" placeholder="Senha">
					</div>
					<div class="row button">
						<input type="submit" value="Cadastrar">
					</div>
					<div class="signup-link">Já tem cadastro? <a href="<?= URL_BASE; ?>/login">Faça Login</a></div>
				</form>
			</div>
