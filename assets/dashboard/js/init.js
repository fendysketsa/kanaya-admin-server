function logOut() {
	$(".sign-out-please").on('click', function () {
		swal({
				title: "Keluar dari sistem?",
				text: "Anda akan diarahkan keluar dari sistem!",
				icon: "warning",
				buttons: ['Batal', 'Ya'],
				dangerMode: true,
			})
			.then((willOut) => {
				if (willOut) {
					window.location.href = base_url + '/auth/logout';
				}
			});
	});
}

$(document).ready(function () {
	logOut();
});
