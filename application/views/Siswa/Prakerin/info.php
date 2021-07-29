<div class="row">
	<div class="col-md-8">
		<div class="card shadow mb-4 border-left-primary" data-aos="zoom-in" data-aos-duration="600">
			<div class="card-header">
				<div class="float-left mt-2">
					<h5>Daftar Praktik Kerja Industri</h5>
				</div>
				<?php if ($prakerin['status'] == 0) : ?>
					<div class="float-right">
						<button class="btn btn-xs btn-primary " id="btn-daftar">Daftar</button>
					</div>
				<?php endif; ?>
			</div>
			<div class="card-body">
				<div class="info">
					<div class="row">
						<div class="col-md-8">
							<h5>Tata cara siswa mendaftar :</h5>
							<ol>
								<li>Pada halaman ini, terdapat informasi mengenai status siswa telah mengikuti / mendaftar kerja praktik</li>
								<li>Tekan tombol Daftar untuk mengisi form pendaftaran</li>
								<li>Siapkan semua berkas keperluan</li>
								<li>Tata Usaha akan memberikan infomasi di halaman ini mengenai proses pendaftaran siswa</li>
							</ol>
						</div>
						<div class="col-md-4">
							<h5>Status :</h5>
							<?php if ($prakerin['status'] == 0) : ?>
								<span class="badge badge-danger">Belum Mendaftar</span>
							<?php else : ?>
								<?php if ($prakerin['keterangan'] == 'ditolak') : ?>
									<span class="badge badge-danger">Ditolak</span>
								<?php elseif ($prakerin['keterangan'] == 'disetujui') : ?>
									<span class="badge badge-success">Sudah Disetujui</span>
									<p>Silahkan melakukan praktik lapangan</p>
								<?php elseif ($prakerin['keterangan'] == 'pending') : ?>
									<span class="badge badge-success">Sudah Mendaftar</span>
								<?php else : ?>
									<span class="badge badge-success">Selesai</span>
								<?php endif; ?>

							<?php endif; ?>
						</div>
					</div>
				</div>
				<hr>
				<?php if ($prakerin['status'] == 0) : ?>
					<div class="form-daftar">
						<form id="form-daftar-value" action="<?= base_url() ?>Siswa/Prakerin/save">
							<div class="row">
								<div class="col-md-12">
									<h5><b>Form Pendaftaran Praktik Kerja Lapangan:</b></h5>
									<hr>
									<div class="row">
										<div class="col-md-8">
											<div class="identitas-pengaju">
												<input hidden type="text" class="form-control" name="id_siswa" value="<?= $this->session->userdata('id_user'); ?>">
												<p><b>Bagian identitas pengajuan pendaftar :</b></p>
												<div class="form-group">
													<label class="">NIS</label>
													<input type="number" step="1" class="form-control js-input js-nis" name="nis[]" placeholder="Isikan NIS" required>
												</div>
												<div class="form-group">
													<label class="">Nama</label>
													<input type="text" class="form-control js-input js-nama" name="nama[]" placeholder="Isikan Nama" required>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="">Tipe :</label>
															<div class="d-flex flex-row">
																<div class="form-check">
																	<input type="checkbox" class="form-check-input" id="kelompok" name="kelompok">
																	<label class="form-check-label" for="kelompok">Kelompok</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<hr>
											<div class="form-kelompok d-none">
												<div class="d-flex flex-row justify-content-between">
													<p>Daftar Kelompok :</p>
												</div>
												<div class="kelompok-items" data-id="1">
													<div class="form-group">
														<label class="">NIS Anggota 1</label>
														<input type="number" class="js-input js-nis form-control" name="nis[]" placeholder="Isikan NIS">
													</div>
													<div class="form-group">
														<label class="">Nama Anggota 1</label>
														<input type="text" class="js-input js-nama form-control" name="nama[]" placeholder="Isikan Nama">
													</div>
												</div>
												<hr>
												<div class="kelompok-items" data-id="2">
													<div class="form-group">
														<label class="">NIS Anggota 2</label>
														<input type="number" class="js-input js-nis form-control" name="nis[]" placeholder="Isikan NIS">
													</div>
													<div class="form-group">
														<label class="">Nama Anggota 2</label>
														<input type="text" class="js-input js-nama form-control" name="nama[]" placeholder="Isikan Nama">
													</div>
												</div>
												<hr>
											</div>
											<div class="identitas-tempat-praktik">
												<p><b>Bagian identitas tempat praktik yang diajukan :</b></p>
												<div class="form-group">
													<label class="">Nama Instansi / Tempat Magang</label>
													<input type="text" class="form-control js-input" name="nama_instansi" placeholder="Isikan Nama Instansi">
												</div>
												<div class="form-group">
													<label class="">Alamat</label>
													<textarea class="form-control js-input" id="" name="alamat_instansi" rows="3"></textarea>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				<?php else : ?>

				<?php endif; ?>


			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="card shadow mb-4 border-left-primary" data-aos="zoom-in" data-aos-duration="600">
			<div class="card-header">
				<div class="float-left mt-2">
					<h5>Riwayat Pendaftaran :</h5>

				</div>
			</div>
			<div class="card-body">
				<ul class="list-group">
					<?php if ($riwayat['status'] == 1) : ?>
						<?php foreach ($riwayat['data'] as $k => $v) : ?>
							<li class="list-group-item">
								<p class="m-0">Nama Instansi : <?= $v['nama_instansi'] ?></p>
								<p class="m-0">Tanggal : <?= $v['date_created'] ?></p>
								<p class="m-0">Status : <?= $v['status'] ?></p>

							</li>
						<?php endforeach; ?>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</div>
