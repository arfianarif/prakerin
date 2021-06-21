<div class="card shadow mb-4 border-left-primary" data-aos="zoom-in" data-aos-duration="600">
    <div class="card-header">
        <div class="float-left mt-2">
            <h5>Daftar Praktik Kerja Industri</h5>
        </div>
        <?php if ($prakerin['status'] == 0) : ?>
            <div class="float-right">
                <button class="btn btn-xs btn-primary btn-daftar">Daftar</button>
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
                        <span class="badge badge-success">Sudah Mendaftar</span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <hr>
        <?php if ($prakerin['status'] == 0) : ?>
            <div class="form-daftar">
                <form id="form-daftar-value">
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
                                            <label class="">Nama</label>
                                            <input type="text" class="form-control js-input" name="nama[]" placeholder="Isikan Nama">
                                        </div>
                                        <div class="form-group">
                                            <label class="">NIS</label>
                                            <input type="text" class="form-control js-input" name="nis[]" placeholder="Isikan NIS" required>
                                        </div>
                                        <div class="row">
                                            <!-- <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="">Jurusan</label>
                                                    <select class="form-control js-input" id="" name="jurusan">
                                                        <option value="0">Mesin</option>
                                                        <option value="1">TKJ</option>
                                                        <option value="2">Perkantoran</option>
                                                    </select>
                                                </div>
                                            </div> -->
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
                                    <div class="form-kelompok">

                                    </div>
                                    <hr>
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
<?php if ($prakerin['status'] == 0) : ?>
    <script>
        $(document).ready(function() {
            const
                formWrapper = $('#form-daftar-value'),
                wIdentitasPengaju = $('.identitas-pengaju'),
                wIdentitasTempatPraktik = $('.identitas-tempat-praktik'),
                wKelompok = $('.form-kelompok'),
                formDaftarWrapper = $('.form-daftar'),
                btndaftar = $('.btn-daftar');


            $('#kelompok').change(function() {
                // this will contain a reference to the checkbox   
                if (this.checked) {
                    let content = `
                    <div class="d-flex flex-row justify-content-between">
                        <p>Daftar Kelompok :</p>
                    </div>
                    <div class="kelompok-items" data-id="1">
                        <div class="form-group">
                            <label class="">Nama Anggota 1</label>
                            <input type="text" class="js-input form-control" name="nama[]" placeholder="Isikan Nama">
                        </div>
                        <div class="form-group">
                            <label class="">NIS Anggota 1</label>
                            <input type="text" class="js-input form-control" name="nis[]" placeholder="Isikan NIS">
                        </div>
                        
                    </div>
                    <hr>
                    <div class="kelompok-items" data-id="2">
                        <div class="form-group">
                            <label class="">Nama Anggota 2</label>
                            <input type="text" class="js-input form-control" name="nama[]" placeholder="Isikan Nama">
                        </div>
                        <div class="form-group">
                            <label class="">NIS Anggota 2</label>
                            <input type="text" class="js-input form-control" name="nis[]" placeholder="Isikan NIS">
                        </div>
                        
                    </div>
                `;
                    wKelompok.html(content);
                } else {
                    wKelompok.html('');
                }
            });

            function swalHandler(data) {
                Swal.fire(
                    data.title,
                    data.message,
                    data.type
                )
            }

            function validation() {
                let x = formWrapper.find('.js-input').each((y, z) => {
                    z = $(z).val();
                    if (z == "") {
                        return false;
                    }
                });
                return x;
            }
            btndaftar.on('click', async () => {
                // let x = validation();
                // if (x === false) {
                //     let data = {};
                //     data.title = 'Peringatan !';
                //     data.message = 'Harap isi semua data';
                //     data.type = 'warning';
                //     swalHandler(data);
                // } else {

                // }

                // if (validation()) {

                // } else {
                //     let data = {};
                //     data.title = 'Peringatan !';
                //     data.message = 'Harap isi semua data';
                //     data.type = 'warning';
                //     swalHandler(data);
                // }
                let is_ok = 0;
                let dataForm = {};
                dataForm.nama = $(".js-input[name='nama[]']")
                    .map(function() {
                        return $(this).val();
                    }).get();

                // dataForm.nama_instansi = $(".js-input[name='nama_instansi']")
                //     .map(function() {
                //         let data = {};
                //         if ($(this).val() == "") {
                //             data.title = 'Peringatan !';
                //             data.message = 'Harap isi form nama instansi';
                //             data.type = 'warning';
                //             is_ok = 0;
                //             swalHandler(data);
                //         } else {
                //             is_ok = 1;
                //             return $(this).val();
                //         }
                //     }).get();
                dataForm.nama_instansi = $(".js-input[name='nama_instansi']")
                    .map(function() {
                        return $(this).val();
                    }).get();


                dataForm.alamat_instansi = $(".js-input[name='alamat_instansi']")
                    .map(function() {
                        return $(this).val();
                    }).get();


                dataForm.nis = $(".js-input[name='nis[]']")
                    .map(function() {
                        let data = {};
                        if ($(this).val() == "") {
                            data.title = 'Peringatan !';
                            data.message = 'Harap isi form NIS';
                            data.type = 'warning';
                            is_ok = 0;
                            swalHandler(data);
                        } else {
                            datapost = {};
                            datapost.nis = $(this).val();
                            $.ajax({
                                type: "POST",
                                url: "<?= base_url(); ?>Siswa/Prakerin/Daftar/cekFormSiswa",
                                data: datapost,
                                dataType: "json",
                                success: function(response) {
                                    if (response.status === true) {
                                        is_ok = 1;
                                        return $(this).val();
                                    } else {
                                        is_ok = 0;
                                        Swal.fire(
                                            'Peringatan !',
                                            response.message,
                                            'warning'
                                        )
                                    }
                                }
                            });
                        }
                    }).get();


                console.log({
                    is_ok
                });
            })

            function postData(data) {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url(); ?>Siswa/Prakerin/Daftar/addPendaftaran",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        console.log("ok");
                        console.log({
                            response
                        });
                    }
                });
            }
        });
    </script>
<?php else : ?>

<?php endif; ?>