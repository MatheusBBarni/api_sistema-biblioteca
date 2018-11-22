<?php
  //https://www.codeofaninja.com/2017/02/create-simple-rest-api-in-php.html
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");

  include_once '../database.php';
  include_once '../Entity/livro.php';

  $database = new Database();
  $db = $database->getConnection();

  $livro = new Livro($db);

 ?>
