<?php

namespace app\controllers;

use Yii;
use app\models\Note;
use yii\web\NotFoundHttpException;
use app\behaviors\LoadMoreBehavior;

class NotesController extends \yii\web\Controller
{
    public $data_post;
    public $disViewMore = false;

    /**
     * @inhericdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => LoadMoreBehavior::className(),
            ],
        ];
    }

    /**
     * @inhericdoc
     */
    public function beforeAction($action) 
    {
        $post = Yii::$app->request->post('Note');
        // set response format
        Yii::$app->response->format = 'json';

        if ($post) 
        {
            $this->data_post = [
                'type_area' => $post['type_area'],
                'belong_to' => $post['belong_to']
            ];
        }

        return parent::beforeAction($action);
    }

    public function actionCreate() 
    {
    	$note = new Note();
        
        if ($note->load(Yii::$app->request->post()) 
            && $note->save()) {

            // get 5 latest notes
            $notes = Note::find()
                ->where([
                        'belong_to' => $this->data_post['belong_to'], 
                        'type_area' => $this->data_post['type_area']
                    ])
                ->orderBy('id DESC')
                ->limit(5)
                ->all();
            // merge returned data
            $res_data = array_merge($this->data_post, [
                    'notes' => $notes,
                    'disViewMore' => false
                ]);

            return [
                'errors' => '',
                'data'   => $this->renderPartial('@widget/views/notes/_list', $res_data)
            ];

        }
        else {
             // get 5 latest notes
            $notes = Note::find()
                ->where([
                        'belong_to' => $this->data_post['belong_to'], 
                        'type_area' => $this->data_post['type_area']
                    ])
                ->orderBy('id DESC')
                ->limit(5)
                ->all();
            // merge returned data
            $res_data = array_merge($this->data_post, [
                    'notes' => $notes,
                    'disViewMore' => false
                ]);

            return [
                'errors' => $note->getErrors(),
                'data'   => $this->renderPartial('@widget/views/notes/_list', $res_data)
            ];
        }
    }

    public function actionEdit($id) 
    {
    	$note = $this->findModel($id);

        if ($note->load(Yii::$app->request->post()) && $note->save()) {

             // get 5 latest notes
            $notes = Note::find()
                ->where([
                        'belong_to' => $this->data_post['belong_to'], 
                        'type_area' => $this->data_post['type_area']
                    ])
                ->orderBy('id DESC')
                ->limit(5)
                ->all();
            // merge returned data
            $res_data = array_merge($this->data_post, [
                    'notes' => $notes,
                    'disViewMore' => false
                ]);

            return [
                'errors' => '',
                'data'   => $this->renderPartial('@widget/views/notes/_list', $res_data)
            ];

        }
        else {
             // get 5 latest notes
            $notes = Note::find()
                ->where([
                        'belong_to' => $this->data_post['belong_to'], 
                        'type_area' => $this->data_post['type_area']
                    ])
                ->orderBy('id DESC')
                ->limit(5)
                ->all();
            // merge returned data
            $res_data = array_merge($this->data_post, [
                    'notes' => $notes,
                    'disViewMore' => false
                ]);

            return [
                'errors' => $note->getErrors(),
                'data'   => $this->renderPartial('@widget/views/notes/_list', $res_data)
            ];
        }
    }

    public function actionLoad($id)
    {
        $note = $this->findModel($id);
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
        // this is fag using show view more button or not
        if ($this->data_post)
        {
            $notes = Note::find()
                ->where([
                        'belong_to' => $this->data_post['belong_to'], 
                        'type_area' => $this->data_post['type_area']
                    ])
                ->orderBy('id DESC')
                ->limit($page * 5)
                ->all();

            $allNotes = Note::find()
                ->where([
                        'belong_to' => $this->data_post['belong_to'], 
                        'type_area' => $this->data_post['type_area']
                    ])
                ->all();

            // compare and then re-assign 
            if (count($allNotes) == count($notes)) 
            {
                $this->disViewMore = true;
            }

            $res_data = array_merge($this->data_post, [
                    'page' => $page, 
                    'disViewMore' => $this->disViewMore,
                    'notes' => $notes
                ]);

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
         // get 5 latest notes
        $notes = Note::find()
            ->where([
                    'belong_to' => $this->data_post['belong_to'], 
                    'type_area' => $this->data_post['type_area']
                ])
            ->orderBy('id DESC')
            ->limit(5)
            ->all();
        // merge returned data
        $res_data = array_merge($this->data_post, [
                'notes' => $notes,
                'disViewMore' => false
            ]);
            
        return [
            'errors' => '',
            'data'   => $this->renderPartial('@widget/views/notes/_list', $res_data)
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
