
<form id="formMarketing" enctype='multipart/form-data' method="POST" action="<?php echo !empty($dataGet) ? site_url('marketing/update') : site_url('marketing/store'); ?>">
<div class="row"  >
    <?php if (!empty($dataGet)) {?>
     <input form="formMarketing" value="<?php echo $dataGet->id; ?>" name="id" type="hidden">
     <input form="formMarketing" value="<?php echo $dataGet->foto; ?>" name="gambar" type="hidden">



    <?php } ?>
    <div class="col-lg-6">
        <div class="form-group input-field">
            <label class="active">Nama</label>
             <input id="type" form="formMarketing" value="<?php echo !empty($dataGet) ? 'edit' : 'store'; ?>" name="type"
                type="hidden" class="form-control required" placeholder="nama ...">
             <input id="nama" form="formMarketing" value="<?php echo !empty($dataGet) ? $dataGet->nama : ''; ?>" name="nama"
                type="text" class="form-control required" placeholder="nama ..." required>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="form-group">
            <label for="tempat_lahir">Tempat Lahir <em class="text-danger">*</em></label>
            <input id="tempat_lahir" form="formMarketing" value="<?php echo !empty($dataGet) ? $dataGet->tempat_lahir : ''; ?>" name="tempat_lahir"
                type="text" class="form-control required" placeholder="tempat Lahir..." required>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir <em class="text-danger">*</em></label>
            <input form="formMarketing" value="<?php echo !empty($dataGet) ? $dataGet->tanggal_lahir : ''; ?>" name="tanggal_lahir"
                type="date" id="tanggal_lahir" class="form-control required" placeholder="Nama..." required>
        </div>
    </div>

     <div class="col-lg-6">
        <div class="form-group">
            <label for="nama">Alamat <em class="text-danger">*</em></label>
            <textarea form="formMarketing" class="form-control required" name="alamat" id="alamat" placeholder="alamat.." required ><?php echo !empty($dataGet) ? $dataGet->alamat : ''; ?></textarea>
        </div>
    </div>

     <div class="col-lg-6">
        <div class="form-group">
            <label for="telepon">Telepon <em class="text-danger">*</em></label>
            <input id="telepon" form="formMarketing" value="<?php echo !empty($dataGet) ? $dataGet->telepon : ''; ?>" name="telepon"
                type="text" class="form-control required" placeholder="tempat Lahir...">
        </div>
    </div>

     <div class="col-lg-6">
        <div class="form-group">
            <label for="email">E-Mail <em class="text-danger">*</em></label>
            <input id="email" form="formMarketing" value="<?php echo !empty($dataGet) ? $dataGet->email : ''; ?>" name="email"
                type="email" class="form-control required" placeholder="email...">
        </div>
    </div>

     <div class="col-lg-6">
        <div class="form-group">
            <label for="trip_fee">Trip Fee <em class="text-danger">*</em></label>
            <input id="trip_fee" form="formMarketing" value="<?php echo !empty($dataGet) ? $dataGet->trip_fee : ''; ?>" name="trip_fee"
                type="text" class="form-control required" placeholder="trip fee..." required>
        </div>
    </div>

     <div class="col-lg-6">
        <div class="form-group">
            <label for="Point">Point <em class="text-danger">*</em></label>
            <input id="point" form="formMarketing" value="<?php echo !empty($dataGet) ? $dataGet->point : ''; ?>" name="point"
                type="text" class="form-control required" placeholder="point..." required>
        </div>
    </div>
     <div class="col-lg-6">
        <div class="form-group">
            <label for="provinsi">Provinsi <em class="text-danger">*</em></label>
            <?php if(empty($dataGet)) {                 ?>
            <select class="form-control" name="provinsi" id="provinsi_id"  required="">
                    <option value="">Pilih Provinsi</option>
                <?php foreach ($provinsi as $dt) { ?>
                    <option value="<?php echo $dt['id']; ?>"><?php echo $dt['nama']; ?></option>
                <?php } ?>
            </select>
        <?php }else{ ?>
            <select class="form-control" name="provinsi" id="provinsi_id"  required="">
                    <option value="<?php echo $dataGet->provinsi_id; ?>"><?php echo $dataGet->provinsi; ?></option>
                <?php foreach ($provinsi as $dt) { ?>
                    <option value="<?php echo $dt['id']; ?>"><?php echo $dt['nama']; ?></option>
                <?php } ?>
            </select>

        <?php } ?>
        </div>
    </div>
     <div class="col-lg-6">
        <div class="form-group">
            <label for="kota">Kota Kabupaten <em class="text-danger">*</em></label>
            <?php if(empty($dataGet)) {     ?>
            <select class="form-control" name="provinsi" id="kabupaten_id"  form="formMarketing" required="">
                    <option value="">Pilih kabupaten Kota</option>
            </select>
        <?php }else{ ?>
             <select class="form-control" name="provinsi" id="kabupaten_id"  form="formMarketing" required="">
                    <option value="<?php echo $dataGet->kabupaten_id; ?>"><?php echo $dataGet->kota; ?></option>
            </select>
        <?php } ?>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="kecamatan_id">Kecamatan <em class="text-danger">*</em></label>
             <?php if(empty($dataGet)) {     ?>
            <select class="form-control" name="kecamatan_id" id="kecamatan_id"  form="formMarketing" required="">
                    <option value="">Pilih kecamatan</option>   
            </select>
           <?php }else{ ?>
            <select class="form-control" name="kecamatan_id" id="kecamatan_id"  form="formMarketing" required="">
                    <option value="<?php echo $dataGet->kecamatan_id; ?>"><?php echo $dataGet->kecamatan; ?></option>   
            </select>
           <?php } ?>
        </div>
    </div>

     <div class="col-lg-6">
        <div class="form-group">
            <label for="manager_id">Manager Marketing <em class="text-danger">*</em></label>
            <?php if(empty($dataGet)) {                 ?>
            <select class="form-control" name="manager_id" form="formMarketing">
                    <option value="">Manager</option>
                <?php foreach ($manager as $dt) { ?>
                    <option value="<?php echo $dt['id']; ?>"><?php echo $dt['nama']; ?></option>
                <?php } ?>
            </select>
        <?php }else{ ?>
             <select class="form-control" name="manager_id" form="formMarketing">
                    <option value="<?php echo $manager_id; ?>"><?php echo $mymanager; ?></option>
                <?php foreach ($manager as $dt) { ?>
                    <option value="<?php echo $dt['id']; ?>"><?php echo $dt['nama']; ?></option>
                <?php } ?>
            </select>
        <?php } ?>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="form-group">
            <label for="">Foto <em class="text-danger">*</em></label>
           <input type="file" class="form-control-file" id="foto" name="foto">
        </div>
    </div>

    <div class="col-lg-6">
        <div class="form-group">
           <label for="manager_id">Foto Preview <em class="text-danger">*</em></label>
           <input type="hidden" name="status_foto" value="false">
           <?php if (!empty($dataGet)) {?>
             <img src="<?php echo $dataGet->foto; ?>" alt="" class="img-thumbnail" id="img-upload" style="max-height: 150px;">
           <?php }else{ ?>
           <img src="<?php echo site_url('/assets/dashboard/upload/images/custom-image.png'); ?>" alt="" class="img-thumbnail" id="img-upload" style="max-height: 150px;">
       <?php } ?>
        </div>
    </div>
</div>

<button hidden="" type="submit" id="ok_sub"></button>
</form>


<script type="text/javascript">
    $('#provinsi_id').change(function(){
           let id = $(this).val();
            // /alert(id);
             $.ajax({
              type : 'GET',
              url  : window.location.origin +'/marketing/kabupaten/'+id,
              dataType : 'text',
              success  : function(resp){

                  console.log(resp);
                  $('#kabupaten_id').html(resp);

              }, error : function(resp){
                 alert('gagal memanggil data provinsi');
              }
             });
    });

    $('#kabupaten_id').change(function(){
           let id = $(this).val();
            // /alert(id);
             $.ajax({
              type : 'GET',
              url  : window.location.origin +'/marketing/kecamatan/'+id,
              dataType : 'text',
              success  : function(resp){

                  console.log(resp);
                  $('#kecamatan_id').html(resp);

              }, error : function(resp){
                 alert('gagal memanggil data provinsi');
              }
             });
    });

    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('#img-upload').attr('src', e.target.result);
                    $('#status_foto').val('true');
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }

    $("#foto").change(function(){
            readURL(this);
    }); 
</script>
