			<div class="table-container">
				<div class="heading">
					<h1><?= (!empty($apostas) ? "Listagem de Apostas" : "Nenhuma aposta registrada"); ?></h1>
				<?php if (isset($_SESSION[SESSION_LOGIN]) && !empty($apostas)) : ?>
					<a href="javascript:;" onclick="return minhasApostas(this)" data-id="<?= $_SESSION[SESSION_LOGIN]->id; ?>" class="btn">Minhas Apostas</a>
				<?php endif; ?>
				</div>
				<?php if (!empty($apostas)) : ?>
				<table class="table">
					<thead>
						<tr>
							<th>Data</th>
							<th>Nome</th>
							<th>Aposta</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody id="lista_apostas">
					<?php foreach ($apostas as $aposta) : ?>
						<tr>
							<td data-label="Data"><?= dataHoraFormatada($aposta->data); ?></td>
							<td data-label="Nome"><?= $aposta->nome; ?></td>
							<td data-label="Aposta"><?= $aposta->selecao_mandante . " " . $aposta->gols_mandante . " x " . $aposta->gols_visitante . " " . $aposta->selecao_visitante; ?></td>
							<td data-label="Status"><?= ($aposta->situacao) ? "<span class='aprovado'>Aprovado</span>" : "<span class='analise'>Em análise</span>"; ?></td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
				<?php endif; ?>
			</div>
