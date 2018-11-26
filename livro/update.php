<?php

  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Methods: POST");
  header("Access-Control-Max-Age: 3600");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

  include_once '../config/database.php';
  include_once '../objects/livro.php';

  $database = new Database();
  $db = $database->getConnection();

  $livro = new Livro($db);

  $data = json_decode(file_get_contents("php://input"));

  $livro->id_livro = $data->id_livro;

  // set livro property values
  $livro->nome_livro = $data->nome_livro;
  $livro->nome_autor = $data->nome_autor;
  $livro->categoria_livro = $data->categoria_livro;
  $livro->status_livro_id = $data->status_livro_id;

  if($livro->update()){

      http_response_code(200);

      echo json_encode(array("message" => "Livro alterado."));
  }

  else{

      http_response_code(503);

      echo json_encode(array("message" => "Não foi possivel alterar o livro."));
  }
?>
