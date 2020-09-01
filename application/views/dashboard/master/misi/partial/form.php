<?php if (!empty($dataGet)) {?>
<input form="formMisi" value="<?php echo $dataGet->id; ?>" name="id" type="hidden">
<?php }?>

<div class="form-group">
    <label for="kode">Deskripsi <em class="text-danger">*</em></label>
    <textarea form="formMisi" name="deskripsi" class="form-control required" cols="3" rows="2"
        placeholder="Deskripsi..."><?php echo !empty($dataGet) ? $dataGet->deskripsi : ''; ?></textarea>
</div>

<div class="row">
    <div class="col-lg-6 col-sm-6">
        <a href="javascript:void(0)" class="btn btn-warning btn-user btn-block act-batal">
            <em class="fa fa-undo-alt"></em> Batal
        </a>
    </div>
    <div class="col-lg-6 col-sm-6">
        <button href="javascript:void(0)" type="submit" form="formMisi" class="btn btn-primary btn-user btn-block">
            <em class="fa fa-envelope"></em> Simpan
        </button>
    </div>
</div>
