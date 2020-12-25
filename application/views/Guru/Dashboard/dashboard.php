<div class="row">
	<div class="col-xl-3 col-md-6 mb-4 " data-aos="fade-down">
		<div class="dashboard-card" data-id="Siswa">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Siswa</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-user fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-xl-3 col-md-6 mb-4" data-aos="fade-down" data-aos-delay="200">
		<div class="dashboard-card" data-id="Guru">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Data Siswa Individu</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-user fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-xl-3 col-md-6 mb-4" data-aos="fade-down" data-aos-delay="400">
		<div class="dashboard-card" data-id="Tata_Usaha">
			<div class="card border-left-warning shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Data Siswa Kelompok</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-user fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$('.dashboard-card').click(function() {
		let endpoint = $(this).data('id');
		window.location = "<?= base_url() . 'Admin/Master_Data/' ?>" + endpoint;
	})
</script>