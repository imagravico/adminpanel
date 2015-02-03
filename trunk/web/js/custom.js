
// cancle button in action area (editing client page, create page)
var Action = function() {
	var uiInit = function () {
		actionForm();
	}

	var actionForm = function () 
	{
		var form   = $('.form-actions'),
		    cancel = form.find('.cancel'),
			del    = form.find('.del'),
			add    = form.find('.add'),
			edit   = form.find('.edit'),
			body   = $(document.body);

		// cancel
		cancel.click(function (e) 
		{
			e.preventDefault();
			window.location.href = cancel.data('redirect');
		});

		// delete
		body.on('click', '.form-actions .del', function (e) 
		{
			e.preventDefault();
			if (confirm('Are you sure to delete it?')) 
			{
				$.ajax({
					url: $(this).data('url'),
					success: function(res) {
						if (res.errors != '' && del.data('redirect') != undefined) {
							window.location.href = del.data('redirect');
						}

						if (res.errors != '' && del.data('update')) {
							updateRes($(del.data('update')), res);
						}
					},
					error: function(res) {
						alert('Opp oh! There are something wrong. Try again..')
					} 
				})
			}
		});

		// add new 
		body.on('click', '.form-actions .add', function (e) 
		{
			e.preventDefault();
			var form   = $(add.data('form')),
				update = $(add.data('update'));

			$.ajax({
				url: add.data('to'),
				type: 'POST',
				data: form.serializeArray(),
				success: function (res) 
				{
					updateRes(update, res);
				},
				error: function (res) 
				{
					alert('Opp oh! There are something wrong. Try again..')
				}
			});
		});


		var updateRes =  function (obj, res) {
			if (obj != undefined) {
				obj.empty();
				obj.html(res);
			}
		}
	}

	return {
        init: function() {
            uiInit(); // Initialize UI Code
        }
    };
}();
/* Initialize app when page loads */
$(function(){ Action.init(); });
