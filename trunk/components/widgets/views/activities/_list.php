<ul class="timeline-list">
    <?php 
        $i = 1;
        if (!empty($activities)) {
            foreach ($activities as $key => $activity) {
                $i++;
    ?>   
                <li class="<?php echo ($i % 2 == 0 ) ? 'active' : ''?>">
                    <div class="timeline-icon"><i class="fa fa-info"></i></div>
                    <div class="timeline-time">
                        <?php if ($activity->reminder) ?>
                            <i class="fa fa-bell"></i>
                        <?= date('j. F Y', strtotime($activity->come_date));?><br>
                        <small>by <?= $activity->user->fullname ?></small>
                    </div>
                    <div class="timeline-content">
                        <p class="push-bit"><strong></strong><?= $activity->title ?></strong></p>
                        <?= $activity->content ?>
                    </div>
                </li>
    <?php
        }
    }
    ?>
	<li class="media text-center">
		<a class="btn btn-xs btn-default push view-more" data-to="/activities/more/" href="javascript:void(0)">View more..</a>
	</li>
</ul>