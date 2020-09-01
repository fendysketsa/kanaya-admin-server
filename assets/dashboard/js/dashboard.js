function logOut() {
	$(".sign-out-please").on('click', function () {
		swal({
				title: "Keluar dari sistem?",
				text: "Anda akan diarahkan keluar dari sistem!",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					window.location.href = base_url + '/auth/logout';
				}
			});
	});
}

$(document).ready(function () {
	logOut();
});
