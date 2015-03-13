<?php
use app\models\Activity;
?>
<div class="block">
    <!-- Activity Title -->
   <div class="block-title">
        <div class="block-options pull-right">
			<a class="btn btn-sm btn-alt btn-default btn-add-activity" data-toggle="modal" href="#modal-activity-edit">Add Activity <i class="fa fa-plus"></i></a>
        </div>
	   <h2><i class="fa fa-clock-o"></i> Activity</h2>
    </div>
    <!-- END Activity Title -->

	<!-- Timeline Style Content -->
    <!-- You can remove the class .block-content-full if you want the block to have its regular padding -->
    <div class="timeline block-content-full">
		
		<style>
			.timeline-list:after { left:195px; }
			.timeline-list .timeline-icon { left:180px; }
			.timeline-list .timeline-time { width:170px; text-align:center; }
			.timeline-list .timeline-content { margin-left:220px; }
		</style>
		
        <div id="activities-list">
            <?= $this->render('_list', ['activities' => $activities, 'belong_to' => $belong_to]) ?>
        </div>
    </div>
    <!-- END Timeline Style Content -->
</div>


