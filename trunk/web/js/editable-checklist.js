$(document).ready(function () {
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
			$(InputsWrapper).append('<fieldset><h2 class="cl-subtitle" data-type="text">Subtitle</h2></fieldset><a href="#" class="cl-remove-element">x</a>');
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
			$(InputsWrapper).append('<div class="form-group"><label class="cl-label" data-type="text" style="margin-right:20px;">Text</label><a href="#" class="text" data-type="text">Type here</a></div>');
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
			$(InputsWrapper).append('<div class="form-group"><label class="cl-label" data-type="text" style="margin-right:20px;">Text</label><a href="#" class="textarea" data-type="textarea">Type here</a></div>	');
			returnAccess();
			
			clTextareaCount++;
			MaxInputsCount++;
		}
		return false;
	});

	function returnAccess()
	{
		$('.cl-title, .cl-subtitle, .cl-label, .text, .textarea').editable();
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
			console.log($(this).closest('fieldset'));
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
				// alert('Checklist was made! Please click "Update" button.')
			},
			error: function (res) {
				alert('Opp oh! Something is wrong. Try again..')
			}

		})
	}
})