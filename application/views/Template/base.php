<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="<?= base_url() . 'assets/img/logo.png' ?>" type="image/x-icon">
	<title>Sistem Pendaftaran PKL</title>

	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />

	<link href="<?= base_url() . 'assets/base/' ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<link href="<?= base_url() . 'assets/base/' ?>css/sb-admin-2.min.css" rel="stylesheet">
	<!-- <link href="<?= base_url() . 'assets/base/' ?>new/css/bootstrap.min.css" rel="stylesheet"> -->
	<link href="<?= base_url() . 'assets/base/' ?>css/custom.css" rel="stylesheet">
	<script src="<?= base_url() . 'assets/base/' ?>vendor/jquery/jquery.min.js"></script>
	<?php if (isset($custom_css)) : ?>
		<?= $custom_css ?>
	<?php endif; ?>
	<link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/base/' ?>datatable/datatables.min.css" />


</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" data-aos="fade-right">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
				<div class="sidebar-brand-icon ">
					<i class="fas fa-compress"></i>
				</div>
				<div class="sidebar-brand-text mx-3">pra-ker-in</div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<?php if (isset($nav)) : ?>
				<?= $nav ?>
			<?php endif; ?>

			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">

			<!-- Sidebar Toggler (Sidebar) -->
			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>

		</ul>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light bg-primary topbar mb-4 static-top shadow">

					<!-- Sidebar Toggle (Topbar) -->
					<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
						<i class="fa fa-bars"></i>
					</button>

					<!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto">

						<?php if ($this->session->userdata('id_role') == 1) : ?>
							<li class="nav-item dropdown no-arrow mx-1">
								<a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<span class="mr-2 d-none d-lg-inline small ">
										Login as <?= $this->session->email; ?>
									</span>
									<i class="fas fa-code-branch"></i>
									<!-- Counter - Alerts -->
									<span class="badge badge-danger"></span>
								</a>
								<!-- Dropdown - Alerts -->

								<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
									<h6 class="dropdown-header">
										User Previllage
									</h6>
									<?php foreach ($this->session->userdata('role') as $role) : ?>
										<a class="dropdown-item" href="<?= base_url() . 'Switch_Account/switch/' . $role['nama_role'] ?>">
											<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-700"></i>
											<?= $role['nama_role'] ?>
										</a>
									<?php endforeach; ?>
								</div>

							</li>
						<?php endif; ?>

						<div class="topbar-divider d-none d-sm-block"></div>

						<!-- Nav Item - User Information -->
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="mr-2 d-none d-lg-inline small text-grey-700" style="text-transform:capitalize !important;">
									<?= $this->session->previllage; ?>
								</span>

								<i class="fas fa-user fa-sm fa-fw mr-2 justify-content-center"></i>


							</a>
							<!-- Dropdown - User Information -->
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
								<?php if ($this->session->id_role != '1') : ?>
									<a class="dropdown-item" href="<?= base_url() . $this->session->previllage . '/Profile' ?>">
										<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
										Profile
									</a>
									<div class="dropdown-divider"></div>
								<?php endif; ?>

								<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
									<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
									Logout
								</a>
							</div>
						</li>

					</ul>

				</nav>
				<!-- End of Topbar -->

				<!-- Begin Page Content -->
				<div class="container-fluid">
					<div class="row mb-2 ml-1 ">
						<nav aria-label="breadcrumb" data-aos="zoom-in" data-aos-duration="800">
							<ol class="breadcrumb">
								<?php
								$i = 1;
								$uri = explode('/', uri_string());
								foreach ($uri as $key) : ?>
									<li class="breadcrumb-item" style="text-transform: capitalize !important;">
										<?= $key ?>
									</li>
								<?php endforeach; ?>
							</ol>
						</nav>
					</div>
					<?php if (isset($content)) : ?>
						<?= $content ?>
					<?php endif; ?>
				</div>
				<!-- /.container-fluid -->

			</div>
			<!-- End of Main Content -->

			<!-- Footer -->
			<footer class="sticky-footer bg-white">
				<div class="container my-auto">
					<div class="copyright text-center my-auto">
						<span>Copyright &copy; Sistem Pendaftaran PKL</span>
					</div>
				</div>
			</footer>
			<!-- End of Footer -->

		</div>
		<!-- End of Content Wrapper -->

	</div>
	<!-- End of Page Wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	<!-- Logout Modal-->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">Anda Yakin ingin Keluar?</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<a class="btn btn-primary" href="<?= base_url() . 'Auth/Login/logout' ?>">Logout</a>
				</div>
			</div>
		</div>
	</div>

	<!-- <script src="<?= base_url() . 'assets/base/' ?>vendor/jquery/jquery.min.js"></script> -->
	<script src="<?= base_url() . 'assets/base/' ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<script src="<?= base_url() . 'assets/base/' ?>vendor/jquery-easing/jquery.easing.min.js"></script>

	<script src="<?= base_url() . 'assets/base/' ?>js/sb-admin-2.min.js"></script>
	<script src="<?= base_url() . 'assets/base/' ?>js/jquery.steps.js"></script>

	<script src="<?= base_url() . 'assets/base/' ?>js/custom.js"></script>
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

	<script type="text/javascript" src="<?= base_url() . 'assets/base/' ?>datatable/datatables.min.js"></script>
	<script>
		AOS.init();
	</script>

	<script src="<?= base_url() . 'assets/base/' ?>js/sweetalert2.all.min.js"></script>
	<?php if (isset($custom_js)) : ?>
		<?= $custom_js; ?>
	<?php endif; ?>

</body>

</html>