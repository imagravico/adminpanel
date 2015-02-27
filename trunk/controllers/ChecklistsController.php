<?php

namespace app\controllers;

use Yii;
use app\models\Checklist;
use yii\web\Session;


class ChecklistsController extends \yii\web\Controller
{
    /**
     * @inhericdoc
     */
    public function beforeAction($action) 
    {
        $session    = Yii::$app->session;
        $post       = Yii::$app->request->post();
        $cur_action = $action->id;

        if (($cur_action === 'edit' && !$post) || $action === 'create' || $action === 'index') {
            $session->remove('checklists_content');
        }

        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
    	$checklists = Checklist::find()
    				->all();

        return $this->render('index', ['checklists' => $checklists]);
    }


    public function actionCreate()
    {
    	$checklist = new Checklist();

        if ($checklist->load(Yii::$app->request->post()) && $checklist->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'checklist' => $checklist,
            ]);
        }
    }

    /**
     * Updates an existing Checklist model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionEdit($id)
    {

    	$checklist = $this->findModel($id);

        if ($checklist->load(Yii::$app->request->post()) && $checklist->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('edit', [
                'checklist' => $checklist,
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

        Yii::$app->response->format = 'json';
        return  ['errors' => ''];
    }
    

    public function actionPrechecklist()
    {
        $session = Yii::$app->session;
        $post = Yii::$app->request->post('checklist_content');

        if ($post) {
            $session->set('checklists_content', $post);
        }
    }

    public function actionGetcontent() 
    {
        $id = Yii::$app->request->post('id');
        if ($id) {
            $checklist = Checklist::findOne($id);
            Yii::$app->response->format = 'json';
            return  ['errors' => '', 'data' => $checklist->content];
        }
    }

    public function actionSavecontent() 
    {
        $id = Yii::$app->request->post('id');
        $content = Yii::$app->request->post('content');

        if ($id) {
            $checklist = Checklist::findOne($id);
            $checklist->content = $content;

            if ($checklist->save()) {
                Yii::$app->response->format = 'json';
                return  ['errors' => '', 'data' => $checklist->content];
            }
        }
        return;
    }
    /**
     * Finds the Checklist model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Checklist the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Checklist::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
