<div class="row">
    <?php if (!empty($dataGet)) {?>
    <input form="formWilayah" value="<?php echo $dataGet->id; ?>" data-selected="<?php echo $dataGet->selected; ?>" name="id" type="hidden">
    <?php }?>

    <div class="col-lg-12">
        <div class="form-group">
            <label for="selectKota">Kota <em class="text-danger">*</em></label>
            <select id="selectKota" form="formWilayah" name="kota" class="form-control required"></select>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="form-group">
            <label for="kode">Kode <em class="text-danger">*</em></label>
            <input id="kode" form="formWilayah" value="<?php echo !empty($dataGet) ? $dataGet->kode : ''; ?>"
                name="kode" type="text" class="form-control required" placeholder="Kode...">
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="kodepos">Kode Pos <em class="text-danger">*</em></label>
            <input id="kodepos" form="formWilayah" value="<?php echo !empty($dataGet) ? $dataGet->kode_pos : ''; ?>"
                name="kode_pos" type="text" class="form-control required" placeholder="Kode Pos...">
        </div>
    </div>

    <div class="col-lg-12">
        <div class="form-group">
            <label for="nama">Nama <em class="text-danger">*</em></label>
            <input form="formWilayah" value="<?php echo !empty($dataGet) ? $dataGet->nama : ''; ?>" name="nama"
                type="text" id="nama" class="form-control required" placeholder="Nama...">
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
        <button href="javascript:void(0)" type="submit" form="formWilayah" class="btn btn-primary btn-user btn-block">
            <em class="fa fa-envelope"></em> Simpan
        </button>
        </ div>
    </div>
