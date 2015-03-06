<?php

namespace app\controllers;

use Yii;
use app\models\MessageSchedule;
use yii\helpers\Json;
use yii\web\NotFoundHttpException;


class MschedulesController extends \yii\web\Controller
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
            $mschedule->messages_id  = Yii::$app->request->post('MessageSchedule')['messages_id'];

    		if ($mschedule->save()) {
    			Yii::$app->response->format = 'json';
	    		return [
                        'errors' => '', 
                        'data'   => $this->renderPartial('@widget/views/mschedules/_list', 
                            ['message_id' => $mschedule->messages_id])
                    ];
	    	}
    	}
    	elseif (null !== $type && $type == 1) {
            
    		if ($mschedule->load(Yii::$app->request->post()) && $mschedule->save()) {
    			Yii::$app->response->format = 'json';
	    		return [
                        'errors' => '', 
                        'data'   => $this->renderPartial('@widget/views/mschedules/_list', 
                            ['message_id' => $mschedule->messages_id])
                    ];
	    	}
    	}
    }

    public function actionEdit($id)
    {
        $mschedule = $this->findModel($id); 

        $type = isset(Yii::$app->request->post('MessageSchedule')['type']) ? Yii::$app->request->post('MessageSchedule')['type'] : NULL;

        if (null !== $type  && $type == 2)
        {
            $mschedule->descriptions = Yii::$app->request->post('MessageSchedule')['descriptions'];
            $mschedule->relation     = Yii::$app->request->post('MessageSchedule')['relation'];
            $mschedule->type         = Yii::$app->request->post('MessageSchedule')['type'];
            $mschedule->messages_id   = Yii::$app->request->post('MessageSchedule')['messages_id'];

            if ($mschedule->save()) {
                Yii::$app->response->format = 'json';
                return [
                        'errors' => '', 
                        'data'   => $this->renderPartial('@widget/views/mschedules/_list', 
                            ['message_id' => $mschedule->messages_id])
                    ];
            }
            
        }
        elseif (null !== $type && $type == 1) {
            if ($mschedule->load(Yii::$app->request->post()) && $mschedule->save()) {

                Yii::$app->response->format = 'json';
                return [
                        'errors' => '', 
                        'data'   => $this->renderPartial('@widget/views/mschedules/_list', 
                            ['message_id' => $mschedule->messages_id])
                    ];
            }
        }
        
    }


    public function actionLoad($id)
    {
        $model = $this->findModel($id);
        Yii::$app->response->format = 'json';

        return [
                'errors' => '',
                'data'   => $this->renderPartial('@widget/views/mschedules/_form', [
                    'model' => $model,
                    'message_id' => Yii::$app->request->post('message_id')
                ])
            ];
    }
    /**
     * Deletes an existing MessageSchedule model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $messages_id = $this->findModel($id)->messages_id;
        $this->findModel($id)->delete();
        Yii::$app->response->format = 'json';

        return [
                'errors' => '',
                'data'   => $this->renderPartial('@widget/views/mschedules/_list', [
                        'message_id' => $messages_id
                    ])
            ];
    }

    /**
     * Finds the MessageSchedule model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MessageSchedule the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MessageSchedule::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
