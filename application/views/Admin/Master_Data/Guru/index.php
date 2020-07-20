<div class="card shadow mb-4 border-left-primary">
    <div class="card-header ">
        <div class="float-left">
            <h6 class="font-weight-bold text-primary">Data Master Guru</h6>
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
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="5%" align="center">#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th width="12%">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1;
                    foreach ($content as $key) : ?>
                        <tr>
                            <td align="center"><?= $i++ ?></td>
                            <td><?= $key->nama_guru ?></td>
                            <td><?= $key->email ?></td>
                            <td><?= $key->password ?></td>
                            <td align="center">
                                <button class="edit-btn btn btn-warning btn-circle btn-sm" data-toggle="modal" data-target="#edit" data-id="<?= $key->id ?>">
                                    <i class="fas fa fa-edit"></i>
                                </button>
                                <a href="<?= base_url() . 'Admin/Master_Data/Guru/Delete/' . $key->id ?>" class="btn btn-danger btn-circle btn-sm">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
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
            <?= form_open('Admin/Master_Data/Guru/add'); ?>
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

<div id="edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <?= form_open('Admin/Master_Data/Guru/update'); ?>
            <div class="modal-body">

                <div class="form-group">
                    <input hidden type="text" class="form-control" id="id-edit" name="id" placeholder="name@example.com">
                </div>

                <div class="row">
                    <div class="col md-6">
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="text" class="form-control" id="email-edit" name="email" placeholder="name@example.com">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" id="password-edit" name="password" placeholder="Password">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama_guru" placeholder="Text Here">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" class="form-control" id="nik" name="nik" placeholder="Text Here">
                        </div>
                    </div>
                </div>

                <!-- <div class="form-group">
                    <label for="ttl">Tempat Tanggal Lahir </label> <br>

                    <input type="text" class="form-control" id="ttl-edit" name="ttl" placeholder="Text Here">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat </label>
                    <textarea name="alamat" class="form-control" id="alamat-edit" rows="2" placeholder="Text Here"></textarea>
                </div> -->
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Dismiss</button>
                <button class="btn btn-primary confirm-edit" type="submit" data-id="#">Accept</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>
<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">detail Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <?= form_open('Admin/Master_Data/Guru/detail'); ?>
            <div class="modal-body">
                <div class="bd-example">

                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="text" class="form-control" id="email-detail" name="email" placeholder="name@example.com">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" class="form-control" id="password-detail" name="password" placeholder="Password">
                    </div>

                    <!-- <div class="form-group">
                        <label for="exampleFormControlTextarea1">Example textarea</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div> -->

                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Dismiss</button>
                <button class="btn btn-primary" type="submit">Accept</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        modalEdit();
        modalDetail();
    });

    function modalEdit() {
        $('.edit-btn').click(function() {
            let base_url = "<?php echo base_url() . 'Admin/Master_Data/Guru/' ?>";
            let id = $(this).data('id');
            // $('.id-edit').val(id);
            // $('.confirm-edit').data('id', id);
            // console.log(id);
            $.ajax({
                url: base_url + 'getData/' + id,
                type: "POST",
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    $('#id-edit').val(response.id);
                    $('#email-edit').val(response.email);
                    $('#password-edit').val(response.password);
                    $('#nama').val(response.nama_guru);
                    $('#nik').val(response.nik);
                    // $('#ttl-edit').val(response.ttl);
                    // $('#alamat-edit').val(response.alamat);
                    // $('#edit').modal('handleUpdate');
                    $('#edit').modal('show');
                }
            });
        });
    }

    function modalDetail() {
        $('.detail-btn').click(function() {
            let base_url = "<?php echo base_url() . 'Admin/Master_Data/Guru/' ?>";
            let id = $(this).data('id');
            console.log(id);

            $.ajax({
                url: base_url + 'getData/' + id,
                type: "POST",

                dataType: "json",
                success: function(response) {
                    console.log(response);

                    $('#detail').modal('show');
                }
            });
        });
    }
</script>