function loadForm() {
	$(".add-produk").on('click', function () {
		$(".load-form").load(base_url + '/admin/produk/form', function (r, s, x) {
			if (s === 'error') {
				console.log('Loaded failed!');
				return false;
			} else {
				formAttribute('add');
				validFile();
				loadCalendar();
				loadSelect('kategori')
			}
		});
	});
}

function loadSelect(table) {
	var idSelect = $("input[name=id]");
	var selected_ = !idSelect.val() ? '' : idSelect.data('selected');

	$.ajax({
		type: "POST",
		url: base_url + 'produk/opt',
		data: {
			table: table
		},
		dataType: 'JSON',
		success: function (data) {
			var html = '<option value="">Pilih ' + table + '...</option>';
			$.each(data, function (i, j) {
				var selted = !selected_ ? '' : (selected_ == j.id ? 'selected' : '');

				html += '<option ' + selted + ' value="' + j.id + '">' + j.nama + '</option>';
			});
			$("select[name=" + table + "]").append(html);
		}
	});
	return false;
}

function reloadImageContent() {
	$(".content-images").empty()
	var dataImage = $(".custom-file-container__image-multi-preview");
	for (var i = 0; i < dataImage.length; i++) {
		imgs = dataImage[i].style.cssText.split('url("')[1].split('");')[0];
		$(".content-images").append('<textarea name="imagebase[]" class="form-control hide" form="formProduk">' + imgs + '</textarea>')
	}

	if (dataImage.length >= 0) {
		$("input[name=images_selected]").val(dataImage.length)
	}
}

