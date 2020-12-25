<div class="daftar">
    <div class="card shadow mb-4 border-left-primary" data-aos="zoom-in" data-aos-duration="600">
        <div class="card-header">
            <div class="float-left mt-2">
                <h5>Daftar Praktik Kerja Industri</h5>
            </div>

        </div>
        <?= form_open(); ?>
        <div class="card-body">
            <fieldset class="form-group">
                <div class="row">
                    <div class="col-md-1">
                        <label>Type : </label>
                    </div>
                    <div class="col-md-2">
                        <div class="form-check">
                            <input class="form-check-input radio_individu" type="radio" name="radio_individu" id="radio_individu" value="option1">
                            <label class="form-check-label" for="radio_individu">
                                Individu
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-check">
                            <input class="form-check-input radio_kelompok" type="radio" name="radio_kelompok" id="radio_kelompok" value="option2">
                            <label class="form-check-label" for="radio_kelompok">
                                Kelompok
                            </label>
                        </div>
                    </div>
                </div>
            </fieldset>
            <div class="individu">
                <label>Individu</label>
                <div class="form-group">
                    <label for="nama_siswa">Nama Siswa</label>
                    <input type="text" class="form-control" id="nama_siswa" placeholder="Text Here">
                </div>
                <label>Tempat Praktek</label>
                <div class="form-group">
                    <label for="nama_siswa">Tempat</label>
                    <input type="text" class="form-control" id="nama_siswa" placeholder="Text Here">
                </div>
            </div>

            <div class="kelompok">
                <label>Kelompok</label>
                <div class="form-group">
                    <label for="nama_siswa">Nama Siswa ( Ketua )</label>
                    <input type="text" class="form-control" id="nama_siswa" placeholder="Text Here">
                </div>
                <div class="form-group">
                    <label for="nama_siswa">Nama Siswa</label>
                    <input type="text" class="form-control" id="nama_siswa" placeholder="Text Here">
                </div>
                <div class="form-group">
                    <label for="nama_siswa">Nama Siswa</label>
                    <input type="text" class="form-control" id="nama_siswa" placeholder="Text Here">
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Daftar</button>
        </div>
        <?= form_close(); ?>
    </div>
</div>

<script>
    $('.daftar').ready(function() {
        $('.individu').hide();
        $('.kelompok').hide();
    })

    $('.btn-daftar').click(function() {
        $('.daftar').show();
    })

    $('.btn-daftar').click(function() {
        $('.daftar').show();
    })

    $('.radio_kelompok').click(function() {
        $('.radio_individu').prop('checked', false);
        $('.individu').hide();
        $('.kelompok').show();

    })

    $('.radio_individu').click(function() {
        $('.radio_kelompok').prop('checked', false);
        $('.individu').show();
        $('.kelompok').hide();
    })
</script>