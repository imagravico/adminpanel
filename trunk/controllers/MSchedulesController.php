<?php

namespace app\controllers;

use Yii;
use app\models\MessageSchedule;
use yii\helpers\Json;


class MSchedulesController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCreate()
    {
    	$mschedule = new MessageSchedule();

    	if ($mschedule->load(Yii::$app->request->post()) && $mschedule->save()) {
    		echo Json::encode(['success' => True]);
    		exit();
    	}
    	else {
    		echo "<pre>"; var_dump($mschedule->getErrors()); die('$mschedule->getErrors()');
    	}
    }

}
