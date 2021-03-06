$(document).ready(function () {
	/* form generator */
	var MaxInputs = 100; //Maximum input boxes allowed
				
	var InputsWrapper = $("#InputsWrapper"); //Input box wrapper ID
	var InputsWrapperAdd = $("#InputsWrapperAdd"); //Input box wrapper ID
	var InputsWrapperEdit = $("#InputsWrapperEdit"); //Input box wrapper ID

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

	var clCheckbox = $('#cl-checkbox');
	var clCheckboxCount = 0;

	var clSwitch = $('#cl-switch');
	var clSwitchCount = 0;

	var clRating = $('#cl-rating');
	var clRatingCount = 0;

	var saveCl = $('.save-cl');

	$(InputsWrapper).sortable();  		// to make added fields sortable
	
	$(document.body).on('change', '#InputsWrapperAdd input[type=checkbox]', function () {
		if ($(this).is(':checked'))
			$(this).attr('checked', 'checked');
		else
			$(this).removeAttr('checked');
	});	

	$(document.body).on('change', '#InputsWrapperEdit input[type=checkbox]', function () {
		if ($(this).is(':checked'))
			$(this).attr('checked', 'checked');
		else
			$(this).removeAttr('checked');
	});	

	/*------------------------------------------------
	Add Title field 
	-------------------------------------------------*/
	$(clTitle).click(function()  		
	{
		if(MaxInputsCount <= MaxInputs)
		{
			$(InputsWrapper).append('<div class="form-group"><div class="col-md-9"><h1 class="cl-title" data-type="text">Title</h1></div><div class="col-md-3"><a href="#" class="cl-remove-element">x</a></div></div>');
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
			$(InputsWrapper).append('<div class="form-group"><div class="col-md-9"><fieldset><h2 class="cl-subtitle" data-type="text">Subtitle</h2></fieldset></div><div class="col-md-3"><a href="#" class="cl-remove-element">x</a></div></div>');
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
			$(InputsWrapper).append('<div class="form-group"><div class="col-md-9"><p class="cl-label" data-type="text" style="margin-right:20px;display: inline-block;">Text</p><p href="#" style="display: inline-block;" class="text" data-type="text">Type here</p></div><div class="col-md-3"><a href="#" class="cl-remove-element">x</a></div></div>');
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
			$(InputsWrapper).append('<div class="form-group"><div class="col-md-9"><p class="cl-label" data-type="text" style="margin-right:20px;display: inline-block;">Text</p><p href="#" class="textarea" data-type="textarea" style="display: inline-block;">Type here</p></div><div class="col-md-3"><a href="#" class="cl-remove-element">x</a></div></div>');
			returnAccess();
			
			clTextareaCount++;
			MaxInputsCount++;
		}
		return false;
	});

	/*------------------------------------------------
	Add Checkbox 
	-------------------------------------------------*/
	$(clSwitch).click(function () {
		if(MaxInputsCount <= MaxInputs)
		{
			$(InputsWrapper).append('<div class="form-group"><div class="col-md-9 switch-box"><p class="cl-label" data-type="text" style="margin-right:20px;display: inline-block;">Text</p><label class="switch switch-primary"><input type="checkbox" name=""><span></span></label></div><div class="col-md-3"><a href="#" class="cl-remove-element">x</a></div></div>');
			returnAccess();
			
			clSwitchCount++;
			MaxInputsCount++;
		}
		return false;
	});

	/*------------------------------------------------
	Add Rating 
	-------------------------------------------------*/
	$(clRating).click(function () {
		if(MaxInputsCount <= MaxInputs)
		{
			$(InputsWrapper).append('<div class="form-group"><div class="col-md-9"><p class="cl-label" data-type="text" style="margin-right:20px;display: inline-block">Text</p><p href="#" data-type="select" data-title="Select Rating" class="select" style="display: inline-block;">Select Rating</p></div><div class="col-md-3"><a href="#" class="cl-remove-element">x</a></div></div>');
			
			returnAccess();
			
			clRatingCount++;
			MaxInputsCount++;
		}
		return false;
	});

	/*------------------------------------------------
	Add Rating 
	-------------------------------------------------*/
	$(clCheckbox).click(function () {
		if(MaxInputsCount <= MaxInputs)
		{
			$(InputsWrapper).append('<div class="form-group"><div class="col-md-9"><p class="cl-label" data-type="text" style="margin-right:20px;display: inline-block;">Text</p><a href="#" class="btn-add-item-checklist">Add checkbox</a></div><div class="col-md-3"><a href="#" class="cl-remove-element">x</a></div></div>');
			
			returnAccess();
			
			clCheckboxCount++;
			MaxInputsCount++;
		}
		return false;
	});


	function returnAccess()
	{
		$('.cl-title, .cl-subtitle, .cl-label, .text, .textarea').editable();
	    $('.select').editable({
	        value: 2,    
	        source: [
	              {value: 1, text: '1'},
	              {value: 2, text: '2'},
	              {value: 3, text: '3'},
	              {value: 4, text: '4'},
	              {value: 5, text: '5'}
	           ]
	    });
	}
    
    // trigger function at the beginning
    returnAccess();

	/*------------------------------------------------
	 Remove Element
	 -------------------------------------------------*/
	$("body").on("click", ".cl-remove-element", function(e)
	{
		e.preventDefault();

		if(confirm('Really remove this element?'))
		{
			console.log();
			$(this).closest('div.form-group').remove();
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
		// $(InputsWrapper).find('.cl-remove-element').remove();
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