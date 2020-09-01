function loadForm(area) {
	$(".load-form").load(base_url + '/admin/wilayah/form?' + area, function (r, s, x) {
		if (s === 'error') {
			console.log('Loaded failed!');
			return false;
		} else {
			formAttribute(area);
		}
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

function remove(area) {
	$(document).on('click', '.hapus', function () {

		var ID = $(this).data('id');
		var url = base_url + "/wilayah/remove?" + area;

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

function loadFormEdit(area) {

	$(document).on('click', '.edit', function () {

		NoClick($(this));

		$(".load-form").html(`<em class="fa fa-spin fa-spinner"></em> Loading...`);

		var ID = $(this).data('id');
		var url = base_url + "/admin/wilayah/form?" + area;

		$.ajax({
			url: url,
			method: "POST",
			data: {
				id: ID
			},
			success: function (data) {
				$(".load-form").html(data);
			},
			complete: function () {
				var UrlUp = $(".load-form").closest('.container-fluid').find('form').removeAttr('action');
				UrlUp.attr('action', base_url + 'wilayah/update?' + area);
				formAttribute(area);
			}
		});
	});
}

function loadData(area) {
	$(".load-data").load(base_url + '/admin/wilayah/data?' + area, function (r, s, x) {
		if (s === 'error') {
			console.log('Loaded failed!');
			return false;
		} else {
			dataAttribute(area);
		}
	});
}

function dataAttribute(area) {

	if (area == 'area=provinsi') {
		columns_ = [{
				'data': 'id',
				render: function (data, type, row, meta) {
					return meta.row + meta.settings._iDisplayStart + 1;
				}
			},
			{
				"data": "kode"
			},
			{
				"data": "nama"
			},
			{
				"render": function (data, type, row) {
					var html = `<span class="btn-group">
									<a href="javascript:void(0);" class="edit text-info" data-id="` + row.id + `">
										<em class="fa fa-edit"></em></a>&nbsp;
									<a href="javascript:void(0);" class="hapus rmv-` + row.id + ` text-danger" data-id="` + row.id + `">
										<em class="fa fa-trash"></em></a>
								</span>
						`;

					return html
				}
			},

		];
	} else if (area == 'area=kota') {
		columns_ = [{
				'data': 'id',
				render: function (data, type, row, meta) {
					return meta.row + meta.settings._iDisplayStart + 1;
				}
			},
			{
				"data": "provinsi"
			},
			{
				"data": "kode"
			},
			{
				"data": "nama"
			},
			{
				"render": function (data, type, row) {
					var html = `<span class="btn-group">
									<a href="javascript:void(0);" class="edit text-info" data-id="` + row.id + `">
										<em class="fa fa-edit"></em></a>&nbsp;
									<a href="javascript:void(0);" class="hapus rmv-` + row.id + ` text-danger" data-id="` + row.id + `">
										<em class="fa fa-trash"></em></a>
								</span>
						`;

					return html
				}
			},

		];
	} else if (area == 'area=kecamatan') {
		columns_ = [{
				'data': 'id',
				render: function (data, type, row, meta) {
					return meta.row + meta.settings._iDisplayStart + 1;
				}
			},
			{
				"data": "provinsi"
			},
			{
				"data": "kota"
			},
			{
				"data": "kode"
			},
			{
				"data": "nama"
			},
			{
				"data": "kode_pos"
			},
			{
				"render": function (data, type, row) {
					var html = `<span class="btn-group">
									<a href="javascript:void(0);" class="edit text-info" data-id="` + row.id + `">
										<em class="fa fa-edit"></em></a>&nbsp;
									<a href="javascript:void(0);" class="hapus rmv-` + row.id + ` text-danger" data-id="` + row.id + `">
										<em class="fa fa-trash"></em></a>
								</span>
						`;

					return html
				}
			},

		];
	}

	var table_ = $('#dataView').DataTable({
		"columnDefs": [{
			"searchable": false,
			"orderable": false,
			"class": "index",
			"targets": [0, 2]
		}],
		fixedColumns: true,
		"order": [
			[0, 'DESC']
		],
		"paging": true,
		"processing": true,
		"serverSide": true,
		"ajax": {
			"url": base_url + "/wilayah/json?" + area,
			"type": "POST"
		},
		"deferRender": true,
		"aLengthMenu": [5, 10, 15, 25, 50],
		"pageLength": 10,
		"columns": columns_

	});

	$("select[name=dataView_length]").on('change', function () {
		loadTable(table_)
	});
	$("input[type=search]").on('input', function (e) {
		loadTable(table_)
	});

	loadFormEdit(area);
	remove(area);
}

function loadTable(table_) {
	var ins = $("input[name=id]").val() || 0;
	var response_load_dt = function () {
		$(".rmv-" + ins).addClass('text-dark disabled').removeAttr('data-id');
	};

	table_.ajax.reload(response_load_dt);
}

function loadFirstForm(area) {
	var UrlUp = $(".load-form").closest('.container-fluid').find('form').removeAttr('action');
	UrlUp.attr('action', base_url + 'wilayah/store?' + area);
}

function formAttribute(area) {
	$("input[name=kode]").focus();
	$(".act-batal").on('click', function () {
		$(".load-form").html(`<em class="fa fa-spin fa-spinner"></em> Loading...`);
		loadForm(area);
		var UrlUp = $(".load-form").closest('.container-fluid').find('form').removeAttr('action');
		UrlUp.attr('action', base_url + 'wilayah/store?' + area);
		loadAvClick();
	});

	var realArea = area.split('=')[1];

	if (realArea == 'kota') {
		loadSelect('provinsi');
	}

	if (realArea == 'kecamatan') {
		loadSelect('kota');
	}
}

function loadSelect(area) {
	var idSelect = $("input[name=id]");
	var selected_ = !idSelect.val() ? '' : idSelect.data('selected');

	$.ajax({
		type: "POST",
		url: base_url + 'wilayah/opt',
		data: {
			table: area
		},
		dataType: 'JSON',
		success: function (data) {
			var html = '<option value="">Pilih ' + area + '...</option>';
			$.each(data, function (i, j) {
				var selted = !selected_ ? '' : (selected_ == j.id ? 'selected' : '');

				html += '<option ' + selted + ' value="' + j.id + '">' + j.nama + '</option>';
			});
			$("select[name=" + area + "]").append(html);
		}
	});
	return false;
}

function validatedForm() {
	disableForm();

	var elemt = $(".required");

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

function disableForm(enable) {
	var act = enable || '';

	if (!act) {
		$('input,textarea').attr('readonly', true);
		$(".saving").attr({
			'href': 'return false;',
			'type': 'button'
		}).addClass('disabled');
		return false;
	}

	if (act == 'active') {
		$('input,textarea').removeAttr('readonly');
		$(".saving").attr({
			'href': 'javascript:void(0);',
			'type': 'submit'
		}).removeClass('disabled');
	}
}

function submit(area) {
	$('input[name=kode]').focus();

	$('form#formWilayah').submit(function (e) {
		e.preventDefault();
		var elemt = $(this)[0];

		validatedForm();

		$.ajax({
			type: "POST",
			url: elemt.action,
			data: $(this).serialize(),
			dataType: 'JSON',
			success: function (data) {
				if (data.code === 200) {
					LoadToPages();
					loadForm(area);
					loadFirstForm(area);
					return true;
				} else {
					swal({
						title: "Peringatan!",
						text: data.msg,
						icon: "info",
						timer: 2000,
						button: false
					});
					return false;
				}
			},
			complete: function () {
				disableForm('active')
			}
		});

		return false;
	});
}

$(document).ready(function () {
	var area_ = $("form.user").attr('action').split('?')[1];

	loadForm(area_);
	loadData(area_);
	submit(area_);
});
