<?php

  class Usuario {
    private $conn;
    private $table_name = "usuario";

    public $id_usuario;
    public $nome_usuario;
    public $senha_usuario;
    public $cpf_usuario;
    public $tipo_usuario;
    public $data_cadastro;

    public function __construct($db){
       $this->conn = $db;
   }

  }

 ?>
