<?php

require_once 'lib/Database.php';

class Register extends Database
{

  public function __construct()
  {
    parent::__construct(); // Call the constructor of the Database class
  }

  // Tambah PAKAIAN
  public function addPakaian($data, $file)
  {
    $id = $data['id'];
    $nama = $data['nama'];
    $size = $data['size'];
    $warna = $data['warna'];
    $jenis = $data['jenis'];
    $brand = $data['brand'];
    $stok = $data['stok'];
    $harga = $data['harga'];

    $permited = ['jpg', 'jpeg', 'png', 'gif'];
    $file_name = $file['foto']['name'];
    $file_size = $file['foto']['size'];
    $file_temp = $file['foto']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
    $upload_image = "image/" . $unique_image;

    // Check if ID already exists
    $id_check_query = "SELECT id FROM pakaian WHERE id = '$id'";
    $id_check_result = $this->select($id_check_query);
    if (mysqli_num_rows($id_check_result) > 0) {
      $msg = "ID sudah ada. Silakan gunakan ID lain.";
      return $msg;
    }

    if (empty($id) || empty($nama) || empty($size) || empty($warna) || empty($jenis) || empty($brand) || empty($stok) || empty($harga) || empty($file_name)) {
      $msg = "Field Tidak Boleh Kosong";
      return $msg;
    } elseif ($file_size > 1048567) {
      $msg = "File harus Kurang Dari 1MB";
      return $msg;
    } elseif (in_array($file_ext, $permited) == false) {
      $msg = "Hanya bisa Upload" . implode(', ', $permited);
      return $msg;
    } else {
      move_uploaded_file($file_temp, $upload_image);

      $query = "INSERT INTO `pakaian` (`id`,`nama`,`size`, `warna`, `jenis`, `brand`, `stok` ,`harga`, `foto`) VALUES ('$id','$nama','$size', '$warna',  '$jenis', '$brand', '$stok','$harga', '$upload_image')";

      $result = $this->insert($query);

      if ($result) {
        $msg = "Pendaftaran Berhasil";
        return $msg;
      } else {
        $msg = "Pendaftaran Gagal";
        return $msg;
      }
    }
  }

  public function rupiahFormat($angka)
  {
    $rupiah = number_format($angka, 0, ',', '.');
    return "Rp " . $rupiah;
  }

  // Menampilkan Pakaian
  public function AllPakaian()
  {
    // SELECT * FROM pakaian WHERE id LIKE 'J%' ORDER BY id ASC
    $query = "SELECT * FROM pakaian ORDER BY id ASC";
    $result = $this->select($query);
    return $result;
  }

  // Mengambil id untuk update
  public function getPkById($id)
  {
    $query = "SELECT * FROM pakaian WHERE id = '$id'";
    $result = $this->select($query);
    return $result;
  }


  //Update Pakaian
  public function updatePakaian($data, $file, $id)
  {
    $nama = $data['nama'];
    $size = $data['size'];
    $warna = $data['warna'];
    $jenis = $data['jenis'];
    $brand = $data['brand'];
    $stok = $data['stok'];
    $harga = $data['harga'];

    $permited = ['jpg', 'jpeg', 'png', 'gif'];
    $file_name = $file['foto']['name'];
    $file_size = $file['foto']['size'];
    $file_temp = $file['foto']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
    $upload_image = "image/" . $unique_image;

    if (empty($id) || empty($nama) || empty($size) || empty($warna) || empty($jenis) || empty($brand) || empty($stok) || empty($harga)) {
      $msg = "Tidak Boleh Kosong";
      return $msg;
    }
    if (!empty($file_name)) {
      if ($file_size > 1048567) {
        $msg = "File harus Kurang Dari 1MB";
        return $msg;
      } elseif (in_array($file_ext, $permited) == false) {
        $msg = "Hanya bisa Upload" . implode(', ', $permited);
        return $msg;
      } else {

        $img_query = "SELECT * FROM pakaian WHERE id = '$id'";
        $img_res = $this->select($img_query);
        if ($img_res) {
          while ($row = mysqli_fetch_assoc($img_res)) {
            $foto = $row['foto'];
            unlink($foto);
          }
        }

        move_uploaded_file($file_temp, $upload_image);

        $query = "UPDATE pakaian SET nama='$nama', size='$size', warna='$warna' ,  jenis='$jenis', brand='$brand', stok='$stok',harga='$harga',  foto='$upload_image' WHERE id = '$id'";


        $result = $this->update($query);

        if ($result) {
          $msg = "Pakaian Berhasil Di Update";
          return $msg;
        } else {
          $msg = "Update Gagal";
          return $msg;
        }
      }
    } else {
      $query = "UPDATE pakaian SET nama='$nama', size='$size', warna='$warna' , jenis='$jenis', brand='$brand', stok='$stok',harga='$harga' WHERE id = '$id'";

      $result = $this->update($query);

      if ($result) {
        $msg = "Pakaian Berhasil Di Update";
        return $msg;
      } else {
        $msg = "Update Gagal";
        return $msg;
      }
    }
  }


  // DEL Pakaian
  public function delPakaian($id)
  {
    $img_query = "SELECT * FROM pakaian WHERE id = '$id'";
    $img_res = $this->select($img_query);
    if ($img_res) {
      while ($row = mysqli_fetch_assoc($img_res)) {
        $foto = $row['foto'];
        unlink($foto);
      }
    }

    $del_query = "DELETE FROM pakaian WHERE id = '$id'";
    $del = $this->delete($del_query);
    if ($del) {
      $msg = "Pakaian Berhasil Di Hapus";
      return $msg;
    } else {
      $msg = "Gagal Di Hapus";
      return $msg;
    }
  }


  public function AllBrand()
  {
    // SELECT * FROM pakaian WHERE id LIKE 'J%' ORDER BY id ASC
    $query = "SELECT * FROM brand ORDER BY id ASC";
    $result = $this->select($query);
    return $result;
  }
}
