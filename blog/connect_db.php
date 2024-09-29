<?php

  define("HOST", "");

  define("USER", "");

  define("PASSWORD", "");

  define("DB", "");



  function get_db_connection() {

    $connect = new mysqli(HOST, USER, PASSWORD, DB);

    if ($connect->connect_error) {

      die("Connection failed: " . $connect->connect_error);

    }

    return $connect;

  }

?>