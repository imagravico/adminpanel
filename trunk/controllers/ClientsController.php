<?php

namespace app\controllers;
use Yii;
use app\models\Client;
use app\models\Group;
use app\models\GroupClient;
use yii\web\UploadedFile;
use yii\web\NotFoundHttpException;

class ClientsController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$clients = Client::find()->all();
        return $this->render('index', [
        		'clients' => $clients
        	]);
    }
    /**
     * create new client
     * @return avoid
     */
    public function actionCreate()
    {
		$client         = new Client();
		$groups         = new Group();
		$groups_clients = new GroupClient();

        if ($client->load(Yii::$app->request->post()) && $client->validate()) 
        {
            // get post variable of GroupClient
    		$list_groups = Yii::$app->request->post()['Group']['id'];
            // groups is required
    		if (!empty($list_groups)) 
            {
                // save client table first
    			$client->save();
                // each group will be saved with a corresponding client which be saved before
    			foreach ($list_groups as $key => $group) 
                {
                    $groups_clients             = new GroupClient();
                    $groups_clients->clients_id = $client->id;
                    $groups_clients->groups_id  = $group;
                    $groups_clients->save();
    			}
                // everything is ok, redirect to clients list page
    			if (empty($groups_clients->getErrors())) 
                {
    				return $this->redirect(['/clients']);
    			}
    		}
    		else 
            {
    			$groups->addError('id', 'Groups can not blank');
    		}
        }
    	return $this->render('create', [
				'client'         => $client,
				'groups'         => $groups,
				'groups_clients' => $groups_clients
    		]);
    }

    /**
     * edit particular client information 
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function actionEdit($id)
    {
        $client = $this->findModel($id);
        $groups = new Group();

        $groups_clients = GroupClient::find()
                    ->where(['clients_id' => $id])
                    ->all();

        foreach ($groups_clients as $key => $value) 
        {
            $selected[] = $value->group->id;
        }
        // assign all selected values so they may show in edit page
        $groups->id = $selected;

        if ($client->load(Yii::$app->request->post()) && $client->validate()) 
        {
            // get post variable of GroupClient
            $list_groups = Yii::$app->request->post()['Group']['id'];
            // groups is required
            if (!empty($list_groups)) 
            {
                // save client table first
                $client->save();
                // delete all existing group of this user in groupsclients
                GroupClient::deleteAll(['clients_id' => $id]);

                // each group will be saved with a corresponding client which be saved before
                foreach ($list_groups as $key => $group) 
                {
                    $groups_clients = new GroupClient();
                    $groups_clients->clients_id = $client->id;
                    $groups_clients->groups_id  = $group;
                    $groups_clients->save();
                }
                // everything is ok, redirect to clients list page
                if (empty($groups_clients->getErrors())) 
                {
                    return $this->redirect(['/clients']);
                }
            }
            else 
            {
                $groups->addError('id', 'Groups can not blank');
            }
        }
        return $this->render('edit', [
                'client'         => $client,
                'groups'         => $groups,
                'groups_clients' => $groups_clients
            ]);
    }


    /**
     * Deletes an existing Client model.
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
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
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
