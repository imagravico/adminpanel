<?php

namespace app\controllers;
use Yii;
use app\models\Client;
use app\models\Group;
use app\models\GroupClient;
use yii\web\UploadedFile;

class ClientsController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$clients = Client::find()->all();
        return $this->render('index', [
        		'clients' => $clients
        	]);
    }

    public function actionCreate()
    {
		$client         = new Client();
		$groups         = Group::find()->all();
		$groups_clients = new GroupClient();

        if ($client->load(Yii::$app->request->post()) && $client->validate()) {
            // get post variable of GroupClient
    		$list_groups = Yii::$app->request->post()['GroupClient']['groups_id'];

            $image = UploadedFile::getInstance($client, 'avatar');
 
            // store the source file name
            $ext = end((explode(".", $image->name)));
 
            // generate a unique file name
            $client->avatar = Yii::$app->security->generateRandomString().".{$ext}";
 
            // the path to save file, you can set an uploadPath
            // in Yii::$app->params (as used in example below)
            $path = Yii::$app->params['uploadAvatarPath'] . $client->avatar;

    		if (!empty($list_groups)) {
                // save client table first
    			if ($client->save()) {
                    $image->saveAs($path);
                }
                // each group will be saved with a corresponding client which be saved before
    			foreach ($list_groups as $key => $group) {
					$groups_clients = new GroupClient();
    				$groups_clients->clients_id = $client->id;
    				$groups_clients->groups_id = $group;
    				$groups_clients->save();
    			}
    			if (empty($groups_clients->getErrors())) {
    				return $this->redirect(['/clients']);
    			}
    		}
    		else {
    			$groups_clients->addError('groups_id', 'Groups can not blank');
    		}
        }

    	return $this->render('create', [
				'client'         => $client,
				'groups'         => $groups,
				'groups_clients' => $groups_clients
    		]);
    }


    public function actionEdit($id)
    {
        $client         = Client::findOne($id);
        $groups         = Group::find()->all();
        $groups_clients = new GroupClient(); 

        return $this->render('create', [
                'client'         => $client,
                'groups'         => $groups,
                'groups_clients' => $groups_clients
            ]);
    }
}
