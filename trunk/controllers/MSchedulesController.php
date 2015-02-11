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
<<<<<<< HEAD
        $type = isset(Yii::$app->request->post('MessageSchedule')['type']) ? Yii::$app->request->post('MessageSchedule')['type'] : NULL;

    	if (null !== $type  && $type == 2)
    	{
			$mschedule->descriptions = Yii::$app->request->post('MessageSchedule')['descriptions'];
			$mschedule->relation     = Yii::$app->request->post('MessageSchedule')['relation'];
			$mschedule->type         = Yii::$app->request->post('MessageSchedule')['type'];
=======
>>>>>>> parent of 471f3d3... finish add schedules for messages

    	if ($mschedule->load(Yii::$app->request->post()) && $mschedule->save()) {
    		echo Json::encode(['success' => True]);
    		exit();
    	}
<<<<<<< HEAD
    	elseif (null !== $type && $type == 1) {
    		if ($mschedule->load(Yii::$app->request->post()) && $mschedule->save()) {

    			Yii::$app->response->format = 'json';
	    		return ['successful' => "true", 'data' => $this->renderPartial('@widget/views/mschedules/_list')];
	    	}
=======
    	else {
    		echo "<pre>"; var_dump($mschedule->getErrors()); die('$mschedule->getErrors()');
>>>>>>> parent of 471f3d3... finish add schedules for messages
    	}
    }

}
