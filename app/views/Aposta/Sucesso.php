			<div class="wrapper">
				<div class="title"><span>Aposta realizada com sucesso</span></div>
				<div class="row">
					<div class="payment">
						<div class="payment-key">
							Faça uma transferência PIX no valor de R$ 5,00 usando a chave <small>pedrosezar@gmail.com</small>
						</div>
						<div class="payment-qrcode">
							<div class="payment-qrcode-description">
								Caso prefira faça a transferência usando o QR Code
							</div>
							<div class="payment-qrcode-image">
								<img src="<?= URL_BASE; ?>/assets/img/qrcode.png">
							</div>
						</div>
						<div class="payment-control">
							Para facilitar a aprovação da sua aposta informe na descrição do PIX o código de controle <small><?= $aposta->controle; ?></small>
						</div>
						<div class="payment-btn">
							<a href="<?= URL_BASE . "/aposta/cupom/{$aposta->id}"; ?>" target="_blank">Gerar Cupom</a>
						</div>
					</div>
				</div>
			</div>
