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
    <ul class="media-list">
        <li class="media clearfix">
            <a href="page_ready_user_profile.php" class="pull-left">
                <img src="img/placeholders/avatars/avatar2.jpg" alt="Avatar" class="img-circle">
            </a>
            <div class="media-body">
                <span class="text-muted text-right pull-right link-hover">
					<small><em>30 min ago</em></small><br>
					<a data-toggle="modal" href="#modal-note-edit" class="btn btn-xs btn-default"><i class="fa fa-edit"></i> Edit</a>
					<a href="javascript:void(0)" class="btn btn-xs btn-default"><i class="fa fa-times"></i> Delete</a>
				</span>
                <a href="page_ready_user_profile.php"><strong>John Doe</strong></a>
                <p>In hac <a href="javascript:void(0)">habitasse</a> platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend.</p>
            </div>
        </li>
        <li class="media clearfix">
            <a href="page_ready_user_profile.php" class="pull-left">
                <img src="img/placeholders/avatars/avatar2.jpg" alt="Avatar" class="img-circle">
            </a>
            <div class="media-body">
                <span class="text-muted text-right pull-right link-hover">
					<small><em>30 min ago</em></small><br>
					<a data-toggle="modal" href="#modal-note-edit" class="btn btn-xs btn-default"><i class="fa fa-edit"></i> Edit</a>
					<a href="javascript:void(0)" class="btn btn-xs btn-default"><i class="fa fa-times"></i> Delete</a>
				</span>
                <a href="page_ready_user_profile.php"><strong>John Doe</strong></a>
                <p>Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum.</p>
            </div>
        </li>
    </ul>
    <!-- END Notes Content -->
</div>
<?php echo $this->render('_form') ?>

