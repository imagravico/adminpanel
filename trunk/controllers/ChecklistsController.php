<?php

namespace app\controllers;

use Yii;
use app\models\Checklist;


class ChecklistsController extends \yii\web\Controller
{
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
