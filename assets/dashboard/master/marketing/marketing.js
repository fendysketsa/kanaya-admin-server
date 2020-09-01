function loadForm() {
	$(".add-produk").on('click', function () {
		$(".load-form").load(base_url + '/admin/marketing/form', function (r, s, x) {
			if (s === 'error') {
				console.log('Loaded failed!');
				return false;
			} else {
				formAttribute();

			//	$('.input-image-produk').imageUploader();
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
		var url = base_url + "/marketing/remove";

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
		var url = base_url + "/admin/marketing/form";

		$.ajax({
			url: url,
			method: "POST",
			data: {
				id: ID
			},
			success: function (data) {
				$('#formModalProduk').modal('show');
				console.log('dada');
				$(".load-form").html(data);
				console.log(data);
			},
			complete: function () {
				var UrlUp = $(".load-form").closest('.container-fluid').find('form').removeAttr('action');
				UrlUp.attr('action', base_url + 'marketing/update');
				formAttribute();
			}
		});
	});
}
// load table
function loadData() {
	$(".load-data").load(base_url + '/admin/marketing/data', function (r, s, x) {
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
			"url": base_url + "/marketing/json",
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
				"data": "nama"
			},
			{
				"data": "kecamatan"
			},
			{
				"data": "email"
			},
			{ 
				"data": "telepon"
			},
			{
				"render" : function(data, type, row){
					
					if(row.foto != null){
   					  return "<image style='max-height: 80px;' src="+row.foto+">";
					}else{
					  return "<image style='max-height: 80px;' src='https://upload.wikimedia.org/wikipedia/commons/3/34/PICA.jpg'>";
					}
					// let image = "<image style='max-height: 80px;' src="+row.foto+">";
					// return image;
				}
			},
			{
				"data": "manager"
			},
			{
				"data": "saldo"
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

			return "false";
		}else{
			return "dada";
		}
	});
}

function submit() {
	//$('input[name=kode]').focus();
	//alert(22);
	//validatedForm();

	//let fr = new FormData($('form#formMarketing'));

// 	document.querySelector('#formMarketing').addEventListener('submit', (e) => {
//   const formData = new FormData(e.target);
//     console.log(formData);
// });


	$('form#formMarketing').submit(function (e) {
		e.preventDefault();
		var elemt = $(this)[0];
		//console.log(elemt.action);

		var datum = new FormData(this);
		console.log(datum); 

		validatedForm();
		//alert(434234);
		let base_url = window.location.origin +"/marketing/store";

		$.ajax({
			type: "POST",
			url: base_url,
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

function provinsi(){
	alert(32);
}

$(document).ready(function () {
	loadForm();

	loadData();
	//submit();

	 $('#submit_marketing').on('click', function(e){
		$('#ok_sub').click();
	  });


});