</div>
<?php if ($prakerin['status'] == 0) : ?>
	<script>
		const buttonSubmit = document.querySelector("#btn-daftar");
		const checkboxKelompok = document.querySelector("#kelompok");
		const inputNis = document.querySelectorAll(".js-nis");
		const inputName = document.querySelectorAll(".js-nama");

		checkboxKelompok.addEventListener("click", function(element) {
			const kelompokWrapper = document.querySelector(".form-kelompok");
			if (this.checked) {
				kelompokWrapper.classList.remove("d-none");
			} else {
				inputNis.forEach((inputElement, index) => {
					if (index > 0) {
						inputElement.value = ""
					}
				})
				inputName.forEach((inputElement, index) => {
					if (index > 0) {
						inputElement.value = ""
					}
				})
				kelompokWrapper.classList.add("d-none");
			}
		});

		inputNis.forEach((inputNisElement, index) => {

			inputNisElement.addEventListener("keyup", function() {
				let nis = this.value;
				getSiswaByNIS(nis).then(res => res.json())
					.then(data => {
						if (data.success) {
							inputNisElement.style.borderColor = "";
							inputName[index].value = data.data.nama;
							inputName[index].style.borderColor = "";
						} else {
							inputNisElement.style.borderColor = "red";
							inputName[index].style.borderColor = "red";
						}
					}).catch(err => {

					});

			});
		});

		buttonSubmit.addEventListener("click", function() {
			const input = document.querySelectorAll("input"),
				textArea = document.querySelectorAll("textarea");
			let error = 0;

			if (checkboxKelompok.checked) {
				input.forEach((el) => {
					if (el.value == "") {
						el.style.borderColor = "red";
						error++;
					}
					el.addEventListener("keyup", () => {
						el.style.borderColor = "";
					});
				});
			} else {
				input.forEach((el, index) => {
					let req = [1, 2, 8];

					if (req.includes(index) && el.value == "") {
						el.style.borderColor = "red";
						error++;
					}
					el.addEventListener("keyup", () => {
						el.style.borderColor = "";
					});
				});
			}

			textArea.forEach((el) => {
				if (el.value == "") {
					el.style.borderColor = "red";
					error++;
				}
				el.addEventListener("keyup", () => {
					el.style.borderColor = "";
				});
			});

			if (error > 0) {
				Swal.fire("Form belum lengkap", "lengkapi form untuk melanjutkan")
			} else {
				const formData = new FormData(document.querySelector('#form-daftar-value'));

				fetch(`<?= base_url() ?>Siswa/Prakerin/daftar/save`, {
						method: "post",
						body: formData
					}).then(res => res.json())
					.then(res => {
						console.log(res);
						if (res.success) {
							Swal.fire(
								"Success",
								"Selamat data berhasil diajukan",
								"success"
							).then(
								location.reload()
							)
						} else {
							Swal.fire(
								"Terjadi kesalahan",
								res.message,
								"error"
							)
						}
					})
				// document.querySelector('.form-daftar-value').submit();
			}
		});


		async function getSiswaByNIS(nis) {
			return fetch(`<?= base_url() ?>Siswa/Prakerin/daftar/getSiswa/${nis}`);
		}
	</script>
<?php else : ?>

<?php endif; ?>