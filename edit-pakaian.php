<?php

require_once 'classes/Register.php';

//object
$re = new Register();

if (isset($_GET['id'])) {
  $id = base64_decode($_GET['id']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $register = $re->updatePakaian($_POST, $_FILES, $id);
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="shortcut icon" href="image/favicon.png" type="image/x-icon" />
  <title>Edit Form</title>
</head>

<body>

  <br>
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
                <h3>Update Pakaian</h3>
              </div>
              <div class="m-2">
                <a href="beranda.php" class="btn btn-info float-right">Kembali</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <?php
            $getPk = $re->getPkById($id);
            if ($getPk) {
              while ($row = mysqli_fetch_assoc($getPk)) {
            ?>
                <form method="POST" enctype="multipart/form-data" class="px-2">

                  <label for="" class="py-2">Kode Product</label>
                  <input type="text" name="id" value="<?= $row['id'] ?>" class="form-control" readonly>

                  <label for="" class="py-2">Nama</label>
                  <input type="text" name="nama" value="<?= $row['nama'] ?>" class="form-control">


                  <div class="form-group row">
                    <div class="col-md-3">
                      <label for="size" class="form-label mt-2 mb-2 ms-1">Size</label>
                      <select name="size" class="form-select" id="size" required>
                        <option value="S" <?php if ($row['size'] === "S") {
                                            echo "selected";
                                          } ?>>S</option>
                        <option value="M" <?php if ($row['size'] === "M") {
                                            echo "selected";
                                          } ?>>M</option>
                        <option value="L" <?php if ($row['size'] === "L") {
                                            echo "selected";
                                          } ?>>L</option>
                        <option value="XL" <?php if ($row['size'] === "XL") {
                                              echo "selected";
                                            } ?>>XL</option>
                      </select>
                    </div>
                  </div>


                  <div class="form-group row">
                    <div class="col-md-3">
                      <label for="warna" class="form-label mt-2 mb-2 ms-1">Warna</label>
                      <select name="warna" class="form-select" id="warna" required>
                        <option value="Putih" <?php if ($row['warna'] === "Putih") {
                                                echo "selected";
                                              } ?>>Putih</option>
                        <option value="Hitam" <?php if ($row['warna'] === "Hitam") {
                                                echo "selected";
                                              } ?>>Hitam</option>
                        <option value="Merah" <?php if ($row['warna'] === "Merah") {
                                                echo "selected";
                                              } ?>>Merah</option>
                        <option value="Krem" <?php if ($row['warna'] === "Krem") {
                                                echo "selected";
                                              } ?>>Krem</option>
                        <option value="Orange" <?php if ($row['warna'] === "Orange") {
                                                  echo "selected";
                                                } ?>>Orange</option>
                      </select>
                    </div>
                  </div>


                  <div class="form-group row">
                    <div class="col-md-3">
                      <label for="jenis" class="form-label mt-2 mb-2 ms-1">Jenis</label>
                      <select name="jenis" class="form-select" id="jenis" required>
                        <option value="Kemeja" <?php if ($row['jenis'] === "Kemeja") {
                                                  echo "selected";
                                                } ?>>Kemeja</option>
                        <option value="Kaos" <?php if ($row['jenis'] === "Kaos") {
                                                echo "selected";
                                              } ?>>Kaos</option>
                        <option value="Jaket" <?php if ($row['jenis'] === "Jaket") {
                                                echo "selected";
                                              } ?>>Jaket</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-md-3">
                      <label for="brand" class="form-label mt-2 mb-2 ms-1">Brand</label>
                      <select name="brand" class="form-select" id="brand" required>
                        <option value="Levis" <?php if ($row['brand'] === "Kemeja") {
                                                  echo "selected";
                                                } ?>>Levis</option>
                        <option value="H&M" <?php if ($row['brand'] === "Kaos") {
                                                echo "selected";
                                              } ?>>H&M</option>
                        <option value="Ricardo" <?php if ($row['brand'] === "Jaket") {
                                                echo "selected";
                                              } ?>>Ricardo</option>
                        <option value="Erigo" <?php if ($row['brand'] === "Jaket") {
                                                echo "selected";
                                              } ?>>Erigo</option>
                        <option value="LV" <?php if ($row['brand'] === "Jaket") {
                                                echo "selected";
                                              } ?>>Louis Vuitton</option>
                        <option value="Gucci" <?php if ($row['brand'] === "Jaket") {
                                                echo "selected";
                                              } ?>>Gucci</option>
                      </select>
                    </div>
                  </div>

                  <label for="" class="py-2">Stok</label>
                  <input type="number" name="stok" value="<?= $row['stok'] ?>" class="form-control">

                  <label for="" class="py-2">Harga</label>
                  <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">Rp.</span>
                </div>
                <input type="number" name="harga" value="<?= $row['harga'] ?>" class="form-control">
              </div>


                  <label for="" class="py-2">Foto</label>
                  <input type="file" name="foto" class="form-control">
                  <img src="<?= $row['foto'] ?>" style="width: 200px;" class="img-thumbnail" alt=""><br>


                  <input type="submit" value="Update Pakaian" class="btn btn-success form-control mt-4">
                </form>
            <?php
              }
            }
            ?>


          </div>
        </div>
      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>