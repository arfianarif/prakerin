<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= base_url() . 'assets/img/logo.png' ?>" type="image/x-icon">
    <title>Sistem Pendaftaran PKL</title>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />

    <link href="<?= base_url() . 'assets/base/' ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="<?= base_url() . 'assets/base/' ?>css/sb-admin-2.min.css" rel="stylesheet">
    <!-- <link href="<?= base_url() . 'assets/base/' ?>new/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="<?= base_url() . 'assets/base/' ?>css/custom.css" rel="stylesheet">
    <script src="<?= base_url() . 'assets/base/' ?>vendor/jquery/jquery.min.js"></script>
    <?php if (isset($custom_css)) : ?>
        <?= $custom_css ?>
    <?php endif; ?>
    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/base/' ?>datatable/datatables.min.css" />
</head>

<body>
    <div class="container-fluid">

        <div class="card-body">

            <div class="print m-3" id="print-div">
                <div class="d-flex flex-row justify-content-beetwen align-items-center">
                    <div class="col-md-2">
                        <div class="logo">
                            <img src="<?= base_url() . "assets/img/logo.png"; ?>" alt="">
                        </div>
                    </div>
                    <div class="col-md-10 text-center">
                        <div class="title">
                            <h5 class="card-title">SMK Purnama Tempuran</h5>
                            <p>JL. MAGELANG - PURWOREJO, Sidoagung, Kec. Tempuran, Kab. Magelang.</p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="items-body">
                    <div class="row">
                        <div class="col-md-8">
                            <p>Perihal : Permohonan Kerja Praktik</p>
                        </div>
                        <div class="col-md-4">
                            <p class="float-right">Magelang, <?= date("Y/m/d") ?></p>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-md-4">
                            <ul class="list-group p-0">
                                <li class="list-group-item border-0 p-1">Kepada Yth. </li>
                                <li class="list-group-item border-0 p-1">Pimpinan <?= $praktik->nama_instansi; ?></li>
                                <li class="list-group-item border-0 p-1"><?= $praktik->alamat_instansi; ?></li>
                                <li class="list-group-item border-0 p-1">Ditempat</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p>Dengan hormat,</p>
                            <p>Sehubungan dengan diadakannya Kerja Praktek (PKL) maka kami memohon untuk dibuatkansurat pengantar / rekomendasi ke
                                <?= $praktik->nama_instansi; ?>
                                , ditujukan kepada
                                Kepala <?= $praktik->nama_instansi; ?>.
                                Permohonan tersebut dibuat untuk memintakesediaan <?= $praktik->nama_instansi; ?> untuk menerima mahasiswa yang akanmelaksanakan Kerja Praktek selama jangka waktu 30 hari di tempat tersebut. Adapun nama-nama pemohon surat terlampir :
                            </p>
                            <div class="d-flex flex-row justify-content-lg-center mt-3">
                                <table class="table table-bordered table-sm w-60">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nama</th>
                                            <th scope="col">NIS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($kelompok as $key => $val) : ?>
                                            <tr>
                                                <td><?= $val->nama; ?></td>
                                                <td><?= $val->nis; ?></td>
                                            </tr>

                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <p>Demikian surat ini disampaikan, atas kesediaannya diucapkan terima kasih.</p>
                        </div>
                    </div>
                    <div class="d-flex mt-5 flex-row-reverse">
                        <div class="content text-center">
                            <p class="">Magelang, <?= date("Y/m/d") ?></p>
                            <p>Ketua Kerja Praktik</p>
                            <br>
                            <br>
                            <br>
                            <br>
                            <p>
                                <?= $kelompok[0]->nama; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var newstr = document.querySelector('#print-div').innerHTML;

            window.print(newstr);


        });
    </script>


    <!-- <script src="<?= base_url() . 'assets/base/' ?>vendor/jquery/jquery.min.js"></script> -->
    <script src="<?= base_url() . 'assets/base/' ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="<?= base_url() . 'assets/base/' ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <script src="<?= base_url() . 'assets/base/' ?>js/sb-admin-2.min.js"></script>
    <script src="<?= base_url() . 'assets/base/' ?>js/jquery.steps.js"></script>

    <script src="<?= base_url() . 'assets/base/' ?>js/custom.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script type="text/javascript" src="<?= base_url() . 'assets/base/' ?>datatable/datatables.min.js"></script>
    <script>
        AOS.init();
    </script>

    <script src="<?= base_url() . 'assets/base/' ?>js/sweetalert2.all.min.js"></script>
    <?php if (isset($custom_js)) : ?>
        <?= $custom_js; ?>
    <?php endif; ?>
</body>

</html>