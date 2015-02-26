<?php

namespace app\controllers;

use Yii;
use yii\web\Session;
use app\models\Msetting;
use app\controllers\MCSettingsController;


class MSettingsController extends MCSettingsController
{
	public function actionCreate()
	{
		$this->create('Msetting');
	}

	public function actionRemove()
	{
		$this->remove('Msetting');
	}
	
}
