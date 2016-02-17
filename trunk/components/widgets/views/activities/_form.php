<?php
use app\models\Activity;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>
 
<?php 
    $form = ActiveForm::begin([
        'id'      => 'form-add-activities',
        'action' => '#',
        'enableClientValidation' => true,
        'validateOnSubmit' => true,
        'enableAjaxValidation' => false,
        'options' => [
            'class'   => 'form-horizontal form-bordered',
            'data-to' => '/activities/create',
            'data-update' => '#activities-list'
        ],
        'fieldConfig' => [
            'horizontalCssClasses' => [
                'label' => 'control-label',
            ],
        ],
    ]);
?>
	<?= $form->field($model, 'title', [
      	'template' => "<div class='col-md-3'>{label}</div><div class='col-md-9'>{input}</div>\n{hint}\n{error}"
    	])->textInput((array('placeholder' => 'Title', 'class' => 'form-control'))); 
    ?>

    <?=
        $form->field($model, 'content', [
        	'template' => "<div class='col-md-3'>{label}</div><div class='col-md-9'>{input}</div>\n{hint}\n{error}"
        ])
        ->textArea(['rows' => '6', 'class' => 'form-control textarea-editor', 'id' => 'textarea-wysiwyg'])
    ?>
	
	<?= 
		$form->field($model, 'reminder')
            ->checkbox([
            	'template' => "<div class='col-md-3'>{label}</div><div class='col-md-9'><label class='switch switch-primary'>{input}<span></span></label></div>\n"]
			)
            ->label('Set Reminder?', ['class' => 'col-md-3 control-label']); 
	?>

	<div class="form-group">
        <label class="col-md-3 control-label" for="event">Select Date</label>
        <div class="col-md-5">
        <?php
            echo Html::activeTextInput($model, 'come_date', [
          		'class'            => 'form-control input-datepicker',
                'id'               => 'example-datepicker',
                'data-date-format' => 'dd/mm/yyyy',
                'placeholder'      => 'dd/mm/yyyy'
        	]); 
        ?>
        </div>
        <div class="col-md-4">
            <div class='input-group bootstrap-timepicker'>
                <?php
                    echo Html::activeTextInput($model, 'come_time', [
                  		'class'            => 'form-control input-timepicker24',
                        'id'               => 'example-datepicker',	
                    ]); 
                ?>
                <span class='input-group-btn'>
                    <a href='javascript:void(0)' class='btn btn-primary'><i class='fa fa-clock-o'></i></a>
                </span>
            </div>
	   </div>
    </div>
	<?php
	    echo Html::activeHiddenInput($model, 'belong_to', [
	                'value' => $belong_to
	        ]);
	?>
	
    <div class="form-group form-actions">
        <div class="col-xs-12 text-right">
            <button type="button" class="btn btn-sm btn-default btn-close" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
        </div>
    </div>
<?php ActiveForm::end();?>

