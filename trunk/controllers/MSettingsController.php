<?php

namespace app\controllers;

use Yii;
use  yii\web\Session;


class MSettingsController extends \yii\web\Controller
{
	public function actionCreate()
	{
		$session = Yii::$app->session;


		if (empty($session->get('msetting'))) {
			$settings = [];
		}
		else {
			$settings = $session->get('msetting');
		}
		
		array_push($settings, Yii::$app->request->post('Msetting'));

		$session->set('msetting', $settings);

		echo "<pre>"; print_r($session->get('msetting')); die('$info');
		
	}
}