function loadData() {
	$(".load-data").load(base_url + '/admin/admins-fee/data', function (r, s, x) {
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
			"targets": [0, 1, 2]
		}],
		fixedColumns: true,
		"order": [
			[3, 'DESC']
		],
		"paging": true,
		"processing": true,
		"serverSide": true,
		"ajax": {
			"url": base_url + "/biaya_admin/json",
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
			"data": "member"
		},
		{
			"data": "pegawai"
		},
		{
			"data": "tanggal"
		},
		{
			"data": "no_transaksi"
		},
		{
			"data": 'nominal_admin'
		}]

	});

	$("select[name=dataView_length]").on('change', function () {
		loadTable(table_)
	});
	$("input[type=search]").on('input', function (e) {
		loadTable(table_)
	});


}

function loadTable(table_) {
	var ins = $("input[name=id]").val() || 0;
	var response_load_dt = function () {
		$(".rmv-" + ins).addClass('text-dark disabled').removeAttr('data-id');
	};

	table_.ajax.reload(response_load_dt);
}


$(document).ready(function () {
	loadData();
});
