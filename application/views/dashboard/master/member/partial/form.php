<div class="row">
	<?php if (!empty($dataGet)) { ?>
		<input form="formMarketing" value="<?php echo $dataGet->id; ?>" name="id" type="hidden">
		<input form="formMarketing" value="<?php echo $dataGet->foto; ?>" name="gambar" type="hidden">
	<?php } ?>
	<div class="col-lg-12">
		<div class="card mb-2">
			<div class="card-header">
				Akses Login
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group input-field">
							<label class="active">Username</label>
							<input id="nama" form="formMarketing" value="<?php echo !empty($dataGet) ? $dataGet->username : ''; ?>" name="username" type="text" class="form-control" placeholder="username ..." disabled readonly>
						</div>
					</div>

					<div class="col-lg-6">
						<div class="form-group input-field">
							<label class="active">Password</label>
							<input id="nama" form="formMarketing" value="" name="password" type="password" class="form-control" placeholder="kata sandi ...">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-3">
		<div class="form-group input-field">
			<label class="active">No Member</label>
			<input id="type" form="formMarketing" value="<?php echo !empty($dataGet) ? 'edit' : 'store'; ?>" name="type" type="hidden" class="form-control" placeholder="No Member ...">
			<input id="nama" form="formMarketing" value="<?php echo !empty($dataGet) ? $dataGet->no_member : ''; ?>" name="nama" type="text" class="form-control required" placeholder="No Member ..." disabled readonly>
		</div>
	</div>

	<div class="col-lg-6">
		<div class="form-group input-field">
			<label class="active">Nama</label>
			<input id="type" form="formMarketing" value="<?php echo !empty($dataGet) ? 'edit' : 'store'; ?>" name="type" type="hidden" class="form-control required" placeholder="nama ...">
			<input id="nama" form="formMarketing" value="<?php echo !empty($dataGet) ? $dataGet->nama : ''; ?>" name="nama" type="text" class="form-control required" placeholder="nama ..." required>
		</div>
	</div>

	<div class="col-lg-3">
		<div class="form-group">
			<label for="tanggal_lahir">Tanggal Lahir <em class="text-danger">*</em></label>
			<input form="formMarketing" value="<?php echo !empty($dataGet) ? $dataGet->tanggal_lahir : ''; ?>" name="tanggal_lahir" type="date" id="tanggal_lahir" class="form-control required" placeholder="Nama..." required>
		</div>
	</div>

	<div class="col-lg-6">
		<div class="form-group">
			<label for="telepon">Telepon <em class="text-danger">*</em></label>
			<input id="telepon" form="formMarketing" value="<?php echo !empty($dataGet) ? $dataGet->telepon : ''; ?>" name="telepon" type="text" class="form-control required" placeholder="tempat Lahir...">
		</div>
	</div>

	<div class="col-lg-6">
		<div class="form-group">
			<label for="email">E-Mail <em class="text-danger">*</em></label>
			<input id="email" form="formMarketing" value="<?php echo !empty($dataGet) ? $dataGet->email : ''; ?>" name="email" type="email" class="form-control required" placeholder="email...">
		</div>
	</div>

	<div class="col-lg-6">
		<div class="form-group">
			<label for="">Foto <em class="text-danger">*</em></label>
			<input type="file" form="formMarketing" class="form-control-file" id="foto" name="foto">
		</div>
	</div>

	<div class="col-lg-6">
		<div class="form-group">
			<label for="manager_id">Foto Preview <em class="text-danger">*</em></label>
			<input type="hidden" name="status_foto" value="false">
			<?php if (!empty($dataGet)) { ?>
				<img src="<?php echo $dataGet->foto; ?>" alt="" class="img-thumbnail" id="img-upload" style="max-height: 150px;">
			<?php } else { ?>
				<img src="<?php echo site_url('/assets/dashboard/upload/images/custom-image.png'); ?>" alt="" class="img-thumbnail" id="img-upload" style="max-height: 150px;">
			<?php } ?>
		</div>
	</div>
</div>

<button hidden="" form="formMarketing" type="submit" id="ok_sub"></button>



<script type="text/javascript">
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function(e) {
				$('#img-upload').attr('src', e.target.result);
				$('#status_foto').val('true');
			}

			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#foto").change(function() {
		readURL(this);
	});
</script>
