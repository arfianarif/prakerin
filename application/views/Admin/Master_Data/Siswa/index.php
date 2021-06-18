<div class="card shadow mb-4 border-left-primary">
	<div class="card-header ">
		<div class="float-left">
			<h6 class="font-weight-bold text-primary">Data Master Siswa</h6>
		</div>
		<div class="float-right">
			<button href="#" class="btn btn-sm btn-primary btn-icon-split" id="js-add-btn">
				<span class="icon text-white-50">
					<i class="fas fa-plus"></i>
				</span>
				<span class="text">Tambah Data</span>
			</button>
		</div>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="js-datatable-siswa" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th width="5%" align="center">#</th>
						<th>NIS</th>
						<th>Email</th>
						<th>Password</th>
						<th width="12%">Action</th>
					</tr>
				</thead>

				<tbody>

				</tbody>
			</table>
		</div>
	</div>
</div>


<div class="modal fade" id="globalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalTitle">Lorem Ipsum</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form id="js-form" autocomplete="off">
				<div class="modal-body">

				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
					<button id="js-btn-global-modal" class="btn btn-primary" type="button" data-params="null">Lorem Ipsum</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		const
			globalModal = $('#globalModal'),
			gModalTitle = globalModal.find('#modalTitle'),
			gModalBody = globalModal.find('.modal-body'),
			gModalBtn = $('#js-btn-global-modal'),
			url = "<?= base_url() . 'Ajax/Siswa/getData' ?>";

		$(document).on('click', '#js-add-btn', (e) => {
			console.log(
				e.target
			);
			modalHandler('add');
		})

		$(document).on('click', '.js-edit-btn', (e) => {
			let id = $(e.target).data('id');
			modalHandler('edit', id);
		})

		$(document).on('click', '.js-delete-btn', (e) => {
			let id = $(e.target).data('id');
			alert(id);
		})

		let modalHandler = async (params, id = null) => {
			let
				btnProcess = '',
				mTitle = '',
				mBody = '';
			if (params == 'add') {
				mTitle = "Tambah Data Siswa";
				btnProcess = "Tambah";
				mBody = `
				<div class="form-group">
					<label for="exampleInputEmail1">Email address</label>
					<input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
					
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Password</label>
					<input type="password" class="form-control" name="password" placeholder="Password">
				</div>
				`;
			} else {
				btnProcess = "Edit";
				mTitle = "Edit Data Siswa";
				let dataSiswa = await getDataSiswa();

				await getDataSiswa(id);
			}
			await gModalTitle.html(mTitle);
			await gModalBody.html(mBody);
			await gModalBtn.html(btnProcess);
			await gModalBtn.attr('data-params', params);
			globalModal.modal('show');
		}

		gModalBtn.on('click', (e) => {
			let params = $(e.target).data('params');
			if (params == 'add') {
				addDataSiswa();
			} else {
				editDataSiswa();
			}
		})


		let addDataSiswa = async () => {
			let data = $('#js-form').serialize();
			console.log({
				data
			});
			$.ajax({
				type: "POST",
				url: "<?= base_url() ?>" + 'Ajax/Siswa/addData',
				data: data,
				dataType: "json",
				success: function(response) {

				}
			});
		}

		let editDataSiswa = async () => {
			let data = $('#js-form').serialize();
			console.log({
				data
			});
			$.ajax({
				type: "POST",
				url: "<?= base_url() ?>" + 'Ajax/Siswa/editData',
				data: data,
				dataType: "json",
				success: function(response) {

				}
			});
		}

		let getDataSiswa = async (id) => {
			$.ajax({
				type: "GET",
				url: url + 'ById',
				data: {
					id: id
				},
				dataType: "json",
				success: function(response) {
					console.log({
						response
					});
				}
			});
		}

		let table = $('#js-datatable-siswa').DataTable({
			"processing": true,
			"serverSide": true,
			"ajax": url,
			"pageLength": 100,
			"dom": 'Bfrtip',
			"buttons": [{
					text: 'EXCEL',
					className: 'btn btn-success',
					extend: 'excelHtml5',
					message: '',
					orientation: 'landscape',
					exportOptions: {
						columns: [1, 2, 3]
					}
				},
				{
					text: 'PDF',
					className: 'btn btn-danger',
					extend: 'pdfHtml5',
					message: '',
					download: 'open',
					footer: true,
					orientation: 'landscape',
					exportOptions: {
						columns: [1, 2, 3]
					},
					customize: function(doc) {
						doc.content[1].table.widths =
							Array(doc.content[1].table.body[0].length + 1).join('*').split('');
					}
				}
			]

		});
	});
</script>