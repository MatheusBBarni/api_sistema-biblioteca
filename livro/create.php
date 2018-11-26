<?php

  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Methods: POST");
  header("Access-Control-Max-Age: 3600");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

  include_once '../config/database.php';
  include_once '../objects/product.php';

  $database = new Database();
  $db = $database->getConnection();

  $livro = new Livro($db);

  $data = json_decode(file_get_contents("php://input"));

  if(
      !empty($data->nome_livro) &&
      !empty($data->nome_autor) &&
      !empty($data->categoria_livro)
  ){

      $livro->nome_autor = $data->nome_autor;
      $livro->nome_livro = $data->nome_livro;
      $livro->categoria_livro = $data->categoria_livro;

      if($livro->create()){

          http_response_code(201);

          echo json_encode(array("message" => "Livro adicionado."));
      } else {

          http_response_code(503);

          echo json_encode(array("message" => "Não foi possivel adicionar o livro."));
      }
  } else {

      http_response_code(400);

      echo json_encode(array("message" => "Não foi possivel adicionar o livro, falta dados."));
    }
?>
