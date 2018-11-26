<?php
  //https://www.codeofaninja.com/2017/02/create-simple-rest-api-in-php.html - 8.0
  class Livro {
      private $conn;
      private $table_nome_livro = "livro";

      public $id_livro;
      public $nome_livro;
      public $nome_autor;
      public $categoria_livro;
      public $status_livro;

      public function __construct($db){
         $this->conn = $db;
     }

     function read(){

      $query = "SELECT
                  l.id_livro, l.nome_livro, l.nome_autor, l.categoria_livro, l.status_livro FROM ". $this->table_nome_livro . " l ORDER BY l.nome_livro DESC";

      $stmt = $this->conn->prepare($query);

      $stmt->execute();

      return $stmt;
    }

    function create(){

      $query = "INSERT INTO
                  livro(nome_livro, nome_autor, categoria_livro)
              values
                  (nome_livro=:nome_livro, nome_autor=:nome_autor, categoria_livro=:categoria_livro)";

      $stmt = $this->conn->prepare($query);

      $this->nome_livro=htmlspecialchars(strip_tags($this->nome_livro));
      $this->nome_autor=htmlspecialchars(strip_tags($this->nome_autor));
      $this->categoria_livro=htmlspecialchars(strip_tags($this->categoria_livro));

      $stmt->bindParam(":nome_livro", $this->nome_livro);
      $stmt->bindParam(":nome_autor", $this->nome_autor);
      $stmt->bindParam(":categoria_livro", $this->categoria_livro);

      if($stmt->execute()){
          return true;
      }

      return false;

    }

    function update(){

      $query = "UPDATE
                  " . $this->table_nome_livro . "
              SET
                  nome_livro = :nome_livro,
                  nome_autor = :nome_autor,
                  categoria_livro = :categoria_livro,
                  status_livro = :status_livro
              WHERE
                  id_livro = :id_livro";

      $stmt = $this->conn->prepare($query);

      $this->nome_livro=htmlspecialchars(strip_tags($this->nome_livro));
      $this->nome_autor=htmlspecialchars(strip_tags($this->nome_autor));
      $this->categoria_livro=htmlspecialchars(strip_tags($this->categoria_livro));
      $this->status_livro=htmlspecialchars(strip_tags($this->status_livro));
      $this->id_livro=htmlspecialchars(strip_tags($this->id_livro));

      $stmt->bindParam(':nome_livro', $this->nome_livro);
      $stmt->bindParam(':nome_autor', $this->nome_autor);
      $stmt->bindParam(':categoria_livro', $this->categoria_livro);
      $stmt->bindParam(':status_livro', $this->status_livro);
      $stmt->bindParam(':id_livro', $this->id_livro);

      if($stmt->execute()){
          return true;
      }

      return false;
    }

  }

 ?>
