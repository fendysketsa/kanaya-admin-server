<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Notif</h1>
    </div>
    <form id="formProduk" enctype="multipart/form-data" class="user" action="<?php echo $pages['url']; ?>"></form>
    <div class="row">

          <?php if($this->session->userdata('success_message')){ ?>
        <div class="alert alert-success" role="alert">
              <?php echo $this->session->userdata('success_message'); ?>
           </div>
        <?php } ?>

        <?php if($this->session->userdata('error_message')){ ?>
        <div class="alert alert-danger" role="alert">
               <?php echo $this->session->userdata('error_message'); ?>
           </div>
        <?php } ?>
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fa fa-th-list fa-fw"></i> Data
                        <em class="btn btn-primary btn-sm pull-right add-produk" data-toggle="modal" data-target="#formModalNotif"
                            data-backdrop="static" data-keyboard="false">
                            <i class="fa fa-plus"></i> Kirim Notif
                        </em>
                    </h6>

                </div>
                <div class="card-body">
                    <div class="load-data">
                        <em class="fa fa-spin fa-spinner"></em> Loading...
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="formModalNotifup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header title-block">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h5 class="modal-title text-center" id="exampleModalLabel">
                    <em class="fa fa-tags"></em> Update2 Notif
                </h5>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <i class="fa fa-edit fa-fw"></i> Form
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="load-form1">
                               <form id="formMarketing" enctype='multipart/form-data' method="POST" action="<?php echo !empty($dataGet) ? site_url('notif/update') : site_url('notif/store'); ?>">
        <div class="row"  >
           
             <input form="formMarketing"  name="id" id="notif_id" type="hidden">
            <div class="col-lg-6">
                <div class="form-group input-field">
                    <label class="active">Member</label>
                    <?php if(empty($dataGet)){ ?>
                    <input id="member_nama2" form="formProduk"  name="mem"
                        type="text" class="form-control " placeholder="Nama member...">
                        <input type="hidden" name="member_id" id="member_id2" value="<?php echo !empty($dataGet) ? $dataGet->produk_id : ''; ?>">
                                            <?php } ?>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="marketing">Marketing <em class="text-danger">*</em></label>
                                           <?php if(empty($dataGet)){ ?>
                                            <input id="marketing2" form="formProduk" value="<?php echo !empty($dataGet) ? $dataGet->nama : ''; ?>" name="kode"
                                                type="text" class="form-control " placeholder="Nama produk...">
                                                <input type="hidden" name="marketing_id" id="marketing_id2" value="<?php echo !empty($dataGet) ? $dataGet->produk_id : ''; ?>">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <button data-dismiss="modal" aria-label="Close"
                                class="btn btn-warning btn-user btn-block act-batal">
                                <em class="fa fa-undo-alt"></em> Batal
                            </button>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                           <button href="javascript:void(0)" type="submit" id="submit_notifup" form="formMarketing"
                                class="btn btn-primary btn-user btn-block">
                                <em class="fa fa-envelope"></em> Simpan
                            </button>
                            </ div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   