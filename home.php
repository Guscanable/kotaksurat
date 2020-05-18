<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <title>Home</title>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-light" style="background-color: #00c8b7 !important;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Administrator : <?= base64_decode($_SESSION['auth']['username']); ?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="<?= BASEURL; ?>/dashboard">Beranda <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
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

  <div class="container-fluid text-center">
    <div class="row align-items-center mb-3">
      <div class="col-md-5 ">
        <div class="mt-2 pt-3 text-right">
          <img src="<?= IMAGES; ?>/Home.png" width="50%" class="img-fluid" alt="Responsive image">
        </div>
      </div>
      <div class="col-md-7 text-left">
        <h1 style="font-size: 3em; color: #00c8b7;">
          Selamat Datang, <?= base64_decode($_SESSION['auth']['username']); ?>
        </h1>
        <h4>
          <i>Sistem Antrian Surat Kantor Pos</i>
        </h4>
      </div>
    </div>

    <div class="container-fluid pt-3 text-center">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">No Kiriman</th>
            <th scope="col">Pengirim</th>
            <th scope="col">Alamat Pengirim</th>
            <th scope="col">Penerima</th>
            <th scope="col">Alamat Penerima</th>
            <th scope="col">Tanggal dan Waktu</th>
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
              </tr>
            <?php
              $no++;
            endforeach;
          else :
            ?>
            <tr>
              <td colspan="8" class="text-danger text-center">
                <h5>Menuju Kotak Surat untuk menambahkan data!</h5>
              </td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>