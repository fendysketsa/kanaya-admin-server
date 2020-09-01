
<form id="formMarketing" enctype='multipart/form-data' method="POST" action="<?php echo !empty($dataGet) ? site_url('order/update') : site_url('order/store'); ?>">
<div class="row"  >
    <?php if (!empty($dataGet)) {?>
     <input form="formMarketing" value="<?php echo $dataGet->id; ?>" name="id" type="hidden">
    <?php //echo '<pre>'.print_r($dataGet, true) .'</pre>'; ?>
    <?php } ?>
    <div class="col-lg-6">
        <div class="form-group input-field">
            <label class="active">Tanggal Transaksi *log</label>
             <input type="datetime-local" class="form-control" value="<?php echo !empty($dataGet) ? str_replace(" ","T", $dataGet->tanggal_cicilan)  : ''; ?>"  name="tanggal_log" placeholder="Tanggal log Transaksi ..."   required>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="form-group">
            <label>Nomnal Transaksi Log <em class="text-danger">*</em></label>
            <input value="<?php echo !empty($dataGet) ? $dataGet->nominal : ''; ?>" 
                type="text" class="form-control required" name="nominal" placeholder="nominal Transaksi log..." required>
        </div>
    </div>

    
</div>

<button hidden="" type="submit" id="ok_sub"></button>
</form>
