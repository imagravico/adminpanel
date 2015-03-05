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
		// $('.field-messageschedule-event').find('.help-block-error').empty();
		// $('.field-messageschedule-sendon').find('.help-block-error').empty();
		// $('.field-messageschedule-event').removeClass('has-error');
		// $('.field-messageschedule-sendon').removeClass('has-error');

		$('#which-event').val('').attr('disabled', 'disabled');
		$('#send-on').val('').attr('disabled', 'disabled');
		$('#form-add-message-schedule').yiiActiveForm('remove', 'messageschedule-event');
		$('#form-add-message-schedule').yiiActiveForm('remove', 'messageschedule-sendon');
		$('#schedule-type').val(2);
	});


	$("[href=#tab-event-based]").click(function () {
		$('#relation').trigger('change');
		// $('#form-add-message-schedule').yiiActiveForm('add', {id: 'messageschedule-event', input: '#which-event' });
		// $('#form-add-message-schedule').yiiActiveForm('add', {id: 'messageschedule-sendon', input: '#send-on'});

		$('#which-event').val('').removeAttr('disabled');
		$('#send-on').val('').removeAttr('disabled');
		$('#schedule-type').val(1);
	});

});