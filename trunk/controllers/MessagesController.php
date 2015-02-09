<?php

namespace app\controllers;

use Yii;
use app\models\Message;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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

        echo json_encode(['errors' => '']);
        exit();
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
