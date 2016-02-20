<?php

namespace app\controllers;

use Yii;
use app\models\ChecklistSchedule;
use yii\helpers\Json;
use yii\web\NotFoundHttpException;


class CschedulesController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCreate()
    {
    	$cschedule = new ChecklistSchedule();
        $type = isset(Yii::$app->request->post('ChecklistSchedule')['type']) ? Yii::$app->request->post('ChecklistSchedule')['type'] : NULL;
        die('123');
    	if (null !== $type  && $type == 2)
    	{
            $post                     = Yii::$app->request->post('ChecklistSchedule');
            $cschedule->active        = $post['active'];
            $cschedule->subject       = $post['subject'];
            $cschedule->message       = $post['message'];
            $cschedule->relation      = $post['relation'];
            $cschedule->type          = $post['type'];
            $cschedule->checklists_id = $post['checklists_id'];

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
    	return false;
    }

    public function actionEdit($id)
    {
        $cschedule = $this->findModel($id); 

        $type = isset(Yii::$app->request->post('ChecklistSchedule')['type']) ? Yii::$app->request->post('ChecklistSchedule')['type'] : NULL;

        if (null !== $type  && $type == 2)
        {
            $post = Yii::$app->request->post('ChecklistSchedule');
            $cschedule->active        = $post['active'];
            $cschedule->subject       = $post['subject'];
            $cschedule->message       = $post['message'];
            $cschedule->relation      = $post['relation'];
            $cschedule->type          = $post['type'];
            $cschedule->checklists_id = $post['checklists_id'];

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

    public function actionView($id)
    {
        if ($id) {
            $model = $this->findModel($id);
            Yii::$app->response->format = 'json';

            return [
                'errors' => '',
                'data'   => $this->renderPartial('@widget/views/cschedules/_view', [
                        'model' => $model,
                    ])
            ];
        }
    }

    public function actionLoad($id)
    {
        $model = $this->findModel($id);
        $checklists_id = $model->checklists_id;
        Yii::$app->response->format = 'json';

        return [
                'errors' => '',
                'data'   => $this->renderPartial('@widget/views/cschedules/_form', [
                        'model' => $model,
                        'checklists_id' => $checklists_id
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
