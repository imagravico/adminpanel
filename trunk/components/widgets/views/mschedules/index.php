<div class="block">
    <!-- Reminder Title -->
   <div class="block-title">
        <div class="block-options pull-right">
			<a class="btn btn-sm btn-alt btn-default" data-toggle="modal" href="#modal-schedules-edit">Add Schedule <i class="fa fa-plus"></i></a>
        </div>
        <h2><i class="fa fa-bell-o"></i> Schedules</h2>
    </div>
    <!-- END Reminder Title -->

	<span class="help-block">The AdminPanel sends automatically an email reminder to the Sysadmin in the defined cycle.</span>
	
    <!-- Reminder Content -->
    <div id="list-mschedules">
        <?php echo $this->render('_list') ?>
    </div>
    <!-- END Reminder Content -->
</div>
<?=
	$this->render('_form', [
            'message' => $message
        ])
?>