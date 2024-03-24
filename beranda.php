<?php
require_once 'classes/Register.php';

//object
$re = new Register();

if (isset($_GET['delPk'])) {
  $id = base64_decode($_GET['delPk']);
  $delPakaian = $re->delPakaian($id);
}
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <link rel="shortcut icon" href="image/favicon.png" type="image/x-icon" />

  <title>Pakaian</title>
</head>

<body class="p-5">

  <nav class=" navbar navbar-expand-lg navbar-light bg-light fixed-top ">
    <div class="container d-flex justify-content-center">
      <a href="index.php" class="navbar-brand d-flex align-items-center">
        <img src="image/favicon.png" width="60px" />
        <span class="input pl-2 fs-3"></span>
      </a>
    </div>
  </nav>


  <div class="container-fluid mt-4 pt-5 ">
    <div class="row">
      <div class="col-md-12">
        <div class="card shadow">

          <?php
          if (isset($delPakaian)) {
          ?>
            <div class="container-fluid mt-2">
              <!-- Alert -->
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong><?= $delPakaian ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              <!-- End Alert -->
            </div>
          <?php
          }
          ?>

          <div class="card-header">
            <div class="d-flex justify-content-between">
              <div class="m-2 d-flex ">
                <h2>
                  Master Pakaian
                </h2>
                <a href="export.php" class="btn btn-info mx-2 align-self-center">Export Data</a>
              </div>
              <div class="m-2">
                <a href="add-pakaian.php" class="btn btn-info">Add Pakaian</a>
              </div>

            </div>
          </div>
          <div class="card-body">

            <table class="table table-bordered text-center">
              <tr>
                <th>No</th>
                <th>Kode Product</th>
                <th>Nama</th>
                <th>Size</th>
                <th>Warna</th>
                <th>Jenis</th>
                <th>Brand</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Foto</th>
                <th>Action</th>
              </tr>


              <?php
              // menggunakan method AllPakaian dari objek Re
              $allpk = $re->AllPakaian();
              if ($allpk) {
                $counter = 1; // Initialize counter
                while ($row = mysqli_fetch_assoc($allpk)) {
              ?>
                  <tr>
                    <td><?php echo $counter++; ?></td>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['size'] ?></td>
                    <td><?= $row['warna'] ?></td>
                    <td><?= $row['jenis'] ?></td>
                    <td><?= $row['brand'] ?></td>
                    <td><?= $row['stok'] . ' pcs' ?></td>
                    <td><?= "Rp. " . number_format($row['harga'], 2, ",", ".") ?></td>
                    <td><img style="width: 100px;" src="<?= $row['foto'] ?>" class="img-fluid" alt=""></td>
                    <td>
                      <a href="edit-pakaian.php?id=<?= base64_encode($row['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                      <a href="?delPk=<?= base64_encode($row['id']) ?>" onclick="return confirm('Yakin Di Hapus ?')" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                  </tr>
              <?php
                }
              }
              ?>

            </table>

          </div>
        </div>
      </div>
    </div>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

  <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>

  <script>
    let type = new Typed(".input", {
      strings: [
        "Manage Akan Shop Product",
        "Manage Stok Akan Shop",
        "Katalog Akan Shop",
        "Master Pakaian"
      ],
      typeSpeed: 70,
      backSpeed: 50,
      loop: true,
    });
  </script>

</body>

</html>