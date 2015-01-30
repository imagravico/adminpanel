<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class AuthController extends \yii\web\Controller
{
	public $layout = '//login';

	public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest && \Yii::$app->user->can('/admin/*')) {
            return $this->redirect(['/admin']);
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['/admin']);
        } 
        else {
            return $this->render('index', [
                'model' => $model,
            ]);
        }

        return $this->render('index');
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect(['/admin/auth/login']);
    }

}
