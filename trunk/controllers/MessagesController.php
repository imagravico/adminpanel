<?php

namespace app\controllers;

use Yii;
use app\models\Message;
use app\models\MessageSchedule;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * MessagesController implements the CRUD actions for Message model.
 */
class MessagesController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                ],
            ],
        ];
    }

    /**
     * Lists all Message models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index', [
                'messages' => Message::find()->all()
            ]);
    }

    /**
     * Creates a new Message model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $message = new Message();

        if ($message->load(Yii::$app->request->post()) && $message->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'message' => $message,
            ]);
        }
    }

    /**
     * Updates an existing Message model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionEdit($id)
    {
        $message = $this->findModel($id);

        if ($message->load(Yii::$app->request->post()) && $message->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('edit', [
                'message' => $message,
            ]);
        }
    }

    /**
     * Deletes an existing Message model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        MessageSchedule::deleteAll(['messages_id' => $id]);

        return $this->redirect(['/messages']);
    }

    public function actionGetevent() 
    {
        $out = [];
        $mSchedule = new MessageSchedule();

        if (isset($_POST['depdrop_parents']) && $_POST['depdrop_parents'][0] != '') 
        {
            $relation = $_POST['depdrop_parents'][0];
            if ($relation == 1) {
                $out = $mSchedule->client_event; 
                
            } 
            elseif ($relation == 2) {
                $out = $mSchedule->website_event; 
            }
            echo Json::encode(['output' => $out, 'selected' => '']);
            return;
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }

    public function actionGetsendtype() 
    {
        $mSchedule = new MessageSchedule();

        if (isset($_POST['depdrop_parents']) && $_POST['depdrop_parents'][0] != '') 
        {
            $out = $mSchedule->send_on;
            echo Json::encode(['output' => $out, 'selected' => '']);
            return;
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }
    /**
     * Finds the Message model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Message the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Message::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
