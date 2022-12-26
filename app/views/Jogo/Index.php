			<div class="table-container jogos">
				<div class="heading">
				<?php if (!empty($jogos)) : ?>
					<h1>Listagem dos Jogos</h1>
				<?php else : ?>
					<h1>Nenhum jogo registrado</h1>
				<?php endif; ?>
					<a href="<?= URL_BASE; ?>/jogo/create" class="btn">Cadastrar Jogo</a>
				</div>
				<div class="success">
					<?php $this->verMsg(); ?>
				</div>
				<?php if (!empty($jogos)) : ?>
				<table class="table">
					<thead>
						<tr>
							<th>Data</th>
							<th>Hora</th>
							<th>Mandante</th>
							<th>Resultado</th>
							<th>Visitante</th>
							<th>Ação</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($jogos as $jogo) : ?>
						<tr>
							<td data-label="Data"><?= dataFormatadaBrasil($jogo->data_hora); ?></td>
							<td data-label="Hora"><?= horaFormatadaBrasil($jogo->data_hora); ?></td>
							<td data-label="Mandante"><?= $jogo->mandante; ?></td>
							<td data-label="Resultado"><?= $jogo->gols_mandante . " x " . $jogo->gols_visitante; ?></td>
							<td data-label="Visitante"><?= $jogo->visitante; ?></td>
							<td data-label="Ação">
								<a href="<?= URL_BASE . "/jogo/edit/{$jogo->id}"; ?>" class="btn">Editar</a>
								<a href="javascript:;" onclick="return excluir(this)" data-entidade="jogo" data-id="<?= $jogo->id; ?>" class="btn">Excluir</a>
								<a href="<?= URL_BASE . "/jogo/gerenciar/{$jogo->id}"; ?>" class="btn">Gerenciar</a>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
				<?php endif; ?>
			</div>
