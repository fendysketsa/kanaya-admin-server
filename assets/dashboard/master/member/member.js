function loadForm() {
	$(".add-produk").on('click', function () {
		$(".load-form").load(base_url + '/admin/produk/form', function (r, s, x) {
			if (s === 'error') {
				console.log('Loaded failed!');
				return false;
			} else {
				formAttribute();
				$('.input-image-produk').imageUploader();
			}
		});
	});
}

function LoadToPages() {
	var elemtTb = $('table#dataView').DataTable();
	var dTbPageInfo = elemtTb.page.info().page;
	var length = $('table#dataView tbody tr').length;
	var NewPage = dTbPageInfo;

	if (length == 1 && dTbPageInfo == 1) {
		NewPage = 0;
	}

	elemtTb.page(NewPage).draw('page');
}

function remove(page) {
	$(document).on('click', '.hapus', function () {

		var ID = $(this).data('id');
		var url = base_url + "/member/remove";

		swal({
			title: "Peringatan",
			text: "Anda yakin menghapus data ini?",
			icon: "warning",
			buttons: [
				'Batal',
				'Hapus'
			],
			dangerMode: true,
		}).then((willDelete) => {
			if (willDelete) {

				$.ajax({
					url: url,
					method: "POST",
					data: {
						id: ID
					},
					dataType: "JSON",
					error: function () {
						swal('Error', 'Proses menghapus data error!', 'error');
					},
					success: function (data) {

						if (data.code == '200') {
							swal('Sukses', data.msg, 'success');
						}
						if (data.code == '500') {
							swal('Error', data.msg, 'error');
						}
					},
					complete: function () {
						LoadToPages()
					}
				});
			}
		});
	});
}

function deactive(page) {
	$(document).on('click', '.deactive', function () {

		var ID = $(this).data('id');
		var stat = $(this).data('stat');
		var name = $(this).data('name');
		var message = "Apakah anda ingin " + (stat == 1 ? "memblokir" : "membuka blokir") + "  member " + name + ' ?';
		var DT = stat == 1 ? 0 : 1;

		var url = base_url + "/member/deactive";

		swal({
			title: "Peringatan",
			text: message,
			icon: "warning",
			buttons: [
				'Batal',
				'Lanjut'
			],
			dangerMode: true,
		}).then((willDelete) => {
			if (willDelete) {

				$.ajax({
					url: url,
					method: "POST",
					data: {
						id: ID,
						dt: DT,
					},
					dataType: "JSON",
					error: function () {
						swal('Error', 'Proses  error!', 'error');
					},
					success: function (data) {

						if (data.code == '200') {
							swal('Sukses', data.msg, 'success');
						}
						if (data.code == '500') {
							swal('Error', data.msg, 'error');
						}
					},
					complete: function () {
						LoadToPages()
					}
				});
			}
		});
	});
}

function acc(page) {
	$(document).on('click', '.account', function () {

		var ID = $(this).data('id');
		var stat = $(this).data('stat-acc');
		var name = $(this).data('name');
		var message = "Apakah anda ingin " +(!stat ? "membuka akun real" : (stat == 'real' ? "menutup akun real" : "membuka akun real"))  + "  member " + name + ' ?';
		var DT = (!stat ? 'real' : (stat == 'real' ? 'dummy' : 'real'));

		var url = base_url + "/member/acc_";

		swal({
			title: "Peringatan",
			text: message,
			icon: "warning",
			buttons: [
				'Batal',
				'Lanjut'
			],
			dangerMode: true,
		}).then((willDelete) => {
			if (willDelete) {

				$.ajax({
					url: url,
					method: "POST",
					data: {
						id: ID,
						dt: DT,
					},
					dataType: "JSON",
					error: function () {
						swal('Error', 'Proses  error!', 'error');
					},
					success: function (data) {

						if (data.code == '200') {
							swal('Sukses', data.msg, 'success');
						}
						if (data.code == '500') {
							swal('Error', data.msg, 'error');
						}
					},
					complete: function () {
						LoadToPages()
					}
				});
			}
		});
	});
}

function loadAvClick() {
	var elemtTable = $("table#dataView tbody tr").find('.edit');
	elemtTable.closest('span')
		.find('a.disabled')
		.removeClass('text-dark disabled not-click')
		.addClass('text-danger hapus');

	$.each(elemtTable, function (i, d) {
		var newId = $(this).closest('span').find('a.edit').data('id');
		$(this).closest('span').find('a.hapus').attr('data-id', newId);
	});
	notClickDelete();
}

