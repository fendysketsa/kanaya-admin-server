// load table
function loadData() {
	$(".load-data").load(base_url + '/admin/produk/report/data', function (r, s, x) {
		if (s === 'error') {
			console.log('Loaded failed!');
			return false;
		} else {
			dataAttribute();
		}
	});
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
			"url": base_url + "/report_produk/json",
			"type": "POST"
		},
		"deferRender": true,
		"aLengthMenu": [5, 10, 15, 25, 50],
		"pageLength": 10,
		dom: 'lBfrtip',
		buttons: [{
			extend: 'excel',
			className: 'text-left',
			autoFilter: true,
			filename: 'data_produk_terjual',
			title: 'Laporan Produk Terjual',
			messageTop: function () {
				return "Tanggal: " + $("#range_date").attr('data')
			},
			sheetName: 'Data Produk Terjual'
		}, ],
		"columns": [{
				'data': 'id',
				render: function (data, type, row, meta) {
					return meta.row + meta.settings._iDisplayStart + 1;
				}
			},
			{
				"data": "produk"
			},
			{
				"data": "sku"
			},
			{
				"data": "terjual"
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

	$('input.dr-picker').daterangepicker({
		autoUpdateInput: false,
		locale: {
			cancelLabel: 'Batal'
		}
	});

	$('input.dr-picker').on('apply.daterangepicker', function (ev, picker) {
		$(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
		table_.columns(1).search($(this).val()).draw()
		$(this).attr('data', $(this).val())
	});

	$('input.dr-picker').on('cancel.daterangepicker', function (ev, picker) {
		$(this).val('');
		table_.columns(1).search('').draw().ajax.reload()
	});

}

$(document).ready(function () {
	loadData();
});
