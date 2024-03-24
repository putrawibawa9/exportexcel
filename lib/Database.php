<?php

require_once 'config/config.php';

// Interface untuk berinteraksi dengan database
interface DatabaseInterface
{
  // Method untuk memasukkan data ke dalam database
  public function insert($query);

  // Method untuk mengambil data dari database
  public function select($query);

  // Method untuk memperbarui data dalam database
  public function update($query);

  // Method untuk menghapus data dari database
  public function delete($query);
}


class Database implements DatabaseInterface
{
  //Atribut
  protected  $host = HOST;
  protected  $user = USER;
  protected  $password = PASSWORD;
  protected  $database = DATABASE;

  protected  $link;
  protected  $error;

  public function __construct()
  {
    $this->dbConnect();
  }

  public function dbConnect()
  {
    $this->link = mysqli_connect($this->host, $this->user, $this->password, $this->database);
    if (!$this->link) {
      $this->error = "Database Connection Failed";
      return false;
    }
  }

  public function insert($query)
  {
    $result = mysqli_query($this->link, $query) or die($this->link->error . __LINE__);
    if ($result) {
      return $result;
    } else {
      return false;
    }
  }

  public function select($query)
  {
    $result = mysqli_query($this->link, $query);
    if ($result) {
      return $result;
    } else {
      echo "Query Error:" . mysqli_error($this->link); // Provides more detail
      return false;
    }
  }

  public function update($query)
  {
    $result = mysqli_query($this->link, $query) or die($this->link->error . __LINE__);
    if ($result) {
      return $result;
    } else {
      return false;
    }
  }

  public function delete($query)
  {
    $result = mysqli_query($this->link, $query) or die($this->link->error . __LINE__);
    if ($result) {
      return $result;
    } else {
      return false;
    }
  }
}
