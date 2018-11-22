<?php

  class UsuarioLivro {
      private $conn;
      private $table_name = "usuario_livro";

      public $id_aluguel;
      public $id_livro;
      public $id_livro;
      public $data_retirada;
      public $data_entrega;

      public function __construct($db){
         $this->conn = $db;
     }

  }

 ?>
