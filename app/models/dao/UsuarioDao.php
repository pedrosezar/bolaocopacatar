<?php
namespace app\models\dao;

use app\core\Model;

class UsuarioDao extends Model {

	public function listaUsuariosPorJogo($id)
	{
		$sql = "SELECT usuarios.id, usuarios.nome FROM usuarios JOIN apostas ON apostas.id_usuario = usuarios.id JOIN jogos ON apostas.id_jogo = jogos.id WHERE apostas.situacao = 0 AND jogos.id = {$id}";
		return $this->select($this->db, $sql);
	}

	public function getExiste($nome, $celular)
	{
		$sql = "SELECT nome, celular FROM usuarios WHERE nome = '{$nome}' OR celular = '{$celular}'";
		return $this->select($this->db, $sql, false);
	}

}
