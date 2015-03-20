<?php
use app\models\Checklist;
use app\models\ChecklistsCow;
?>
<table id="checklist" class="table table-striped table-vcenter">
    <tbody>
    	<?php
    		
            $checklists = Checklist::getChecklistBelong($belong_to);
            if ($checklists) {

	            foreach ($checklists as $key => $checklist) {
	                if (!empty($checklist->cschedule)) 
                    {
                        $cowid = Yii::$app->request->get('id');
                        $checklistCow = ChecklistsCow::find()
                                ->where([
                                        'checklists_id'      => $checklist->id,
                                        'belong_to'          => $belong_to,
                                        'clients_or_webs_id' =>  $cowid
                                    ])
                                ->one();

        ?>
        <tr>
            <td>
				<?= $checklist->title; ?><br>
				<small>
					<span class="badge"><i class="fa fa-clock-o"></i> Created: <?= date('j. F Y', strtotime($checklist->created_at)) ?></span>
					<span class="badge"><i class="fa fa-user"></i> By: <?php echo $checklist->user->fullname; ?></span>
                    <?php 
                        $timeSent = $checklist->getTimeSent($belong_to, $cowid);
                        if ($timeSent) 
                        {
                    ?>
                            <span class="badge"><i class="fa fa-envelope"></i> E-Mail: <?= date('j. F Y', strtotime($timeSent->time_sent)) ?></span>
                    <?php
                        }
                    ?>
					
				</small>
            </td>
            <td class="text-right">
				<div class="checklist-buttons">
                    <?php
                        if ($checklistCow) 
                        {
                    ?>
                            <a data-toggle="modal" href="#modal-send-email-edit" class="btn btn-xs btn-default btn-send-email" data-checklist-id="<?= $checklist->id ?>" data-belong-to=<?= $belong_to ?>><i class="fa fa-mail-forward"></i> Send to Client</a>
                            <a href="/checklists/download/<?= $checklist->id ?>/<?= $belong_to ?>/<?= \Yii::$app->request->get('id'); ?>" class="btn btn-xs btn-default"><i class="fa fa-download"></i> Download</a>
                            <a data-toggle="modal" href="javascript:void(0)" class="btn btn-xs btn-default btn-del-checklist" data-to="/checklists/delete/<?= $checklist->id ?>" data-belong-to=<?= $belong_to ?> data-cowid="<?php echo  \Yii::$app->request->get('id'); ?>" ><i class="fa fa-times"></i> Delete</a>                   
                    <?php
                        }
                    ?>
					<a data-toggle="modal" href="#modal-checklist-edit" class="btn btn-xs btn-default btn-edit-checklist" data-checklist-id="<?= $checklist->id ?>"  data-belong-to=<?= $belong_to ?> data-cowid="<?php echo  \Yii::$app->request->get('id'); ?>"><i class="fa fa-pencil"></i> Edit</a>
					
				</div>
            </td>
        </tr>

        <?php
                    }
                }
            } 
            else {
            	echo "No checklist is available";
            }
        ?>
    </tbody>
</table>
    <!-- END Checklist Content -->