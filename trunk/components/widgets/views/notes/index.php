<div class="block full">
    <!-- Notes Title -->
    <div class="block-title">
        <div class="block-options pull-right">
            <a class="btn btn-sm btn-alt btn-default" data-toggle="modal" href="#modal-note-edit">Add Note <i class="fa fa-plus"></i></a>
        </div>
        <h2><i class="fa fa-quote-right"></i> Notes</h2>
    </div>
    <!-- END Notes Title -->
	
    <!-- Notes Content -->
	<style>
		.media-list { margin:0; }
		.media-list .media .link-hover {min-width:120px; min-height:50px;}
		.media-list .media .link-hover a {display:none;}
		.media-list .media:hover .link-hover a {display:initial;}
	</style>
    <ul class="media-list notes-list">
        <?php 
            if (!empty($notes)):
                foreach ($notes as $key => $note):
        ?>
                    <li class="media clearfix">
                        <a href="page_ready_user_profile.php" class="pull-left">
                            <img src="/web/upload/avatar/noavatar.jpg" alt="Avatar" class="img-circle">
                        </a>
                        <div class="media-body">
                            <span class="text-muted text-right pull-right link-hover">
            					<small>
                                    <?php if (strtotime($note->updated_at) > 0) { ?>
                                    <em><?= $note->timeAgo(strtotime($note->updated_at)) ?></em>
                                    <?php } else { ?>
                                    <em><?= $note->timeAgo(strtotime($note->created_at)) ?></em>
                                    <?php } ?>
                                </small><br>
            					<a data-toggle="modal" href="#modal-note-edit" class="btn btn-xs btn-default"><i class="fa fa-edit"></i> Edit</a>
            					<a href="javascript:void(0)" class="btn btn-xs btn-default"><i class="fa fa-times"></i> Delete</a>
            				</span>
                            <a href="#">
                                <strong>n<?= $note->user->fullname; ?></strong>
                            </a>
                            <p><?= $note->content ?></p>
                        </div>
                    </li>
        <?php endforeach; endif; ?>
    </ul>
    <!-- END Notes Content -->
</div>
<?php echo $this->render('_form') ?>

