<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Checklist */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="checklist-form">

    <?php 
        $form = ActiveForm::begin([
                'id'      => 'checklist-form',
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
        $form->field($checklist, 'active')
            ->checkbox([
                'template' => "{label}<div class='col-md-9'><label class='switch switch-primary'>{input}<span></span></label></div>\n"]
            )
            ->label('Active?', ['class' => 'col-md-3 control-label']); 
    ?>
    <?= $form->field($checklist, 'title', [
                'template' => "{label}<div class='col-md-9'>{input}</div>\n{hint}\n{error}"
            ])->textInput((array('placeholder' => 'Monthly Report', 'class' => 'form-control'))); ?>  
    <?= $form->field($checklist, 'subtitle', [
                'template' => "{label}<div class='col-md-9'>{input}</div>\n{hint}\n{error}"
            ])->textInput((array('placeholder' => 'Berg Informatik', 'class' => 'form-control'))); ?>  

</div>