/**
 * toastr tips custom modal
 * This is the global variable
**/

/**
 * 成功提示
 * @param text 內容
 * @param title 標題
 */
var success = window.success = function (text, title) {
	toastr.options = {
		"closeButton": true,
		"debug": false,
		"positionClass": "toast-center",
		"onclick": null,
		"showDuration": "1000",
		"hideDuration": "1000",
		"timeOut": "5000",
		"extendedTimeOut": "1000",
		"showEasing": "swing",
		"hideEasing": "linear",
		"showMethod": "fadeIn",
		"hideMethod": "fadeOut"
	}
	toastr.success(text, title);
} 

/**
 * 失敗提示
 * @param text 內容
 * @param title 標題
 */
var error = window.error = function (text, title) {
	toastr.options = {
		"closeButton": true,
		"debug": false,
		"positionClass": "toast-center",
		"onclick": null,
		"showDuration": "1000",
		"hideDuration": "1000",
		"timeOut": "5000",
		"extendedTimeOut": "1000",
		"showEasing": "swing",
		"hideEasing": "linear",
		"showMethod": "fadeIn",
		"hideMethod": "fadeOut"
	}
	toastr.error(text, title);
}

/**
 * 資訊提示
 * @param text 內容
 * @param title 標題
 */
var info = window.info = function (text, title) {
	toastr.options = {
		"closeButton": false,
		"debug": false,
		"positionClass": "toast-center",
		"onclick": null,
		"showDuration": "1000",
		"hideDuration": "1000",
		"timeOut": "5000",
		"extendedTimeOut": "1000",
		"showEasing": "swing",
		"hideEasing": "linear",
		"showMethod": "fadeIn",
		"hideMethod": "fadeOut"
	}
	toastr.info(text, title);
}

/**
 * 警告提示
 * @param text 內容
 * @param title 標題
 */
var warning =  window.warning = function (text, title) {
	toastr.options = {
		"closeButton": false,
		"debug": false,
		"positionClass": "toast-center",
		"onclick": null,
		"showDuration": "1000",
		"hideDuration": "1000",
		"timeOut": "5000",
		"extendedTimeOut": "1000",
		"showEasing": "swing",
		"hideEasing": "linear",
		"showMethod": "fadeIn",
		"hideMethod": "fadeOut"
	}
	toastr.warning(text, title);
}

window.alert, alert = info;