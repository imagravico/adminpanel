<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Message */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="message-form">

    <?php 
        $form = ActiveForm::begin([
                'id'      => 'login-form',
                'layout'  => 'horizontal',
                'options' => [
                    'class'   => 'form-horizontal form-bordered',
                ],
                'fieldConfig' => [
                    'horizontalCssClasses' => [
                        'label' => 'col-md-3 control-label',
                    ],
                ],
            ]); 
    ?>
    <?= 
        $form->field($message, 'active')
            ->checkbox([
                'template' => "{label}<div class='col-md-9'><label class='switch switch-primary'>{input}<span></span></label></div>\n"]
            )
            ->label('Active?', ['class' => 'col-md-3 control-label']); 
    ?>
    <?= $form->field($message, 'subject', [
                'template' => "{label}<div class='col-md-9'>{input}</div>\n{hint}\n{error}"
            ])->textInput((array('placeholder' => 'Happy Birthday {firstname} {lastname}', 'class' => 'form-control'))); ?>  
    <?= $form->field($message, 'from_name', [
                'template' => "{label}<div class='col-md-9'>{input}</div>\n{hint}\n{error}"
            ])->textInput((array('placeholder' => 'From Name', 'class' => 'form-control'))); ?>  

     <?= $form->field($message, 'from_email', [
                'template' => "{label}<div class='col-md-9'>{input}</div>\n{hint}\n{error}"
            ])->textInput((array('placeholder' => 'From Email', 'class' => 'form-control'))); ?>
    
    <?= $form->field($message, 'content', [
                'template' => "{label}<div class='col-md-9'>{input}</div>\n{hint}\n{error}"
            ])->textArea((array('placeholder' => 'Message', 'class' => 'form-control textarea-editor', 'id' => 'textarea-wysiwyg', 'rows' => 10))); ?>
    
</div>