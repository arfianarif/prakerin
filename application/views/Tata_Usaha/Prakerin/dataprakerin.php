<div class="card shadow mb-4 border-left-primary">
    <div class="card-header ">
        <div class="float-left">
            <h6 class="font-weight-bold text-primary">Data Pendaftar</h6>
        </div>
        <div class="float-right">
            <!-- <button href="#" class="btn btn-sm btn-primary btn-icon-split" id="js-add-btn">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Data</span>
            </button> -->
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive table-sm">
            <table class="table table-bordered" id="js-datatable-siswa" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="5%" align="center">#</th>
                        <th>Nama</th>
                        <th>Nama Instansi</th>
                        <th>Alamat Instansi</th>
                        <th>Status</th>
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
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
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
            url = "<?= base_url() . 'Tata_Usaha/Prakerin/getData' ?>";

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
                        columns: [1, 2, 3, 4]
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
                        columns: [1, 2, 3, 4]
                    },
                    customize: function(doc) {
                        doc.content[1].table.widths =
                            Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                    }
                }
            ]

        });

        $(document).on('click', '#js-add-btn', (e) => {
            modalHandlerAdd();
        })

        $(document).on('click', '.js-edit-btn', (e) => {
            let data = {
                'id': $(e.target).data('id')
            };
            $.get(url + 'ById', data,
                function(res, textStatus, jqXHR) {
                    if (res.status) {
                        modalHandlerEdit(res.data);
                    } else {

                    }
                },
                "json"
            );
        })

        $(document).on('click', '.js-delete-btn', (e) => {
            let data_id = $(e.target).data('id');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url() ?>" + 'Tata_Usaha/Prakerin/deleteData',
                        data: {
                            id_siswa: data_id
                        },
                        dataType: "json",
                        success: function(response) {
                            console.log({
                                response
                            });
                            if (response.status) {
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                ).then(() => {
                                    location.reload();
                                });
                            }
                        }
                    });

                }
            })
        })

        modalHandlerAdd = async () => {
            let
                btnProcess = '',
                mTitle = '',
                mBody = '';

            mTitle = "Tambah Data Siswa";
            btnProcess = "Tambah Data";
            mBody += `
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="">NIS</label>
							<input type="text" class="form-control" name="nis" placeholder="">
						</div>
						<div class="form-group">
							<label class="">Nama</label>
							<input type="text" class="form-control" name="nama" placeholder="">
						</div>
						<div class="form-group">
							<label class="">Alamat</label>
							<input type="text" class="form-control" name="alamat" placeholder="">
						</div>
						<div class="form-group">
							<label class="">TTL</label>
							<input type="text" class="form-control" name="ttl" placeholder="">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="">Email</label>
							<input type="text" class="form-control" name="email" placeholder="">
						</div>
						<div class="form-group">
							<label class="">Password</label>
							<input type="text" class="form-control" name="password" placeholder="">
						</div>
					</div>
				</div>
			`;

            await gModalTitle.html(mTitle);
            await gModalBody.html(mBody);
            await gModalBtn.html(btnProcess);
            await gModalBtn.attr('data-params', 'add');
            globalModal.modal('show');
        }

        modalHandlerEdit = async (data) => {
            console.log({
                data
            });
            let
                selected = '',
                btnProcess = '',
                mTitle = '',
                mBody = '',
                select = '';

            btnProcess = "Save Data";
            mTitle = "Edit Data Praktik";

            selectArr = [
                'pending',
                'disetujui',
                'selesai'
            ];
            $.each(selectArr, function(i, v) {
                if (v == data.status) {
                    select += `
                    <option value="${v}" selected>${v}</option>
                 `;
                } else {
                    select += `
                    <option value="${v}">${v}</option>
                 `;
                }

            });
            switch (data.status) {
                case "pending":
                    selected = 'selected';
                    break;
                case "disetujui":
                    selected = 'selected';
                    break;
                case "disetujui":
                    selected = 'selected';
                    break;

                default:
                    selected = '';
                    break;
            }

            mBody += `
				<div class="row">
					<input hidden type="text" class="form-control" name="id_praktik" value="${data.id_praktik}">
					<div class="col-md-6">
						<div class="form-group">
							<label class="">NIS</label>
							<input type="text" class="form-control" name="nis" placeholder="${data.nis}" readonly>
						</div>
						<div class="form-group">
							<label class="">Nama</label>
							<input type="text" class="form-control" name="nama" placeholder="${data.nama}" readonly>
						</div>
						<div class="form-group">
							<label class="">Nama Instansi</label>
							<input type="text" class="form-control" name="nama_instansi" placeholder="${data.nama_instansi}">
						</div>
						<div class="form-group">
							<label class="">Alamat Instansi</label>
							<input type="text" class="form-control" name="alamat_instansi" placeholder="${data.alamat_instansi}">
						</div>
					</div>
					<div class="col-md-6">
						
						<div class="form-group">
							<label class="">Status</label>
							<select class="form-control" id="" name="status">
								${select}
							</select>
						</div>
					</div>
				</div>
			`;

            await gModalTitle.html(mTitle);
            await gModalBody.html(mBody);
            await gModalBtn.html(btnProcess);
            await gModalBtn.attr('data-params', 'edit');
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

        addDataSiswa = async () => {
            let data = $('#js-form').serialize();
            $.ajax({
                type: "POST",
                url: "<?= base_url() ?>" + 'Tata_Usaha/Prakerin/addData',
                data: data,
                dataType: "json",
                success: function(response) {
                    if (response.status) {
                        Swal.fire({
                            title: 'Berhasil',
                            text: "Data berhasil ditambahkan",
                            icon: 'success',
                        }).then(() => {
                            location.reload();
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!'
                        })
                    }
                }
            });
        }

        editDataSiswa = async () => {
            let data = $('#js-form').serialize();

            $.ajax({
                type: "POST",
                url: "<?= base_url() ?>" + 'Tata_Usaha/Prakerin/editData',
                data: data,
                dataType: "json",
                success: function(response) {
                    if (response.status) {
                        Swal.fire({
                            title: 'Berhasil',
                            text: "Data berhasil diupdate",
                            icon: 'success',
                        }).then(() => {
                            location.reload();
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!'
                        })
                    }
                }
            });
        }
    });
</script>