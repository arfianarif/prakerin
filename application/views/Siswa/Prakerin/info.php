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

    </div>
</div>

<script>
    $('.btn-daftar').click(function() {
        let endpoint = 'form_daftar';
        window.location = "<?= base_url() . 'Siswa/Prakerin/Daftar/' ?>" + endpoint;
    })
</script>