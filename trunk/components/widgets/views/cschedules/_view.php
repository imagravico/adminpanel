
<?php 
	// initializing event array
	$event = [
		'1' => [
			'1' => 'Client Birthday',
			'2' => 'Client Date Created',
			'3' => 'Client Date Updated'
		],
		'2' => [
			'1' => 'Website Online Date',
			'2' => 'Website Date Created',
			'3' => 'Website Date Updated'
		] 
	];

	$sendon = [
		'1' => 'Half anniversary',
		'2' => 'Anniversary',
	];
?>

<div class="form-horizontal form-bordered">
	<div class="form-group">
		<div class="col-md-3">
			<label for="active">Active</label>
		</div>
		<div class="cold-md-9">
			<?= ($model->active) ? 'Yes' : 'No'; ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-3">
			<label for="active">Subject</label>
		</div>
		<div class="cold-md-9">
			<?= $model->subject ?> 
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-3">
			<label for="active">Message</label>
		</div>
		<div class="cold-md-9">
			<?= $model->message ?> 
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-3">
			<label for="active">Relation</label>
		</div>
		<div class="cold-md-9">
			<?= ($model->relation == 1) ? 'Client' : 'Website'; ?>
		</div>
	</div>
	
	<!-- For type Event based -->
	<?php if ($model->type == 1) { ?>

	<div class="form-group">
		<div class="col-md-3">
			<label for="active">Event</label>
		</div>
		<div class="cold-md-9">
			<?= $event[$model->relation][$model->event] ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-3">
			<label for="active">Send On</label>
		</div>
		<div class="cold-md-9">
			<?= $sendon[$model->sendon] ?>
		</div>
	</div>	
	<div class="form-group">
		<div class="col-md-3">
			<label for="active">At</label>
		</div>
		<div class="cold-md-9">
			<?= $model->at_time ?>
		</div>
	</div>	
	<?php 
		} 
		else {
			$time_set = '';

			$day = [
				'Sunday',
				'Monday',
				'Tuesday',
				'Wednesday',
				'Thursday',
				'Friday',
				'Saturday'
			];

			$date = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12',
				'13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24',
				'25', '26', '27', '28', '29', '30', '31'
			];

			$month = ["January", "February", "March", "April", 
				"May", "June", "July", "August", "September", 
				"October", "November", "December"
			];

			switch ($model->type_periodically) {
	            case 'day':
	                $time_set = 'Every ' . $model->type_periodically 
	                . 'at ' . date('H:i', strtotime($model->time_periodically));
	                break;

	            case 'week':
	                $time_set = 'Every ' . $model->type_periodically 
	                . ' on ' . $day[date('w', strtotime($model->time_periodically))] 
	                . ' at ' . date('H:i', strtotime($model->time_periodically));
	                break;

	            case 'month':
	            	$time_set = 'Every ' . $model->type_periodically 
	            	. ' on the ' . $date[date('j', strtotime($model->time_periodically))] 
	            	. ' at ' . date('H:i', strtotime($model->time_periodically));
	                break;

	            case 'year':
	            	$time_set = 'Every ' . $model->type_periodically 
	            	. 'on the ' . $date[date('j', strtotime($model->time_periodically))] 
	            	. 'of ' . $month[date('n', strtotime($model->time_periodically))]
	            	. 'at ' . date('H:i', strtotime($model->time_periodically));
	                break;
	        }
	?>
	
	<div class="form-group">
		<div class="col-md-3">
			<label for="active">Time</label>
		</div>
		<div class="cold-md-9">
			<?= $time_set; ?>
		</div>
	</div>	

	<?php		
		}
	?>
	<div class="form-group form-actions">
    <div class="col-xs-12 text-right">
        <button type="button" class="btn btn-sm btn-default btn-close" data-dismiss="modal">Close</button>
    </div>
</div>
</div>
