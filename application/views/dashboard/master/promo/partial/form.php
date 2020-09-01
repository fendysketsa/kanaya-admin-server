<?php if (!empty($dataGet)) {
	$dirGam = $_SERVER['DOCUMENT_ROOT'] . (!empty($dataGet->gambar) ? '/storages/upload/promo/images/icon/' . $dataGet->gambar : '');
	$img = !empty($dataGet->gambar) ? base_url('storages/upload/promo/images/icon/' . $dataGet->gambar) : ''; ?>
	<input form="formPromo" value="<?php echo $dataGet->id; ?>" data-dir="<?php echo $dirGam; ?>" value="<?php echo $dataGet->id; ?>" data-image="<?php echo $img  ?>" name="id" type="hidden">
<?php } ?>

<div class="row">
	<div class="col-lg-12">
		<div class="custom-file-container form-group" data-upload-id="imagesIcon">

			<span class="pull-right">
				<a href="javascript:void(0)" id="remfileUpload" class="custom-file-container__image-clear hide" title="Clear Image"><em class="fa fa-times text-danger"></em>
				</a>
			</span>

			<div class="loadImgROl form-group" style="height:100px;">
				<div id="loadImagesPrev" class="custom-file-container__image-preview" style="height:100px;"></div>
			</div>

			<label>Upload Gambar</label>
			<label class="custom-file-container__custom-file">
				<input id="fileUpload" readonly accept="image/*" type="file" class="custom-file-container__custom-file__custom-file-input form-control" accept="*" aria-label="Pilih Gambar..." form="formPromo" name="file">
				<input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
				<span class="custom-file-container__custom-file__custom-file-control"></span>
			</label>

		</div>
	</div>

	<div class="col-lg-4">
		<div class="form-group">
			<label for="nominal">Kode <em class="text-danger">*</em></label>
			<input form="formPromo" value="<?php echo !empty($dataGet) ? $dataGet->kode : ''; ?>" name="kode" type="text" id="kode" class="form-control required" placeholder="Kode...">
		</div>
	</div>
	<div class="col-lg-8">
		<div class="form-group">
			<label for="nama">Nama <em class="text-danger">*</em></label>
			<input id="nama" form="formPromo" value="<?php echo !empty($dataGet) ? $dataGet->nama : ''; ?>" name="nama" type="text" class="form-control required" placeholder="Nama...">
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-6">
		<div class="form-group">
			<label for="berlaku_dari">Berlaku dari <em class="text-danger">*</em></label>
			<input id="berlaku_dari" form="formPromo" value="<?php echo !empty($dataGet) ? $dataGet->berlaku_dari : ''; ?>" name="berlaku_dari" type="text" class="form-control required" placeholder="Berlaku dari...">
		</div>
	</div>
	<div class="col-lg-6">
		<div class="form-group">
			<label for="berlaku_sampai">Berlaku sampai <em class="text-danger">*</em></label>
			<input form="formPromo" value="<?php echo !empty($dataGet) ? $dataGet->berlaku_sampai : ''; ?>" name="berlaku_sampai" type="text" id="berlaku_sampai" class="form-control required" placeholder="Berlaku sampai...">
		</div>
	</div>
</div>

<div class="form-group">
	<label for="kode">Deskripsi</label>
	<textarea form="formPromo" name="deskripsi" class="form-control" cols="3" rows="2" placeholder="Deskripsi..."><?php echo !empty($dataGet) ? $dataGet->deskripsi : ''; ?></textarea>
</div>

<div class="row">
	<div class="col-lg-6 col-sm-6">
		<a href="javascript:void(0)" class="btn btn-warning btn-user btn-block act-batal">
			<em class="fa fa-undo-alt"></em> Batal
		</a>
	</div>
	<div class="col-lg-6 col-sm-6">
		<button href="javascript:void(0)" type="submit" form="formPromo" class="btn btn-primary btn-user btn-block">
			<em class="fa fa-envelope"></em> Simpan
		</button>


	</div>
</div>
