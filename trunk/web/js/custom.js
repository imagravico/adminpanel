
// cancle button in action area (editing client page, create page)
var Action = function() {
	var uiInit = function () {
		actionForm();
	}

	var actionForm = function () 
	{
		var cancel = $('.form-actions .cancel');
		var del    = $('.form-actions .del');
		cancel.click(function (e) 
		{
			e.preventDefault();
			window.location.href = "/clients";
		});

		del.click(function (e) 
		{
			e.preventDefault();
			var id = del.data('id');
			if (confirm('Are you sure to delete it?')) 
			{
				window.location.href = "/clients/delete/" + id;
			}
		});
	}

	return {
        init: function() {
            uiInit(); // Initialize UI Code
        }
    };
}();
/* Initialize app when page loads */
$(function(){ Action.init(); });
