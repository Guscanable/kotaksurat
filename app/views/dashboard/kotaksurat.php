<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Kotak Surat</title>
</head>

<body>

    <!-- Start modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Surat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="form-edit">
                        <input type="hidden" name="id_surat" class="form-control" id="id_surat">
                        <div class="form-group">
                            <label for="pengirim">* Nama Pengirim</label>
                            <input type="text" name="pengirim" class="form-control" id="pengirim">
                        </div>
                        <div class="form-group">
                            <label for="alamat_pengirim">* Alamat Pengirim</label>
                            <input type="text" name="alamat_pengirim" class="form-control" id="alamat_pengirim">
                        </div>
                        <div class="form-group">
                            <label for="penerima">* Nama Penerima</label>
                            <input type="text" name="penerima" class="form-control" id="penerima">
                        </div>
                        <div class="form-group">
                            <label for="alamat_penerima">* Alamat Penerima</label>
                            <input type="text" name="alamat_penerima" class="form-control" id="alamat_penerima">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary btn-edit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- End modal -->

    <!-- Start modal -->
    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAddLabel">Tambah Data Surat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="form-add">
                        <div class="form-group">
                            <label for="pengirim">* Nama Pengirim</label>
                            <input type="text" name="pengirim" class="form-control" id="pengirim">
                        </div>
                        <div class="form-group">
                            <label for="alamat_pengirim">* Alamat Pengirim</label>
                            <input type="text" name="alamat_pengirim" class="form-control" id="alamat_pengirim">
                        </div>
                        <div class="form-group">
                            <label for="penerima">* Nama Penerima</label>
                            <input type="text" name="penerima" class="form-control" id="penerima">
                        </div>
                        <div class="form-group">
                            <label for="alamat_penerima">* Alamat Penerima</label>
                            <input type="text" name="alamat_penerima" class="form-control" id="alamat_penerima">
                        </div>
                        <button type="submit" name="btn-add" class="btn btn-primary btn-add">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- End modal -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-light" style="background-color: #00c8b7 !important;">
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
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= BASEURL; ?>/dashboard/kotaksurat">Kotak Surat</a>
                    </li>
                    <li class="nav-item">
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
                Kotak Surat
            </h1>
            <h4>
                <i>Sistem Antrian Surat Kantor Pos</i>
            </h4>
        </div>
    </div>

    <div class="container-fluid text-center">
        <div class>
            <button class="btn btn-outline-primary mb-3" data-toggle="modal" data-target="#modalAdd">Tambah surat</button>
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">No Kiriman</th>
                        <th scope="col">Pengirim</th>
                        <th scope="col">Alamat Pengirim</th>
                        <th scope="col">Penerima</th>
                        <th scope="col">Alamat Penerima</th>
                        <th scope="col">Tanggal dan Waktu</th>
                        <th scope="col" colspan="2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    if (count($data) > 0) :
                        foreach ($data as $row) :
                    ?>
                            <tr>
                                <th scope="row"><?= $no; ?></th>
                                <td><?= $row['nomor_kiriman']; ?></td>
                                <td><?= $row['pengirim']; ?></td>
                                <td><?= $row['alamat_pengirim']; ?></td>
                                <td><?= $row['penerima']; ?></td>
                                <td><?= $row['alamat_penerima']; ?></td>
                                <td><?= $row['date']; ?></td>
                                <td><a class="badge badge-success edit" href="#" data-id="<?= $row['id_surat']; ?>" data-toggle="modal" data-target="#exampleModal">Edit</a></td>
                                <td><a class="badge badge-danger delete" href="<?= BASEURL; ?>/dashboard/delete?id=<?= $row['id_surat']; ?>" data-id="<?= $row['id_surat']; ?>">Delete</a></td>
                            </tr>
                        <?php
                            $no++;
                        endforeach;
                    else :
                        ?>
                        <tr>
                            <td colspan="8" class="text-danger text-center">
                                <h5>Tidak ada data yang ditemukan!</h5>
                            </td>
                        </tr>
                    <?php endif; ?>
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
                $('.edit').on('click', function() {
                    var data = $(this).data('id');

                    $.ajax({
                        url: '<?= BASEURL; ?>/dashboard/edit?id=' + data,
                        type: 'get',
                        dataType: 'json',
                        success: function(data) {
                            let obj = jQuery.parseJSON(JSON.stringify(data));
                            $('#id_surat').val(obj.id_surat);
                            $('#pengirim').val(obj.pengirim);
                            $('#alamat_pengirim').val(obj.alamat_pengirim);
                            $('#penerima').val(obj.penerima);
                            $('#alamat_penerima').val(obj.alamat_penerima);
                        }
                    })
                });

                $('.btn-edit').click(function(e) {
                    var data = $('#form-edit').serialize();
                    e.preventDefault();
                    $.ajax({
                        url: '<?= BASEURL; ?>/dashboard/prosesedit',
                        data: data,
                        type: 'post',
                        success: function() {
                            $('#exampleModal').modal('toggle');
                            $('#modal').modal('hide');
                            Swal.fire({
                                title: "Sukses",
                                text: "Data berhasil diedit!",
                                icon: "success"
                            }).then(function() {
                                location.reload();
                            });
                        }
                    });
                });

                $('.btn-add').click(function(e) {
                    var data = $('#form-add').serialize();
                    e.preventDefault();
                    $.ajax({
                        url: '<?= BASEURL; ?>/dashboard/add',
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

                $('.delete').on('click', function(e) {
                    e.preventDefault();
                    const href = $(this).attr('href');
                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Anda tidak akan dapat mengembalikan ini!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, Hapus!'
                    }).then((result) => {
                        if (result.value) {
                            document.location.href = href;
                        }
                    })
                });

            });
        </script>
</body>

</html>