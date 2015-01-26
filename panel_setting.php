<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; ?>

<!-- Page content -->
<div id="page-content">
	<!-- Forms General Header -->
    <div class="content-header">
        <div class="header-section">
            <h1><i class="fa fa-cogs" style="margin:-14px 0 0 0;"></i>Settings</h1>
        </div>
    </div>
	 <!-- END Forms General Header -->

    <!-- Product Edit Content -->
    <div class="row">
        <div class="col-lg-8">
			<!-- General Data Block -->
            <div class="block">
                <!-- General Data Title -->
                <div class="block-title">
                    <h2><i class="fa fa-pencil"></i> Messages</h2>
                </div>
                <!-- END General Data Title -->

                <!-- General Data Content -->
                <form action="page_ecom_product_edit.php" method="post" class="form-horizontal form-bordered" onsubmit="return false;">
					<div class="form-group">
                        <label class="col-md-3 control-label" for="product-id">From Name</label>
                        <div class="col-md-9">
                            <input type="text" id="product-id" name="product-id" class="form-control" value="AdminPanel">
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-md-3 control-label" for="product-id">From E-Mail</label>
                        <div class="col-md-9">
                            <input type="text" id="product-id" name="product-id" class="form-control" value="dev@berginformatik.ch">
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-md-3 control-label" for="product-id">E-Mail recipients?</label>
                        <div class="col-md-9">
                            <input type="text" id="product-id" name="product-id" class="form-control" value="dev@berginformatik.ch">
							<span class="help-block">Separate multiple recipients by comma.</span>
                        </div>
                    </div>
                </form>
                <!-- END General Data Content -->
            </div>
            <!-- END General Data Block -->

        </div>
        <div class="col-lg-4">
			
			<!-- Actions Block -->
            <div class="block">
                <!-- Actions Title -->
                <div class="block-title">
                    <h2><i class="fa fa-pencil"></i> Actions</h2>
                </div>
                <!-- END Actions Title -->
				
                <!-- Actions Content -->
                <form action="page_ecom_product_edit.php" method="post" class="form-horizontal form-bordered" onsubmit="return false;">
                    <div class="form-group form-actions">
                        <div class="col-md-6 text-left">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i> Save</button>
							<button type="reset" class="btn btn-sm btn-primary"><i class="fa fa-times"></i> Cancel</button>
                        </div>
						<div class="col-md-6 text-right"></div>
                    </div>
                </form>
                <!-- END Actions Content -->
            </div>
            <!-- END Actions Block -->
			
        </div>
    </div>
    <!-- END Product Edit Content -->
</div>
<!-- END Page Content -->

<?php include 'inc/page_footer.php'; ?>
<?php include 'inc/template_scripts.php'; ?>

