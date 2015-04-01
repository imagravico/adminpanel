
// cancle button in action area (editing client page, create page)
var Action = function() {
	
	var body   = $(document.body);
	var uiInit = function () {
		actionGroup();
		actionNote();
		actionActivity();
		actionSetting();
		actionMSchedule();
		actionMSwitch();
		actionCSwitch();
		actionCSchedule();
		actionChecklist();
		actionFilter();
	}

	var actionGroup = function () {

		var	group  = $('#form-add-group'),
			update = $(group.data('update')),
			edit   = group.find('.form-actions .edit'),
			add    = group.find('.form-actions .add'),
			close  = group.find('.btn-close'),
			filter = $('.filter-group'),
			del    = group.find('.form-actions .del');

		// add new 
		body.on('click', add.selector, function (e) {
			e.preventDefault();
			postData(add.data('to'), $('#form-add-group').serializeArray(), update, function () {
				});	
		});
		
		filter.click(function (e) {

		})

		// edit, in this case it is only for editting group
		body.on('click', edit.selector, function (e) {
			e.preventDefault();
			var name = $($(this).data('input')).val();
			postData($(this).data('to'), {'name' : name}, update, function () {
				});

		});

		// edit, in this case it is only for editting group
		body.on('click', del.selector, function (e) {
			e.preventDefault();
			if (confirm('Are you sure to delete it?')) 
			{
				postData($(this).data('to'), {}, update, function () {
				});
			}
		});

		body.on('click', close.selector, function (e) {
			location.reload();
		});
	}

	var actionNote = function () {
		var form   = $('#form-note'),
			update = $(form.data('update')),
			add    = $('.btn-add-note'),
			edit   = $('.notes-list .btn-edit-note'),
			del    = $('.notes-list .btn-del-note'),
			url    = '/notes/create',
			viewMore  = $('.notes-list .view-more'),
			more   = 2,
			wrap   = $('#wrap-form-note');

		body.on('click', edit.selector, function (e) {
			url     = $(this).data('to');
			loadUrl = $(this).data('load');
			data    = {'Note[type_area]': $(this).data('area'), 'Note[belong_to]': $(this).data('belongTo')};
			
			postData(loadUrl, data, wrap, function () {
				$('#form-note .textarea-editor').wysihtml5();
			})
		});

		// add 
		add.click(function () {
			url = '/notes/create';
			resetForm($('#form-note'));
		});

		// delete
		body.on('click', del.selector, function (e) 
		{
			e.preventDefault();
			data    = {'Note[type_area]': $(this).data('area'), 'Note[belong_to]': $(this).data('belongTo')};

			if (confirm('Are you sure to delete it?')) 
			{
				postData($(this).data('to'), data, update, function () {
				});
			}
		});

		body.on('click', viewMore.selector, function (e) {
			e.preventDefault();
			var to = $(this).data('to') + more,
				data = {'Note[type_area]': $(this).data('area'), 'Note[belong_to]': $(this).data('belongTo')};
			postData(to, data, update, function () {
					more = more + 1;
				});
			
		});

		body.on('submit', form.selector, function (e) {
			e.preventDefault();
			form = $('#form-note');
			postData(url, form.serializeArray(), update, function () {
					form.find('.btn-close').trigger('click');
					form.trigger("reset");
					form.yiiActiveForm('resetForm');
				});
		});
	}

	var actionActivity = function () {

		var form         = $('#form-add-activities'),
			to           = form.data('to'),
			update       = $(form.data('update')),
			activityList = $('#activities-list'), 
			viewMore     = $('#activities-list .view-more'),
			edit         = $('#activities-list .btn-edit-activity'),
			del          = $('#activities-list .btn-del-activity'),
			add          = $('.btn-add-activity'),
			wrap         = $('#wrap-form-activity'),
			more         = 2;

		body.on('click', edit.selector, function (e) {
			to     = $(this).data('to');
			loadUrl = $(this).data('load');
			data    = {'Activity[belong_to]': $(this).data('belongTo')};
			postData(loadUrl, data, wrap, function () {
				$('#form-add-activities .textarea-editor').wysihtml5();

        		// Initialize Datepicker
				$('.input-datepicker, .input-daterange').datepicker({weekStart: 1});
        		$('.input-datepicker-close').datepicker({weekStart: 1}).on('changeDate', function(e){ $(this).datepicker('hide'); });

				// Initialize Timepicker
		        $('.input-timepicker').timepicker({minuteStep: 1,showSeconds: true,showMeridian: true});
		        $('.input-timepicker24').timepicker({minuteStep: 1,showSeconds: true,showMeridian: false});
			})
		});

		// add 
		add.click(function () {
			to = '/activities/create';
			resetForm($('#form-add-activities'));
		});

		// delete
		body.on('click', del.selector, function (e) 
		{
			e.preventDefault();
			data    = {'Activity[belong_to]': $(this).data('belongTo')};

			if (confirm('Are you sure to delete it?')) 
			{
				postData($(this).data('to'), data, update, function () {
				});
			}
		});

		body.on('submit', form.selector, function (e) {
			e.preventDefault();
			e.stopImmediatePropagation();
			form = $('#form-add-activities');
			postData(to, form.serializeArray(), update, function () {
					addWrap();
					form.find('.btn-close').trigger('click');
					form.trigger("reset");
				});
			
		});

		body.on('click', viewMore.selector, function (e) {
			e.preventDefault();
			var to   = $(this).data('to') + more,
				data = {'Activity[belong_to]': $(this).data('belongTo')};

			postData(to, data, update, function () {
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
					form.trigger("reset");
					form.yiiActiveForm('resetForm');
				});

		});
	}

	var actionMSchedule = function () {
		var form = $('#form-add-message-schedule'),
			update = $(form.data('update')),
			add = $('.btn-add-mschedule'),
			to    = '/mschedules/create';

		body.on('click', '#list-mschedules .btn-edit-mschedule', function (e) {
			to = $(this).data('to');
			// load former data
			update = $($(this).data('update'));
			postData($(this).data('load'), '', update, function () {
					$('#which-event').depdrop({
						url: '/messages/getevent',
						depends: ['relation']
					});
					$('#send-on').depdrop({
						url: '/messages/getsendtype',
						depends: ['which-event']
					});

					/* cron select */
					$('.cron-select').cron({
						initial: "00 00 * * *",
					});
					
					/* chained select */
					// $("#series").chained("#mark");
					$("#model").chained("#series");
					
					/*------------------------------------------------
					 Tab
					 -------------------------------------------------*/

					$("[href=#tab-periodically]").click(function () {
						$('#which-event').attr('disabled', 'disabled');
						$('#send-on').attr('disabled', 'disabled');
						$('#schedule-type').val(2);
					});

					$("[href=#tab-event-based]").click(function () {
						$('#relation').trigger('change');
						$('#schedule-type').val(1);
					});
				});
		});
		
		// add
		body.on('click', '.btn-add-mschedule', function (e) {
			to    = '/mschedules/create';
			form = $('#form-add-message-schedule');

		    form.find('input:text, input:password, input:file, select').val('');
		    form.find('input:radio, input:checkbox')
		         .removeAttr('checked').removeAttr('selected');
		    form.find('select#messageschedule-at_hour').val('00');
		    form.find('select#messageschedule-at_minute').val('00');
		    form.find('.cron-select select').val('day');
		    form.find('select.cron-time-hour').val('00');
		    form.find('select.cron-time-min').val('00');
		});

		// delete
		body.on('click', '#list-mschedules .btn-del-mschedule', function (e) {
			e.preventDefault();
			if (confirm('Are you sure to delete it?')) 
			{
				postData($(this).data('to'), {}, $('#list-mschedules'), function () {
				});
			}
		});

		body.on('submit', '#form-add-message-schedule', function (e) {
			e.preventDefault();
			e.stopImmediatePropagation();
			form = $('#form-add-message-schedule');
			update = $(form.data('update'));

			postData(to, form.serializeArray(), update, function () {
					form.find('.btn-close').trigger('click');
					form.yiiActiveForm('resetForm');
				});
		});
	}

	var actionCSchedule =  function () {
		var form = $('#form-add-checklists-schedule'),
			update = $(form.data('update')),
			to    = '/cschedules/create';

		// edit
		body.on('click', '#list-cschedules .btn-edit-cschedules', function (e) {
			to = $(this).data('to');

			// load former data
			update = $($(this).data('update'));
			postData($(this).data('load'), '', update, function () {
					$('#which-event').depdrop({
						url: '/messages/getevent',
						depends: ['relation']
					});
					$('#send-on').depdrop({
						url: '/messages/getsendtype',
						depends: ['which-event']
					});

					$('#form-add-checklists-schedule .textarea-editor').wysihtml5();

					// 
					/* cron select */
					$('.cron-select').cron({
						initial: "00 00 * * *",
					});
					
					/* chained select */
					// $("#series").chained("#mark");
					$("#model").chained("#series");
					
					/*------------------------------------------------
					 Tab
					 -------------------------------------------------*/

					$("[href=#tab-periodically]").click(function () {
						$('#which-event').attr('disabled', 'disabled');
						$('#send-on').attr('disabled', 'disabled');
						$('#schedule-type').val(2);
					});

					$("[href=#tab-event-based]").click(function () {
						$('#relation').trigger('change');
						$('#schedule-type').val(1);
					});
				});
		});
		
		// add
		body.on('click', '#add-cschedule-btn', function (e) {
			to    = '/cschedules/create';
			form = $('#form-add-checklists-schedule');

			form.find('textarea').data("wysihtml5").editor.setValue('');	
		    form.find('input:text, input:password, input:file, select').val('');
		    form.find('input:radio, input:checkbox')
		         .removeAttr('checked').removeAttr('selected');
		    form.find('select#checklistschedule-at_hour').val('00');
		    form.find('select#checklistschedule-at_minute').val('00');
		    form.find('.cron-select select').val('day');
		    form.find('select.cron-time-hour').val('00');
		    form.find('select.cron-time-min').val('00');
		});

		// delete
		body.on('click', '#list-cschedules .btn-del-cschedules', function (e) {
			e.preventDefault();
			if (confirm('Are you sure to delete it?')) 
			{
				postData($(this).data('to'), {}, $('#list-cschedules'), function () {
				});
			}
		});

		body.on('submit', form.selector, function (e) {
			var form = $('#form-add-checklists-schedule'),
			update = $(form.data('update'));
			e.preventDefault();
			e.stopImmediatePropagation();
			postData(to, form.serializeArray(), update, function () {
					form.find('.btn-close').trigger('click');
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
				if (update.length !== 0 && res.errors == '') {
					updateRes(update, res.data);
				}

				if (res.errors == '')
					sCallback(res);

			},
			error: function (res) {
				alert('Opp oh! There are something wrong. Try again..')
			}
		});
	}	

	var actionMCSwitch = function (options) {
		var switchButton = options.button,
			toAdd = options.toAdd,
			toRe = options.toRe,
			dataOf = options.dataOf;

		switchButton.change(function () {
			if (dataOf == 'messages') {
				data = {'Msetting[messages_id]': $(this).data('messagesId'), 'Msetting[belong_to]': $(this).data('belongTo')};
			}
			else if (dataOf == 'checklists') {
				data = {'Csetting[checklists_id]': $(this).data('checklistsId'), 'Csetting[belong_to]': $(this).data('belongTo')};
			}
		
			if ($(this).is(':checked')) {
				postData(toAdd, data, '', function () {});
			}
			else {
				postData(toRe, data, '', function () {});
				
			}
		})
	}

	var actionMSwitch = function () {
		var button = $('#setting-messages .switch-action'),
			urlAdd = '/msettings/create',
			urlRe  = '/msettings/remove',
			dataOf = 'messages';

		actionMCSwitch({button : button, toAdd: urlAdd, toRe: urlRe, dataOf: dataOf});
	}

	var actionCSwitch = function () {

		var button = $('#checklists-settings .switch-action'),
			urlAdd = '/csettings/create',
			urlRe  = '/csettings/remove',
			dataOf = 'checklists';

		actionMCSwitch({button : button, toAdd: urlAdd, toRe: urlRe, dataOf: dataOf});
	}

	var actionChecklist = function () {
		// define
		var edit       = $('.btn-edit-checklist'),
			get        = '/checklists/getcontent',
			update     = $('#InputsWrapper'),
			saveChange = $('.save-checklist'),
			post       = '/checklists/savecontent',
			sendMail   = $('#sendmail-form'),
			id;

		// edit
		body.on('click', '#checklist .btn-edit-checklist, #choose-checklists .btn-edit-checklist', function (e) 
		{
			var belongTo = $(this).data('belongTo'),
				cowid = $(this).data('cowid');

				id = $(this).data('checklistId');
			var data = {'id': id, 'belong_to': belongTo, 'cowid': cowid};
				
			postData(get, data, update, function () {
				$('.cl-title, .cl-subtitle, .cl-label, .text, .textarea').editable();
			});
		});

		// delete
		body.on('click', '#checklist .btn-del-checklist', function (e) 
		{
			var update   = $('#cl-list'),
				belongTo = $(this).data('belongTo'),
				cowid = $(this).data('cowid');

			e.preventDefault();
			if (confirm('Are you sure to delete it?')) 
			{
				postData($(this).data('to'), {'belong_to': belongTo, 'cowid': cowid}, update, function () {
				});
			}
		});

		// send email
		body.on('click', '.btn-send-email', function (e) 
		{
			var idCls   = $(this).data('checklistId'),
				belongTo = $(this).data('belongTo');

			// assign idCls to cowid
			sendMail.find('#checklists_id').val(idCls);
			sendMail.find('#belong_to').val(belongTo);

		});
		// send email to client
		sendMail.submit(function (e) {
			e.preventDefault();
			e.stopImmediatePropagation();

			// re-assign post url
			post = '/checklists/sendmail';
			data = sendMail.serializeArray();
			postData(post, data, '', function () {
				$('.btn-cl-close').trigger('click');
				sendMail.trigger("reset");
				sendMail.yiiActiveForm('resetForm');
				// location.reload();
			});
		});
		// save alteration of checklist
		saveChange.click(function () {
			update.find('.editable-popup').remove();
			var data = {
					'id': id, 
					'content': update.html(), 
					'belong_to': $(this).data('belongTo'),
					'cowid': $(this).data('cowid')
				};
			postData(post, data, '', function () {
				$('.btn-cl-close').trigger('click');
				location.reload();
			});
		})
	}

	var actionFilter = function () {
		var to = '/filters',
			filter = $('#filter').find('a'),
			update = '',
			filterGroup = $('.filter-group');
			data = {};

		filter.click(function () {
			to = '/filters';
			filter.removeClass('active');
			update = $($(this).data('update'));
			data = {'model': $(this).data('model'), 'keyword': $(this).data('keyword')};
			postData(to, data, update, function () {

			});
			$(this).addClass('active');
			return false;
		});

		filterGroup.click(function () {
			to = '/filters/group';
			data = {'name': $(this).data('name')};
			update = $($(this).data('update'));

			postData(to, data, update, function () {

			});
		});
	}

	var resetForm =  function ($form) {
		$form.find('textarea').data("wysihtml5").editor.setValue('');	
	    $form.find('input:text, input:password, input:file, select, textarea').val('');
	    $form.find('input:radio, input:checkbox')
	         .removeAttr('checked').removeAttr('selected');
	}

	return {
        init: function() {
            uiInit(); // Initialize UI Code
        }
    };
}();
/* Initialize app when page loads */
$(function(){ Action.init(); });
