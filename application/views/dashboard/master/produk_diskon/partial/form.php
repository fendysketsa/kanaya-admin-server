<link rel="stylesheet" href="<?php echo base_url($css); ?>">
<script src="<?php echo base_url($js); ?>"></script>

<style>
	.easy-autocomplete {
		width: 100% !important;
	}
</style>

<form id="formDiskon" method="POST" action="<?php echo !empty($dataGet) ? site_url('produkDiskon/update') : site_url('produkDiskon/store'); ?>">
	<div class="row">
		<?php if (!empty($dataGet)) { ?>
			<input form="formProduk" value="<?php echo $dataGet->id; ?>" name="id" type="hidden">
		<?php
			// echo '<pre>'.print_r($dataGet, true) .'</pre>';
		} ?>

		<div class="col-lg-12">
			<div class="form-group">
				<label for="kode">Produk <em class="text-danger">*</em></label>
				<?php if (empty($dataGet)) { ?>
					<input id="produk_nama" form="formProduk" value="<?php echo !empty($dataGet) ? $dataGet->nama : ''; ?>" name="kode" type="text" class="form-control " placeholder="Nama produk...">
					<input type="hidden" name="produk_id" id="produk_id" value="<?php echo !empty($dataGet) ? $dataGet->produk_id : ''; ?>">
				<?php } else { ?>
					<input type="text" name="produk_nama" class="form-control" id="produk_nama" value="" placeholder="<?php echo $dataGet->nama; ?>">
				<?php  } ?>

			</div>
		</div>

		<div class="col-lg-12">
			<div class="form-group">
				<label for="provinsi">Diskon <em class="text-danger">*</em></label>
				<?php if (empty($dataGet)) {                 ?>
					<select class="form-control" name="diskon_id" id="diskon_id">
						<option value="">Pilih Diskon</option>
						<?php foreach ($diskon as $dt) { ?>
							<option value="<?php echo $dt['id']; ?>"><?php echo $dt['nama']; ?></option>
						<?php } ?>
					</select>
				<?php } else { ?>
					<select class="form-control" name="diskon_id" id="diskon_id">
						<option value="<?php echo $dataGet->diskon_id; ?>"><?php echo $dataGet->nama_diskon; ?></option>
						<?php foreach ($diskon as $dt) { ?>
							<option value="<?php echo $dt['id']; ?>"><?php echo $dt['nama']; ?></option>
						<?php } ?>
					</select>

				<?php } ?>

			</div>
		</div>
	</div>

	<button hidden="" type="submit" id="ok_sub"></button>

</form>
<script>
	var produk = {
		url: window.location.origin + '/admin/produk_diskon/produk',
		getValue: "nama",

		list: {
			match: {
				enabled: true
			},
			onSelectItemEvent: function() {
				var value = $("#produk_nama").getSelectedItemData().produk_id;
				$("#produk_id").val(value).trigger("change");
			}
		},
		theme: "square"
	}

	$("#produk_nama").easyAutocomplete(produk);

	var produk2 = {
		url: window.location.origin + '/admin/produk_diskon/produk',
		getValue: "nama",

		list: {
			match: {
				enabled: true
			},
			onSelectItemEvent: function() {
				var value = $("#produk_nama2").getSelectedItemData().produk_id;
				// alert(value);
				$("#produk_id2").val(value).trigger("change");
			}
		},
		theme: "square"
	}

	$("#produk_nama2").easyAutocomplete(produk2);
</script>
