function do_login() {
	$('input[name=nama]').focus();
	$('#fLogin').submit(function (e) {
		e.preventDefault();

		$("#fLoginUser,#fLoginPassword").attr('disabled', true)
		$("#btnLogin").attr('disabled', true);

		var nm = $("input[name=nama]").val();
		var pw = $("input[name=kata_sandi]").val();


		if (!nm || !pw) {
			$.toast({
				heading: 'Informasi',
				text: 'Inputan mohon dilengkapi!',
				showHideTransition: 'fade',
				icon: 'info',
				allowToastClose: true,
				afterHidden: function () {
					$("#fLoginUser,#fLoginPassword").removeAttr('disabled')
					$("#btnLogin").removeAttr('disabled');
					$('input[name=nama]').focus();
				}
			});

			return false;
		}

		var elemt = $(this)[0];

		var event = new FormData(elemt);
		var url = event.target;

		$("#btnLogin").attr('disabled', true).html(`<em class="fa fa-spinner fa-spin"></em>&nbsp; Login`);
		$("#fLoginUser,#fLoginPassword").removeAttr('disabled').attr('readonly', true);

		$.ajax({
			type: "POST",
			url: url,
			data: $(this).serialize(),
			dataType: 'JSON',
			success: function (data) {
				if (data.code === 200) {
					$.toast({
						heading: 'Sukses',
						text: data.msg,
						showHideTransition: 'fade',
						icon: 'success',
						allowToastClose: true,
						afterHidden: function () {
							window.location = data.redirect;
						}
					});

					return true;
				} else {
					$.toast({
						heading: 'Peringatan',
						text: data.msg,
						showHideTransition: 'fade',
						icon: 'error',
						allowToastClose: true,
						afterHidden: function () {
							$("#fLoginUser,#fLoginPassword").removeAttr('disabled').removeAttr('readonly');
							$("#btnLogin").removeAttr('disabled').text('Login');
						}
					});

					return false;
				}
			}
		});
	});
}

function do_remember_me() {
	$(function () {
		if (localStorage.chkbx && localStorage.chkbx != '') {
			$('#remember_me').attr('checked', 'checked');
			$('#fLoginUser').val(localStorage.usrname);
			$('#fLoginPassword').val(localStorage.pass);
		} else {
			$('#remember_me').removeAttr('checked');
			$('#fLoginUser').val('');
			$('#fLoginPassword').val('');
		}

		$('#remember_me').click(function () {

			if ($('#remember_me').is(':checked')) {
				localStorage.usrname = $('#fLoginUser').val();
				localStorage.pass = $('#fLoginPassword').val();
				localStorage.chkbx = $('#remember_me').val();
			} else {
				localStorage.usrname = '';
				localStorage.pass = '';
				localStorage.chkbx = '';
			}
		});
	});
}

function loadValid() {
	$("input#fLoginUser").on('input', function () {
		var elemt = $(this);
		if (elemt.val().length > 0) {
			elemt.closest('div#validusrname').removeClass('alert-validate');
		}
	});

	$("input#fLoginPassword").on('input', function () {
		var elemt = $(this);
		if (elemt.val().length > 0) {
			elemt.closest('div#validpass').removeClass('alert-validate');
		}
	});
}

$(document).ready(function () {
	do_login();
	do_remember_me();
	loadValid();

	$('body').jpreLoader({
		preMainSection: '#main-preloader',
		prePerText: '.preloader-percentage-text',
		preBar: '.preloader-bar',
	});
});
