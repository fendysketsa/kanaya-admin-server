// load table
function loadData() {
	$(".load-data").load(base_url + '/admin/produk/stock/data', function (r, s, x) {
		if (s === 'error') {
			console.log('Loaded failed!');
			return false;
		} else {
			dataAttribute();
		}
	});
}

function loadDetail() {

	$(document).on('click', '.detail', function () {

		$(".load-detail-produk").html(`<em class="fa fa-spin fa-spinner"></em> Loading...`);

		var ID = $(this).data('id');
		var url = base_url + "/admin/produk/detail";

		$.ajax({
			url: url,
			method: "POST",
			data: {
				id: ID
			},
			success: function (data) {
				$(".load-detail-produk").html(detContent(data));
			},
			complete: function () {
				// 
			}
		});
	});
}

function loadSO() {

	$(document).on('click', '.stok-opname', function () {

		$(".load-form-stok-opname-produk").html(`<em class="fa fa-spin fa-spinner"></em> Loading...`);

		var ID = $(this).data('id');
		var NewParam = $(this).closest('tr');

		setTimeout(function () {
			$(".load-form-stok-opname-produk").html(formSOContent(ID, NewParam));
			$("input#stok").on('input', function () {
				$("#form-up-stok-opname").attr('action-stok', $(this).val())

				if (parseInt($(this).val()) < parseInt($(".in-stok-now").text())) {

					var keterangan = `<label for="keterangan-s">Keterangan <em class="text-danger">*</em></label>
						<textarea id="keterangan-s" class="form-control" name="keterangan"></textarea>`;

					$('.f-keterangan').html(keterangan)

					setTimeout(function () {
						$("#keterangan-s").on('input', function (e) {
							$("#form-up-stok-opname").attr('action-keterangan', $(this).val())
						})
					}, 500)
				}

				if (parseInt($(this).val()) > parseInt($(".in-stok-now").text())) {
					$('.f-keterangan').html('')
					$("#form-up-stok-opname").removeAttr('action-keterangan')
				}
			})
		}, 1500);

	});
}


function loadLogStok() {

	$(document).on('click', '.log', function () {

		$(".load-log-stok-produk").html(`<em class="fa fa-spin fa-spinner"></em> Loading...`);

		var ID = $(this).data('id');
		var NewParam = $(this).closest('tr');
		var url = base_url + "/admin/produk/stock/log";

		$.ajax({
			url: url,
			method: "POST",
			data: {
				id: ID
			},
			success: function (data) {
				$(".load-log-stok-produk").html(logContent(data, NewParam));
			},
			complete: function () {
				$('#dataViewLog').DataTable({
					"columnDefs": [{
						"searchable": false,
						"orderable": false,
						"class": 'index',
						"targets": [0, 2, 3, 4, 5]
					}]
				});
			}
		});
	});
}

function logContent(data, Param) {

	var html = `
			<div class="row mb-4 px-3">
				<div class="col-lg-6 card-header py-3">
					<div class="row">
						<div class="col-lg-4">
							<span>Kategori</span>
						</div>
						<div class="col-lg-7">
							: <em class="font-weight-bold">` + Param.find('td.n-kategori').text() + `</em>
						</div>						
					</div>
					<div class="row mt-2">
						<div class="col-lg-4">
							<span>Produk</span>
						</div>
						<div class="col-lg-7">
							: <em class="font-weight-bold">` + Param.find('td.n-produk').text() + `</em>
						</div>						
					</div>
				</div>
				<div class="col-lg-6 card-header py-3">
					<div class="row">
						<div class="col-lg-5">
							<span>Terakhir Update</span>
						</div>
						<div class="col-lg-7">
							: <em class="font-weight-bold">` + (data.length < 3 ? '-' : JSON.parse(data)[0].tanggal) + `</em>
						</div>						
					</div>
					<div class="row mt-2">
						<div class="col-lg-5">
							<span>Stok Saat Ini</span>
						</div>
						<div class="col-lg-7">
							: <em class="font-weight-bold">` + Param.find('td.n-stok').text() + `</em>
						</div>						
					</div>
				</div>
			</div>
			<div class="table-responsive">
					<table class="table table-bordered" id="dataViewLog" width="100%" cellspacing="0">
						<thead class="text-white bg-dark">
							<tr>
								<th style="width:5%;">No</th>
								<th style="width:15%;">Tanggal</th>
								<th style="width:10%;">Masuk</th>
								<th style="width:10%;">Keluar</th>
								<th style="width:10%;">Sisa</th>
								<th style="width:50%;">Keterangan</th>
							</tr>
						</thead>
						<tbody>`;

	$.each(JSON.parse(data), function (e, f) {

		html += `<tr>
					<td>` + (e + 1) + `</td>
					<td>` + f.tanggal + `</td>
					<td>` + f.masuk + `</td>
					<td>` + f.keluar + `</td>
					<td>` + f.sisa + `</td>
					<td>` + f.keterangan + `</td>
				</tr>`;
	});


	html += `</tbody>
					</table>
				</div>`;

	return html;
}

