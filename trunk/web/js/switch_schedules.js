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
		$('#which-event').val('').attr('disabled', 'disabled');
		$('#send-on').val('').attr('disabled', 'disabled');
		$('#schedule-type').val(2);
	});


	$("[href=#tab-event-based]").click(function () { 
		$('#which-event').val('').removeAttr('disabled');
		$('#send-on').val('').removeAttr('disabled');
		$('#schedule-type').val(1);
	});

});