<?php
namespace app\models\dao;

use app\core\Model;

class ApostadorDao extends Model {

	public function getApostas($id)
	{
		$sql = "SELECT apostas.data, apostas.gols_mandante, apostas.gols_visitante, apostas.situacao, usuarios.nome, mandantes.selecao AS selecao_mandante, visitantes.selecao AS selecao_visitante, jogos.id FROM apostas JOIN usuarios ON usuarios.id = apostas.id_usuario JOIN jogos ON jogos.id = apostas.id_jogo JOIN mandantes ON mandantes.id = jogos.mandante JOIN visitantes ON visitantes.id = jogos.visitante";
		if ($id) {
			$sql .= " WHERE apostas.id_usuario = {$id} ORDER BY apostas.id DESC";
		} else {
			$sql .= " ORDER BY apostas.id DESC";
		}
		return $this->select($this->db, $sql);
	}

}
