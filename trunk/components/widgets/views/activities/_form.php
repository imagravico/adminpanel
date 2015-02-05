<?php
use app\models\Activity;
use yii\bootstrap\ActiveForm;

?>
 <div id="modal-activity-edit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-center themed-background">
                <h2 class="modal-title gi-white"><i class="fa fa-clock-o"></i> Activity</h2>
            </div>
            <!-- END Modal Header -->

            <!-- Modal Body -->
            <div class="modal-body">
				<?php 
					$model =  new Activity();
				    $form = ActiveForm::begin([
				        'id'      => 'form-add-activities',
				        'action' => '#',
				        'options' => [
				            'class'   => 'form-horizontal form-bordered',
				            'data-url' => '/activities/create',
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
						<?= $form->field($model, 'come_date', [
			              		'template' => "<div class='col-md-3'>{label}</div><div class='col-md-5'>{input}</div>\n{hint}\n{error}"
			            	])->textInput([
									'class'            => 'form-control input-datepicker',
									'id'               => 'example-datepicker',
									'data-date-format' => 'dd/mm/yyyy',
									'placeholder'      => 'dd/mm/yyyy'

			            		]); 
			            ?>

			            <?= $form->field($model, 'come_time', [
			              		'template' => "
			              			<div class='col-md-4'>
				              			<div class='input-group bootstrap-timepicker'>
				              				{input}
				              				<span class='input-group-btn'>
												<a href='javascript:void(0)' class='btn btn-primary'><i class='fa fa-clock-o'></i></a>
											</span>
										</div>
									</div>\n{hint}\n{error}"
			            	])->textInput([
									'class'            => 'form-control input-timepicker24',
									'id'               => 'example-datepicker',

			            		]); 
			            ?>
					</div>
					
			        <div class="form-group form-actions">
			            <div class="col-xs-12 text-right">
			                <button type="button" class="btn btn-sm btn-default btn-close" data-dismiss="modal">Close</button>
			                <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
			            </div>
			        </div>
			    <?php ActiveForm::end();?>

			</div>
            <!-- END Modal Body -->
        </div>
    </div>
</div>