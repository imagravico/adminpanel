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
    	$activities = Activity::find()
    		->orderBy('id DESC')
    		->limit(5)
			->offset(0)
    		->all();

    	if ($activity->load(Yii::$app->request->post()) && $activity->save()) {

    		return $this->renderPartial('@widget/views/activities/_list', [
    				'errors' => '', 
    				'activities' => $activities
    			]);
    	}
    	else {
    		return $this->renderPartial('@widget/views/activities/_list', [
				'errors'     => $activity->getErrors() , 
				'activities' => $activities
    		]);
    	}
    }

    public function actionMore($page = 1)
    {
    	$activities = Activity::find()
			->orderBy('id DESC')
			->limit(5)
			->offset(($page - 1) * 5)
			->all();

		if (!empty($activities)) {
			return $this->renderPartial('@widget/views/activities/_list', [
    				'errors' => '', 
    				'activities' => $activities
    			]);
		}
		else {
			echo "<p class='no-more'>No activity is available</p>";
			exit();
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
