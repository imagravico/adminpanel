<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to login:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <?= $form->field($model, 'rememberMe', [
        'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
    ])->checkbox() ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>
    </div>


    <div class="col-lg-offset-1" style="color:#999;">
        You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br>
        To modify the username/password, please check out the code <code>app\models\User::$users</code>.
    </div>
</div>


<!-- Login Form -->
<?php 
    $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal form-bordered form-control-borderless'],
    ]); 
?>
        <div class="form-group">
            <div class="col-xs-12">
                <div class="input-group">
                    <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
                    <input type="text" id="login-email" name="login-email" class="form-control input-lg" placeholder="Email">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-12">
                <div class="input-group">
                    <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                    <input type="password" id="login-password" name="login-password" class="form-control input-lg" placeholder="Password">
                </div>
            </div>
        </div>
        <div class="form-group form-actions">
            <div class="col-xs-4">
                <label class="switch switch-primary" data-toggle="tooltip" title="Remember Me?">
                    <input type="checkbox" id="login-remember-me" name="login-remember-me" checked>
                    <span></span>
                </label>
            </div>
            <div class="col-xs-8 text-right">
                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Login to Dashboard</button>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-12 text-center">
                <a href="javascript:void(0)" id="link-reminder-login"><small>Forgot password?</small></a>
            </div>
        </div>
<?php ActiveForm::end(); ?>
<!-- END Login Form -->

<!-- Reminder Form -->
<form action="login.php#reminder" method="post" id="form-reminder" class="form-horizontal form-bordered form-control-borderless display-none">
    <div class="form-group">
        <div class="col-xs-12">
            <div class="input-group">
                <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
                <input type="text" id="reminder-email" name="reminder-email" class="form-control input-lg" placeholder="Email">
            </div>
        </div>
    </div>
    <div class="form-group form-actions">
        <div class="col-xs-12 text-right">
            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Reset Password</button>
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-12 text-center">
            <small>Did you remember your password?</small> <a href="javascript:void(0)" id="link-reminder"><small>Login</small></a>
        </div>
    </div>
</form>
<!-- END Reminder Form -->

