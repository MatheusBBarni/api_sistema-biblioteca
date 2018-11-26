<?php

  class Livro {
      private $conn;
      private $table_name = "livro";

      public $id_livro;
      public $nome_livro;
      public $nome_autor;
      public $categoria_livro;
      public $status_livro;

      public function __construct($db){
         $this->conn = $db;
     }

     function read(){

      // select all query
      $query = "SELECT
                  l.id_livro, l.nome_livro, l.nome_autor, l.categoria_livro, l.status_livro FROM ". $this->table_name . " l ORDER BY l.nome_livro DESC";

      // prepare query statement
      $stmt = $this->conn->prepare($query);

      // execute query
      $stmt->execute();

      return $stmt;
    }

  }

 ?>
