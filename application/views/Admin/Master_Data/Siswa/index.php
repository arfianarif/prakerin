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
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="5%" align="center">#</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th width="12%">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1;
                    foreach ($content as $key) : ?>
                        <tr>
                            <?= $key->id ?>
                            <td align="center"><?= $i++ ?></td>
                            <td><?= $key->email ?></td>
                            <td><?= $key->password ?></td>
                            <td align="center">
                                <a href="#" id="detail-btn" data-id="<?= $key->id ?>" class="btn btn-info btn-circle btn-sm" data-toggle="modal" data-target="#detail">
                                    <i class="fas fa-info-circle"></i>
                                </a>
                                <button id="edit-btn" class="btn btn-warning btn-circle btn-sm" data-toggle="modal" data-target="#edit" data-id="<?= $key->id ?>">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </button>
                                <a href="<?= base_url() . 'Admin/Master_Data/Siswa/Delete/' . $key->id ?>" class="btn btn-danger btn-circle btn-sm">
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

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <?= form_open('Admin/Master_Data/Siswa/edit'); ?>
            <div class="modal-body">
                <div class="bd-example">

                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="text" class="form-control" id="email-edit" name="email" placeholder="name@example.com">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" class="form-control" id="password-edit" name="password" placeholder="Password">
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

<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">detail Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <?= form_open('Admin/Master_Data/Siswa/detail'); ?>
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
        $('#edit-btn').click(function() {

            let id = $(this).data('id');
            console.log(id);

            $.ajax({
                url: '<?php echo base_url() . '#' ?>',
                type: "POST",

                dataType: "json",
                success: function(response) {
                    console.log(response);

                    $('#edit').modal('show');
                }
            });
        });
    }

    function modalDetail() {
        $('#detail-btn').click(function() {

            let id = $(this).data('id');
            console.log(id);

            $.ajax({
                url: '<?php echo base_url() . '#' ?>',
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