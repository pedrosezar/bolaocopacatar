				<div class="titulo">
				<?php if (empty($ganhadores)) : ?>
					<h1>Não existe nenhum ganhador</h1>
				<?php
				else :
					$totalVencedores = count($ganhadores);
					$total = ($totalVencedores > 1) ? "Ganhadores " : "Ganhador ";
				?>
					<h1><?= $total . $jogo->mandante . " x " . $jogo->visitante; ?></h1>
				<?php endif; ?>
				</div>
				<section class="cards">
				<?php
				if (isset($ganhadores)) :
					foreach ($ganhadores as $ganhador) :
				?>
					<div class="card">
						<img src="<?= URL_IMAGEM . "/usuarios/foto/" . $ganhador->foto; ?>" alt="" class="user">
						<h3><?= $ganhador->nome; ?></h3>
						<p><?= $ganhador->selecao_mandante . " " . $ganhador->gols_mandante . " x " . $ganhador->gols_visitante . " " . $ganhador->selecao_visitante; ?></p>
						<p>Premiação: <b>R$ <?= moedaBr(($jogo->total / $totalVencedores)); ?></b></p>
					</div>
				<?php
					endforeach;
				endif;
				?>
				</section>