function notClickDelete() {
	$(document).on('click', '.not-click', function () {
		swal({
			title: "Informasi!",
			text: "Anda dalam mode edit!\nSilakan batal atau simpan untuk menghapus data!",
			icon: "info",
			timer: 2000,
			button: false
		});
	});
}

function NoClick(elemt) {
	loadAvClick();

	elemt.closest('span')
		.find('a.hapus')
		.removeClass('text-danger hapus')
		.addClass('text-dark disabled not-click')
		.removeAttr('data-id');
}

function loadFormEdit() {

	$(document).on('click', '.edit', function () {

		NoClick($(this));

		$(".load-form").html(`<em class="fa fa-spin fa-spinner"></em> Loading...`);

		var ID = $(this).data('id');
		var url = base_url + "/admin/member/form";

		$.ajax({
			url: url,
			method: "POST",
			data: {
				id: ID
			},
			success: function (data) {
				$('#formModalProduk').modal('show');
				$(".load-form").html(data);
			},
			complete: function () {
				var UrlUp = $(".load-form").closest('.container-fluid').find('form').removeAttr('action');
				UrlUp.attr('action', base_url + 'member/update');
				formAttribute();
			}
		});
	});
}
// load table
function loadData() {
	$(".load-data").load(base_url + '/admin/member/data', function (r, s, x) {
		if (s === 'error') {
			console.log('Loaded failed!');
			return false;
		} else {
			dataAttribute();
		}
	});
}

function dataAttribute() {

	var table_ = $('#dataView').DataTable({
		"columnDefs": [{
			"searchable": false,
			"orderable": false,
			"class": "index",
			"targets": [0, 3, 4]
		}],
		fixedColumns: true,
		"order": [
			[0, 'DESC']
		],
		"paging": true,
		"processing": true,
		"serverSide": true,
		"ajax": {
			"url": base_url + "/member/json",
			"type": "POST"
		},
		"deferRender": true,
		"aLengthMenu": [5, 10, 15, 25, 50],
		"pageLength": 10,
		"columns": [{
			'data': 'id',
			render: function (data, type, row, meta) {
				return meta.row + meta.settings._iDisplayStart + 1;
			}
		},
		{
			"data": "no_member"
		},
		{
			"data": "nama"
		},
		{
			"data": "tanggal_lahir"
		},
		{
			"data": "telepon"
		},
		{
			"data": "email"
		},
		{
			"render": function (data, type, row, meta) {
				var img;

				if (!row.foto && row.foto === null) {
					img = '<span class="btn btn-warning btn-sm">No Image</span>'
				} else {

					img = `<a class="lightbox load-img-` + (meta.row + 1) + `" href="#zoom-image-` + (meta.row + 1) + `">
									<img src="` + row.foto + `" />
							</a>
								<div class="lightbox-target" id="zoom-image-` + (meta.row + 1) + `">
									<img src="` + row.foto + `" />
									<a class="lightbox-close" href="javascript:close()"></a>
									<div class="lightbox-rotate">
										<a class="lightbox-rotate-a left-rotate" href="javascript:left()">
											<em class="fa fa-undo text-primary icon-rotate"></em>
										</a>
										<a class="lightbox-rotate-a right-rotate" href="javascript:right()">
											<em class="fa fa-redo text-primary icon-rotate"></em>
										</a>
									</div>
							</div>`;

				}
				return img;
			}
		},
		{
			"render": function (data, type, row) {

				if (row.status == 1) {
					return "<em class='badge badge-success'>aktif</em>";
				} else {
					return "<em class='badge badge-info'>tidak aktif</em>";
				}

			}
		},
		{
			"render": function (data, type, row) {

				if (row.account == 'real') {
					return "<em class='badge badge-info'>Real</em>";
				} else {
					return "<em class='badge badge-warning'>Dummy</em>";
				}

			}
		},
		{
			"data": "tanggal_terdaftar"
		},
		{
			"data": "point"
		},
		{
			"render": function (data, type, row) {
				var html = `<div style="float: left; position: absolute; display: flex;"><span class="btn-group">
								<a href="javascript:void(0);" class="edit text-info" data-id="` + row.id + `">
									<em class="fa fa-edit"></em></a>&nbsp;
							</span>
					`;

				if (row.status == 0) {
					html += `<span class="btn-group">
									<a href="javascript:void(0);" class="deactive text-danger" title="Unblong Member" data-id="` + row.id + `" data-stat="` + row.status + `" data-name="` + row.nama + `">
										<em class="fa fa-ban"></em></a>&nbsp;
								</span>
						`;
				} else if (row.status == 1) {
					html += `<span class="btn-group">
									<a href="javascript:void(0);" class="deactive text-green" title="Blog Member" data-id="` + row.id + `" data-stat="` + row.status + `" data-name="` + row.nama + `">
										<em class="fa fa-check"></em></a>&nbsp;
								</span>
						`;
				} 
				
				if (row.account == 'dummy' || !row.account) {
					html += `<span class="btn-group">
									<a href="javascript:void(0);" class="account text-warning" title="Akun Dummy Member" data-id="` + row.id + `" data-stat-acc="` + row.account + `" data-name="` + row.nama + `">
										<em class="fa fa-user"></em></a>&nbsp;
								</span>
						`;
				} else if (row.account == 'real') {
					html += `<span class="btn-group">
									<a href="javascript:void(0);" class="account text-info" title="Akun Real Member" data-id="` + row.id + `" data-stat-acc="` + row.account + `" data-name="` + row.nama + `">
										<em class="fa fa-user"></em></a>&nbsp;
								</span>
						`;
				}
				
				html += `</div>`
			
				return html;
			}
		},

		]

	});

	$("select[name=dataView_length]").on('change', function () {
		loadTable(table_)
	});
	$("input[type=search]").on('input', function (e) {
		loadTable(table_)
	});

	loadFormEdit();
	remove();
	deactive();
	acc();
}

