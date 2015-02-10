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
    <table class="table table-striped table-vcenter">
        <tbody>
            <tr>
                <td>
					<small data-toggle="tooltip" data-original-title="Client"><span class="label label-default"><i class="fa fa-fw fa-user"></i></span></small>
					<small data-toggle="tooltip" data-original-title="Active"><span class="label label-default"><i class="fa fa-fw fa-bell"></i></span></small>
					Birthday Message
				</td>
                <td class="text-right" style="width:140px;">
					<a data-toggle="modal" href="#modal-website-edit" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i> Edit</a>
					<a data-toggle="modal" href="#modal-website-edit" class="btn btn-xs btn-default"><i class="fa fa-times"></i> Remove</a>
                </td>
            </tr>
			<tr>
                <td>
					<small data-toggle="tooltip" data-original-title="Website"><span class="label label-default"><i class="fa fa-fw fa-globe"></i></span></small>
					<small data-toggle="tooltip" data-original-title="Not active"><span class="label label-default"><i class="fa fa-fw fa-bell-slash"></i></span></small>
					Other Schedule Title
				</td>
                <td class="text-right" style="width:140px;">
					<a data-toggle="modal" href="#modal-website-edit" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i> Edit</a>
					<a data-toggle="modal" href="#modal-website-edit" class="btn btn-xs btn-default"><i class="fa fa-times"></i> Remove</a>
                </td>
            </tr>
        </tbody>
    </table>
    <!-- END Reminder Content -->
</div>
<?=
	$this->render('_form')
?>