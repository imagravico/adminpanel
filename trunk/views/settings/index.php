<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use app\models\Client;
use kartik\file\FileInput;
use yii\helpers\Url;
use app\models\User;
?>
<div class="row">
	<div class="col-lg-8">
		<div class="block">
		    <!-- General Data Title -->
		    <div class="block-title">
		        <h2><i class="fa fa-pencil"></i> Settings</h2>
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
				<?= $form->field($setting, 'from_name', [
		              	'template' => "{label}<div class='col-md-9'>{input}</div>\n{hint}\n{error}"
		            ])->textInput((array('placeholder' => 'From Name', 'class' => 'form-control'))); ?>

				<?= $form->field($setting, 'from_email', [
		              	'template' => "{label}<div class='col-md-9'>{input}</div>\n{hint}\n{error}"
		            ])->textInput((array('placeholder' => 'From Email', 'class' => 'form-control'))); ?>	
				
				<?= $form->field($setting, 'email_recipient', [
		              	'template' => "{label}<div class='col-md-9'>{input}<span class='help-block'>Separate multiple recipients by comma.</span></div>\n{hint}\n{error}"
		            ])->textInput((array('placeholder' => 'Email Recipient', 'class' => 'form-control'))); ?>
		       
		    <!-- END General Data Content -->
		</div>
	</div>
	<div class="col-lg-4">
		<!-- Actions Block -->
        <div class="block clearfix">
            <!-- Actions Title -->
            <div class="block-title">
                <h2><i class="fa fa-pencil"></i> Actions</h2>
            </div>
            <!-- END Actions Title -->
			
            <!-- Actions Content -->
            <form action="page_ecom_product_edit.php" method="post" class="form-horizontal form-bordered" onsubmit="return false;">
                <div class="form-group form-actions" style="overflow:hidden">
                    <div class="col-md-8 text-left">
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i> Save</button>
						<button type="reset" class="btn btn-sm btn-primary cancel" data-redirect="/"><i class="fa fa-times"></i> Cancel</button>
                    </div>
					<div class="col-md-4 text-right"></div>
                </div>
            </form>
            <!-- END Actions Content -->
        </div>
        <!-- END Actions Block -->
		
    </div>
    <?php ActiveForm::end(); ?>
</div>