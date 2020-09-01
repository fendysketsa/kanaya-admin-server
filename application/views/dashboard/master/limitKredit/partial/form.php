<div class="row">
    <?php if (!empty($dataGet)) {?>
    <input form="formLimitKredit" value="<?php echo $dataGet->id; ?>" data-selected="<?php echo $dataGet->nama; ?>"
        name="id" type="hidden">
    <?php }?>

    <div class="col-lg-12">
        <div class="form-group">
            <label for="kategori">Kategori <em class="text-danger">*</em></label>
            <select name="nama" id="kategori" form="formLimitKredit" class="form-control required"></select>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="form-group">
            <label for="limit">Limit <em class="text-danger">*</em></label>
            <input form="formLimitKredit" value="<?php echo !empty($dataGet) ? rupiah($dataGet->limit) : ''; ?>"
                name="limit" type="rupiah" id="limit" class="form-control required" placeholder="Limit...">
        </div>
    </div>

    <div class="col-lg-6">
        <div class="form-group">
            <label for="dp">DP <em class="text-danger">*</em></label>
            <input form="formLimitKredit" value="<?php echo !empty($dataGet) ? rupiah($dataGet->dp) : ''; ?>" name="dp"
                type="rupiah" id="dp" class="form-control required" placeholder="DP...">
        </div>
    </div>

    <div class="col-lg-6">
        <div class="form-group">
            <label for="angsuran">Angsuran <em class="text-danger">*</em></label>
            <input form="formLimitKredit" value="<?php echo !empty($dataGet) ? rupiah($dataGet->angsuran) : ''; ?>"
                name="angsuran" type="rupiah" id="angsuran" class="form-control required" placeholder="Angsuran...">
        </div>
    </div>

    <div class="col-lg-6">
        <div class="form-group">
            <label for="angsuranx">Angsuran <sup class="text-danger">( optional )</sup></label>
            <input form="formLimitKredit" value="<?php echo !empty($dataGet) ? rupiah($dataGet->angsuran_ext) : ''; ?>"
                name="angsuran_ext" type="rupiah" id="angsuranx" class="form-control"
                placeholder="Angsuran terakhir...">
        </div>
    </div>

    <div class="col-lg-12">
        <label for="week">Berapa Kali <em class="text-danger">*</em></label>
        <div class="form-group input-group">
            <input form="formLimitKredit" value="<?php echo !empty($dataGet) ? rupiah($dataGet->x_week) : ''; ?>"
                name="x_week" type="rupiah" id="week" class="form-control required" placeholder="Berapa kali...">
            <span class="input-group-addon">minggu</span>
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
        <button href="javascript:void(0)" type="submit" form="formLimitKredit"
            class="btn btn-primary btn-user btn-block">
            <em class="fa fa-envelope"></em> Simpan
        </button>
        </ div>
    </div>
