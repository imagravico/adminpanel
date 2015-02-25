<?php

namespace app\controllers;

use Yii;
use app\models\ChecklistSchedule;
use yii\helpers\Json;
use yii\web\NotFoundHttpException;


class CSchedulesController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCreate()
    {
    	$cschedule = new ChecklistSchedule();
        $type = isset(Yii::$app->request->post('ChecklistSchedule')['type']) ? Yii::$app->request->post('ChecklistSchedule')['type'] : NULL;

    	if (null !== $type  && $type == 2)
    	{
            $cschedule->active        = Yii::$app->request->post('ChecklistSchedule')['active'];
            $cschedule->subject       = Yii::$app->request->post('ChecklistSchedule')['subject'];
            $cschedule->message       = Yii::$app->request->post('ChecklistSchedule')['message'];
            $cschedule->relation      = Yii::$app->request->post('ChecklistSchedule')['relation'];
            $cschedule->type          = Yii::$app->request->post('ChecklistSchedule')['type'];
            $cschedule->checklists_id = Yii::$app->request->post('ChecklistSchedule')['checklists_id'];

    		if ($cschedule->save()) {
    			Yii::$app->response->format = 'json';
	    		return [
                        'errors' => '', 
                        'data'   => $this->renderPartial('@widget/views/cschedules/_list', 
                            ['checklists_id' => $cschedule->checklists_id])
                    ];
	    	}
	    	
    	}
    	elseif (null !== $type && $type == 1) {
    		if ($cschedule->load(Yii::$app->request->post()) && $cschedule->save()) {

    			Yii::$app->response->format = 'json';
	    		return [
                        'errors' => '', 
                        'data'   => $this->renderPartial('@widget/views/cschedules/_list', 
                            ['checklists_id' => $cschedule->checklists_id])
                    ];
	    	}
    	}
    	
    }

    public function actionEdit($id)
    {
        $cschedule = $this->findModel($id); 

        $type = isset(Yii::$app->request->post('ChecklistSchedule')['type']) ? Yii::$app->request->post('ChecklistSchedule')['type'] : NULL;

        if (null !== $type  && $type == 2)
        {
            $cschedule->active        = Yii::$app->request->post('ChecklistSchedule')['active'];
            $cschedule->subject       = Yii::$app->request->post('ChecklistSchedule')['subject'];
            $cschedule->message       = Yii::$app->request->post('ChecklistSchedule')['message'];
            $cschedule->relation      = Yii::$app->request->post('ChecklistSchedule')['relation'];
            $cschedule->type          = Yii::$app->request->post('ChecklistSchedule')['type'];
            $cschedule->checklists_id = Yii::$app->request->post('ChecklistSchedule')['checklists_id'];

            if ($cschedule->save()) {
                Yii::$app->response->format = 'json';
                return [
                        'errors' => '', 
                        'data'   => $this->renderPartial('@widget/views/cschedules/_list', 
                            ['checklists_id' => $cschedule->checklists_id])
                    ];
            }
            
        }
        elseif (null !== $type && $type == 1) {
            if ($cschedule->load(Yii::$app->request->post()) && $cschedule->save()) {

                Yii::$app->response->format = 'json';
                return [
                        'errors' => '', 
                        'data'   => $this->renderPartial('@widget/views/cschedules/_list', 
                            ['checklists_id' => $cschedule->checklists_id])
                    ];
            }
        }
        
    }

    /**
     * Deletes an existing MessageSchedule model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $checklists_id = $this->findModel($id)->checklists_id;
        $this->findModel($id)->delete();
        Yii::$app->response->format = 'json';

        return [
                'errors' => '',
                'data'   => $this->renderPartial('@widget/views/cschedules/_list', [
                        'checklists_id' => $checklists_id
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
        if (($model = ChecklistSchedule::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
