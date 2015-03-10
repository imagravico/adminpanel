<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    public $layout = 'login';

    public function actionIndex()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->redirect(['/dashboard']);
        }
        
        // return [
        //     'error' => [
        //         'class' => 'yii\web\ErrorAction',
        //     ],
        //     'captcha' => [
        //         'class' => 'yii\captcha\CaptchaAction',
        //         'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
        //     ],
        // ];
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->redirect(['/dashboard']);
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['/dashboard']);
        } 
        else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect(['/site/login']);
    }

    public function actionError()
    {

    }
    
}
