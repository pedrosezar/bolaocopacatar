<?php
namespace app\models\dao;

use app\core\Model;

class JogoDao extends Model {

	public function getMandantes()
	{
		$sql = "SELECT selecoes.id, selecoes.selecao FROM selecoes WHERE selecoes.tipo = 'M'";
		return $this->select($this->db, $sql);
	}

	public function getVisitantes()
	{
		$sql = "SELECT selecoes.id, selecoes.selecao FROM selecoes WHERE selecoes.tipo = 'V'";
		return $this->select($this->db, $sql);
	}

	public function getJogoPorId($id)
	{
		$sql = "SELECT jogos.id, jogos.exibir, mandantes.selecao AS mandante, visitantes.selecao AS visitante FROM mandantes JOIN jogos ON mandantes.id = jogos.mandante JOIN visitantes ON visitantes.id = jogos.visitante WHERE jogos.status = 1 AND jogos.id = {$id}";
		return $this->select($this->db, $sql, false);
	}

	public function getJogo()
	{
		$sql = "SELECT jogos.data_hora, jogos.gols_mandante, jogos.gols_visitante, mandantes.selecao AS mandante, mandantes.escudo AS escudo_mandante, visitantes.selecao AS visitante, visitantes.escudo AS escudo_visitante FROM jogos JOIN mandantes ON mandantes.id = jogos.mandante JOIN visitantes ON visitantes.id = jogos.visitante WHERE jogos.exibir = 1 ORDER BY jogos.id DESC";
		return $this->select($this->db, $sql, false);
	}

	public function getJogos()
	{
		$sql = "SELECT jogos.id, jogos.data_hora, jogos.gols_mandante, jogos.gols_visitante, mandantes.selecao AS mandante, visitantes.selecao AS visitante FROM jogos JOIN mandantes ON mandantes.id = jogos.mandante JOIN visitantes ON visitantes.id = jogos.visitante ORDER BY jogos.id ASC";
		return $this->select($this->db, $sql);
	}

	public function getJogosParaAposta()
	{
		$sql = "SELECT jogos.id, jogos.data_hora, jogos.gols_mandante, jogos.gols_visitante, mandantes.selecao AS mandante, visitantes.selecao AS visitante, premiacao.total FROM jogos JOIN mandantes ON mandantes.id = jogos.mandante JOIN visitantes ON visitantes.id = jogos.visitante JOIN premiacao ON premiacao.id_jogo = jogos.id WHERE jogos.status = 1 ORDER BY jogos.id ASC";
		return $this->select($this->db, $sql);
	}

}
