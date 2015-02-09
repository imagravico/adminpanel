<?php

namespace app\controllers;

use Yii;
use app\models\Setting;
use app\models\User;


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
        $user = User::findOne(Yii::$app->user->id);

        if ($user->load(Yii::$app->request->post()) && $user->save()) {
            $user->refresh();
                \Yii::$app->response->format = 'json';

            return [
                'success' => true,
            ];
        }

        return $this->renderAjax('_change', [
            'user' => $user,
        ]);
    }

}
