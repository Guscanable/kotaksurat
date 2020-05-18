<!-- Start modal -->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddLabel">Tambah Data Laporan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="form-addlap">
                    <div class="form-group">
                        <label for="pengirim">* Rata-rata tingkat kedatangan surat</label>
                        <input type="text" name="datang" class="form-control" id="datang">
                    </div>
                    <div class="form-group">
                        <label for="alamat_pengirim">* Rata-rata kecepatan pelayanan</label>
                        <input type="text" name="layan" class="form-control" id="layan">
                    </div>
                    <p><em>Catatan : Berapa banyak surat/jam</em></p>
                    <button type="submit" name="btn-add" class="btn btn-primary btn-add">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- End modal -->


<nav class="navbar navbar-expand-lg navbar-dark bg-light" style=" background-color: #00c8b7 !important" ;>
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Administrator : <?= base64_decode($_SESSION['auth']['username']); ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASEURL; ?>/dashboard">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASEURL; ?>/dashboard/kotaksurat">Kotak Surat</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= BASEURL; ?>/dashboard/laporan">Laporan</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="btn btn-warning text-white" href="<?= BASEURL; ?>/dashboard/logout">Keluar</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="row align-items-center mb-3">
    <div class="col-md-4 ">
        <div class="mt-2 pt-4 text-left">
            <img src="<?= IMAGES; ?>/Kotak Surat.png" width="100%" class="img-fluid" alt="Responsive image">
        </div>
    </div>
    <div class="col-md-8 text-left">
        <h1 style="font-size: 5em; color: #00c8b7;">
            Laporan
        </h1>
        <h4>
            <i>Sistem Antrian Surat Kantor Pos</i>
        </h4>
    </div>
</div>

<div class="container-fluid text-center">
    <button class="btn btn-outline-primary mb-3" data-toggle="modal" data-target="#modalAdd">Tambah manual</button>
    <table class="table table-bordered text-center">
        <thead>

            <tr>
                <th scope="col"> Tanggal</th>
                <th scope="col"><i>(alpha)</i> Tingkat kedatangan surat</th>
                <th scope="col"><i>(miu)</i> Tingkat pelayanan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($data[1] as $row) :
            ?>
                <tr>
                    <td><?= $row['tanggal']; ?></td>
                    <td><?= $row['datang']; ?> Surat/Jam </td>
                    <td><?= $row['layan']; ?> Surat/Jam </td>
                </tr>
            <?php
                $no++;
            endforeach;
            ?>
    </table>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Tanggal</th>
                <th scope="col"><i>(pw)</i> Probabilitas</th>
                <th scope="col"><i>(lq)</i> Jumlah Antrian</th>
                <th scope="col"><i>(ls)</i> Jumlah Antrian Sistem</th>
                <th scope="col"><i>(wq)</i> Waktu Tunggu</th>
                <th scope="col"><i>(ws)</i> Waktu Tunggu Sistem</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($data[1] as $row) :
            ?>
                <tr>
                    <td><?= $row['tanggal']; ?></td>
                    <td><?= $row['pw'] ?></td>
                    <td><?= $row['lq'] ?> Kendaraan</td>
                    <td><?= $row['ls'] ?> Kendaraan </td>
                    <td><?= $row['wq'] ?> Jam </td>
                    <td><?= $row['ws'] ?> Jam </td>
                </tr>
            <?php
                $no++;
            endforeach;
            ?>
        </tbody>
    </table>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
    $(document).ready(function() {
        $('.btn-add').click(function(e) {
            var data = $('#form-addlap').serialize();
            e.preventDefault();
            $.ajax({
                url: '<?= BASEURL; ?>/dashboard/addlap',
                data: data,
                type: 'post',
                success: function() {
                    $('#modalAdd').modal('toggle');
                    $('#modal').modal('hide');
                    Swal.fire({
                        title: "Sukses",
                        text: "Data berhasil ditambahkan!",
                        icon: "success"
                    }).then(function() {
                        location.reload();
                    });
                }
            });
        });
    });
</script>