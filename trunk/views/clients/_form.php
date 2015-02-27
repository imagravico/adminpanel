<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use app\models\Group;
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
			'id'      => 'client-form',
			'layout'  => 'horizontal',
			'options' => [
				'class'   => 'form-horizontal form-bordered',
				'enctype' => 'multipart/form-data'
	        ],
	        'fieldConfig' => [
		        'horizontalCssClasses' => [
		            'label' => 'col-md-3 control-label',
		        ],
		    ],
	    ]); 
	?>
		<?= 
			$form->field($client, 'active')
                ->checkbox([
                	'template' => "{label}<div class='col-md-9'><label class='switch switch-primary'>{input}<span></span></label></div>\n"]
				)
                ->label('Active?', ['class' => 'col-md-3 control-label']); 
		?>

		<?php 
			if (!empty($client->avatar)) :
				echo $form->field($client, 'avatar', [
						'template' => "{label}<div class='col-md-9'>{input}</div>\n{hint}\n{error}"
					])
				    ->widget(FileInput::classname(), [
				    'options' => [
				    	'accept' => 'image/*'
				    ],

				    'pluginOptions' => [
				    	'initialPreview' => [
				    		Html::img("/web/upload/avatar/{$client->avatar}", ['class'=>'file-preview-image'])
				    	],
						'previewFileType'       => 'image',
						'showUpload'            => false,
						'allowedFileExtensions' => ['jpg','gif','png'],
						'overwriteInitial' => true
					]
				]);
			else:
				echo $form->field($client, 'avatar', [
						'template' => "{label}<div class='col-md-9'>{input}</div>\n{hint}\n{error}"
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

		<?= $form->field($client, 'company', [
              	'template' => "{label}<div class='col-md-9'>{input}</div>\n{hint}\n{error}"
            ])->textInput((array('placeholder' => 'Company Name', 'class' => 'form-control'))); ?>	

        <?= $form->field($client, 'firstname', [
              'template' => "{label}<div class='col-md-9'>{input}</div>\n{hint}\n{error}"
            ])->textInput((array('placeholder' => 'First Name', 'class' => 'form-control'))); ?>	

        <?= $form->field($client, 'lastname', [
              'template' => "{label}<div class='col-md-9'>{input}</div>\n{hint}\n{error}"
            ])->textInput((array('placeholder' => 'Last Name', 'class' => 'form-control'))); ?>	
		
		<?= $form->field($client, 'email', [
              'template' => "{label}<div class='col-md-9'>{input}</div>\n{hint}\n{error}"
            ])->textInput((array('placeholder' => 'Email', 'class' => 'form-control'))); ?>	

		<?= $form->field($client, 'birthday', [
              'template' => "{label}<div class='col-md-9'>{input}</div>\n{hint}\n{error}"
            ])->textInput((array(
					'placeholder'      => 'dd/mm/yyyy', 
					'class'            => 'form-control input-datepicker',
					'data-date-format' => 'dd/mm/yyyy'
            	)
            )); ?>	
        
        <?php 
        	$dataList = ArrayHelper::map(Group::find()->asArray()->all(), 'id', 'name'); 
        ?>
		<?= 
			$form->field($groups, 'id', [
              'template' => "{label}<div class='col-md-9'>{input}</div>\n{hint}\n{error}"
			])
			->listBox($dataList, [
					'data-placeholder' =>'Choose some Groups..', 
					'multiple'         => 'multiple', 
					'class'            => 'select-chosen',
					'style'            => 'display: none',
					'id'               => 'example-chosen-multiple' 
				]) 
			->label('Groups')
 		?>
    <!-- END General Data Content -->
</div>
