<?php

use app\models\MessageSchedule;
use yii\bootstrap\ActiveForm;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;

?>
<!-- User Settings, modal which opens from Settings link (found in top right user menu) and the Cog link (found in sidebar user info) -->
<div id="modal-schedules-edit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-center themed-background">
                <h2 class="modal-title gi-white"><i class="fa fa-bell-o"></i> Schedule</h2>
            </div>
            <!-- END Modal Header -->

            <!-- Modal Body -->
            <div class="modal-body">
            	<?php 
                    $model = isset($model) ? $model : new MessageSchedule();
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
                    echo $form->field($model, 'type', [
                            'wrapperOptions' => ['style' => 'display:none']
                        ])->hiddenInput(['value' => 1])->label(false);
                ?>
					<div class="form-group">
						<div class="col-xs-3">
							<ul class="nav nav-tabs tabs-left">
							  <li class="active"><a href="#tab-event-based" data-toggle="tab">Event based</a></li>
							  <li><a href="#tab-periodically" data-toggle="tab">Periodically</a></li>
							</ul>
						</div>

						<div class="col-xs-9">
							<!-- Tab panes -->
							<div class="tab-content">
								<div class="tab-pane active" id="tab-event-based">
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

								</div>
								<div class="tab-pane" id="tab-periodically">
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
            </div>
            <!-- END Modal Body -->
        </div>
    </div>
</div>
<!-- END User Settings -->
