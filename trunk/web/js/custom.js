
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
						console.log(res.errors);
						if (res.errors == '' && del.data('update')) {
							updateRes($(del.data('update')), res.data);
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
			url          = form.data('url'),
			update       = $(form.data('update')),
			activityList = $('#activities-list'), 
			more         = 2;

		form.submit(function (e) {
			e.preventDefault();
			postData(url, form.serializeArray(), update, function () {
					addWrap();
					form.find('.btn-close').trigger('click');
					form.trigger("reset");
				});
			
		});

		body.on('click', '#activities-list .view-more', function (e) {
			e.preventDefault();
			var url = $(this).data('to') + more;
			postData(url, form.serializeArray(), update, function () {
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
			$.ajax({
				url: form.data('url'),
				type: 'POST',
				data: form.serializeArray(), 
				success: function (res) {
					if (res.success) 
					{
						form.find('.btn-close').trigger('click');
					}
				},
				error: function (res) {
					alert('Opp oh! There are something wrong. Try again..')
				}
			});

		});
	}

	var actionMSchedule = function () {
		var form = $('#form-add-message-schedule'),
			update = $(form.data('update')),
			url    = '/mschedules/create';

		body.on('click', '#list-mschedules .btn-edit-mschedule', function (e) {
			url = $(this).data('to');
		});

		// delete
		body.on('click', '#list-mschedules .btn-del-mschedule', function (e) 
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
			e.stopImmediatePropagation();
			postData(url, form.serializeArray(), update, function () {
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

	return {
        init: function() {
            uiInit(); // Initialize UI Code
        }
    };
}();
/* Initialize app when page loads */
$(function(){ Action.init(); });
