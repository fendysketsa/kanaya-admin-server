<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800"><?= $mode == 'setoran' ? 'Data Setoran Marketing' : 'Laporan Laba/Rugi'; ?></h1>
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
                       <!--  <em class="btn btn-primary btn-sm pull-right add-produk" data-toggle="modal" data-target="#formModalProduk"
                            data-backdrop="static" data-keyboard="false">
                            <i class="fa fa-plus"></i> Marketing
                        </em> -->
                    </h6>


                </div>
                 <?php 
                if($mode == 'laba'){ ?>
                 <div class="col-lg-10 mb-2 align-items-center" >
                            <div class="card px-2 py-2 mt-2">
                                <label><b>Cetak Laporan Laba/Rugi</b></label>
                             <form class="form-inline" action="<?php echo site_url('setoran/print'); ?>" method="POST">

                   
                                <div class="form-group mx-sm-3 mb-2">
                                 <div class="input-group to-date">
                                    <span class="input-group-addon">
                                        <em class="fa fa-calendar"></em>
                                    </span>
                                    <input type="date" id="range_date" name="start_date" class="form-control dr-picker"
                                        placeholder="Isikan tanggal awal sampai akhir">
                                </div>

                                 </div>
                                <div class="form-group mx-sm-3 mb-2">
                                 <div class="input-group to-date">
                                    <span class="input-group-addon">
                                        <em class="fa fa-calendar"></em>
                                    </span>
                                    <input type="date" id="range_date" name="end_date" class="form-control dr-picker"
                                        placeholder="Isikan tanggal awal sampai akhir">
                                </div>
                                 </div>
                                 <div class="form-group mx-sm-3 mb-2">
                                    <label for="inputPassword2" class="sr-only">Type</label>
                                    <select class="form-control" name="type">
                                        <option value="all">Seluruh data penjualan</option>
                                        <option value="tgl">Berdasar Periode Tanggal</option>
                                    </select>
                                 </div>
                                <button type="submit" class="btn btn-success mb-2">Print </button>
                                <!--   <button type="submit" class="btn btn-primary mb-2">Print</button> -->
                                </form>
                            </div> 

                        </div>
                    <?php } ?>
                <div class="card-body">
                    <div class="<?= $mode == 'setoran' ? 'load-data' : ''; ?>">
			<?php if($mode == 'setoran') { ?>
                        <em class="fa fa-spin fa-spinner"></em> Loading...
			<?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>