<div class="row">
    <?php if (!empty($dataGet)) {?>
    <input form="formKategori" value="<?php echo $dataGet->id; ?>" data-dir="<?php echo $_SERVER['DOCUMENT_ROOT'] . (!empty($dataGet->gambar) ?
    '/storages/upload/kategori/images/icon/' . $dataGet->icon : ''); ?>" value="<?php echo $dataGet->id; ?>"
        data-image="<?php echo !empty($dataGet->icon) ?
    base_url('storages/upload/kategori/images/icon/' . $dataGet->icon) : ''; ?>" name="id" type="hidden">
    <?php }?>

    <div class="col-lg-12">
        <div class="custom-file-container form-group" data-upload-id="imagesIcon">

            <span class="pull-right">
                <a href="javascript:void(0)" id="remfileUpload" class="custom-file-container__image-clear hide"
                    title="Clear Image"><em class="fa fa-times text-danger"></em>
                </a>
            </span>

            <div class="loadImgROl form-group" style="height:100px;">
                <div id="loadImagesPrev" class="custom-file-container__image-preview" style="height:100px;"></div>
            </div>

            <label>Upload Icon</label>
            <label class="custom-file-container__custom-file">
                <input id="fileUpload" readonly accept="image/*" type="file"
                    class="custom-file-container__custom-file__custom-file-input form-control" accept="*"
                    aria-label="Pilih Gambar..." form="formKategori" name="file">
                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                <span class="custom-file-container__custom-file__custom-file-control"></span>
            </label>

        </div>
    </div>

    <div class="col-lg-4">
        <div class="form-group">
            <label for="kode">Kode <em class="text-danger">*</em></label>
            <input id="kode" form="formKategori" value="<?php echo !empty($dataGet) ? $dataGet->kode : ''; ?>"
                name="kode" type="text" class="form-control required" placeholder="Kode...">
        </div>
    </div>
    <div class="col-lg-8">
        <div class="form-group">
            <label for="namaKategori">Nama <em class="text-danger">*</em></label>
            <input form="formKategori" value="<?php echo !empty($dataGet) ? $dataGet->nama : ''; ?>" name="nama"
                type="text" id="namaKategori" class="form-control required" placeholder="Nama...">
        </div>
    </div>
</div>

<div class="form-group">
    <label for="kode">Keterangan</label>
    <textarea form="formKategori" name="keterangan" class="form-control" cols="3" rows="2"
        placeholder="Keterangan..."><?php echo !empty($dataGet) ? $dataGet->keterangan : ''; ?></textarea>
</div>

<div class="row">
    <div class="col-lg-6 col-sm-6">
        <a href="javascript:void(0)" class="btn btn-warning btn-user btn-block act-batal">
            <em class="fa fa-undo-alt"></em> Batal
        </a>
    </div>
    <div class="col-lg-6 col-sm-6">
        <button href="javascript:void(0)" type="submit" form="formKategori"
            class="btn btn-primary saving btn-user btn-block">
            <em class="fa fa-envelope"></em> Simpan
        </button>
        </ div>
    </div>