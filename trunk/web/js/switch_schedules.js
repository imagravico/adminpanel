$(document).ready(function() {
			
	/* cron select */
	$('.cron-select').cron();
	
	/* chained select */
	// $("#series").chained("#mark");
	$("#model").chained("#series");
	
	/* form generator */
	var MaxInputs = 100; //Maximum input boxes allowed
				
	var InputsWrapper = $("#InputsWrapper"); //Input box wrapper ID
	var MaxInputsCount = InputsWrapper.length; //Initial field count
                
	/*------------------
	to get fields button ID
	------------------*/
	var clTitle = $('#cl-title');
	var clTitleCount = 0;

	var clSubtitle = $('#cl-subtitle');
	var clSubtitleCount = 0;

	var clText = $('#cl-text');
	var clTextCount = 0;

	var clTextarea = $('#cl-textarea');
	var clTextareaCount = 0;

	var saveCl = $('.save-cl');

	$(InputsWrapper).sortable();  		// to make added fields sortable
				
	/*------------------------------------------------
	Add Title field 
	-------------------------------------------------*/
	$(clTitle).click(function()  		
	{
		if(MaxInputsCount <= MaxInputs)
		{
			$(InputsWrapper).append('<h1 class="cl-title" data-type="text">Title</h1>');
			returnAccess();
			
			clTitleCount++;
			MaxInputsCount++;
		}
		
		return false;
	});


	/*------------------------------------------------
	Add Subtitle field 
	-------------------------------------------------*/
	$(clSubtitle).click(function()  		
	{
		if(MaxInputsCount <= MaxInputs)
		{
			$(InputsWrapper).append('<h2 class="cl-subtitle" data-type="text">Subtitle</h2>');
			returnAccess();
			
			clSubtitleCount++;
			MaxInputsCount++;
		}
		
		return false;
	});

	/*------------------------------------------------
	Add Text field 
	-------------------------------------------------*/
	$(clText).click(function()  		
	{
		if(MaxInputsCount <= MaxInputs)
		{
			$(InputsWrapper).append('<div class="form-group"><label class="cl-label" data-type="text">Text</label><input type="text"></input></div>');
			returnAccess();
			
			clTextCount++;
			MaxInputsCount++;
		}
		return false;
	});

	/*------------------------------------------------
	Add Text textarea 
	-------------------------------------------------*/
	$(clTextarea).click(function()  		
	{
		if(MaxInputsCount <= MaxInputs)
		{
			$(InputsWrapper).append('<div class="form-group"><label class="cl-label" data-type="text">Text</label><textarea></textarea></div>');
			returnAccess();
			
			clTextareaCount++;
			MaxInputsCount++;
		}
		return false;
	});

	function returnAccess()
	{
		$('.cl-title, .cl-subtitle, .cl-label').editable();
	}
    
    // trigger function in the beginning
    returnAccess();

	/*------------------------------------------------
	 Remove Element
	 -------------------------------------------------*/
	$("body").on("click", ".cl-remove-element", function(e)
	{
		e.preventDefault();

		if(confirm('Really remove this element?'))
		{
			$(this).closest('fieldset').remove();
			MaxInputsCount--;
		}

		return true;
	});

	/*------------------------------------------------
	 make content of checklist
	 -------------------------------------------------*/
	saveCl.click(function () {
		preCl();
	});

	function preCl()
	{
		var preCls = $(InputsWrapper).html();
		$.ajax({
			url: '/checklists/prechecklist',
			type: 'POST',
			data: {'checklist_content' : preCls},
			success: function (res) {

			},
			error: function (res) {

			}

		})
	}




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