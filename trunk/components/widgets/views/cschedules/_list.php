 <?php

use app\models\ChecklistSchedule;

?>


 <table class="table table-striped table-vcenter">
    <tbody>
    <?php 
        $cschedules = ChecklistSchedule::find()
            ->where(['checklists_id' => $checklists_id])
            ->orderBy('id DESC')
            // ->limit(5)
            // ->offset(0)
            ->all();

        if (!empty($cschedules)) {
            foreach ($cschedules as $key => $cschedules) {

    ?>
            <tr>
                <td>
                    <small data-toggle="tooltip" data-original-title="Client"><span class="label label-default"><i class="fa fa-fw fa-user"></i></span></small>
                    <small data-toggle="tooltip" data-original-title="Active"><span class="label label-default"><i class="fa fa-fw fa-bell"></i></span></small>
                    <?= $cschedules->title ?>
                </td>
                <td class="text-right" style="width:140px;">
                    <a data-toggle="modal" href="#modal-schedules-edit" class="btn btn-xs btn-default btn-edit-cschedules" data-to="/cschedules/edit/<?= $cschedules->id ?>"><i class="fa fa-pencil"></i> Edit</a>
                    <a data-toggle="modal" href="#modal-website-edit" class="btn btn-xs btn-default btn-del-cschedules" data-to="/cschedules/delete/<?= $cschedules->id ?>"><i class="fa fa-times"></i> Remove</a>
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