function detContent(data) {
	var dataParse = JSON.parse(data);

	var html = `<div class="row mt-3">
					<div class="col-lg-12">
						<div class="card-header" style="height:40px; padding:6px;">
							<h4 class='font-weight-bold text-center'>` + dataParse.kategori + `</h4>
						</div>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-lg-5 text-right">
						<span>
							Kode Produk (SKU)
						</span>
					</div>
					<div class="col-lg-7">
						<span>
							: ` + dataParse.kode + `
						</span>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-lg-5 text-right">
						<span>
							Nama
						</span>
					</div>
					<div class="col-lg-7">
						<div>
							: <p style="margin: -14px 0px 0px 7px;">` + dataParse.nama + `</p>
						</div>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-lg-5 text-right">
						<span>
							HPP
						</span>
					</div>
					<div class="col-lg-7">
						<span>
							: ` + dataParse.harga_hpp + `
						</span>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-lg-5 text-right">
						<span>
							Harga Jual
						</span>
					</div>
					<div class="col-lg-7">
						<span>
							: ` + dataParse.harga_jual + `
						</span>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-lg-5 text-right">
						<span>
							Status
						</span>
					</div>
					<div class="col-lg-7">
							: <em class="text-success">` + (!dataParse.pre_order ? 'Pre Order' : 'Post') + `</em>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-lg-5 text-right">
						<span>
							Stok
						</span>
					</div>
					<div class="col-lg-7">
						<div>
							: ` + dataParse.stok + `
						</div>
					</div>
				</div>
				<div class="row mt-3">
					<div class="col-lg-12">
						<div class="card-header" style="height:45px; padding:6px;">
							<h4 class='font-weight-bold'>Deskripsi</h4>
						</div>
						<p class="mt-3" style="margin-left: 7px; margin-top: -14px;">` + dataParse.deskripsi + `</p>
					</div>
				</div>`;

	return html;
}

function formSOContent(id, param) {
	$("#form-up-stok-opname").attr('action-id', id)

	var html = `<div class="row mt-3">
					<div class="col-lg-12">
						<div class="card-header" style="height:40px; padding:6px;">
							<h4 class='font-weight-bold text-center'>` + param.find('td.n-kategori').text() + `</h4>
						</div>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-lg-5 text-right">
						<span>
							Kode Produk (SKU)
						</span>
					</div>
					<div class="col-lg-7">
						<span>
							: ` + param.find('td.n-sku').text() + `
						</span>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-lg-5 text-right">
						<span>
							Nama
						</span>
					</div>
					<div class="col-lg-7">
						<div>
							: <p style="margin: -14px 0px 0px 7px;">` + param.find('td.n-produk').text() + `</p>
						</div>
					</div>
				</div>				
				<div class="row mt-2">
					<div class="col-lg-5 text-right">
						<span>
							Stok Terkini
						</span>
					</div>
					<div class="col-lg-7">
						<div>
							: <span class="in-stok-now">` + param.find('td.n-stok').text() + `</span>
						</div>
					</div>
				</div>
				<div class="row mt-3">
					<div class="col-lg-12">
						<div class="card-header" style="height:45px; padding:6px;">
							<h4 class='font-weight-bold'>Form Stok Opname</h4>
						</div>
						<div class="row">
							<div class="col-lg-12 text-center">								
								<div class="form-group mt-3 text-left">
									<label for="stok">Stok <em class="text-danger">*</em></label>
									<input form="form-up-stok-opname" class="form-control" name="stok" id="stok">
								</div>
								<div class="form-group f-keterangan text-left"></div>
								<button form="form-up-stok-opname" class="btn btn-sm btn-info col-lg-8" type="submit">Simpan</button>
							</div>
						</div>						
					</div>
				</div>`;

	return html;
}

