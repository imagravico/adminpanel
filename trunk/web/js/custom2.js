(function ($) {

	$.fn.actionForm = function (options) {
		var dfOptions = {},
			opts = $.extend({}, dfOptions, options),
			// define it to handles on method on()
			body = $(document.body),
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

		var dfOptions = {},
			opts = $.extend({}, dfOptions, options),
			// define it to handles on method on()
			body = $(document.body)
			form = $(this);

		var add = function () {

		}

		var edit = function () {

		}

		var remove = function () {

		}

		var updateContent = function () {

		}

		var postData = function () {

		}


		var uiInit = function () {
			// initializing
			if (opts.cancel) {
				cancel();
			}

			if (opts.del) {
				del();
			}

			if (opts.add) {
				add();
			}

			if (opts.edit) {
				edit();
			}
		}

		uiInit();
	}
})(jQuery);	

$('.form-actions').actionForm({'cancel': true, 'del': true})
$('#client-form').actionAjaxForm();

