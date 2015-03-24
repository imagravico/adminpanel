<ul class="timeline-list media-list">
    <?php
        if (!isset($disViewMore)) {
            $disViewMore = false;
        } 
        
        $i = 1;
        if (!empty($activities)) {
            foreach ($activities as $key => $activity) {
                $i++;
    ?>   
                <li class="<?php echo ($i % 2 == 0 ) ? 'active' : ''?> media clearfix">
                    <div class="timeline-icon"><i class="fa fa-info"></i></div>
                    <div class="timeline-time">
                        <?php if ($activity->reminder) { ?>
                            <i class="fa fa-bell"></i>
                        <?php } ?>
                        <?= date('j. F Y', strtotime($activity->come_date));?><br>
                        <small>by <?= $activity->user->fullname ?></small>
                    </div>
                    <div class="timeline-content">
                        <p class="push-bit"><strong><?= $activity->title ?></strong></p>
                        <?= $activity->content ?>
                        <span class="text-muted text-right pull-right link-hover">
                            <a data-toggle="modal" href="#modal-activity-edit" class="btn btn-xs btn-default btn-edit-activity" data-to="/activities/edit/<?= $activity->id ?>" data-load="/activities/load/<?= $activity->id ?>" data-belong-to="<?= $belong_to ?>"><i class="fa fa-edit"></i> Edit</a>
                            <a href="javascript:void(0)" class="btn btn-xs btn-default btn-del-activity" data-to="/activities/delete/<?= $activity->id ?>" data-update="#activities-list" data-belong-to="<?= $belong_to ?>"><i class="fa fa-times"></i> Delete</a>
                        </span>
                    </div>
                </li>
    <?php
        }
    }
    ?>
    <?php if (isset($disViewMore) && !$disViewMore) {?>
            <li class="media text-center">
                <a class="btn btn-xs btn-default push view-more" data-to="/activities/more/" href="javascript:void(0)" data-belong-to="<?= $belong_to ?>">View more..</a>
            </li>
    <?php } ?>

	
</ul>