var rotate = 0;

function close() {
	rotate = 0;
	window.location.href = '/admin/member#';
	$('#dataView').find('td > .lightbox-target').find('img').removeAttr('style')
	return rotate;
}

function left() {
	rotate -= 90
	$('#dataView').find('td > .lightbox-target').find('img').attr('style', 'transform:rotate(' + rotate + 'deg)')
}

function right() {
	rotate += 90
	$('#dataView').find('td > .lightbox-target').find('img').attr('style', 'transform:rotate(' + rotate + 'deg)')
}

function loadTable(table_) {
	var ins = $("input[name=id]").val() || 0;
	var response_load_dt = function () {
		$(".rmv-" + ins).addClass('text-dark disabled').removeAttr('data-id');
	};

	table_.ajax.reload(response_load_dt);
}

function loadFirstForm() {
	var UrlUp = $(".load-form").closest('.container-fluid').find('form').removeAttr('action');
	UrlUp.attr('action', base_url + 'produk/store');
}

function formAttribute() {
	$("input[name=kode]").focus();
	$(".act-batal").on('click', function () {
		$(".load-form").html(`<em class="fa fa-spin fa-spinner"></em> Loading...`);
		loadForm();
		var UrlUp = $(".load-form").closest('.container-fluid').find('form').removeAttr('action');
		UrlUp.attr('action', base_url + 'produk/store');
		loadAvClick();

	});


}

function validatedForm() {
	var elemt = $("input.required");

	$.each(elemt, function (i, d) {
		var val = $(this).val();
		if (!val) {

			swal({
				title: "Peringatan!",
				text: "Lengkapi isian data Anda!",
				icon: "info",
				timer: 2000,
				button: false
			});

			return false;
		}
	});
}

function submit() {
	$('input[name=kode]').focus();

	$('form#formMarketing').submit(function (e) {
		e.preventDefault();
		var elemt = $(this)[0];

		validatedForm();

		$.ajax({
			type: "POST",
			url: elemt.action,
			data: new FormData(this),
			dataType: 'JSON',
			contentType: false,
			cache: false,
			processData: false,
			success: function (data) {
				if (data.code === 200) {
					$('#formModalProduk').modal('hide');
					LoadToPages();
					loadForm();
					loadFirstForm();
					return true;
				} else {
					return false;
				}
			}
		});

		return false;
	});
}




$(document).ready(function () {
	loadForm();

	loadData();
	submit();
});
