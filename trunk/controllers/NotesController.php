<?php

namespace app\controllers;

use Yii;
use app\models\Note;
use yii\web\NotFoundHttpException;


class NotesController extends \yii\web\Controller
{

    public function actionCreate() {

    	$note = new Note();
    	$note->load(Yii::$app->request->post());
    	$note->save();

    	$notes = Note::find()->orderBy('id DESC')->all();
        Yii::$app->response->format = 'json';
        return [
            'errors' => '',
            'data'   => $this->renderPartial('@widget/views/notes/_list', [
                'notes' => $notes
            ])
        ];
    }

    public function actionEdit($id) {

    	$note = $this->findModel($id);
		$note->load(Yii::$app->request->post());
    	$note->save();
    	$notes = Note::find()->orderBy('id DESC')->all();

        Yii::$app->response->format = 'json';
        return [
            'errors' => '',
            'data'   => $this->renderPartial('@widget/views/notes/_list', [
                'notes' => $notes
            ])
        ];
    }

    /**
     * Deletes an existing Note model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        
        $notes = Note::find()->orderBy('id DESC')->all();

        Yii::$app->response->format = 'json';
        return [
            'errors' => '',
            'data'   => $this->renderPartial('@widget/views/notes/_list', [
                'notes'  => $notes,
            ])
        ];
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Note::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
