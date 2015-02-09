<div class="content-header">
    <div class="header-section">
        <h1><i class="fa fa-envelope" style="margin:-14px 0 0 0;"></i>Edit Message</h1>
    </div>
</div>
<div class="row">
	<div class="col-lg-8">
	    <!-- Message Data Block -->
	    <div class="block">
	        <!-- General Data Title -->
	        <div class="block-title">
	            <h2><i class="fa fa-pencil"></i> Message</h2>
	        </div>
	        <!-- END Message Data Title -->

	        <!-- Message Data Content -->
	        <?= $this->render('_form', ['message' => $message]) ?>
	        <!-- END Message Data Content -->
	    </div>
	    <!-- END Message Data Block -->
	</div>
	<div class="col-lg-4 col-xs-12">
		<?php echo $this->render('_right', [
				'message' => $message
		]); ?>
	</div>
</div>
