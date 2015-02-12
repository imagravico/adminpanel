<?php

namespace app\controllers;

use Yii;
use app\models\Activity;
use yii\web\NotFoundHttpException;


class ActivitiesController extends \yii\web\Controller
{
    public function actionCreate()
    {
    	$activity   =  new Activity();

    	if ($activity->load(Yii::$app->request->post()) && $activity->save()) {

            $activities = Activity::find()
                ->orderBy('id DESC')
                ->limit(5)
                ->offset(0)
                ->all();

            Yii::$app->response->format = 'json';
            return [
                'errors' => '',
                'data'   => $this->renderPartial('@widget/views/activities/_list', [
                        'activities' => $activities
                    ])
            ];
    	}
    	
    }

    public function actionMore($page = 1)
    {
    	$activities = Activity::find()
			->orderBy('id DESC')
			->limit(5)
			->offset(($page - 1) * 5)
			->all();
        
        Yii::$app->response->format = 'json';

		if (!empty($activities)) {
			
            return [
                'errors' => '',
                'data'   => $this->renderPartial('@widget/views/activities/_list', [
                        'activities' => $activities
                    ])
            ];
		}
		else {
            return [
                'errors' => '',
                'data'   => "<p class='no-more'>No activity is available</p>"
            ];
		}
    }
    
    /**
     * Finds the Activity model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Activity the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Client::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
