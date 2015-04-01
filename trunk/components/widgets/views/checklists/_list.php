<?php
use app\models\Checklist;
use app\models\ChecklistsCow;
?>
<table id="checklist" class="table table-striped table-vcenter">
    <tbody>
    	<?php
    		
            $cowid = Yii::$app->request->get('id');
            $checklistCow = ChecklistsCow::find()
                    ->where([
                            'belong_to'          => $belong_to,
                            'clients_or_webs_id' => $cowid
                        ])
                    ->all();
            if ($checklistCow) 
            {
                foreach ($checklistCow as $key => $clcow) 
                {

        ?>
        <tr>
            <td>
                <?= $clcow->checklist->title; ?><br>
                <small>
                    <span class="badge"><i class="fa fa-clock-o"></i> Created: <?= date('j. F Y', strtotime($clcow->created_at)) ?></span>
                    <span class="badge"><i class="fa fa-user"></i> By: <?php echo $clcow->user->fullname; ?></span>
                    <?php 
                        if ($clcow->timesent) 
                        {
                    ?>
                            <span class="badge"><i class="fa fa-envelope"></i> E-Mail: <?= date('j. F Y', strtotime($clcow->timesent->time_sent)) ?></span>
                    <?php
                        }
                    ?>
                    
                </small>
            </td>
           
            <td class="text-right">
				<div class="checklist-buttons">
                    <a data-toggle="modal" href="#modal-send-email-edit" class="btn btn-xs btn-default btn-send-email" data-clcow-id="<?php echo $clcow->id ?>"><i class="fa fa-mail-forward"></i> Send to Client</a>
                    <a href="/checklists/download/<?php echo $clcow->id ?>" class="btn btn-xs btn-default"><i class="fa fa-download"></i> Download</a>
                    <a data-toggle="modal" href="javascript:void(0)" class="btn btn-xs btn-default btn-del-checklist" data-to="/checklists/delete/<?php echo $clcow->id?>"><i class="fa fa-times"></i> Delete</a>                   
					<a data-toggle="modal" href="#modal-checklist-edit" class="btn btn-xs btn-default btn-edit-checklist" data-clcow-id="<?php echo $clcow->id ?>"  data-belong-to=<?= $belong_to ?> data-cowid="<?php echo  \Yii::$app->request->get('id'); ?>"><i class="fa fa-pencil"></i> Edit</a>
				</div>
            </td>
        </tr>

        <?php
               }
            } 
            else 
            {
            	echo "No checklist is available";
            }
        ?>
    </tbody>
</table>
    <!-- END Checklist Content -->