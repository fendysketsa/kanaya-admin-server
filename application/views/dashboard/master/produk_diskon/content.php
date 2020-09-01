<div class="container-fluid">

	<div class="d-sm-flex align-items-center justify-content-between mb-2">
		<h1 class="h3 mb-0 text-gray-800">Diskon Produk</h1>
	</div>
	<form id="formProduk" enctype="multipart/form-data" class="user" action="<?php echo $pages['url']; ?>"></form>
	<div class="row">

		<?php if ($this->session->userdata('success_message')) { ?>
			<div class="alert alert-success" role="alert">
				<?php echo $this->session->userdata('success_message'); ?>
			</div>
		<?php } ?>

		<?php if ($this->session->userdata('error_message')) { ?>
			<div class="alert alert-danger" role="alert">
				<?php echo $this->session->userdata('error_message'); ?>
			</div>
		<?php } ?>
		<div class="col-lg-12">
			<div class="card mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">
						<i class="fa fa-th-list fa-fw"></i> Data
						<em class="btn btn-primary btn-sm pull-right add-produk" id="modalProdukDiskonBtn" data-toggle="modal" data-target="#formModalProdukDiskon" data-backdrop="static" data-keyboard="false">
							<i class="fa fa-plus"></i> Tambah Diskon Produk
						</em>
						<em class="btn btn-primary  btn-sm pull-right add-produk" hidden="" id="modalProdukDiskonBtn2" data-toggle="modal" data-target="#formModalProdukDiskon2" data-backdrop="static" data-keyboard="false">
							<i class="fa fa-plus"></i> Tambah Diskon Produk
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

<div class="modal fade" id="formModalProdukDiskon2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header title-block">
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
				<h5 class="modal-title text-center" id="exampleModalLabel">
					<em class="fa fa-tags"></em> udpate Produk Diskon
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
							<div class="">
								<form id="formDiskon2" method="POST" action="<?php echo site_url('produkDiskon/update'); ?>">
									<div class="row">
										<input name="id" id="id2" type="hidden">

										<div class="col-lg-12">
											<div class="form-group">
												<label for="kode">Produk <em class="text-danger">*</em></label>

												<input id="produk_nama2" form="formProduk" value="" name="produk_nama_2" type="text" class="form-control required" placeholder="Nama produk...">
												<input type="hidden" name="produk_id" id="produk_id2" value="">
											</div>
										</div>

										<div class="col-lg-12">
											<div class="form-group">
												<label for="provinsi">Diskon <em class="text-danger">*</em></label>

												<select class="form-control" name="diskon_id" id="diskon_id2" required="">
													<option value="">Pilih Dkiskon</option>
												</select>
											</div>
										</div>



									</div>

									<button hidden="" type="submit" id="ok_sub2"></button>

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
							<button data-dismiss="modal" aria-label="Close" class="btn btn-warning btn-user btn-block act-batal">
								<em class="fa fa-undo-alt"></em> Batal
							</button>
						</div>
						<div class="col-lg-6 col-sm-6">
							<button href="javascript:void(0)" id="btnProdukDis2" class="btn btn-primary btn-user btn-block">
								<em class="fa fa-envelope"></em> Simpan
							</button>
							</ div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
