
// cancle button in action area (editing client page, create page)
var Action = function() {
	
	var body   = $(document.body);
	var uiInit = function () {
		actionForm();
		actionGroup();
		actionNote();
		actionActivity();
		actionSetting();
		actionMSchedule();
		actionMSwitch();
		actionCSwitch();
		actionCSchedule();
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
						if (res.errors == '' && del.data('redirect') != undefined) {
							window.location.href = del.data('redirect');
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

			postData(add.data('to'), form.serializeArray(), update, function () {
				});	
		});

		// edit, in this case it is only for editting group
		body.on('click', '.form-actions .edit', function (e) {
			e.preventDefault();
			var update = $(edit.data('update')),
				name = $($(this).data('input')).val();

			postData($(this).data('to'), {'name' : name}, update, function () {
				});

		});
	}

	var actionNote = function () {
		var form   = $('#form-note'),
			update = $(form.data('update')),
			edit   = $('.notes-list .btn-edit-note'),
			url    = '/notes/create',
			wrap   = $('#wrap-form-note');

		body.on('click', '.notes-list .btn-edit-note', function (e) {
			url = $(this).data('to');
			// var loadUrl = $(this).data('load');
			// wrap.load(loadUrl);
		});

		// delete
		body.on('click', '.notes-list .btn-del-note', function (e) 
		{
			e.preventDefault();
			if (confirm('Are you sure to delete it?')) 
			{
				postData($(this).data('to'), {}, update, function () {
				});
			}
		});

		form.submit(function (e) {
			e.preventDefault();
			postData(url, form.serializeArray(), update, function () {
					form.find('.btn-close').trigger('click');
				});
		});
	}

	/**
	 * control all behaviours of activity
	 * @return mixed
	 */
	var actionActivity = function () {

		var form         = $('#form-add-activities'),
			to           = form.data('to'),
			update       = $(form.data('update')),
			activityList = $('#activities-list'), 
			more         = 2;

		form.submit(function (e) {
			e.preventDefault();
			postData(to, form.serializeArray(), update, function () {
					addWrap();
					form.find('.btn-close').trigger('click');
					form.trigger("reset");
				});
			
		});

		body.on('click', '#activities-list .view-more', function (e) {
			e.preventDefault();
			var to = $(this).data('to') + more;
			postData(to, form.serializeArray(), update, function () {
					more = more + 1;
				});
			
		});

		// add wrapper to image in activity
		var addWrap =  function () {
			var src = activityList.find('.timeline-content img').attr('src');
			activityList.find('.timeline-content img').wrap('<div clas="row push"><div class="col-sm-6 col-md-4"><a href="' + src + '" data-toggle="lightbox-image" id="lightbox-image"></a></div></div>');
		}
		// run
		addWrap();
	}

	var actionSetting = function () {
		var form = $('#settings-change');

		form.submit(function (e) {
			e.preventDefault();

			postData(form.data('to'), form.serializeArray(), update, function () {
					form.find('.btn-close').trigger('click');
				});

		});
	}

	var actionMSchedule = function () {
		var form = $('#form-add-message-schedule'),
			update = $(form.data('update')),
			to    = '/mschedules/create';

		body.on('click', '#list-mschedules .btn-edit-mschedule', function (e) {
			to = $(this).data('to');
		});

		// delete
		body.on('click', '#list-mschedules .btn-del-mschedule', function (e) {
			e.preventDefault();
			if (confirm('Are you sure to delete it?')) 
			{
				postData($(this).data('to'), {}, update, function () {
				});
			}
		});

		form.submit(function (e) {
			e.preventDefault();
			e.stopImmediatePropagation();
			postData(to, form.serializeArray(), update, function () {
					form.find('.btn-close').trigger('click');
					form.trigger("reset");
					form.yiiActiveForm('resetForm');
				});
		});
	}

	var actionCSchedule =  function () {
		var form = $('#form-add-checklists-schedule'),
			update = $(form.data('update')),
			to    = '/cschedules/create';

		body.on('click', '#list-cschedules .btn-edit-cschedules', function (e) {
			to = $(this).data('to');
		});

		// delete
		body.on('click', '#list-cschedules .btn-del-cschedules', function (e) {
			e.preventDefault();
			if (confirm('Are you sure to delete it?')) 
			{
				postData($(this).data('to'), {}, update, function () {
				});
			}
		});

		form.submit(function (e) {
			e.preventDefault();
			e.stopImmediatePropagation();
			postData(to, form.serializeArray(), update, function () {
					form.find('.btn-close').trigger('click');
					form.trigger("reset");
					form.yiiActiveForm('resetForm');
				});
		});
	}


	var updateRes =  function (obj, res) {
			if (obj != undefined) {
				obj.empty();
				obj.html(res);
			}
		}

	var postData = function (to, data, update, sCallback) 
	{
		$.ajax({
			url: to,
			type: 'POST',
			data: data,
			success: function (res) {
				if (update != '' && res.errors == '') {
					updateRes(update, res.data);
				}

				if (res.errors == '')
					sCallback();
			},
			error: function (res) {
				alert('Opp oh! There are something wrong. Try again..')
			}
		});
	}

	var actionMSwitch = function () {
		var switchButton = $('#setting-messages .switch-action');

		switchButton.change(function () {
			if ($(this).is(':checked')) {
				var to = '/msettings/create',
					data = {'Msetting[messages_id]': $(this).data('messagesId'), 'Msetting[belong_to]': $(this).data('belongTo')};

				$.ajax({
					url: to,
					type: 'POST',
					data: data,
					success: function (res) {
						
					},
					error: function (res) {
						alert('Opp oh! There are something wrong. Try again..')
					}
				});
			}
			else {
				var to = '/msettings/remove',
					data = {'Msetting[messages_id]': $(this).data('messagesId'), 'Msetting[belong_to]': $(this).data('belongTo')};

				$.ajax({
					url: to,
					type: 'POST',
					data: data,
					success: function (res) {
						
					},
					error: function (res) {
						alert('Opp oh! There are something wrong. Try again..')
					}
				});
			}
		})
	}

	var actionCSwitch = function () {
		var switchButton = $('#checklists-settings .switch-action');

		switchButton.change(function () {
			if ($(this).is(':checked')) {
				var to = '/csettings/create',
					data = {'Csetting[checklists_id]': $(this).data('checklistsId'), 'Csetting[belong_to]': $(this).data('belongTo')};

				$.ajax({
					url: to,
					type: 'POST',
					data: data,
					success: function (res) {
						
					},
					error: function (res) {
						alert('Opp oh! There are something wrong. Try again..')
					}
				});
			}
			else {
				var to = '/csettings/remove',
					data = {'Csetting[checklists_id]': $(this).data('checklistsId'), 'Csetting[belong_to]': $(this).data('belongTo')};

				$.ajax({
					url: to,
					type: 'POST',
					data: data,
					success: function (res) {
						
					},
					error: function (res) {
						alert('Opp oh! There are something wrong. Try again..')
					}
				});
			}
		})
	}


	return {
        init: function() {
            uiInit(); // Initialize UI Code
        }
    };
}();
/* Initialize app when page loads */
$(function(){ Action.init(); });
