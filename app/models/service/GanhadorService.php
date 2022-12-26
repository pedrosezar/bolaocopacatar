<?php
namespace app\models\service;

use app\models\dao\GanhadorDao;

class GanhadorService {

	public static function getJogo()
	{
		$dao = new GanhadorDao();
		return $dao->getJogo();
	}

	public static function getGanhadoresPorJogo($id)
	{
		$dao = new GanhadorDao();
		return $dao->getGanhadoresPorJogo($id);
	}

}
