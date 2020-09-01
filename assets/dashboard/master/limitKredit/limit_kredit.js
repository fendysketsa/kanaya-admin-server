function loadForm() {
	$(".load-form").load(base_url + '/admin/limit-kredit/form', function (r, s, x) {
		if (s === 'error') {
			console.log('Loaded failed!');
			return false;
		} else {
			formAttribute();
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

function remove(page) {
	$(document).on('click', '.hapus', function () {

		var ID = $(this).data('id');
		var url = base_url + "/limKredit/remove";

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

function loadFormEdit() {

	$(document).on('click', '.edit', function () {

		NoClick($(this));

		$(".load-form").html(`<em class="fa fa-spin fa-spinner"></em> Loading...`);

		var ID = $(this).data('id');
		var url = base_url + "/admin/limit-kredit/form";

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
				UrlUp.attr('action', base_url + 'limKredit/update');
				formAttribute();
			}
		});
	});
}

function loadData() {
	$(".load-data").load(base_url + '/admin/limit-kredit/data', function (r, s, x) {
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
			"targets": [0, 2, 6]
		}],
		fixedColumns: true,
		"order": [
			[0, 'DESC']
		],
		"paging": true,
		"processing": true,
		"serverSide": true,
		"ajax": {
			"url": base_url + "/limKredit/json",
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
				"data": "nama",
				"render": function (i) {
<<<<<<< HEAD
					return i === 'basic' ? 'Basic (200K-700K)' : 'Advanced (800K-1300K)'
=======
					return i === 'basic' ? 'Basic (200K-500K)' : 'Advanced (600K-1000K)'
>>>>>>> 312f98360f2f18ba7d5c80fd587c3596ca41ebde
				}
			},
			{
				"data": "limit",
				"render": formatRupiah
			},
			{
				"data": "dp",
				"render": formatRupiah
			},
			{
				"data": "angsuran",
				"render": formatRupiah
			},
			{
				"data": "x_week",
				"render": formatRupiah
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
	UrlUp.attr('action', base_url + 'limKredit/store');
}

function formAttribute() {
	$("input[name=limit]").focus();
	$(".act-batal").on('click', function () {
		$(".load-form").html(`<em class="fa fa-spin fa-spinner"></em> Loading...`);
		loadForm();
		var UrlUp = $(".load-form").closest('.container-fluid').find('form').removeAttr('action');
		UrlUp.attr('action', base_url + 'limKredit/store');
		loadAvClick();
	});
	loadSelect('nama', 'Kategori')
	$("input[type=rupiah]").on('input', function (e) {
		var values = $(this);
		var retVal = formatRupiah(values.val())
		values.val(retVal)
	});
}

function formatRupiah(_bilangan) {
	var bilangan = _bilangan;

	var number_string = bilangan.replace(/[^,\d]/g, '').toString(),
		sisa = number_string.length % 3,
		rupiah = number_string.substr(0, sisa),
		ribuan = number_string.substr(sisa).match(/\d{3}/g);

	if (ribuan) {
		separator = sisa ? '.' : '';
		rupiah += separator + ribuan.join('.');
	}

	return rupiah
}

function loadSelect(nm, cat) {
	var idSelect = $("input[name=id]");
	var selected_ = !idSelect.val() ? '' : idSelect.data('selected');
	var data = [
<<<<<<< HEAD
		['basic', 'Basic (200K-700K)'],
		['advanced', 'Advanced (800K-1300K)']
=======
		['basic', 'Basic (200K-500K)'],
		['advanced', 'Advanced (600K-1000K)']
>>>>>>> 312f98360f2f18ba7d5c80fd587c3596ca41ebde
	]
	var html = '<option value="">Pilih ' + cat + '...</option>';
	$.each(data, function (i, j) {
		var selted = !selected_ ? '' : (selected_ == j[0] ? 'selected' : '');
		html += '<option ' + selted + ' value="' + j[0] + '">' + j[1] + '</option>';
	});
	$("select[name=" + nm + "]").append(html);

	return false;
}

function validatedForm() {
	disableForm();

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

function disableForm(enable) {
	var act = enable || '';

	if (!act) {
		$('input,textarea,select').attr('readonly', true);
		$(".saving").attr({
			'href': 'return false;',
			'type': 'button'
		}).addClass('disabled');
		return false;
	}

	if (act == 'active') {
		$('input,textarea,select').removeAttr('readonly');
		$(".saving").attr({
			'href': 'javascript:void(0);',
			'type': 'submit'
		}).removeClass('disabled');
	}
}

function submit() {
	$('input[name=limit]').focus();

	$('form#formLimitKredit').submit(function (e) {
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
					loadForm();
					loadFirstForm();
					return true;
				} else {
					const wrapper = document.createElement('div');
					wrapper.innerHTML = data.msgContent;
					swal({
						title: "Peringatan!",
						text: data.msg,
						content: wrapper,
						icon: "info",
						timer: 2000,
						button: false
					});
					return false;
				}
			},
			complete: function () {
				disableForm('active');
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
