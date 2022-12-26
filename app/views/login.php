			<div class="wrapper">
				<div class="title"><span>Formulário de Login</span></div>
				<div class="message">
					<?php
						$this->verErro();
						$this->verMsg();
					?>
				</div>
				<form action="<?= URL_BASE; ?>/login/logar" method="POST">
					<div class="row">
						<span class="icon"><ion-icon name="logo-whatsapp"></ion-icon></span>
						<input type="text" name="celular" placeholder="Celular" class="mascara-celular">
					</div>
					<div class="row">
						<span class="icon"><ion-icon name="lock"></ion-icon></span>
						<input type="password" name="senha" placeholder="Senha">
					</div>
					<div class="row button">
						<input type="submit" value="Entrar">
					</div>
					<div class="signup-link">Ainda não tem cadastro? <a href="<?= URL_BASE; ?>/usuario">Clique aqui</a></div>
				</form>
			</div>