function validFile() {

	var ID = $('input[name=id]');
	if (ID.val()) {

		setTimeout(() => {
			if ($('input[name=images_selected]').val() == 0) {
				$("#loadImagesPrev").css({
					'min-height': '',
					'min-width': '',
					'background-position': 'inherit'
				});
				$("#remfileUpload").addClass('hide')
				$(".loadImgROl").removeClass('loadImgScroll')
				$("#loadImagesPrev").removeClass('custom-file-container__image-preview--active');
			}
		}, 500);


		if (ID.data('images')) {

			new FileUploadWithPreview('imagesProduk', {
				showDeleteButtonOnImages: !0,
				text: {
					chooseFile: "Cari!",
					browse: "Cari!",
					selectedCount: "Files Selected"
				},
				maxFileCount: 10,
				images: {
					baseImage: base_url + "assets/dashboard/upload/images/custom-image.png"
				},
				presetFiles: ID.data('images'),
			});

			$(".loadImgROl").addClass('loadImgScroll')


			$("#loadImagesPrev").addClass('custom-file-container__image-preview--active');

			$(".custom-file-container__image-clear").removeClass('hide')

		} else {
			new FileUploadWithPreview('imagesProduk');
		}
	} else {

		new FileUploadWithPreview('imagesProduk');
	}

	$("#remfileUpload").on('click', function (e) {
		$(".loadImgROl").removeClass('loadImgScroll')

		$("#loadImagesPrev").css({
			'min-height': '',
			'min-width': '',
			'background-position': 'inherit'
		});

		if ($("#fileUpload")[0].files.length >= 0) {
			$("input[name=images_selected]").val($("#fileUpload")[0].files.length)
		}
	});

	$("#fileUpload").on('change', function (e) {
		var val_ = $(this)[0].files.length;

		if (val_ > 0) {
			$(".loadImgROl").addClass('loadImgScroll')
			$("#remfileUpload").removeClass('hide');


			$("#loadImagesPrev").addClass('custom-file-container__image-preview--active').css({
				'min-height': '150vh',
				'min-width': '150vh'
			});

			setTimeout(() => {
				reloadImageContent();
			}, 500);

		} else {
			$(".loadImgROl").removeClass('loadImgScroll')
			$("#remfileUpload").addClass('hide');

			$("#loadImagesPrev").removeClass('custom-file-container__image-preview--active')
			$("input:file").val('')
			$(".custom-file-container__custom-file__custom-file-control").html('Pilih File...' +
				`<span class="custom-file-container__custom-file__custom-file-control__button"> Cari! </span>`);

			new FileUploadWithPreview('imagesProduk', {
				image: {
					baseImage: base_url + "assets/dashboard/upload/images/custom-image.png"
				},
			});
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
		var url = base_url + "/produk/remove";

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
		var url = base_url + "/admin/produk/form";

		$.ajax({
			url: url,
			method: "POST",
			data: {
				id: ID
			},
			success: function (data) {
				$(".load-form").html(data);
				loadSelect('kategori')
			},
			complete: function () {
				formAttribute('edit');
				validFile();
				loadCalendar();
			}
		});
	});
}

function loadData() {
	$(".load-data").load(base_url + '/admin/produk/data', function (r, s, x) {
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
			"url": base_url + "/produk/json",
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
				"data": "kode"
			},
			{
				"data": "nama"
			},
			{
				"data": "deskripsi"
			},
			{
				"data": "harga_hpp"
			},
			{
				"data": "harga_jual"
			},
			{
				"render": function (data, type, row) {
					var html = `<span class="btn-group">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#formModalProduk"
                            data-backdrop="static" data-keyboard="false" class="edit text-info" data-id="` + row.id + `">
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

function formAttribute(act) {
	$("input[name=kode]").focus();

	var UrlUp = $('form#formProduk').removeAttr('action');
	UrlUp.attr('action', base_url + 'produk/' + (act == 'add' ? 'store' : 'update'));

	$(".act-batal").on('click', function () {
		$(".load-form").html(`<em class="fa fa-spin fa-spinner"></em> Loading...`);
		var UrlUp = $('form#formProduk').removeAttr('action');
		UrlUp.attr('action', base_url + 'produk/store');
		loadAvClick();
	});

	$("#postorpre").on('change', function (e) {
		var postOrPre = $(this).val()
		if (postOrPre == 2) {
			$(".preorder").removeClass('hide')
			$("#preorder").removeClass('hide').addClass('required datepicker').removeAttr('disabled')

			return false;
		}
		if (!postOrPre || postOrPre == 1) {
			$(".preorder").addClass('hide')
			$("#preorder").addClass('hide').removeClass('required datepicker').attr('disabled', true)
			return false;
		}
	});



}

function loadCalendar() {
	$(document).ready(function () {
		bsCustomFileInput.init();
	});
	$('[name=pre_order]').mask('00/00/0000');
	$('[name=pre_order]').datepicker({
		uiLibrary: 'bootstrap4',
		format: 'dd/mm/yyyy'
	});
}

function validatedForm() {
	disableForm();

	var elemt = $("input.required,select.required,textarea.required");
	var false_ = 0;

	$.each(elemt, function (i, d) {
		var val = $(this).val();
		if (!val) {
			false_ += 1;
		}
	});



	return false_;
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
	$('input[name=kode]').focus();

	$('form#formProduk').submit(function (e) {
		e.preventDefault();
		var elemt = $(this)[0];

		setTimeout(() => {
			reloadImageContent();
		}, 500);

		if (validatedForm() > 0) {

			swal({
				title: "Peringatan!",
				text: "Lengkapi isian data Anda!",
				icon: "info",
				timer: 2000,
				button: false
			}).then(function () {
				disableForm('active');
				return false;
			});

		} else {

			$.ajax({
				type: "POST",
				url: elemt.action,
				data: new FormData(this),
				dataType: 'JSON',
				contentType: false,
				cache: false,
				processData: false,
				beforeSend: function () {},
				success: function (data) {
					if (data.code === 200) {
						$(".modal").modal('hide')
						LoadToPages();
						loadForm();
						loadFirstForm();
						swal({
							title: "Sukses!",
							text: data.msg,
							icon: "success",
							timer: 2000,
							button: false
						});
						return true;
					} else {
						swal({
							title: "Peringatan!",
							text: data.msg,
							icon: "warning",
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

		}
	});
}

$(document).ready(function () {
	loadForm();

	loadData();
	submit();
});
