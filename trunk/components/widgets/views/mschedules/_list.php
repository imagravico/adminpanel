 <?php

use app\models\MessageSchedule;

?>
 <table class="table table-striped table-vcenter">
    <tbody>
    <?php 
        $mschedules = MessageSchedule::find()
            ->where(['messages_id' => $message_id])
            ->orderBy('id DESC')
            ->all();

        if (!empty($mschedules)) {
            foreach ($mschedules as $key => $mschedule) {

    ?>
            <tr>
                <td>
                    <small data-toggle="tooltip" data-original-title="Client"><span class="label label-default"><i class="fa fa-fw fa-user"></i></span></small>
                    <small data-toggle="tooltip" data-original-title="Active"><span class="label label-default"><i class="fa fa-fw fa-bell"></i></span></small>
                    <?= $mschedule->descriptions ?>
                </td>
                <td class="text-right" style="width:140px;">
                    <a data-toggle="modal" href="#modal-mchedules-message-view" class="btn btn-xs btn-default btn-view-mschedules" data-to="/mschedules/view/<?= $mschedule->id ?>" data-update="#message-view"><i class="fa fa-eye"></i>View</a>
                    <a data-toggle="modal" href="#modal-schedules-edit" class="btn btn-xs btn-default btn-edit-mschedule" data-to="/mschedules/edit/<?= $mschedule->id ?>" data-load="/mschedules/load/<?= $mschedule->id ?>" data-message-id="<?= $message_id ?>" data-update="#form-add-message-schedule"><i class="fa fa-pencil"></i> Edit</a>
                    <a data-toggle="modal" href="#modal-website-edit" class="btn btn-xs btn-default btn-del-mschedule" data-to="/mschedules/delete/<?= $mschedule->id ?>"><i class="fa fa-times"></i> Remove</a>
                </td>
            </tr>
    <?php

            }
        } else {
            echo "No schedule is available";
        }
    ?>
    </tbody>
</table>