<?php 

use app\models\Group;
use yii\bootstrap\ActiveForm;
?>

<div class="block full">
    <div class="block-title">
        <h2><i class="fa fa-users"></i> Groups</h2>
        <div class="block-options pull-right">
            <a class="btn btn-sm btn-alt btn-default" href="#modal-groups-edit" data-toggle="modal"><i class="fa fa-cogs"></i></a>
        </div>
    </div>
    <ul class="nav nav-pills nav-stacked">
        <li class="active">
            <a href="javascript:void(0)">
            <span class="badge pull-right">
                <?= array_sum($total);?>
            </span>All</a>
        </li>
        <li><hr></li>
        <?php foreach ($total as $key => $value) : ?>
            <li>
                <a href="javascript:void(0)" class="filter-group" data-name="<?= $key ?>" data-update="#clients-list">
                    <span class="badge pull-right"><?= $value ?></span><?= $key ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<!-- Popup --> 
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