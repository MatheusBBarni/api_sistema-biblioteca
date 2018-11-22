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

  }

 ?>
