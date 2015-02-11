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
        $type = isset(Yii::$app->request->post('MessageSchedule')['type']) ? Yii::$app->request->post('MessageSchedule')['type'] : NULL;

    	if (null !== $type  && $type == 2)
    	{
			$mschedule->descriptions = Yii::$app->request->post('MessageSchedule')['descriptions'];
			$mschedule->relation     = Yii::$app->request->post('MessageSchedule')['relation'];
			$mschedule->type         = Yii::$app->request->post('MessageSchedule')['type'];

    		if ($mschedule->save()) {
    			Yii::$app->response->format = 'json';
	    		return ['successful' => "true", 'data' => $this->renderPartial('@widget/views/mschedules/_list')];
	    	}
	    	
    	}
    	elseif (null !== $type && $type == 1) {
    		if ($mschedule->load(Yii::$app->request->post()) && $mschedule->save()) {

    			Yii::$app->response->format = 'json';
	    		return ['successful' => "true", 'data' => $this->renderPartial('@widget/views/mschedules/_list')];
	    	}
    	}
    	
    }

}
