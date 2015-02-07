<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>
<!-- User Settings, modal which opens from Settings link (found in top right user menu) and the Cog link (found in sidebar user info) -->
<div id="modal-user-settings" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-center themed-background">
                <h2 class="modal-title gi-white"><i class="fa fa-pencil"></i> Settings</h2>
            </div>
            <!-- END Modal Header -->

            <!-- Modal Body -->
            <div class="modal-body">
                <?php 
                    $form = ActiveForm::begin([
                        'id' => 'settings-form',
                        'layout' => 'horizontal',
                        'action' => '/settings/change',
                        'enableClientValidation' => true,
                        'validateOnSubmit' => true,
                        'validateOnChange' => true,
                        'validateOnType' => true,   
                        'options' => [
                            'class'   => 'form-horizontal form-bordered',
                        ],
                        'fieldConfig' => [
                            'horizontalCssClasses' => [
                                'label' => 'col-md-4 control-label',
                            ],
                        ],
                    ]); 
                ?>
                    <fieldset>
                        <legend>Vital Info</legend>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Username</label>
                            <div class="col-md-8">
                                <p class="form-control-static">Admin</p>
                            </div>
                        </div>
                        <?= $form->field($user, 'email', [
                              'template' => "{label}<div class='col-md-8'>{input}</div>\n{hint}\n{error}"
                            ])->textInput((array('placeholder' => 'Email', 'class' => 'form-control'))); ?> 
                        
                        <?= 
                            $form->field($user, 'email_notification')
                                ->checkbox([
                                    'template' => "{label}<div class='col-md-8'><label class='switch switch-primary'>{input}<span></span></label></div>\n"]
                                )
                                ->label('Email Notifications', ['class' => 'col-md-4 control-label']); 
                        ?>
                    </fieldset>
                    <fieldset>
                        <legend>Password Update</legend>

                        <?= $form->field($user, 'password', [
                                'template' => "{label}<div class='col-md-8'>{input}</div>\n{hint}\n{error}"
                            ])->passwordInput([
                                'maxlength' => 255, 
                                'placeholder' => 'Please choose a complex one..'
                            ]); 
                        ?>

                        <?= $form->field($user, 'repassword', [
                                'template' => "{label}<div class='col-md-8'>{input}</div>\n{hint}\n{error}"
                            ])->passwordInput([
                                'maxlength' => 255, 
                                'placeholder' => '..and confirm it!'
                            ]); 
                        ?>
                       
                    </fieldset>
                    <div class="form-group form-actions">
                        <div class="col-xs-12 text-right">
                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                            <?= Html::submitButton('Save Changes', ['class'=> 'btn btn-primary save_changes']) ;?>
                        </div>
                    </div>
                </form>
            </div>
            <!-- END Modal Body -->
        </div>
    </div>
</div>
<!-- END User Settings -->
