<div class="card shadow mb-4 border-left-primary">
	<div class="card-header ">
		<div class="float-left">
			<h6 class="font-weight-bold text-primary">Data Master Siswa</h6>
		</div>
		<div class="float-right">
			<a href="#" class="btn btn-sm btn-primary btn-icon-split" data-toggle="modal" data-target="#add">
				<span class="icon text-white-50">
					<i class="fas fa-plus"></i>
				</span>
				<span class="text">Tambah Data</span>
			</a>
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


<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<?= form_open('Admin/Master_Data/Siswa/add'); ?>
			<div class="modal-body">
				<div class="bd-example">

					<div class="form-group">
						<label for="email">Email address</label>
						<input type="text" class="form-control" id="email-add" name="email" placeholder="name@example.com">
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="text" class="form-control" id="password-add" name="password" placeholder="Password">
					</div>

					<!-- <div class="form-group">
                        <label for="exampleFormControlTextarea1">Example textarea</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div> -->

				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
				<button class="btn btn-primary" type="submit">Tambah</button>
			</div>
			<?= form_close(); ?>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		const url = "<?= base_url() . 'Ajax/Siswa/getData' ?>";

		let table = $('#js-datatable-siswa').DataTable({
			"processing": true,
			"serverSide": true,
			"ajax": url,
			// "order": [
			// 	[2, "desc"]
			// ],
			"pageLength": 100,
			"dom": 'Bfrtip',
			"buttons": [{
				text: 'PDF',
				className: 'btn btn-danger mr-3',
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
			}]

		});
	});
</script>