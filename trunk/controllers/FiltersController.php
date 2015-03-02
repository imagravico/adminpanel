<?php

namespace app\controllers;

use Yii;
use yii\web\Session;
use app\models\Client;
use app\models\Checklist;
use app\models\Message;
use app\models\Website;



class FiltersController extends \yii\web\Controller
{
	/**
	 * create a session queue when switch button of each item in messages list
	 * or checklist to on
	 * @param  string $model name of corresponding model
	 * @return mix
	 */
	public function actionIndex()
	{
		$post = Yii::$app->request->post();

		if ($post) {
			switch ($post['model']) {
				case 'client':
					$model = new Client();
					$view  = '_clients';
					$field_search = 'company';

					break;

				case 'message':
					$model = new Message();
					$view  = '_messages';
					$field_search = 'subject';

					break;

				case 'checklist':
					$model = new Checklist();
					$view  = '_checklists';
					$field_search = 'title';

					break;

				case 'website':
					$model = new Website();
					$view  = '_websites';
					$field_search = 'domain';

					break;

				default:
					$model = null;
					break;
			}

			$results = $model->find()
				->where(['LIKE', $field_search, $post['keyword']])
				->all();

			Yii::$app->response->format = 'json';

			return [
				'errors' => '',
				'data'   => $this->renderPartial($view, ['results' => $results])
			];
			
		}
	}
}