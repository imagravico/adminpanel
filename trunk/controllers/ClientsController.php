<?php

namespace app\controllers;
use Yii;
use app\models\Client;
use app\models\Group;
use app\models\GroupClient;

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
    		$list_groups = Yii::$app->request->post()['GroupClient']['groups_id'];
    		if (!empty($list_groups)) {
    			$client->save();
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
}
