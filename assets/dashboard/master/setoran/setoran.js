function loadForm() {
	$(".add-produk").on('click', function () {
		$(".load-form").load(base_url + '/admin/setoran/form', function (r, s, x) {
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
	$(document).on('click', '.opt', function () {

		var ID = $(this).data('id');
		var TYPE = $(this).data('type');
		var url = base_url + "/setoran/aprove";
		//alert(type);

		swal({
			title: "Peringatan",
			text: "Apakah Anda Ingin Menerima Setoran Ini?",
			icon: "warning",
			buttons: [
				'Batal',
				'Terima'
			],
			dangerMode: true,
		}).then((willDelete) => {
			if (willDelete) {

				$.ajax({
					url: url,
					method: "POST",
					data: {
						id: ID,
						type: TYPE
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
		var url = base_url + "/admin/setoran/form";

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
				UrlUp.attr('action', base_url + 'produk/update');
				formAttribute();
			}
		});
	});
}
// load table
function loadData() {
	$(".load-data").load(base_url + '/admin/setoran/data', function (r, s, x) {
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
			[5, "DESC"],
		],
		"paging": true,
		"processing": true,
		"serverSide": true,
		"ajax": {
			"url": base_url + "/setoran/json",
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
				"data": "pegawai"
			},
			{
				"data": "nominal"
			},
			{
				"data": "deskripsi"
			},
			{
				"render" : function (data, type, row) {
					if (row.status == 1) 
					{
						 return "success"
					} else if(row.status == 0) 
					{
						return "proses";
					}
					else
					{
						return "reject";
					}
				}
			},
			{
				"data" : "creted_at" 
			},
			{
				"data" : "handle_by" 
			},
			{
				"render": function (data, type, row) {
					if (row.status == 0)
					{
					var html = `<span class="btn-group">
									<a href="javascript:void(0);" class="opt rmv-` + row.id + ` text-danger" data-id="` + row.id + `" data-type="reject" title="tolak konfirmasi setoran">
										<em class="fa fa-ban fa-lg"></em></a> &nbsp;
									<a href="javascript:void(0);" class="opt rmv-` + row.id + ` text-success" data-id="` + row.id + `" data-type="aprove" title="terima konfirmasi setoran">
										<em class="fa fa-check fa-lg"></em></a>
								</span>
						`;

				}
				else {
					var html = `no action`;
				}
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
	deactive();
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

	$('form#formProduk').submit(function (e) {
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
