<?php
  define("HOST", "127.0.0.1");
  define("USER", "544261");
  define("PASSWORD", "tienphuckx");
  define("DB", "544261");

  function get_db_connection() {
    $connect = new mysqli(HOST, USER, PASSWORD, DB);
    if ($connect->connect_error) {
      die("Connection failed: " . $connect->connect_error);
    }
    return $connect;
  }
?>