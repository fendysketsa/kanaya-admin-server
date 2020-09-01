<div class="row">
    <?php if (!empty($dataGet)) {?>
    <input form="formProduk" value="<?php echo $dataGet->id; ?>" data-selected="<?php echo $dataGet->kategori_id; ?>"
        data-images='<?php echo $dataGetImages; ?>' name="id" type="hidden">
    <input form="formProduk" value="<?php echo $dataGetCountImages; ?>" name="images_selected" type="hidden">
    <?php }?>

    <div class="col-lg-12">
        <div class="row content-images hide"></div>

        <div class="custom-file-container form-group" data-upload-id="imagesProduk">
            <div class="row">
                <div class="col-lg-7">
                    <div class="form-group">
                        <label for="kategori">Kategori <em class="text-danger">*</em></label>
                        <select name="kategori" id="kategori" form="formProduk" class="form-control required"></select>
                    </div>
                </div>
                <div class="col-lg-5">
                    <label>Upload Gambar</label>

                    <span class="pull-right">
                        <a href="javascript:void(0)" id="remfileUpload" class="custom-file-container__image-clear hide"
                            title="Clear Image"><em class="fa fa-times text-danger"></em>
                        </a>
                    </span>

                    <label class="custom-file-container__custom-file">
                        <input id="fileUpload" readonly accept="image/*" type="file"
                            class="custom-file-container__custom-file__custom-file-input form-control" accept="*"
                            aria-label="Pilih Gambar..." form="formProduk" name="file" multiple>
                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                    </label>
                </div>
            </div>
            <div class="loadImgROl form-group">
                <div id="loadImagesPrev" class="custom-file-container__image-preview"></div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="form-group">
            <label for="kode">Kode <em class="text-danger">*</em></label>
            <input id="kode" form="formProduk" value="<?php echo !empty($dataGet) ? $dataGet->kode : ''; ?>" name="kode"
                type="text" class="form-control required" placeholder="Kode...">
        </div>
    </div>
    <div class="col-lg-8">
        <div class="form-group">
            <label for="nama">Nama <em class="text-danger">*</em></label>
            <input form="formProduk" value="<?php echo !empty($dataGet) ? $dataGet->nama : ''; ?>" name="nama"
                type="text" id="nama" class="form-control required" placeholder="Nama...">
        </div>
    </div>
</div>

<div class="row">

    <div class="col-lg-4">
        <div class="form-group">
            <label for="hargahpp">Harga HPP <em class="text-danger">*</em></label>
            <input id="hargahpp" form="formProduk" value="<?php echo !empty($dataGet) ? $dataGet->harga_hpp : ''; ?>"
                name="harga_hpp" type="text" class="form-control required" placeholder="Harga HPP...">
        </div>
    </div>
    <div class="col-lg-5">
        <div class="form-group">
            <label for="hargajual">Harga Jual <em class="text-danger">*</em></label>
            <input form="formProduk" value="<?php echo !empty($dataGet) ? $dataGet->harga_jual : ''; ?>"
                name="harga_jual" type="text" id="hargajual" class="form-control required" placeholder="Harga jual...">
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            <label for="stok">Stok</label>
            <input id="stok" form="formProduk"
                <?php echo !empty($dataGet) ? (empty($dataGet->stok) ? '' : 'disabled') : ''; ?>
                value="<?php echo !empty($dataGet) ? $dataGet->stok : ''; ?>" name="stok" type="text"
                class="form-control" placeholder="Stok...">
        </div>
    </div>
</div>

<div class="form-group">
    <label for="kode">Deskripsi <em class="text-danger">*</em></label>
    <textarea form="formProduk" name="deskripsi" class="form-control required" cols="3" rows="5"
        placeholder="Deskripsi..."><?php echo !empty($dataGet) ? $dataGet->deskripsi : ''; ?></textarea>
</div>

<div class="row">

    <div class="col-lg-3">
        <div class="form-group">
            <label for="hargahpp">Posting</label>
            <select id="postorpre" class="form-control">
                <option value="1" selected>Post</option>
                <option value="2">Pre-Order</option>
            </select>
        </div>
    </div>
    <div class="col-lg-9 preorder hide">
        <div class="form-group">
            <label for="preorder">Pre Order <em class="text-danger">*</em></label>
            <input form="formProduk" value="<?php echo !empty($dataGet) ? $dataGet->pre_order : ''; ?>" name="pre_order"
                type="text" id="preorder" disabled class="form-control hide" placeholder="Pre Order...">
        </div>
    </div>

</div>