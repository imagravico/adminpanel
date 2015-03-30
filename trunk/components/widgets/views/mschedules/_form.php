<?php

use app\models\MessageSchedule;
use yii\bootstrap\ActiveForm;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
use yii\helpers\Html;

$this->registerJsFile('/web/js/switch_schedules.js', ['depends' => [app\assets\AppAsset::className()]]);
?>


<?php 
    $model = isset($model) ? $model : new MessageSchedule();
    $tableActive = isset($model->type) ? $model->type : 1;

    $form = ActiveForm::begin([
        'id' => 'form-add-message-schedule',
        'enableClientValidation' => true,
        'validateOnSubmit' => true,
        'enableAjaxValidation' => false,
        'options' => [
            'class'   => 'form-horizontal form-bordered',
            'data-url' => '/mschedules/create',
            'data-update' => '#list-mschedules',
        ],
        'fieldConfig' => [
            'horizontalCssClasses' => [
                'label' => 'col-md-3 control-label',
            ],
        ],
    ]); 
?>
<?= $form->field($model, 'descriptions', [
      	'template' => "<div class='col-md-3'>{label}</div><div class='col-md-9'>{input}</div>\n{hint}\n{error}"
    	])->textInput((array('placeholder' => 'Descriptions', 'class' => 'form-control'))); 
    ?>

<?php 
    $items_rel = $model->rel_list;
    echo $form->field($model, 'relation', [
    		'template' => "<div class='col-md-3'>{label}</div><div class='col-md-9'>{input}</div>\n{hint}\n{error}",
            'selectors' => ['input' => '#relation']
    	])
        ->dropDownList(
            $items_rel,          
            ['prompt'=>'--', 'id' => 'relation']    
        );
?>
<?php
    echo Html::activeHiddenInput($model, 'messages_id', [
                'value' => $message_id
        ]);
?>
<?php
    echo Html::activeHiddenInput($model, 'type', [
                'value' => $tableActive,
                'id' => 'schedule-type'
        ]);
?>
	<div class="form-group">
		<div class="col-xs-3">
			<ul class="nav nav-tabs tabs-left">
			  <li class="<?php if ($tableActive == 1) echo 'active'; ?>"><a href="#tab-event-based" data-toggle="tab">Event based</a></li>
			  <li class="<?php if ($tableActive == 2) echo 'active'; ?>"><a href="#tab-periodically" data-toggle="tab">Periodically</a></li>
			</ul>
		</div>

		<div class="col-xs-9">
			<!-- Tab panes -->
			<div class="tab-content">
				<div class="tab-pane <?php if ($tableActive == 1) echo 'active'; ?>" id="tab-event-based">
                    <?php
                        echo $form->field($model, 'event', [
                                'selectors' => ['input' => '#which-event']
                            ])->widget(DepDrop::classname(), [
                                'options' => ['id' => 'which-event'],
                                'pluginOptions' => [
                                    'depends' => ['relation'],
                                    'placeholder' => 'Select...',
                                    'url' => Url::to(['/messages/getevent'])
                                ]
                            ]);
                    ?>
                    
                    <?php
                        echo $form->field($model, 'sendon', [
                                'selectors' => ['input' => '#send-on']
                            ])->widget(DepDrop::classname(), [
                                'options' => ['id' => 'send-on'],
                                'pluginOptions' => [
                                    'depends' => ['which-event'],
                                    'placeholder' => 'Select...',
                                    'url' => Url::to(['/messages/getsendtype'])
                                ]
                            ]);
                    ?>
                    
                    <div class="form-group field-checklistschedule-at_time">
                        <label class="control-label" for="checklistschedule-at_time">At</label>
                        <?= Html::activeDropDownList($model, 'at_hour',
                                $model->hour_list) ?>

                        <?= Html::activeDropDownList($model, 'at_minute',
                                $model->minute_list) ?>
                    </div>

				</div>
				<div class="tab-pane <?php if ($tableActive == 2) echo 'active'; ?>" id="tab-periodically">
					<div class="cron-select"></div>
				</div>
			</div>
		</div>
	</div>
    <div class="form-group form-actions">
        <div class="col-xs-12 text-right">
            <button type="button" class="btn btn-sm btn-default btn-close" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
        </div>
    </div>
<?php ActiveForm::end() ?>
        
