
<form id="formMarketing" enctype='multipart/form-data' method="POST" action="<?php echo !empty($dataGet) ? site_url('notif/update') : site_url('notif/store'); ?>">
<div class="row"  >
    <?php if (!empty($dataGet)) {?>
     <input form="formMarketing" value="<?php echo $dataGet->id; ?>" name="id" type="hidden">
    <?php } ?>
    <div class="col-lg-6">
        <div class="form-group input-field">
            <label class="active">Member</label>
            <?php if(empty($dataGet)){ ?>
            <input id="member_nama" form="formProduk" value="<?php echo !empty($dataGet) ? $dataGet->nama : ''; ?>" name="kode"
                type="text" class="form-control " placeholder="Nama produk...">
                <input type="hidden" name="member_id" id="member_id" value="<?php echo !empty($dataGet) ? $dataGet->produk_id : ''; ?>">
            <?php } else { ?>
            <input type="text" id="member_nama2" name="member" class="form-control" id="produk_nama" value="" placeholder="">
            <?php  } ?>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="form-group">
            <label for="marketing">Marketing <em class="text-danger">*</em></label>
           <?php if(empty($dataGet)){ ?>
            <input id="marketing" form="formProduk" value="<?php echo !empty($dataGet) ? $dataGet->nama : ''; ?>" name="kode"
                type="text" class="form-control " placeholder="Nama produk...">
                <input type="hidden" name="marketing_id" id="marketing_id" value="<?php echo !empty($dataGet) ? $dataGet->produk_id : ''; ?>">
            <?php } else { ?>
            <input type="text" name="produk_nama" class="form-control" id="produk_nama" value="" placeholder="<?php echo $dataGet->nama; ?>">
            <?php  } ?>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
            <label for="tanggal_lahir">Judul Pesan <em class="text-danger">*</em></label>
            <input form="formMarketing" value="<?php echo !empty($dataGet) ? $dataGet->judul : ''; ?>" name="judul"
                type="text" id="judul" class="form-control required" placeholder="judul..." required>
        </div>
    </div>

     <div class="col-lg-12">
        <div class="form-group">
            <label for="nama">Pesan <em class="text-danger">*</em></label>
            <textarea form="formMarketing" class="form-control required" name="pesan" id="pesan" placeholder="pesan.." required ><?php echo !empty($dataGet) ? $dataGet->keterangan : ''; ?></textarea>
        </div>
    </div>
    <div class="col-lg-6" hidden="">
        <div class="form-group">
            <label for="">Logo <em class="text-danger">*</em></label>
           <input type="file" class="form-control-file" id="foto" name="foto">
        </div>
    </div>

    <div class="col-lg-6" hidden="">
        <div class="form-group">
           <label for="manager_id">Foto Preview <em class="text-danger">*</em></label>
           <input type="hidden" name="status_foto" value="false">
           <?php if (!empty($dataGet)) {?>
             <img src="<?php echo $dataGet->judul; ?>" alt="" class="img-thumbnail" id="img-upload" style="max-height: 150px;">
           <?php }else{ ?>
           <img src="<?php echo site_url('/assets/dashboard/upload/images/custom-image.png'); ?>" alt="" class="img-thumbnail" id="img-upload" style="max-height: 150px;">
       <?php } ?>
        </div>
    </div>
</div>

<button hidden="" type="submit" id="ok_sub"></button>
</form>


<script type="text/javascript">
  var member = {
    url : window.location.origin +'/notif/get_member',
     getValue: "nama",

    list: {
        match: {
      enabled: true
    },
    onSelectItemEvent: function() {
            var value = $("#member_nama").getSelectedItemData().member_id;
            $("#member_id").val(value).trigger("change");
        }
  },
  theme: "square"
}

$("#member_nama").easyAutocomplete(member);

var marketing = {
    url : window.location.origin +'/notif/get_marketing',
     getValue: "nama",

    list: {
        match: {
      enabled: true
    },
    onSelectItemEvent: function() {
            var value = $("#marketing").getSelectedItemData().marketing_id;
           // alert(value);
            $("#marketing_id").val(value).trigger("change");
        }
  },
  theme: "square"
}

$("#member_nama2").easyAutocomplete(marketing);

 var member2 = {
    url : window.location.origin +'/notif/get_member',
     getValue: "nama",

    list: {
        match: {
      enabled: true
    },
    onSelectItemEvent: function() {
            var value = $("#member_nama2").getSelectedItemData().member_id;
            $("#member_id2").val(value).trigger("change");
        }
  },
  theme: "square"
}

$("#member_nama2").easyAutocomplete(member2);
</script>
