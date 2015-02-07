<?php

namespace app\controllers;

use Yii;
use app\models\Setting;

class SettingsController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$setting = Setting::findOne(1);
    	
    	if ($setting->load(Yii::$app->request->post()) && $setting->save()) {
    		return $this->redirect(['/']);
    	}

        return $this->render('index', [
        		'setting' => $setting
        	]);
    }

    public function actionChange()
    {
        
    }

}
