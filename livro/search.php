<?php

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../config/core.php';
    include_once '../config/database.php';
    include_once '../objects/livro.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $livro = new Livro($db);
    
    $keywords=isset($_GET["s"]) ? $_GET["s"] : "";
    
    $stmt = $livro->search($keywords);
    $num = $stmt->rowCount();
    
    if($num>0){
    
        $livros_arr=array();
        $livros_arr["records"]=array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
    
            $livro_item=array(
                "id_livro" => $id_livro,
                "nome_livro" => $nome_livro,
                "nome_autor" => $nome_autor,
                "categoria_nome" => $categoria_nome,
                "status_livro" => $status_livro
            );
    
            array_push($livros_arr["records"], $livro_item);
        }
    
        http_response_code(200);
    
        echo json_encode($livros_arr);
    }
    
    else{
        http_response_code(404);
    
        echo json_encode(
            array("message" => "Nenhum livro encontrado.")
        );
    }
?>