function dataAttribute() {

	$("#range_date").attr('data', '');

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
			"url": base_url + "/produk_stock/json",
			"type": "POST"
		},
		"deferRender": true,
		"aLengthMenu": [5, 10, 15, 25, 50],
		"pageLength": 25,
		"columns": [{
				'data': 'id',
				render: function (data, type, row, meta) {
					return meta.row + meta.settings._iDisplayStart + 1;
				}
			},
			{
				"data": "kategori",
				"className": "n-kategori"
			},
			{
				"data": "sku",
				"className": "n-sku"
			},
			{
				"data": "nama_barang",
				"className": "n-produk"
			},
			{
				"data": "stok_awal"
			},
			{
				"data": "stok_akhir",
				"className": "n-stok"
			},
			{
				"render": function (data, type, row) {
					var html = `<span class="btn-group">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#detailModalProduk"
                            			data-backdrop="static" data-keyboard="false" class="detail text-warning" data-id="` + row.id + `">
										<em class="fa fa-info-circle"></em></a>&nbsp;
									<a href="javascript:void(0);" data-toggle="modal" data-target="#updateModalProduk"
                            			data-backdrop="static" data-keyboard="false" class="stok-opname text-success" data-id="` + row.id + `">
										<em class="fa fa-edit"></em></a>&nbsp;
									<a href="javascript:void(0);" data-toggle="modal" data-target="#logModalProduk"
                            			data-backdrop="static" data-keyboard="false" class="log text-info" data-id="` + row.id + `">
										<em class="fa fa-clock"></em></a>
								</span>
						`;

					return html
				}
			},
		],
		"initComplete": function (settings, json) {
			$("div.dt-buttons").css({
				'margin-left': '200px',
				'position': 'absolute'
			})
			$("div.dt-buttons").find('span').html('<i class="fa fa-download" aria-hidden="true"></i> Export Excel')
			$("div.dt-buttons").find('button').addClass('btn btn-success')
			$("div#dataView_length").css({
				'position': 'absolute'
			})

		}

	});

	loadDetail()
	loadLogStok()
	loadSO()

	submitOP()

}

function submitOP() {
	$("#form-up-stok-opname").submit(function (e) {
		e.preventDefault()

		var url = $(this).attr('action')
		var ID = $(this).attr('action-id')
		var stok = $(this).attr('action-stok')
		var keterangan = $(this).attr('action-keterangan')

		if (!$("#keterangan-s").val() && $(".f-keterangan").html() != '') {
			swal({
				title: "Oops!",
				text: 'Keterangan wajib diisi!',
				icon: "error",
				timer: 2000,
				button: false
			});

			return false;
		}

		$.ajax({
			url: url,
			method: "POST",
			data: {
				id: ID,
				stok: stok,
				keterangan: keterangan,
			},
			success: function (data) {
				swal({
					title: "Success!",
					text: data.msg,
					icon: "success",
					timer: 2000,
					button: false
				});
			},
			complete: function () {
				$('.modal').modal('hide')
				$("#form-up-stok-opname").removeAttr('action-id')
				$("#form-up-stok-opname").removeAttr('action-stok')
				$("#form-up-stok-opname").removeAttr('action-keterangan')
				$('#dataView').DataTable().ajax.reload();
			}
		});
	});
}

$(document).ready(function () {
	loadData();
});
