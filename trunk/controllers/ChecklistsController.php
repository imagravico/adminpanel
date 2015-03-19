<?php

namespace app\controllers;

use Yii;
use app\models\Checklist;
use yii\web\Session;
use app\models\Client;
use app\models\Website;
use app\models\SendmailForm;
use yii\web\NotFoundHttpException;
use app\models\ChecklistsTimeSent;
use app\models\ChecklistsCow;


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
    /**
     * for list page
     * @return mix
     */
    public function actionIndex()
    {
    	$checklists = Checklist::find()
    				->all();

        return $this->render('index', ['checklists' => $checklists]);
    }

    /**
     * for creating page
     * @return mix
     */
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
        $checklists = Checklist::find()->orderBy('id DESC')->all();

        return [
            'errors' => '',
            'data'   => $this->renderPartial('@widget/views/checklists/_list', [
                'checklists'  => $checklists,
                'belong_to'   => Yii::$app->request->post('belong_to')
            ])
        ];
    }
    /**
     * send a email to client with checklist attached
     * @return void
     */
    public function actionSendmail() 
    {
        $post = Yii::$app->request->post('SendmailForm');
        Yii::$app->response->format = 'json';
        $sm_form = new SendmailForm();

        if ($sm_form->load(Yii::$app->request->post()) && $sm_form->validate()) {

            if ($post['belong_to'] == 1) {
                $cow = Client::findOne($post['cowid']);
            }
            elseif ($post['belong_to'] == 2) {
                $cow = Website::findOne($post['cowid']);
            }

            $checklist = Checklist::findOne($post['checklists_id']);
            
            // save time sending
            // checking if time sending is exist then only update else create new one
            $timeSent = ChecklistsTimeSent::find()
                ->where([
                        'belong_to' => $post['belong_to'],
                        'checklists_id' => $checklist->id,
                        'clients_or_webs_id' => $post['cowid']
                    ])
                ->one();

            if (!isset($timeSent))
            {
                $timeSent =  new ChecklistsTimeSent();
            }
            
            $timeSent->checklists_id      = $checklist->id;
            $timeSent->clients_or_webs_id = $post['cowid'];
            $timeSent->belong_to          = $post['belong_to'];
            $timeSent->time_sent = date('Y-m-d H:i:s');
            $timeSent->save();

            // if everything is ok, then send mail. go ahead!!!
            Yii::$app->mailer->compose()
                ->setFrom('admin@panel.com')
                ->setTo($cow->email)
                ->setSubject($post['subject'])
                ->setTextBody($post['content'])
                ->attach(Yii::$app->basePath . '/web/upload/pdf/' . $checklist->file_name)
                ->send();

            return ['errors' => ''];
        }
        else {
            return ['errors' => 'Something is wrong.'];
        }
    }
    /**
     * downloading a checklist into machine with corresponding id
     * @param  integer $id of checklist
     * @return void
     */
    public function actionDownload($id)
    {
        $checklist = $this->findModel($id);
        $path_file = Yii::$app->basePath . '/web/upload/pdf/' . $checklist->file_name;

        // We'll be outputting a PDF
        header('Content-Type: application/pdf');

        // It will be called downloaded.pdf
        header('Content-Disposition: attachment; filename="' . $checklist->file_name . '"');

        // The PDF source is in original.pdf
        readfile($path_file);

    }

    /**
     * creating a checklist by this method then save its content (template) (in the html format)
     * to a session variable and save it along with some information of checklist via saveContent
     * method below
     * to db
     * @return nothing
     */
    public function actionPrechecklist()
    {
        $session = Yii::$app->session;
        $post = Yii::$app->request->post('checklist_content');

        if ($post) {
            $session->set('checklists_content', $post);
        }
    }

    /**
     * get template of checklist for each client or website
     * @return json content of template 
     */
    public function actionGetcontent() 
    {
        $post      = Yii::$app->request->post();
        $id        = $post['id'];
        $belong_to = $post['belong_to'];
        $cowid     = $post['cowid'];

        if ($id
            && $belong_to
            && $cowid 
            ) 
        {
            // if this checklist have been made for this client then using content of making 
            // checklist else using template of the checklist
            $checklistCow = ChecklistsCow::find()
                ->where([
                        'checklists_id'      => $id,
                        'belong_to'          => $belong_to,
                        'clients_or_webs_id' => $cowid
                    ])
                ->one();

            if (!$checklistCow) 
                $checklistCow = Checklist::findOne($id);

            Yii::$app->response->format = 'json';
            return  ['errors' => '', 'data' => $checklistCow->content];
        }
    }

    /**
     * save template of checklist along with some information to db
     * @return json content checklist
     */
    public function actionSavecontent() 
    {
        $post      = Yii::$app->request->post();
        $id        = $post['id'];
        $cowid     = $post['cowid'];
        $content   = $post['content'];
        $belong_to = $post['belong_to'];

        if ($id
            && $cowid
            && $content
            && $belong_to
            ) 
        {

            $checklistCow = ChecklistsCow::find()
                    ->where([
                            'checklists_id' => $id,
                            'clients_or_webs_id' => $cowid,
                            'belong_to' => $belong_to
                        ])
                    ->one();

            if (!$checklistCow)
            {
                $checklistCow = new ChecklistsCow();
                $checklistCow->checklists_id = $id;
                $checklistCow->belong_to = $belong_to;
                $checklistCow->content = $content;
                $checklistCow->clients_or_webs_id = $cowid;
            }
            else
            {
                $checklistCow->content = $content;
            }

            // save whole change to db
            if ($checklistCow->save()) {
                Yii::$app->response->format = 'json';
                return  ['errors' => '', 'data' => $checklistCow->content];
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
