<?php

namespace app\controllers;

use Yii;
use yii\web\Session;
use app\models\Csetting;
use app\controllers\MCSettingsController;


class CsettingsController extends MCSettingsController
{
	
	public function actionCreate()
	{
		$this->create('Csetting');
	}

	public function actionRemove()
	{
		$this->remove('Csetting');
	}
	
}
