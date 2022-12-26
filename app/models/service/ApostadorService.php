<?php
namespace app\models\service;

use app\models\dao\ApostadorDao;

class ApostadorService {

	public static function getApostas($id)
	{
		$dao = new ApostadorDao();
		return $dao->getApostas($id);
	}

}
