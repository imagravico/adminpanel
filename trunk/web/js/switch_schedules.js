$(document).ready(function() {
			
	/* cron select */
	$('.cron-select').cron();
	
	/* chained select */
	// $("#series").chained("#mark");
	$("#model").chained("#series");
	
	/*------------------------------------------------
	 Tab
	 -------------------------------------------------*/

	$("[href=#tab-periodically]").click(function () {
		$('#which-event').attr('disabled', 'disabled');
		$('#send-on').attr('disabled', 'disabled');
		$('#form-add-message-schedule').yiiActiveForm('remove', 'messageschedule-event');
		$('#form-add-message-schedule').yiiActiveForm('remove', 'messageschedule-sendon');
		$('#schedule-type').val(2);
	});

	$("[href=#tab-event-based]").click(function () {
		$('#relation').trigger('change');
		$('#form-add-message-schedule').yiiActiveForm('add', {id: 'messageschedule-event', input: '#which-event', container: 'field-messageschedule-event', error: '.help-block.help-block-error', status: 0});
		$('#form-add-message-schedule').yiiActiveForm('add', {id: 'messageschedule-sendon', input: '#send-on'});
		$('#schedule-type').val(1);
	});

});