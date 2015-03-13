<?php

namespace app\controllers;

use Yii;
use app\models\Note;
use yii\web\NotFoundHttpException;


class NotesController extends \yii\web\Controller
{
    public $data_post;
    /**
     * @inhericdoc
     */
    public function beforeAction($action) 
    {
        $post = Yii::$app->request->post('Note');
        
        if ($post) {
            $this->data_post = [
                'area' => $post['type_area'],
                'belong_to' => $post['belong_to']
            ];
        }
        return parent::beforeAction($action);
    }

    public function actionCreate() 
    {
    	$note = new Note();
        Yii::$app->response->format = 'json';
        if ($note->load(Yii::$app->request->post()) && $note->save()) {
            
            return [
                'errors' => '',
                'data'   => $this->renderPartial('@widget/views/notes/_list', $this->data_post)
            ];

        }
        else {
            return [
                'errors' => $note->getErrors(),
                'data'   => $this->renderPartial('@widget/views/notes/_list', $this->data_post)
            ];
        }
    }

    public function actionEdit($id) 
    {
    	$note = $this->findModel($id);
        Yii::$app->response->format = 'json';

        if ($note->load(Yii::$app->request->post()) && $note->save()) {
            return [
                'errors' => '',
                'data'   => $this->renderPartial('@widget/views/notes/_list', $this->data_post)
            ];

        }
        else {
            return [
                'errors' => $note->getErrors(),
                'data'   => $this->renderPartial('@widget/views/notes/_list', $this->data_post)
            ];
        }

    }

    public function actionLoad($id)
    {
        $note = $this->findModel($id);
        Yii::$app->response->format = 'json';
        $res_data = array_merge($this->data_post, ['note' => $note]);

        return [
                'errors' => '',
                'data'   => $this->renderPartial('@widget/views/notes/_form', 
                       $res_data
                    )
            ];
    }

    public function actionMore($page = 1)
    {
        $notes = Note::find()
            ->orderBy('id DESC')
            ->limit(5)
            ->offset(($page - 1) * 5)
            ->all();

        $offset = ($page - 1) * 5;
        $res_data = array_merge($this->data_post, ['offset' => $offset]);

        Yii::$app->response->format = 'json';

        if (!empty($notes)) {
            
            return [
                'errors' => '',
                'data'   => $this->renderPartial('@widget/views/notes/_list', $res_data)
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
     * Deletes an existing Note model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->response->format = 'json';
        
        return [
            'errors' => '',
            'data'   => $this->renderPartial('@widget/views/notes/_list', $this->data_post)
        ];
    }

    /**
     * Finds the Note model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Note the loaded model
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
