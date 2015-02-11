 <?php

use app\models\MessageSchedule;

?>
 <table class="table table-striped table-vcenter">
    <tbody>
    <?php 
        $mschedules = MessageSchedule::find()->all();
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
                    <a data-toggle="modal" href="#modal-website-edit" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i> Edit</a>
                    <a data-toggle="modal" href="#modal-website-edit" class="btn btn-xs btn-default"><i class="fa fa-times"></i> Remove</a>
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