<?php
namespace app\models\dao;

use app\core\Model;

class GanhadorDao extends Model {

	public function getJogo()
	{
		$sql = "SELECT jogos.id, mandantes.selecao AS mandante, visitantes.selecao AS visitante, premiacao.total FROM jogos JOIN mandantes ON mandantes.id = jogos.mandante JOIN visitantes ON visitantes.id = jogos.visitante JOIN premiacao ON premiacao.id_jogo = jogos.id WHERE jogos.status = 0 AND premiacao.total != 0 ORDER BY premiacao.id DESC";
		return $this->select($this->db, $sql, false);
	}

	public function getGanhadoresPorJogo($id)
	{
		$sql = "SELECT jogos.id, usuarios.foto, usuarios.nome, mandantes.selecao AS selecao_mandante, visitantes.selecao AS selecao_visitante, apostas.gols_mandante, apostas.gols_visitante FROM apostas JOIN usuarios ON usuarios.id = apostas.id_usuario JOIN jogos ON jogos.id = apostas.id_jogo JOIN mandantes ON mandantes.id = jogos.mandante JOIN visitantes ON visitantes.id = jogos.visitante WHERE apostas.gols_mandante = jogos.gols_mandante AND apostas.gols_visitante = jogos.gols_visitante AND apostas.situacao = 1 AND jogos.status = 0 AND jogos.id = {$id}";
		return $this->select($this->db, $sql);
	}

}
