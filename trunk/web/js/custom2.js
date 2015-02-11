(function ($) {

	$.fn.actionForm = function (options) {
		var dfOptions = {},
			opts = $.extend({}, dfOptions, options),
			form = this;

		var cancel = function () {
			var obj = form.find('.cancel');
			// cancel
			obj.click(function (e) {
				e.preventDefault();
				window.location.href = obj.data('redirect');
			});
		}

		var del = function () {
			var obj = form.find('.del');
			// delete
			obj.click(function (e) {
				e.preventDefault();
				if (confirm('Are you sure to delete it?')) {
					window.location.href = obj.data('redirect');
				}
			});
		}

		var uiInit = function () {
			// initializing
			if (opts.cancel) {
				cancel();
			}
			if (opts.del) {
				del();
			}
		}
		uiInit();
	}

	$.fn.actionAjaxForm = function (options) {

		var dfOptions = {
				'close' : false,
				'resetForm': true
			},

			opts = $.extend({}, dfOptions, options),
			// define it to handles on method on()
			body = $(document.body)
			form = this,
			close = $('.btn-close');

		var add = function () {
			// add new 
			form.submit(function (e) {
				e.preventDefault();
				var data = form.serializeArray();

				postData(opts.ajaxTo, data, $(opts.update), function (update, res) {
					// close popup after saving database
					if (opts.close) 
						close.trigger('click');
					if (options.resetForm)
						form.trigger('reset');

					updateContent(update, res);
				});
			});
		}

		var edit = function () {
			
		}

		var remove = function () {
			
		}

		var updateContent =  function (obj, res) {
			if (obj != undefined) {
				obj.empty();
				obj.html(res);
			}
		}

		var postData = function (to, data, update, upCallback) {
			$.ajax({
				url: to,
				type: 'POST',
				data: data,
				success: function (res) {
					upCallback(update, res); 
				},
				error: function (res) {
					alert('Opp oh! There are something wrong. Try again..')
				}
			});
		}

		var uiInit = function () {
			// initializing
			add();			
		}
		uiInit();

	}
})(jQuery);	

$('.form-actions').actionForm({'cancel': true, 'del': true})
$('#form-add-group').actionAjaxForm({
	'update' : '#list-group',
	'ajaxTo' : 'groups/create',
});

