<?php
namespace app\controllers;

use Yii;
use app\models\Activity;
use yii\web\NotFoundHttpException;


class ActivitiesController extends \yii\web\Controller
{
    public $data_post;
    /**
     * @inhericdoc
     */
    public function beforeAction($action) 
    {
        $post = Yii::$app->request->post('Activity');
        Yii::$app->response->format = 'json';
        
        if ($post) {
            $this->data_post = [
                'belong_to' => $post['belong_to']
            ];
        }
        return parent::beforeAction($action);
    }

    public function actionCreate()
    {
    	$activity   =  new Activity();

    	if ($activity->load(Yii::$app->request->post()) && $activity->save()) {

            $activities = Activity::find()
                    ->where(['belong_to' => $this->data_post['belong_to']])
                    ->orderBy('id DESC')
                    ->limit(5)
                    ->offset(0)
                    ->all();

            $this->data_post = array_merge($this->data_post, [
                        'activities' => $activities,
                    ]);

            return [
                'errors' => '',
                'data'   => $this->renderPartial('@widget/views/activities/_list', $this->data_post)
            ];
    	}
    }

    public function actionEdit($id) 
    {
        $activity = $this->findModel($id);

        if ($activity->load(Yii::$app->request->post()) 
            && $activity->save()) {
            
            $activities = Activity::find()
                ->where(['belong_to' => $this->data_post['belong_to']])
                ->orderBy('id DESC')
                ->limit(5)
                ->offset(0)
                ->all();

            $this->data_post = array_merge($this->data_post, [
                        'activities' => $activities,
                    ]);

            return [
                'errors' => '',
                'data'   => $this->renderPartial('@widget/views/activities/_list', $this->data_post)
            ];

        }
        else {
            return [
                'errors' => $activity->getErrors(),
                'data'   => $this->renderPartial('@widget/views/activities/_list', $this->data_post)
            ];
        }

    }

    public function actionMore($page = 1)
    {
        $disViewMore = false;
        $belong_to   = 0;
        $post        = Yii::$app->request->post('Activity');

        if ($post) 
        {
            $belong_to = $post['belong_to'];
            $activities = Activity::find()
                ->where(['belong_to' => $belong_to])
                ->orderBy('id DESC')
                ->limit($page * 5)
                ->all();

            $this->data_post = array_merge($this->data_post, [
                        'activities' => $activities, 
                    ]);

            if (!empty($activities)) 
            {
                return [
                    'errors' => '',
                    'data'   => $this->renderPartial('@widget/views/activities/_list', $this->data_post)
                ];
            }
            else 
            {
                return [
                    'errors' => '',
                    'data'   => "<p class='no-more'>No activity is available</p>"
                ];
            }
        }
    }
    
    public function actionLoad($id)
    {
        $activity = $this->findModel($id);
        $this->data_post = array_merge($this->data_post, ['model' => $activity]);

        return [
                'errors' => '',
                'data'   => $this->renderPartial('@widget/views/activities/_form', 
                        $this->data_post
                    )
            ];
    }
    /**
     * Deletes an existing Activity model.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        $activities = Activity::find()
                ->where(['belong_to' => $this->data_post['belong_to']])
                ->orderBy('id DESC')
                ->limit(5)
                ->offset(0)
                ->all();

        $this->data_post = array_merge($this->data_post, ['activities' => $activities]);
        
        return [
            'errors' => '',
            'data'   => $this->renderPartial('@widget/views/activities/_list', $this->data_post)
        ];
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
        if (($model = Activity::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
