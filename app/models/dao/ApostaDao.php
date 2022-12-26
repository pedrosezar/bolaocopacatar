<?php
namespace app\models\dao;

use app\core\Model;

class ApostaDao extends Model {

	public function listaJogos($valor)
	{
		$sql = "SELECT DISTINCT apostas.id_jogo, mandantes.selecao AS mandante, visitantes.selecao AS visitante FROM apostas JOIN jogos ON jogos.id = apostas.id_jogo JOIN mandantes ON mandantes.id = jogos.mandante JOIN visitantes ON visitantes.id = jogos.visitante WHERE apostas.situacao = 0 AND jogos.status = 1 AND mandantes.selecao LIKE '%$valor%' OR visitantes.selecao LIKE '%$valor%'";
		return $this->select($this->db, $sql);
	}

	public function atualizar($idJogo, $idUsuario, $situacao)
	{
		$sql = "UPDATE apostas SET situacao = {$situacao} WHERE id_jogo = {$idJogo} AND id_usuario = {$idUsuario}";
		return $this->db->query($sql);
	}

	public function atualizarPremiacao($idJogo)
	{
		$sql = "UPDATE premiacao SET total = total + 5 WHERE id_jogo = {$idJogo}";
		return $this->db->query($sql);
	}

	public function getExiste($idJogo, $idUsuario)
	{
		$sql = "SELECT id_jogo, id_usuario FROM apostas WHERE id_jogo = {$idJogo} AND id_usuario = {$idUsuario}";
		return $this->select($this->db, $sql, false);
	}

	public function getCupom($id)
	{
		$sql = "SELECT apostas.id, apostas.data, apostas.controle, mandantes.selecao AS mandante, visitantes.selecao AS visitante FROM apostas JOIN jogos ON jogos.id = apostas.id_jogo JOIN mandantes ON mandantes.id = jogos.mandante JOIN visitantes ON visitantes.id = jogos.visitante WHERE apostas.id = {$id}";
		return $this->select($this->db, $sql, false);
	}

}
