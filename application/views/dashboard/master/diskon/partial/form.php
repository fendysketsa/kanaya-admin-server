<?php if (!empty($dataGet)) {?>
<input form="formDiskon" value="<?php echo $dataGet->id; ?>" name="id" type="hidden">
<?php }?>

<div class="row">
    <div class="col-lg-8">
        <div class="form-group">
            <label for="nama">Nama <em class="text-danger">*</em></label>
            <input id="nama" form="formDiskon" value="<?php echo !empty($dataGet) ? $dataGet->nama : ''; ?>" name="nama"
                type="text" class="form-control required" placeholder="Nama...">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label for="nominal">Nominal <em class="text-danger">*</em></label>
            <input form="formDiskon" value="<?php echo !empty($dataGet) ? $dataGet->nominal : ''; ?>" name="nominal"
                type="text" id="nominal" class="form-control required" placeholder="Nominal...">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label for="berlaku_dari">Berlaku dari <em class="text-danger">*</em></label>
            <input id="berlaku_dari" form="formDiskon"
                value="<?php echo !empty($dataGet) ? $dataGet->berlaku_dari : ''; ?>" name="berlaku_dari" type="text"
                class="form-control required" placeholder="Berlaku dari...">
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="berlaku_sampai">Berlaku sampai <em class="text-danger">*</em></label>
            <input form="formDiskon" value="<?php echo !empty($dataGet) ? $dataGet->berlaku_sampai : ''; ?>"
                name="berlaku_sampai" type="text" id="berlaku_sampai" class="form-control required"
                placeholder="Berlaku sampai...">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6 col-sm-6">
        <a href="javascript:void(0)" class="btn btn-warning btn-user btn-block act-batal">
            <em class="fa fa-undo-alt"></em> Batal
        </a>
    </div>
    <div class="col-lg-6 col-sm-6">
        <button href="javascript:void(0)" type="submit" form="formDiskon" class="btn btn-primary btn-user btn-block">
            <em class="fa fa-envelope"></em> Simpan
        </button>


    </div>
</div>