<?php 
use app\models\Group;
use yii\bootstrap\ActiveForm;
?>
<!-- Notes, modal which opens from Settings link (found in top right user menu) and the Cog link (found in sidebar user info) -->
<div id="modal-note-edit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-center themed-background">
                <h2 class="modal-title gi-white"><i class="fa fa-quote-right"></i> Note</h2>
            </div>
            <!-- END Modal Header -->

            <!-- Modal Body -->
            <div class="modal-body">
                <?php 
                    $form = ActiveForm::begin([
                        'id'      => 'form-note',
                        'action' => '#',
                        'enableClientValidation' => true,
                        'validateOnSubmit' => true,
                        'enableAjaxValidation' => false,
                        'options' => [
                            'class'   => 'form-bordered',
                            'data-update' => '.notes-list'
                        ],
                        'fieldConfig' => [
                            'horizontalCssClasses' => [
                                'label' => 'control-label',
                            ],
                        ],
                    ]); 
                ?>
                <?=
                    $form->field($note, 'content')->textArea(['rows' => '6', 'class' => 'form-control textarea-editor', 'id' => 'textarea-wysiwyg'])
                    ->label(false)
                ?>
                    <div class="form-group form-actions" style="overflow:hidden">
                        <div class="col-xs-12 text-right">
                            <button type="button" class="btn btn-sm btn-default btn-close" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- END Modal Body -->
        </div>
    </div>
</div>