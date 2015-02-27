<?php
use app\models\Checklist;

?>
<table id="checklist" class="table table-striped table-vcenter">
    <tbody>
    	<?php
            $checklists = Checklist::getChecklistBelong($belong_to);
            foreach ($checklists as $key => $checklist) {
                if (!empty($checklist->cschedule)) {

        ?>
        <tr>
            <td>
				<?= $checklist->title; ?><br>
				<small>
					<span class="badge"><i class="fa fa-clock-o"></i> Created: <?= date('j. F Y', strtotime($checklist->created_at)) ?></span>
					<span class="badge"><i class="fa fa-user"></i> By: User First Last</span>
					<span class="badge"><i class="fa fa-envelope"></i> E-Mail: 12. December 2012</span>
				</small>
            </td>
            <td class="text-right">
				<div class="checklist-buttons">
					<a data-toggle="modal" href="#modal-send-edit" class="btn btn-xs btn-default"><i class="fa fa-mail-forward"></i> Send to Client</a>
					<a data-toggle="modal" href="javascript:void(0)" class="btn btn-xs btn-default"><i class="fa fa-download"></i> Download</a>
					<a data-toggle="modal" href="#modal-website-edit" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i> Edit</a>
					<a data-toggle="modal" href="javascript:void(0)" class="btn btn-xs btn-default"><i class="fa fa-times"></i> Delete</a>
				</div>
            </td>
        </tr>

        <?php
                    }
                }
        ?>
    </tbody>
</table>
    <!-- END Checklist Content -->