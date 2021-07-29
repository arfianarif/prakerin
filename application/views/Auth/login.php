<div class="p-5">
	<div class="text-center">
		<h5 class="text-gray-900 mb-4">Sistem PRAKERIN</h5>
		<h3 class="text-gray-900 mb-4">Praktek Kerja Industri</h3>
	</div>
	<div class="logo d-flex flex-row align-items-center justify-content-center">
		<img src="<?= base_url() . "assets/img/logo.png"; ?>" alt="">
	</div>
	<div class="text-center m-4">
		<p class="text-gray-900 mb-4">SMK PURNAMA TEMPURAN</p>
	</div>

	<?= form_open('Auth/Login/authentication'); ?>
	<div class="mt-5">
		<div class="form-group">
			<!-- <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..."> -->
			<input class="form-control form-control-user" placeholder="Email / No Identitas" name="username" type="text">
		</div>
		<div class="form-group">
			<!-- <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password"> -->
			<input class="form-control form-control-user" placeholder="Password" name="pass" type="password">
		</div>
		<div class="float-right">

			<button type="submit" class="btn btn-primary my-4">Sign in</button>
		</div>
	</div>

	<?= form_close() ?>

</div>