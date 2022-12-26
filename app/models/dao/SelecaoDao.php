<?php
namespace app\models\dao;

use app\core\Model;

class SelecaoDao extends Model {

	public function getSelecaoRepetida($selecao, $tipo)
	{
		$sql = "SELECT selecoes.selecao, selecoes.tipo FROM selecoes WHERE selecoes.selecao = '{$selecao}' AND selecoes.tipo = '{$tipo}'";
		return $this->select($this->db, $sql, false);
	}

}
