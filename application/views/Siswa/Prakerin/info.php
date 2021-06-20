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
                                        <input hidden type="text" class="js-input form-control" name="id_siswa" value="<?= $this->session->userdata('id_user'); ?>">
                                        <p><b>Bagian identitas pengajuan pendaftar :</b></p>
                                        <div class="form-group">
                                            <label class="">Nama</label>
                                            <input type="text" class="form-control js-input" name="nama" placeholder="Isikan Nama">
                                        </div>
                                        <div class="form-group">
                                            <label class="">NIS</label>
                                            <input type="text" class="form-control js-input" name="nis" placeholder="Isikan NIS">
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
                                                            <input type="checkbox" class="js-input form-check-input" id="kelompok" name="kelompok">
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
                            <input type="text" class="js-input form-control" name="nama" placeholder="Isikan Nama">
                        </div>
                        <div class="form-group">
                            <label class="">NIS Anggota 1</label>
                            <input type="text" class="js-input form-control" name="nis" placeholder="Isikan NIS">
                        </div>
                        
                    </div>
                    <hr>
                    <div class="kelompok-items" data-id="2">
                        <div class="form-group">
                            <label class="">Nama Anggota 2</label>
                            <input type="text" class="js-input form-control" name="nama" placeholder="Isikan Nama">
                        </div>
                        <div class="form-group">
                            <label class="">NIS Anggota 2</label>
                            <input type="text" class="js-input form-control" name="nis" placeholder="Isikan NIS">
                        </div>
                        
                    </div>
                `;
                    wKelompok.html(content);
                } else {
                    wKelompok.html('');
                }
            });

            btndaftar.on('click', () => {
                dataForm = {};
                dataForm.pengaju = wIdentitasPengaju.find('.js-input').serializeArray();
                dataForm.tempat_praktik = wIdentitasTempatPraktik.find('.js-input').serializeArray();
                if ($('input.js-input').is(':checked')) {
                    kelompok = [];
                    $.each(wKelompok.find('.kelompok-items'), function(i, v) {
                        kelompok[i] = $(v).find('.js-input').serializeArray();
                    });
                    dataForm.kelompok = kelompok;
                }

                $.ajax({
                    type: "POST",
                    url: "<?= base_url(); ?>Siswa/Prakerin/Daftar/addPendaftaran",
                    data: dataForm,
                    dataType: "json",
                    success: function(response) {
                        console.log({
                            response
                        });
                    }
                });
            })


        });
    </script>
<?php else : ?>

<?php endif; ?>