<?php
require_once 'classes/Register.php';

$registerObj = new Register();
$pakaian = $registerObj->AllPakaian();
$filename = "data_pakaian-" . date('Ymd') . ".xls";

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$filename");
?>

<table border="1">
  <thead>
    <tr>
      <th>No.</th>
      <th>Kode Product</th>
      <th>Nama</th>
      <th>Size</th>
      <th>Warna</th>
      <th>Jenis</th>
      <th>Brand</th>
      <th>Stok</th>
      <th>Harga</th>
      <th>Foto</th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1; ?>
    <?php foreach ($pakaian as $row) : ?>
      <tr>
        <td><?= $no++; ?></td>
        <td><?= $row['id']; ?></td>
        <td><?= $row['nama']; ?></td>
        <td><?= $row['size']; ?></td>
        <td><?= $row['warna']; ?></td>
        <td><?= $row['jenis']; ?></td>
        <td><?= $row['brand']; ?></td>
        <td><?= $row['stok']; ?></td>
        <td><?= "Rp. " . number_format($row['harga'], 2, ",", ".") ?></td>
        <td><a href="<?= $row['foto']; ?>"><?= $row['foto']; ?></a></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>