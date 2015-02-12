<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Login Form -->
<?php 
    $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal form-bordered form-control-borderless'],
    ]); 
?>
        <div class="col-xs-12">
            <div class="input-group">
                <span class='input-group-addon'><i class='fa fa-user'></i></span>
                <?= $form->field($model, 'username', [
                      'template' => "{input}\n{hint}\n{error}",
                    ])
                    ->textInput((array('placeholder' => 'Username', 'class' => 'form-control col-xs-8'))); ?>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="input-group">
                <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                <?= $form->field($model, 'password', [
                      'template' => "{input}\n{hint}\n{error}"
                    ])->textInput((array('placeholder' => 'Password', 'class' => 'form-control col-xs-8')))->passwordInput(); ?>
            </div>
        </div>
        <div class="form-group form-actions row">
            <div class="col-xs-4" style="margin-top:10px;">
                <label class="switch switch-primary" data-toggle="tooltip" title="Remember Me?">
                    <input type="checkbox" id="login-remember-me" name="LoginForm[rememberMe]" value="0">
                    <span></span>
                </label>
            </div>
            <div class="col-xs-8 text-right" style="margin-top:10px;">
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

