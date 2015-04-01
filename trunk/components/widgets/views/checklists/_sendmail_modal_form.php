<?php

use app\models\SendmailForm;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

?>
<!-- Send email popup -->
<div id="modal-send-email-edit" class="modal fade clearfix" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-center themed-background">
                <h2 class="modal-title gi-white"><i class="fa fa-envelope"></i> Send to Client</h2>
            </div>
            <!-- END Modal Header -->

            <!-- Modal Body -->
            <div class="modal-body">
                <?php
                    $cowid = \Yii::$app->request->get('id');
                    $model = new SendmailForm();
                    $form  = ActiveForm::begin([
                        'id'      => 'sendmail-form',
                        'action' => '#',
                        'enableClientValidation' => true,
                        'validateOnSubmit' => true,
                        'enableAjaxValidation' => false,
                        'options' => [
                            'class'   => 'form-horizontal form-bordered',
                        ],
                        'fieldConfig' => [
                            'horizontalCssClasses' => [
                                'label' => 'control-label',
                            ],
                        ],
                    ]); 

                ?>
                        <?= $form->field($model, 'subject', [
                            'template' => "<div class='col-md-3'>{label}</div><div class='col-md-9'>{input}</div>\n{hint}\n{error}"
                            ])->textInput((['placeholder' => 'Subject', 'class' => 'form-control'])); 
                        ?>
                        <?=
                            $form->field($model, 'content', [
                                'template' => "<div class='col-md-3'>{label}</div><div class='col-md-9'>{input}</div>\n{hint}\n{error}",
                                'selectors' => ['input' => '#textarea-wysiwyg']

                            ])
                            ->textArea(['rows' => '6', 'class' => 'form-control textarea-editor', 'id' => 'textarea-wysiwyg'])
                        ?>
                        <?php
                            echo Html::activeHiddenInput($model, 'checklists_cow_id', [
                                        'value' => 0,
                                        'id'    => 'checklists_cow_id'
                                ]);
                        ?>
                        
                            <div class="form-group form-actions">
                                <div class="col-xs-12 text-right">
                                    <button type="button" class="btn btn-sm btn-default btn-cl-close" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-sm btn-primary">Send</button>
                                </div>
                            </div>
                        <?php ActiveForm::end(); ?>
            </div>
            <!-- END Modal Body -->
        </div>
    </div>
</div>