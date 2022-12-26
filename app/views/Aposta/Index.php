			<div class="table-container">
				<div class="heading">
				<?php if (!empty($apostas)) : ?>
					<h1>Listagem para Apostas</h1>
				<?php if (isset($_SESSION[SESSION_LOGIN]) && $_SESSION[SESSION_LOGIN]->status === "admin") : ?>
					<a href="<?= URL_BASE; ?>/aposta/gerenciar" class="btn">Gerenciar Apostas</a>
				<?php
					endif;
				else :
				?>
					<h1>Nenhum jogo registrado</h1>
				<?php endif; ?>
				</div>
				<?php if (!empty($apostas)) : ?>
				<table class="table">
					<thead>
						<tr>
							<th>Data</th>
							<th>Horário</th>
							<th>Partida</th>
							<th>Premiação</th>
							<th>Ação</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($apostas as $aposta) : ?>
						<tr>
							<td data-label="Data"><?= dataFormatadaBrasil($aposta->data_hora); ?></td>
							<td data-label="Horário"><?= horaFormatadaBrasil($aposta->data_hora); ?></td>
							<td data-label="Partida"><?= $aposta->mandante . " x " . $aposta->visitante; ?></td>
							<td data-label="Premiação">R$ <?= moedaBr($aposta->total); ?></td>
							<td data-label="#">
							<?php if ($aposta->data_hora > date("Y-m-d H:i:s")) : ?>
								<a href="<?= URL_BASE . "/aposta/create/{$aposta->id}"; ?>" class="btn">Apostar</a>
							<?php else : ?>
								<span class="inativo">Apostar</span>
							<?php endif; ?>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
				<?php endif; ?>
			</div>
