<?php

namespace app\controllers;

use Yii;
use yii\web\Session;
use app\models\Csetting;
use app\controllers\MCSettingsController;


class CSettingsController extends MCSettingsController
{
	public function actionCreate()
	{
		$session = Yii::$app->session;

		if (empty($session->get('csetting'))) {
			$settings = [];
		}
		else {
			$settings = $session->get('csetting');
		}
		
		$csetting_post = Yii::$app->request->post('Csetting');

		if (!empty($csetting_post) && !$this->in_array_r($csetting_post['checklists_id'], $settings)) 
			array_push($settings, Yii::$app->request->post('Csetting'));

		$session->set('csetting', $settings);

		echo "<pre>"; var_dump($session->get('csetting')); die('1');
	}

	
	public function actionRemove()
	{
		$session = Yii::$app->session;

		$csetting_post = Yii::$app->request->post('Csetting');
		$csetting_session = $session->get('csetting');

		if (!empty($csetting_post) && !empty($csetting_session) && $this->in_array_r($csetting_post['checklists_id'], $csetting_session)) {
			$csetting_session = $this->array_recursive_diff($csetting_session, $csetting_post, 'checklists_id');
			$session->set('csetting', $csetting_session);
		}
		echo "<pre>"; var_dump($session->get('csetting')); die('2');

	}
	

	
}