<!-- ckeditor.js, load it only in the page you would like to use CKEditor (it's a heavy plugin to include it with the others!) -->
<script src="js/ckeditor/ckeditor.js"></script>

<?php include 'inc/template_end.php'; ?>

<!-- User Settings, modal which opens from Settings link (found in top right user menu) and the Cog link (found in sidebar user info) -->
<div id="modal-website-edit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-center">
                <h2 class="modal-title"><i class="fa fa-pencil"></i> Edit Reminder</h2>
            </div>
            <!-- END Modal Header -->

            <!-- Modal Body -->
            <div class="modal-body">
                <form action="index.php" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" onsubmit="return false;">

					<div class="row">
						<div class="col-md-10 col-md-offset-1">
							<fieldset>
								<legend>General</legend>
								<div class="form-group">
									<label class="col-md-3 control-label">Active?</label>
									<div class="col-md-9">
										<label class="switch switch-primary">
											<input type="checkbox" id="product-status" name="product-status" checked><span></span>
										</label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="example-chosen">Period</label>
									<div class="col-md-9">
										<select id="example-chosen" name="example-chosen" class="select-chosen" data-placeholder="Choose a Period.." style="width: 250px;">
											<option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
											<option value="">Monthly</option>
											<option value="">Quaterly</option>
											<option value="">Semiannualy</option>
											<option value="">Yearly</option>
										</select>
									</div>
								</div>
							</fieldset>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-10 col-md-offset-1">
							<fieldset>
								<legend>Message</legend>
								<div class="form-group">
									<label class="col-md-3 control-label" for="product-id">From Name</label>
									<div class="col-md-9">
										<input type="text" id="product-id" name="product-id" class="form-control" value="Luzi Stadler">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="product-id">From E-Mail</label>
									<div class="col-md-9">
										<input type="text" id="product-id" name="product-id" class="form-control" value="info@berginformatik.ch">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="product-id">Subject</label>
									<div class="col-md-9">
										<input type="text" id="product-id" name="product-id" class="form-control" value="Monthly Report">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="product-short-description">Message</label>
									<div class="col-md-9">
										<textarea id="textarea-wysiwyg" name="textarea-wysiwyg" rows="10" class="form-control textarea-editor"></textarea>
									</div>
								</div>
							</fieldset>
						</div>
					</div>
								
                    <div class="form-group form-actions">
                        <div class="col-xs-12 text-right">
                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- END Modal Body -->
        </div>
    </div>
</div>
<!-- END User Settings -->

<script>
	$(document).ready(function() {

				
				var MaxInputs = 100; //Maximum input boxes allowed
                
					
                /*----------------------------------
				to keep track of fields and divs added
				-----------------------------------*/
				var nameFieldCount = 0; 
                var emailFieldCount = 0; 
                var addressFieldCount = 0; 
                var checkboxFieldCount = 0; 
                var radiobuttonFieldCount = 0; 
				var checkboxdivCount = 0; 
				var checkbox_sub_para_Count=0;
				var radiobuttondivCount = 0; 
				var radio_sub_para_Count=0;
				
				var InputsWrapper = $("#InputsWrapper"); //Input box wrapper ID
				var x = InputsWrapper.length; //Initial field count
                
				/*------------------
				to get fields button ID
				------------------*/
				var namefield = $("#namebutton"); 
                var emailfield = $("#emailbutton"); 
                var addressfield = $("#addressbutton"); 
                var checkbox =  $("#checkboxbutton");
                var radiobutton= $("#radioaddbutton");
               
                $(InputsWrapper).sortable();  		// to make added fields sortable
				
				
				
				/*------------------------------------------------
				To add Name field 
				-------------------------------------------------*/
				$(namefield).click(function()  		
                {
                    if (x <= MaxInputs) 		
                    {
                        nameFieldCount++; 			

						
                        $(InputsWrapper).append('<fieldset><legend>Name</legend><div class="form-group">'+'<div class="name" id="InputsWrapper_0' + nameFieldCount + '">'+
						'<label class="col-md-3 control-label">Name:' + nameFieldCount + '</label>'+
						'<div class="col-md-9">'+
						'<div class="input-group">'+
						'<input type="text" name="mytext[]" id="field_' + nameFieldCount + '" placeholder="Name ' + nameFieldCount + '" class="form-control"/>'+
						'<a class="input-group-addon removeclass0"><i class="fa fa-times"></i></a>'+
						'</div>'+
						'</div>'+
						'</div>'+'</div></fieldset>');
						
                        x++; 
                    }
                    return false;
                });
               
			    $("body").on("click", ".removeclass0", function() {   //to remove name field

                    $(this).parent('div').remove(); 
                    x--; 
                    return false;
                });
                
				$("body").on("click", ".addclass0", function() {      //to add more name fields 
                    nameFieldCount++;

                    $(this).parent('div').parent('div').append('<div class="name">'+
					'<label>Name:' + nameFieldCount + '</label>'+
					'<input type="text" name="mytext[]" id="field_' + nameFieldCount + '" placeholder="Name ' + nameFieldCount + '"/>'+
					'<button class="removeclass0">x</button>'+
					'<button class="addclass0">+</button>'+'<br>'+
					'</div>');

                    x++;
                    return false;
                });
                
				
				
				
				
				
				/*------------------------------------------------
				To add Email field 
				-------------------------------------------------*/
				$(emailfield).click(function()  
                {
                    if (x <= MaxInputs) 
                    {
                        emailFieldCount++; 
                         
                        $(InputsWrapper).append('<div>'+'<div class="email" id="InputsWrapper_1' + emailFieldCount + '">'+
						'<label>Email:' + emailFieldCount + '</label>'+
						'<input type="text" name="myemail[]" id="field_' + emailFieldCount + '" placeholder="Email' + emailFieldCount + '"/>'+
						'<button class="removeclass1">x</button>'+
						'<button class="addclass1">+</button>'+'<br>'+
						'</div>'+'</div>');
                        x++; 
                    }
                    return false;
                });
                
				$("body").on("click", ".removeclass1", function() { 		//to remove Email field 

                    $(this).parent('div').remove();
                    x--;  
                    return false;
                });
                $("body").on("click", ".addclass1", function() { 			//to add more Email field

                    emailFieldCount++;
                    $(this).parent('div').parent('div').append('<div  class="email">'+
					'<label>Email:' + emailFieldCount + '</label>'+
					'<input type="text" name="myemail[]" id="field_' + emailFieldCount + '" placeholder="Email' + emailFieldCount + '"/>'+
					'<button class="removeclass1">x</button>'+
					'<button class="addclass1">+</button>'+'<br>'+
					'</div>');
                    x++;
                    return false;
                });
                
				
				
				
				
				/*------------------------------------------------
				To add Address field 
				-------------------------------------------------*/
				$(addressfield).click(function()  
                {
                    if (x <= MaxInputs)
                    {
                        addressFieldCount++; 
                      
                        $(InputsWrapper).append('<div>'+'<div class="address" id="InputsWrapper_2' + addressFieldCount + '">'+
						'<label>Address:' + addressFieldCount + '</label>'+
						'<p>'+
						'<textarea   type="text" name="myaddress[]" id="field_' + addressFieldCount + '" placeholder="Address' + addressFieldCount + '" />'+
						'<button class="removeclass2">x</button>'+
						'<button class="addclass2">+</button>'+
						'</p>'+'<br>'+
						'</div>'+'</div>');
                        x++; 
                    }
                    return false;
                });
                
				
				$("body").on("click", ".removeclass2", function() { //to remove address field

                    $(this).parent('p').parent('div').remove();
                    x--; 
                    return false;
                });
                $("body").on("click", ".addclass2", function() { //to add more address field

                    addressFieldCount++;
                    $(this).parent('p').parent('div').parent('div').append('<div  class="address">'+
					'<label>Address:' + addressFieldCount + '</label>'+
					'<p>'+
					'<textarea type="text" name="myaddress[]" id="field_' + addressFieldCount + '" placeholder="Address' + addressFieldCount + '"/>'+
					'<button class="removeclass2">x</button>'+
					'<button class="addclass2">+</button>'+'<br>'+
					'</p>'+
					'</div>');
                    x++;
                    return false;
                });
                
				
				
				
				
				/*------------------------------------------------
				To add Check-box
				-------------------------------------------------*/
				$(checkbox).click(function() 
                {
                    if (x <= MaxInputs) 
                    {
                        checkboxFieldCount++;
						checkboxdivCount++; 
						checkbox_sub_para_Count++;
                       
                        $(InputsWrapper).append('<div class="checkbox" id="InputsWrapper_3_'+ checkboxdivCount + '">'+
						'<p class="checkbox_child" id="para'+checkbox_sub_para_Count+'">'+
						'<label>CheckBox:' + checkboxFieldCount + '</label>'+
						'<input type="checkbox" name="mycheckbox[]" id="field_' + checkboxFieldCount + '" value="CheckBox' + checkboxFieldCount++ + '"/>'+
						'<button class="removeclass3">x</button>'+
						'<button class="addclass3">+</button>'+
						'</p>'+
						'<p class="checkbox_child" id="para'+checkbox_sub_para_Count+'" >'+
						'<label>CheckBox:' + checkboxFieldCount + '</label>'+
						'<input type="checkbox" name="mycheckbox[]" id="field_' + checkboxFieldCount + '" value="CheckBox' + checkboxFieldCount++ + '"/>'+
						'<button class="removeclass3">x</button>'+
						'<button class="addclass3">+</button>'+
						'</p>'+
						'<p class="checkbox_child" id="para'+checkbox_sub_para_Count+'" >'+
						'<label>CheckBox:' + checkboxFieldCount + '</label>'+
						'<input type="checkbox" name="mycheckbox[]" id="field_' + checkboxFieldCount + '" value="CheckBox' + checkboxFieldCount + '"/>'+
						'<button class="removeclass3">x</button>'+
						'<button class="addclass3">+</button>'+
						'</p>'+
						'</div>');
                        x++; 
                    }
                    return false;
                });
                $("body").on("click", ".removeclass3", function() { //to remove check-box

                    $(this).parent('p').remove(); 
                    x--;
                    return false;
                });
                $("body").on("click", ".addclass3", function() { //to add more check-box

                    checkboxFieldCount++;
				    
					$(this).parent('p').parent('div').append('<p  class="checkbox_child" id="para'+checkbox_sub_para_Count+'">'+
					'<label>CheckBox:' + checkboxFieldCount + '</label>'+
					'<input type="checkbox" name="mycheckbox[]" id="field_' + checkboxFieldCount + '" value="CheckBox' + checkboxFieldCount + '"/>'+
					'<button class="removeclass3">x</button>'+
					'<button class="addclass3">+</button>'+
					'</p>');
                    x++;
					
                    return false;
					
                });
				
                
				
				
				
				/*------------------------------------------------
				To add Radio-button
				-------------------------------------------------*/
				$(radiobutton).click(function()  
                {
                    if (x <= MaxInputs) 
                    {
                        radiobuttonFieldCount++;
						radiobuttondivCount++; 
						radio_sub_para_Count++;
                        
                        $(InputsWrapper).append('<div class="radiobutton" id="InputsWrapper_4_' + radiobuttondivCount + '">'+
						'<p class="radiobutton_child" id="para'+radio_sub_para_Count+'">'+
						'<label>Radio:' + radiobuttonFieldCount + '</label>'+
						'<input type="radio" name="myradio[]" id="field_' + radiobuttonFieldCount + '" placeholder="Radio_' + radiobuttonFieldCount++ + '"/>'+
						'<button class="removeclass4">x</button>'+
						'<button class="addclass4">+</button>'+
						'</p>'+
						'<p class="radiobutton_child" id="para'+radio_sub_para_Count+'">'+
						'<label>Radio:' + radiobuttonFieldCount + '</label>'+
						'<input type="radio" name="myradio[]" id="field_' + radiobuttonFieldCount + '" placeholder="Radio_' + radiobuttonFieldCount++ + '"/>'+
						'<button class="removeclass4">x</button>'+
						'<button class="addclass4">+</button>'+
						'</p>'+
						'<p  class="radiobutton_child" id="para'+radio_sub_para_Count+'">'+
						'<label>Radio:' + radiobuttonFieldCount + '</label>'+
						'<input type="radio" name="myradio[]" id="field_' + radiobuttonFieldCount + '" placeholder="Radio_' + radiobuttonFieldCount + '"/>'+
						'<button class="removeclass4">x</button>'+
						'<button class="addclass4">+</button>'+
						'</p>'+
						'</div>');
                        x++; 
                    }
                    return false;
                });
                $("body").on("click", ".removeclass4", function() { //to remove Radio-button

                    $(this).parent('p').remove(); 
                    x--; 
                    return false;
                });
                $("body").on("click", ".addclass4", function() { //to add more Radio-button

                    radiobuttonFieldCount++;
                    $(this).parent('p').parent('div').append('<p class="radiobutton_child" id="para'+radio_sub_para_Count+'">'+
					'<label>Radio:' + radiobuttonFieldCount + '</label>'+
					'<input type="radio" name="myradio[]" id="field_' + radiobuttonFieldCount + '" placeholder="Radio_' + radiobuttonFieldCount + '"/>'+
					'<button class="removeclass4">x</button>'+
					'<button class="addclass4">+</button>'+
					'</p>');
                    x++;
                    return false;
                });
				
				$("#reset").on("click", function() { //to reset all elements

                    $("#InputsWrapper").empty();
                });
				
});
</script>