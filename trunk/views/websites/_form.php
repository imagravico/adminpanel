<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use app\models\Client;
use kartik\file\FileInput;
use yii\helpers\Url;
use app\models\User;
?>
<div class="block">
    <!-- General Data Title -->
    <div class="block-title">
        <h2><i class="fa fa-pencil"></i> General</h2>
    </div>
    <!-- END General Data Title -->
    <!-- General Data Content -->
    <?php 
	    $form = ActiveForm::begin([
			'id'      => 'web-form',
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
			$form->field($website, 'active')
                ->checkbox([
                	'template' => "{label}<div class='col-md-9'><label class='switch switch-primary'>{input}<span></span></label></div>\n"]
				)
                ->label('Active?', ['class' => 'col-md-3 control-label']); 
		?>

		<?= $form->field($website, 'domain', [
              	'template' => "{label}<div class='col-md-9'>{input}<span class='input-group-addon'><i class='gi gi-globe'></i></span></div>\n{hint}\n{error}"
            ])->textInput((array('placeholder' => 'Domain', 'class' => 'form-control'))); ?>	
	
		<?= $form->field($website, 'online_date', [
              'template' => "{label}<div class='col-md-9'>{input}</div>\n{hint}\n{error}"
            ])->textInput((array(
					'placeholder'      => 'dd/mm/yyyy', 
					'class'            => 'form-control input-datepicker',
					'data-date-format' => 'dd/mm/yyyy'
            	)
            )); ?>	

        <?php 
        	$dataList = ArrayHelper::map(Client::find()->asArray()->all(), 'id', 'firstname'); 
        ?>
		<?= 
			$form->field($website, 'clients_id', [
              'template' => "{label}<div class='col-md-9'>{input}</div>\n{hint}\n{error}"
			])
			->listBox($dataList, [
					'data-placeholder' => 'Choose one..', 
					'class'            => 'select-select2',
					'style'            => 'width: 100%',
					'id'               => 'example-select2' 
				]) 
			->label('Clients');
 		?>
    <!-- END General Data Content -->
</div>