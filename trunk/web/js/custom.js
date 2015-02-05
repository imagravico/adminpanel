
// cancle button in action area (editing client page, create page)
var Action = function() {
	
	var body   = $(document.body);
	var uiInit = function () {
		actionForm();
		actionGroup();
		actionNote();
	}

	var actionForm = function () 
	{
		var form   = $('.form-actions'),
		    cancel = form.find('.cancel'),
			del    = form.find('.del');
			
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
					url: $(this).data('to'),
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
	}

	var actionGroup = function () {

		var	group  = $('#form-add-group'),
			edit   = group.find('.form-actions .edit'),
			add    = group.find('.form-actions .add');

		// add new 
		body.on('click', '.form-actions .add', function (e) {
			e.preventDefault();
			var form   = $(add.data('form')),
				update = $(add.data('update'));

			$.ajax({
				url: add.data('to'),
				type: 'POST',
				data: form.serializeArray(),
				success: function (res) {
					updateRes(update, res);
				},
				error: function (res) {
					alert('Opp oh! There are something wrong. Try again..')
				}
			});
		});

		// edit, in this case it is only for editting group
		body.on('click', '.form-actions .edit', function (e) {
			e.preventDefault();
			var update = $(edit.data('update')),
				name = $($(this).data('input')).val();

			$.ajax({
				url: $(this).data('to'),
				type: 'POST',
				data: {'name' : name}, 
				success: function (res) {
					updateRes(update, res);
				},
				error: function (res) {
					alert('Opp oh! There are something wrong. Try again..')
				}
			});
		});
	}

	var actionNote = function () {
		var form   = $('#form-note'),
			update = $(form.data('update')),
			edit   = $('.notes-list .btn-edit-note'),
			url    = '/notes/create';

		body.on('click', '.notes-list .btn-edit-note', function (e) {
			url = $(this).data('to');
		});

		// delete
		body.on('click', '.notes-list .btn-del-note', function (e) 
		{
			e.preventDefault();
			if (confirm('Are you sure to delete it?')) 
			{
				$.ajax({
					url: $(this).data('to'),
					success: function(res) {
						updateRes($('.notes-list'), res);
					},
					error: function(res) {
						alert('Opp oh! There are something wrong. Try again..')
					} 
				})
			}
		});

		form.submit(function (e) {
			e.preventDefault();

			$.ajax({
				url: url,
				type: 'POST',
				data: form.serializeArray(), 
				success: function (res) {
					updateRes(update, res);
					form.find('.btn-close').trigger('click');
				},
				error: function (res) {
					alert('Opp oh! There are something wrong. Try again..')
				}
			});

		});
	}

	var updateRes =  function (obj, res) {
			if (obj != undefined) {
				obj.empty();
				obj.html(res);
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
