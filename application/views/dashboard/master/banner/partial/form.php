<div class="row">
    <?php if (!empty($dataGet)) {?>
    <input form="formBanner" data-dir="<?php echo $_SERVER['DOCUMENT_ROOT'] . (!empty($dataGet->gambar) ?
    '/storages/upload/banner/images/' . $dataGet->gambar : ''); ?>" value="<?php echo $dataGet->id; ?>" data-image="<?php echo !empty($dataGet->gambar) ?
    base_url('storages/upload/banner/images/' . $dataGet->gambar) : ''; ?>" name="id" type="hidden">
    <?php }?>

    <div class="col-lg-12">

        <div class="custom-file-container form-group" data-upload-id="imagesBanner">
            <label>Upload Gambar</label>

            <span class="pull-right">
                <a href="javascript:void(0)" id="remfileUpload" class="custom-file-container__image-clear hide"
                    title="Clear Image"><em class="fa fa-times text-danger"></em>
                </a>
            </span>

            <label class="custom-file-container__custom-file">
                <input id="fileUpload" readonly accept="image/*" type="file"
                    class="custom-file-container__custom-file__custom-file-input form-control" accept="*"
                    aria-label="Pilih Gambar..." form="formBanner" name="file">
                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                <span class="custom-file-container__custom-file__custom-file-control"></span>
            </label>

            <div class="loadImgROl form-group">
                <div id="loadImagesPrev" class="custom-file-container__image-preview"></div>
            </div>
            <div class="form-group">
                <label for="nama">Nama <em class="text-danger">*</em></label>
                <input form="formBanner" value="<?php echo !empty($dataGet) ? $dataGet->nama : ''; ?>" name="nama"
                    type="text" id="nama" class="form-control required" placeholder="Nama...">
            </div>
        </div>


        <div class="row">
            <div class="col-lg-6 col-sm-6">
                <a href="javascript:void(0)" class="btn btn-warning btn-user btn-block act-batal">
                    <em class="fa fa-undo-alt"></em> Batal
                </a>
            </div>
            <div class="col-lg-6 col-sm-6">
                <button href="javascript:void(0)" type="submit" form="formBanner"
                    class="btn btn-primary saving btn-user btn-block">
                    <em class="fa fa-envelope"></em> Simpan
                </button>
            </div>
        </div>
    </div>


</div>