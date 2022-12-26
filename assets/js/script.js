$(function() {

	$("#jogo").on("keyup", function() {
		let q = $(this).val();
		if (q == "") {
			$(".listaJogos").hide();
			return;
		}
		$.ajax({
			url: base_url + "aposta/buscar/" + q,
			type: "GET",
			dataType: "json",
			data: {},
			success: function(data) {
				$("#jogo").after('<div class="listaJogos"></div>');
				html = "";
				for (i = 0; i < data.length; i++) {
					html += '<div class="si"><a href="javascript:;" onclick="selecionarJogos(this)"' +
							'data-id_jogo="' + data[i].id_jogo + '"' +
							'" data-mandante="' + data[i].mandante + '"' +
							'" data-visitante="' + data[i].visitante + '">' +
							data[i].mandante + " x " + data[i].visitante + '</a></div>';
				}
				$(".listaJogos").html(html);
				$(".listaJogos").show();
			}
		});
	});

});

function selecionarJogos(obj) {
	let id_jogo = $(obj).attr("data-id_jogo");
	let jogo    = $(obj).attr("data-mandante") + " x " + $(obj).attr("data-visitante");
	$(".listaJogos").hide();
	$("#jogo").val(jogo);
	$("#id_jogo").val(id_jogo);
	listarApostadores(id_jogo);
}

function listarApostadores(id) {
	$.ajax({
		url: base_url + "usuario/listaPorAposta/" + id,
		type: "GET",
		dataType: "json",
		data: {},
		success: function(data) {
			html = "<option value=''>Selecione o apostador</option>";
			for (i = 0; i < data.length; i++) {
					html += '<option value="'+ data[i].id +'">'+ data[i].nome +'</option>';
				}
				$("#id_usuario").html(html);
		}
	});
}

function minhasApostas(obj) {
	let id = $(obj).attr("data-id");
	$.ajax({
		url: base_url + "apostador/show/" + id,
		type: "GET",
		dataType: "json",
		data: {},
		success: function(data) {
			lista_apostas(data);
		}
	});
}

function lista_apostas(data) {
	html = "<tr>";
	for (let i in data) {
		let situacao = (data[i].situacao) ? '<span class="aprovado">Aprovado</span>' : '<span class="analise">Em análise</span>';
		html += '<td data-label="Data">' + dataHoraFormatada(data[i].data) + '</td>' +
				'<td data-label="Nome">' + data[i].nome + '</td>' +
				'<td data-label="Aposta">' + data[i].selecao_mandante + ' ' + data[i].gols_mandante + ' x ' + data[i].gols_visitante + ' ' + data[i].selecao_visitante + '</td>' +
				'<td data-label="Status">' + situacao + '</td></tr>';
	}
	$("#lista_apostas").html(html);
}

function excluir(obj) {
	let entidade = $(obj).attr("data-entidade");
	let id       = $(obj).attr("data-id");
	if (confirm("Deseja realmente excluir ?")) {
		window.location.href = base_url + entidade +"/excluir/" + id;
	}
}

function dataHoraFormatada(data) {
	let dataHora          = new Date(data);
	return (zeroEsquerda(dataHora.getDate()) + "/" + zeroEsquerda(dataHora.getMonth() + 1) + "/" + dataHora.getFullYear() + " - " + zeroEsquerda(dataHora.getHours()) + "h" + zeroEsquerda(dataHora.getMinutes()) + "min");
}

function zeroEsquerda(number) {
	return (number < 10) ? "0" + number : number;
}

function fecharMsg(obj) {
	$(".msg").hide();
}
