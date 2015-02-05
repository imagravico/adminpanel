<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;


/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin([
            'options' => ['enctype'=>'multipart/form-data']
    ]); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'firstname')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'lastname')->textInput(['maxlength' => 255]) ?>
	
    <?php 
        if (!empty($model->avatar)) :
            echo $form->field($model, 'avatar', [
                    'template' => "{label}<div class=''>{input}</div>\n{hint}\n{error}"
                ])
                ->widget(FileInput::classname(), [
                'options' => [
                    'accept' => 'image/*'
                ],

                'pluginOptions' => [
                    'initialPreview' => [
                        Html::img("/web/upload/avatar/{$model->avatar}", ['class'=>'file-preview-image'])
                    ],
                    'previewFileType'       => 'image',
                    'showUpload'            => false,
                    'allowedFileExtensions' => ['jpg','gif','png'],
                    'overwriteInitial' => true
                ]
            ]);
        else:
            echo $form->field($model, 'avatar', [
                    'template' => "{label}<div class=''>{input}</div>\n{hint}\n{error}"
                ])
                ->widget(FileInput::classname(), [
                'options' => [
                    'accept' => 'image/*'
                ],

                'pluginOptions' => [
                    'initialPreview' => [
                        Html::img("/web/upload/avatar/noavatar.jpg", ['class'=>'file-preview-image'])
                    ],
                    'previewFileType'       => 'image',
                    'showUpload'            => false,
                    'allowedFileExtensions' => ['jpg','gif','png'],
                    'overwriteInitial' => true
                ]
            ]);
        endif;
    ?>  
        
    <?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => 255]) ?>
    
    <?= $form->field($model, 'active')->checkbox([]) ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
