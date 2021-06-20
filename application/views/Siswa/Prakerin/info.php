<div class="card shadow mb-4 border-left-primary" data-aos="zoom-in" data-aos-duration="600">
    <div class="card-header">
        <div class="float-left mt-2">
            <h5>Daftar Praktik Kerja Industri</h5>
        </div>
        <div class="float-right">
            <button class="btn btn-xs btn-primary btn-daftar">Daftar</button>
        </div>
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
                    Status :
                </div>
            </div>
        </div>
        <hr>
        <div class="form-daftar">
            <form id="form-daftar-value">
                <div class="row">
                    <div class="col-md-12">
                        <h5><b>Form Pendaftaran Praktik Kerja Lapangan:</b></h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="identitas-pengaju">
                                    <p><b>Bagian identitas pengajuan pendaftar :</b></p>
                                    <div class="form-group">
                                        <label class="">Nama</label>
                                        <input type="text" class="form-control" name="nis" placeholder="Isikan Nama Anda">
                                    </div>
                                    <div class="form-group">
                                        <label class="">NIS</label>
                                        <input type="text" class="form-control" name="nis" placeholder="Isikan NIS Anda">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="">Jurusan</label>
                                                <select class="form-control" id="" name="jurusan">
                                                    <option value="0">Mesin</option>
                                                    <option value="1">TKJ</option>
                                                    <option value="2">Perkantoran</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="">Tipe :</label>
                                                <div class="d-flex flex-row">
                                                    <div class="col-md-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="individu" id="individu" value="option1">
                                                            <label class="form-check-label" for="individu">
                                                                Individu
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="kelompok" id="kelompok" value="option1">
                                                            <label class="form-check-label" for="kelompok">
                                                                Kelompok
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-kelompok">
                                        <div class="d-flex flex-row justify-content-between">
                                            <p>Daftar Kelompok :</p>
                                            <button class="btn btn-primary btn-xs">
                                                Tambah
                                            </button>
                                        </div>
                                        <div class="kelompok-items" data-id="">
                                            <div class="form-group">
                                                <label class="">Nama</label>
                                                <input type="text" class="form-control" name="nis" placeholder="Isikan Nama Anda">
                                            </div>
                                            <div class="form-group">
                                                <label class="">NIS</label>
                                                <input type="text" class="form-control" name="nis" placeholder="Isikan NIS Anda">
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="">Jurusan</label>
                                                        <select class="form-control" id="" name="jurusan">
                                                            <option value="0">Mesin</option>
                                                            <option value="1">TKJ</option>
                                                            <option value="2">Perkantoran</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="kelompok-items" data-id="">
                                            <div class="form-group">
                                                <label class="">Nama</label>
                                                <input type="text" class="form-control" name="nis" placeholder="Isikan Nama Anda">
                                            </div>
                                            <div class="form-group">
                                                <label class="">NIS</label>
                                                <input type="text" class="form-control" name="nis" placeholder="Isikan NIS Anda">
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="">Jurusan</label>
                                                        <select class="form-control" id="" name="jurusan">
                                                            <option value="0">Mesin</option>
                                                            <option value="1">TKJ</option>
                                                            <option value="2">Perkantoran</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="identitas-tempat-praktik">
                                    <p><b>Bagian identitas tempat praktik yang diajukan :</b></p>
                                    <div class="form-group">
                                        <label class="">Nama Instansi / Tempat Magang</label>
                                        <input type="text" class="form-control" name="nama-instansi" placeholder="Isikan Nama Instansi">
                                    </div>
                                    <div class="form-group">
                                        <label class="">Alamat</label>
                                        <textarea class="form-control" id="" name="alamat-instansi" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>

<script>
    $(document).ready(function() {
        const
            daftar = new daftarHandler(),
            formDaftarWrapper = $('.form-daftar'),
            btndaftar = $('.btn-daftar');

        btndaftar.on('click', () => {

        })

        function daftarHandler() {
            const d = this;

            d.init = init;
            d.add = add;

            function init() {
                let element = '';

                element = `
                    <div class="row">
                        
                    </div>
                `;
            }

            function add() {

            }
        }
    });
</script>