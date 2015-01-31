<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use app\models\Group;
use dosamigos\fileupload\FileUpload;
?>

<div class="content-header">
    <div class="header-section">
        <h1><i class="fa fa-user" style="margin:-14px 0 0 0;"></i>Edit Client</h1>
    </div>
</div>
<div class="row">
	<div class="col-lg-8">
		<div class="block">
	        <!-- General Data Title -->
	        <div class="block-title">
	            <h2><i class="fa fa-pencil"></i> General</h2>
	        </div>
	        <!-- END General Data Title -->
	        <!-- General Data Content -->
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
					$form->field($client, 'active')
                        ->checkbox([
                        	'template' => "{label}<div class='col-md-9'><label class='switch switch-primary'>{input}<span></span></label></div>\n"]
						)
                        ->label('Active?', ['class' => 'col-md-3 control-label']); 
				?>
				
				<div class="form-group">
	                <label class="col-xs-3 control-label">
	                    <img src="/web/backend/img/placeholders/avatars/avatar2.jpg" alt="avatar" class="img-circle">
	                </label>
	                <div class="col-xs-9">
	                    <i class="fa fa-fw fa-upload"></i> <a href="javascript:void(0)">Upload New Avatar</a><br>
	                    <i class="fa fa-fw fa-picture-o"></i> <a href="javascript:void(0)">Choose from Library</a><br><br>
	                    <i class="fa fa-fw fa-times"></i> <a href="javascript:void(0)" class="text-danger">Remove Avatar</a>
	                </div>
	            </div>

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
                    ])->textInput((array('placeholder' => 'Birthday', 'class' => 'form-control input-datepicker'))); ?>	
		        
		        <?php 
		        	$dataList = ArrayHelper::map(Group::find()->asArray()->all(), 'id', 'name'); 
		        ?>
				<?= 
					$form->field($groups_clients, 'groups_id', [
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
				<button type="submit">Submit</button>
	        </form>
	        <!-- END General Data Content -->
	    </div>
	</div>
</div>