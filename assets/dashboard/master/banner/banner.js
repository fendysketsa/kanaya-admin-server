function loadForm() {
	$(".load-form").load(base_url + '/admin/banner/form', function (r, s, x) {
		if (s === 'error') {
			console.log('Loaded failed!');
			return false;
		} else {
			formAttribute();
			validFile();
		}
	});
}

function validFile() {

	var ID = $('input[name=id]');
	if (ID.val()) {
		var Elemt = $("#loadImagesPrev");
		if (ID.data('image')) {

			new FileUploadWithPreview('imagesBanner', {
				presetFiles: [
					ID.data('image')
				],
			});

			Elemt.removeAttr('style').attr('style', 'background-image:url(' + ID.data('image') + ')');
			$(".loadImgROl").addClass('loadImgScroll')
			$("#loadImagesPrev").addClass('custom-file-container__image-preview--active')
		} else {
			new FileUploadWithPreview('imagesBanner');
		}
	} else {
		new FileUploadWithPreview('imagesBanner');
	}

	$("#remfileUpload").on('click', function (e) {
		$(".loadImgROl").removeClass('loadImgScroll')
	});

	$("#fileUpload").on('change', function (e) {
		var val_ = $(this)[0].files.length;
		if (val_ > 0) {
			$(".loadImgROl").addClass('loadImgScroll')
			$("#remfileUpload").removeClass('hide');
		} else {
			$(".loadImgROl").removeClass('loadImgScroll')
			$("#remfileUpload").addClass('hide');

			$("#loadImagesPrev").removeClass('custom-file-container__image-preview--active')
			$("input:file").val('')
			$(".custom-file-container__custom-file__custom-file-control").html('Pilih File...' +
				`<span class="custom-file-container__custom-file__custom-file-control__button"> Cari! </span>`);

			new FileUploadWithPreview('imagesBanner', {
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
		var url = base_url + "/banner/remove";

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
		var url = base_url + "/admin/banner/form";

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
				UrlUp.attr('action', base_url + 'banner/update');
				formAttribute();
				validFile();
			}
		});
	});
}

function loadData() {
	$(".load-data").load(base_url + '/admin/banner/data', function (r, s, x) {
		if (s === 'error') {
			console.log('Loaded failed!');
			return false;
		} else {
			dataAttribute();
			$('[data-fancybox="gallery"]').fancybox();
		}
	});
}

function loadErrorImg(image) {
	image.onerror = "";
	image.src = "/assets/dashboard/upload/images/corrupt.png";
	image.alt = "Images corrupt!";
	image.title = "Images corrupt!";

	$(image)
		.closest('a')
		.removeAttr('href')
		.attr('href', base_url + "/assets/dashboard/upload/images/corrupt.png")
		.attr('title', 'Images corrupt!');

	return true;
}

function imageLoadTb(data) {
	var url = !data ? base_url + '/assets/dashboard/upload/images/custom-image.png' : base_url + '/storages/upload/banner/images/' + data;
	return `<a data-fancybox="gallery" href="` + url + `" ><img title="Image default!" onerror="loadErrorImg(this)" src="` + url + `" width="80" height="50" style="border-radius:5%;"></a>`;
}

function dataAttribute() {

	var table_ = $('#dataView').DataTable({
		"columnDefs": [{
			"searchable": false,
			"orderable": false,
			"class": "index",
			"targets": [0, 1, 3]
		}],
		fixedColumns: true,
		"order": [
			[0, 'DESC']
		],
		"paging": true,
		"processing": true,
		"serverSide": true,
		"ajax": {
			"url": base_url + "/banner/json",
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
				"data": "gambar",
				"render": imageLoadTb,
				"className": 'text-center'
			},
			{
				"data": "nama"
			},
			{
				"className": 'text-center',
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
	UrlUp.attr('action', base_url + 'banner/store');
}

function formAttribute() {
	$("input[name=nama]").focus();
	$(".act-batal").on('click', function () {
		$(".load-form").html(`<em class="fa fa-spin fa-spinner"></em> Loading...`);
		loadForm();
		var UrlUp = $(".load-form").closest('.container-fluid').find('form').removeAttr('action');
		UrlUp.attr('action', base_url + 'banner/store');
		loadAvClick();
	});
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

function submit() {
	$('input[name=nama]').focus();

	$('form#formBanner').submit(function (e) {
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
