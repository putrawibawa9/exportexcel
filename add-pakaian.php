<?php

require_once 'classes/Register.php';

//object
$re = new Register();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $register = $re->addPakaian($_POST, $_FILES);
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
  <title>Pakaian Form</title>
</head>

<body>

  <div class="container mt-2 px-5">
    <div class="row d-flex justify-content-center">
      <div class="col-md-7">
        <div class="card shadow">

          <?php
          if (isset($register)) {
          ?>

            <div class="container mt-2">
              <!-- Alert -->
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong><?= $register ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              <!-- End Alert -->
            </div>

          <?php
          }
          ?>

          <div class="card-header">
            <div class="d-flex justify-content-between">
              <div class="m-2">
                <h3>Tambah Pakaian</h3>
              </div>
              <div class="m-2">
                <a href="beranda.php" class="btn btn-info float-right"> Kembali </a>
              </div>
            </div>
          </div>

          <div class="card-body ">
            <form method="POST" enctype="multipart/form-data" class="px-2">

              <label for="" class="py-2">Kode Product</label>
              <input type="text" name="id" placeholder="Masukan Nama Produk" class="form-control" Required>

              <label for="" class="py-2">Nama</label>
              <input type="text" name="nama" placeholder="Masukan Nama Produk" class="form-control" Required>

              <div class="form-group row">
                <div class="col-md-3">
                  <label for="size" class="form-label mt-2 mb-2 ms-1">Size</label>
                  <select name="size" class="form-select" id="size" required>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-3">
                  <label for="warna" class="form-label mt-2 mb-2 ms-1">Warna</label>
                  <select name="warna" class="form-select" id="warna" required>
                    <option value="Putih">Putih</option>
                    <option value="Hitam">Hitam</option>
                    <option value="Merah">Merah</option>
                    <option value="Krem">Krem</option>
                    <option value="Orange">Orange</option>
                  </select>
                </div>
              </div>


              <div class="form-group row">
                <div class="col-md-3">
                  <label for="jenis" class="form-label mt-2 mb-2 ms-1">Jenis</label>
                  <select name="jenis" class="form-select" id="jenis" required>
                    <option value="Kemeja">Kemeja</option>
                    <option value="Kaos">Kaos</option>
                    <option value="Jaket">Jaket</option>
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-3">
                  <label for="jenis" class="form-label mt-2 mb-2 ms-1">Brand</label>
                  <select name="brand" class="form-select" id="jenis" required>
                    <option value="Levis">Levis</option>
                    <option value="H&M">H&M</option>
                    <option value="Ricardo">Ricardo</option>
                    <option value="Erigo">Erigo</option>
                    <option value="LV">Louis Vuitton</option>
                    <option value="Gucci">Gucci</option>

                  </select>
                </div>
              </div>

              <label for="" class="py-2">Stok</label>
              <input type="number" name="stok" placeholder="Masukan Stok Pakaian " class="form-control" Required>

              <label for="" class="py-2">Harga</label>
                  <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">Rp.</span>
                </div>
                <input type="number" name="harga" value="<?= $row['harga'] ?>" class="form-control">
              </div>

              <label for="" class="py-2">Foto</label>
              <input type="file" name="foto" class="form-control" Required>

              <input type="submit" value="Tambah Pakaian" class="btn btn-success form-control mt-4">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>