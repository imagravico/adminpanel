<?php 

use app\models\Group;
use yii\bootstrap\ActiveForm;
?>
<div id="modal-groups-edit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-center themed-background">
                <h2 class="modal-title gi-white"><i class="fa fa-users"></i> Groups</h2>
            </div>
            <!-- END Modal Header -->

            <!-- Modal Body -->
            <div class="modal-body" id="update-group">
                <?php echo $this->render('_form', ['group' => $group]) ?>
            </div>
            <!-- END Modal Body -->
        </div>
    </div>
</div>